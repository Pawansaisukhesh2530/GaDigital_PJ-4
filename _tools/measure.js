/**
 * measure.js - CDP-based rendered geometry measurement.
 * Speaks Chrome DevTools Protocol to a headless Edge instance
 * over Node's built-in WebSocket (no npm dependencies).
 *
 * Usage:
 *   node measure.js <url> <width> <selectorsJsonFile>
 * Prints JSON: { url, width, results: { selector: [ {rect, styles}, ... ] } }
 */
const http = require('http');
const fs = require('fs');

const url = process.argv[2];
const width = parseInt(process.argv[3], 10) || 1440;
const selFile = process.argv[4];
const selectors = JSON.parse(fs.readFileSync(selFile, 'utf8'));

function getJSON(path) {
  return new Promise((resolve, reject) => {
    http.get('http://127.0.0.1:9222' + path, (res) => {
      let d = '';
      res.on('data', c => d += c);
      res.on('end', () => resolve(JSON.parse(d)));
    }).on('error', reject);
  });
}

let msgId = 0;
function send(ws, method, params) {
  return new Promise((resolve) => {
    const id = ++msgId;
    const handler = (ev) => {
      const m = JSON.parse(ev.data);
      if (m.id === id) { ws.removeEventListener('message', handler); resolve(m.result); }
    };
    ws.addEventListener('message', handler);
    ws.send(JSON.stringify({ id, method, params }));
  });
}

function waitEvent(ws, method, timeout = 15000) {
  return new Promise((resolve) => {
    const t = setTimeout(() => { ws.removeEventListener('message', handler); resolve(null); }, timeout);
    const handler = (ev) => {
      const m = JSON.parse(ev.data);
      if (m.method === method) { clearTimeout(t); ws.removeEventListener('message', handler); resolve(m.params); }
    };
    ws.addEventListener('message', handler);
  });
}

const sleep = (ms) => new Promise(r => setTimeout(r, ms));

(async () => {
  // find a page target
  const targets = await getJSON('/json');
  const page = targets.find(t => t.type === 'page');
  const ws = new WebSocket(page.webSocketDebuggerUrl);
  await new Promise(r => ws.addEventListener('open', r, { once: true }));

  await send(ws, 'Page.enable', {});
  await send(ws, 'Runtime.enable', {});
  await send(ws, 'Emulation.setDeviceMetricsOverride', {
    width, height: 900, deviceScaleFactor: 1, mobile: width < 768
  });

  const loaded = waitEvent(ws, 'Page.loadEventFired', 30000);
  await send(ws, 'Page.navigate', { url });
  await loaded;
  // let fonts / lazy content settle
  await sleep(2500);

  // scroll to bottom to trigger any lazy content, then back to top
  await send(ws, 'Runtime.evaluate', { expression: 'window.scrollTo(0, document.body.scrollHeight)' });
  await sleep(800);
  await send(ws, 'Runtime.evaluate', { expression: 'window.scrollTo(0, 0)' });
  await sleep(400);

  const expr = `
    (function() {
      const sels = ${JSON.stringify(selectors)};
      const out = {};
      for (const sel of sels) {
        const els = Array.from(document.querySelectorAll(sel)).slice(0, 6);
        out[sel] = els.map(el => {
          const r = el.getBoundingClientRect();
          const cs = getComputedStyle(el);
          return {
            x: Math.round(r.x), y: Math.round(r.y),
            w: Math.round(r.width), h: Math.round(r.height),
            fontSize: cs.fontSize, fontWeight: cs.fontWeight,
            fontFamily: cs.fontFamily.split(',')[0],
            color: cs.color, background: cs.backgroundColor,
            padding: cs.padding, margin: cs.margin,
            display: cs.display, gap: cs.gap,
            textAlign: cs.textAlign, lineHeight: cs.lineHeight
          };
        });
      }
      out.__viewport = { w: window.innerWidth, docH: document.body.scrollHeight };
      return JSON.stringify(out);
    })()
  `;
  const res = await send(ws, 'Runtime.evaluate', { expression: expr, returnByValue: true });
  console.log(JSON.stringify({ url, width, results: JSON.parse(res.result.value) }, null, 2));
  ws.close();
  process.exit(0);
})().catch(e => { console.error('ERR', e.message); process.exit(1); });
