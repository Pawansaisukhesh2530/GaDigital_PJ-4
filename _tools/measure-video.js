/* Measure the projects video and its ancestor column chain */
const http = require('http');
const url = process.argv[2];
const width = parseInt(process.argv[3], 10) || 1440;

function getJSON(path) {
  return new Promise((resolve, reject) => {
    http.get('http://127.0.0.1:9222' + path, (res) => {
      let d = ''; res.on('data', c => d += c); res.on('end', () => resolve(JSON.parse(d)));
    }).on('error', reject);
  });
}
let msgId = 0;
function send(ws, method, params) {
  return new Promise((resolve) => {
    const id = ++msgId;
    const h = (ev) => { const m = JSON.parse(ev.data); if (m.id === id) { ws.removeEventListener('message', h); resolve(m.result); } };
    ws.addEventListener('message', h); ws.send(JSON.stringify({ id, method, params }));
  });
}
function waitEvent(ws, method, t = 20000) {
  return new Promise((resolve) => {
    const to = setTimeout(() => { ws.removeEventListener('message', h); resolve(null); }, t);
    const h = (ev) => { const m = JSON.parse(ev.data); if (m.method === method) { clearTimeout(to); ws.removeEventListener('message', h); resolve(m.params); } };
    ws.addEventListener('message', h);
  });
}
const sleep = (ms) => new Promise(r => setTimeout(r, ms));

(async () => {
  const targets = await getJSON('/json');
  const page = targets.find(t => t.type === 'page');
  const ws = new WebSocket(page.webSocketDebuggerUrl);
  await new Promise(r => ws.addEventListener('open', r, { once: true }));
  await send(ws, 'Page.enable', {});
  await send(ws, 'Runtime.enable', {});
  await send(ws, 'Emulation.setDeviceMetricsOverride', { width, height: 900, deviceScaleFactor: 1, mobile: false });
  const loaded = waitEvent(ws, 'Page.loadEventFired', 30000);
  await send(ws, 'Page.navigate', { url });
  await loaded; await sleep(2500);

  const expr = `
    (function(){
      const v = document.querySelector('video') || document.querySelector('.projects-video, .projects-hero-media img, video');
      if(!v) return JSON.stringify({error:'no video/media'});
      const chain = [];
      let el = v;
      for(let i=0;i<6 && el;i++){
        const r = el.getBoundingClientRect();
        const cs = getComputedStyle(el);
        chain.push({
          tag: el.tagName.toLowerCase(),
          cls: (el.className||'').toString().slice(0,60),
          x: Math.round(r.x), y: Math.round(r.y), w: Math.round(r.width), h: Math.round(r.height),
          display: cs.display, flexDir: cs.flexDirection, width: cs.width, maxWidth: cs.maxWidth,
          padding: cs.padding, gap: cs.gap, alignItems: cs.alignItems, justifyContent: cs.justifyContent
        });
        el = el.parentElement;
      }
      return JSON.stringify({ vw: window.innerWidth, chain });
    })()
  `;
  const res = await send(ws, 'Runtime.evaluate', { expression: expr, returnByValue: true });
  console.log(res.result.value);
  ws.close(); process.exit(0);
})().catch(e => { console.error('ERR', e.message); process.exit(1); });
