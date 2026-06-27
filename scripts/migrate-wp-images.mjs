#!/usr/bin/env node
/**
 * migrate-wp-images.mjs
 * ---------------------------------------------------------------------------
 * Fixes Critical issue 2.1 — articles.json still points at the old WordPress
 * install (globeandframe.com/wp-content/...). After DNS flips to GitHub Pages,
 * those become 404s.
 *
 * This script, run ONCE from the project root WHILE the old WordPress site is
 * still online, will:
 *   1. Parse src/data/articles.json
 *   2. Find every wp-content image URL (in src, srcset, href, data-* attrs)
 *   3. Collapse WordPress size-variants (-600x800, ?crop=1, etc.) to the
 *      original upload, download each ONE original to public/images/articles/
 *   4. Rewrite every reference in the JSON to a local path (/images/articles/x.jpg)
 *   5. Strip WordPress cruft (srcset, sizes, data-attachment-id, data-orig-*,
 *      data-permalink, data-image-meta, etc.). loading/decoding/alt are kept.
 *
 * Usage:
 *   node scripts/migrate-wp-images.mjs --dry-run   # no downloads; writes a
 *                                                  # preview JSON to inspect
 *   node scripts/migrate-wp-images.mjs             # downloads + rewrites in place
 *
 * Requires Node 18+ (global fetch). A timestamped backup of articles.json is
 * written before anything is overwritten.
 * ---------------------------------------------------------------------------
 */
import { readFile, writeFile, mkdir, copyFile } from "node:fs/promises";
import { existsSync } from "node:fs";
import path from "node:path";

const DRY_RUN = process.argv.includes("--dry-run");
const ROOT = process.cwd();
const ARTICLES = path.join(ROOT, "src/data/articles.json");
const OUT_DIR = path.join(ROOT, "public/images/articles");
const LOCAL_PREFIX = "/images/articles";
const WP_HOST = "globeandframe.com";

// Match any wp-content/uploads URL (with or without protocol/query).
const WP_URL_RE = new RegExp(
  `https?://${WP_HOST.replace(/\./g, "\\.")}/wp-content/uploads/[^\\s"'\\\\)]+`,
  "g"
);

// Collapse a variant URL to its original upload + return a clean basename.
function canonical(url) {
  const noQuery = url.split("?")[0];
  const file = noQuery.substring(noQuery.lastIndexOf("/") + 1);
  // strip a trailing -<w>x<h> right before the extension (the WP resize suffix)
  const original = file.replace(/-\d+x\d+(\.[a-zA-Z0-9]+)$/, "$1");
  return { originalUrl: noQuery.replace(file, original), basename: original };
}

async function download(url, dest) {
  const res = await fetch(url);
  if (!res.ok) throw new Error(`${res.status} ${res.statusText}`);
  const buf = Buffer.from(await res.arrayBuffer());
  await writeFile(dest, buf);
  return buf.length;
}

function stripCruft(html) {
  // Remove WordPress-injected attributes that are useless on a static site.
  return html
    .replace(/\s+srcset="[^"]*"/g, "")
    .replace(/\s+sizes="[^"]*"/g, "")
    .replace(/\s+data-(attachment-id|permalink|orig-file|orig-size|comments-opened|image-meta|image-title|image-description|image-caption|large-file|medium-file|lazy-src|lazy-srcset)="[^"]*"/g, "");
}

const raw = await readFile(ARTICLES, "utf8");
const articles = JSON.parse(raw);

// 1) Inventory every URL + build the variant -> original map.
const originals = new Map(); // basename -> { originalUrl, variants:Set }
let totalRefs = 0;
for (const a of articles) {
  const html = a.html || "";
  const matches = html.match(WP_URL_RE) || [];
  totalRefs += matches.length;
  for (const m of matches) {
    const { originalUrl, basename } = canonical(m);
    if (!originals.has(basename)) originals.set(basename, { originalUrl, variants: new Set() });
    originals.get(basename).variants.add(m.split("?")[0]);
  }
}

console.log(`Articles:            ${articles.length}`);
console.log(`Total image refs:    ${totalRefs}`);
console.log(`Unique source files: ${originals.size}`);
console.log(`Output directory:    ${path.relative(ROOT, OUT_DIR)}/`);
console.log(`Mode:                ${DRY_RUN ? "DRY RUN (no downloads)" : "LIVE (download + overwrite)"}\n`);

// 2) Download originals (skipped in dry-run).
if (!DRY_RUN) {
  await mkdir(OUT_DIR, { recursive: true });
  let ok = 0, failed = [];
  for (const [basename, info] of originals) {
    const dest = path.join(OUT_DIR, basename);
    if (existsSync(dest)) { ok++; continue; }
    try {
      // Try the original upload first; if it 404s, fall back to the largest variant seen.
      const candidates = [info.originalUrl, ...[...info.variants].sort((a, b) => b.length - a.length)];
      let done = false;
      for (const url of candidates) {
        try { const bytes = await download(url, dest); console.log(`  ✓ ${basename} (${(bytes / 1024).toFixed(0)} KB)`); ok++; done = true; break; }
        catch { /* try next candidate */ }
      }
      if (!done) failed.push(basename);
    } catch (e) { failed.push(basename); }
  }
  console.log(`\nDownloaded ${ok}/${originals.size}.`);
  if (failed.length) console.log(`FAILED (download these manually): \n  ${failed.join("\n  ")}`);
}

// 3) Rewrite every reference -> local path, then strip cruft.
for (const a of articles) {
  if (!a.html) continue;
  a.html = a.html.replace(WP_URL_RE, (m) => `${LOCAL_PREFIX}/${canonical(m).basename}`);
  a.html = stripCruft(a.html);
}

// 4) Write output (+ backup the original first in live mode).
const outPath = DRY_RUN ? ARTICLES.replace(/\.json$/, ".rewritten.preview.json") : ARTICLES;
if (!DRY_RUN) {
  const backup = ARTICLES.replace(/\.json$/, `.backup-${Date.now()}.json`);
  await copyFile(ARTICLES, backup);
  console.log(`\nBackup written: ${path.relative(ROOT, backup)}`);
}
await writeFile(outPath, JSON.stringify(articles, null, 2));
console.log(`Rewritten JSON: ${path.relative(ROOT, outPath)}`);

// Sanity check: confirm no wp-content URLs remain in the output.
const remaining = (JSON.stringify(articles).match(WP_URL_RE) || []).length;
console.log(`Remaining wp-content references: ${remaining} ${remaining === 0 ? "✓" : "← still present, investigate"}`);
if (DRY_RUN) console.log(`\nDry run complete. Review the preview file, then run without --dry-run.`);
