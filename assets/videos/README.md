# Videos

All four clips are hosted locally under `assets/videos/` in two formats:

- `*.mp4` — H.264 + AAC, fast-start (moov before mdat). These are the
  browser-compatible files referenced by the site and **should be committed**
  to the repository (each is well under GitHub's 100 MB limit).
- `*.mov` — the original QuickTime masters from the WordPress site (large,
  up to ~114 MB). These are **git-ignored** and are NOT needed to run the
  site; they are kept as source masters only.

Usage in the site:

| Page            | File                          | Size  |
|-----------------|-------------------------------|-------|
| projects.php    | `assets/videos/projects-hero.mp4`     | ~23 MB |
| gallery.php     | `assets/videos/Generator-Transformer.mp4` | ~1.3 MB |
| gallery.php     | `assets/videos/Furnace-Transformer.mp4`   | ~0.8 MB |
| gallery.php     | `assets/videos/Rectifier-Transformer.mp4` | ~6.8 MB |

The `.htaccess` serves `video/mp4` MIME types so Chromium, Firefox, Safari
and Edge can all play the clips. No external hosting or WordPress URLs are
used.
