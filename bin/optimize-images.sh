#!/usr/bin/env bash
#
# Compress and resize the bundled photography, and generate the width
# variants gf_img_srcset() (inc/images.php) looks for.
#
# Why this script exists instead of just committing smaller files: the
# ~57MB photography library (assets/images/{articles,beaches,business-class,
# city-guides,dreaming,weekend-bags}/) is intentionally gitignored — see
# CLAUDE.md and .gitignore — and only ever exists on whichever machine is
# packaging the theme for deploy (LocalWP, per CLAUDE.md). It is not present
# in every checkout of this repo, so recompressing it has to be a script run
# where the files actually are, not a one-time change committed to git.
#
# What it does, per source JPEG/PNG under assets/images/ (skipping anything
# already under 200KB, and skipping small brand assets like the logo/favicons
# which live directly in assets/images/ rather than in a photography
# subfolder):
#   1. Re-encodes the original in place at a sane max width (2000px) and
#      JPEG quality (82) — this is the "compress the hero/full-size photo"
#      half of T6.
#   2. Generates <name>-480w.<ext>, <name>-768w.<ext> and <name>-1200w.<ext>
#      next to it, so the theme's `srcset` (inc/images.php) picks them up
#      automatically — no further code change needed once these exist.
#
# Requires ImageMagick (`magick` or `convert`). Idempotent: skips a file
# whose width variants already exist, so it's safe to re-run after adding a
# handful of new photos.
#
# Usage:
#   bin/optimize-images.sh                  # process everything under assets/images/
#   bin/optimize-images.sh assets/images/city-guides   # one directory
#   DRY_RUN=1 bin/optimize-images.sh        # report what would change, no writes

set -euo pipefail

THEME_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
TARGETS=("${@:-$THEME_ROOT/assets/images}")
WIDTHS=(480 768 1200)
MAX_WIDTH=2000
JPEG_QUALITY=82
MIN_BYTES_TO_TOUCH=$((200 * 1024)) # skip files already small (icons, etc.)
DRY_RUN="${DRY_RUN:-0}"

if command -v magick >/dev/null 2>&1; then
  IM="magick"
elif command -v convert >/dev/null 2>&1; then
  IM="convert"
else
  echo "error: ImageMagick not found. Install it (e.g. 'brew install imagemagick' or 'apt-get install imagemagick') and re-run." >&2
  exit 1
fi

total_before=0
total_after=0
processed=0

human() { numfmt --to=iec-i --suffix=B "$1" 2>/dev/null || echo "${1}B"; }

process_one() {
  local src="$1"
  local dir base ext name
  dir="$(dirname "$src")"
  base="$(basename "$src")"
  ext="${base##*.}"
  name="${base%.*}"

  local before
  before="$(stat -c%s "$src" 2>/dev/null || stat -f%z "$src")"
  if [ "$before" -lt "$MIN_BYTES_TO_TOUCH" ]; then
    return
  fi

  local last_variant="$dir/$name-${WIDTHS[-1]}w.$ext"
  if [ -f "$last_variant" ] && [ "$DRY_RUN" != "1" ]; then
    echo "skip (already optimized): ${src#$THEME_ROOT/}"
    return
  fi

  echo "processing: ${src#$THEME_ROOT/} ($(human "$before"))"
  processed=$((processed + 1))
  total_before=$((total_before + before))

  if [ "$DRY_RUN" = "1" ]; then
    return
  fi

  local tmp="$src.optim.tmp.$ext"
  "$IM" "$src" -auto-orient -resize "${MAX_WIDTH}x${MAX_WIDTH}>" -strip -quality "$JPEG_QUALITY" "$tmp"
  mv "$tmp" "$src"

  for w in "${WIDTHS[@]}"; do
    "$IM" "$src" -auto-orient -resize "${w}x${w}>" -strip -quality "$JPEG_QUALITY" "$dir/$name-${w}w.$ext"
  done

  local after
  after="$(stat -c%s "$src" 2>/dev/null || stat -f%z "$src")"
  total_after=$((total_after + after))
  echo "  -> $(human "$after"), + ${#WIDTHS[@]} width variants"
}

for target in "${TARGETS[@]}"; do
  if [ ! -e "$target" ]; then
    echo "warning: $target does not exist, skipping" >&2
    continue
  fi
  while IFS= read -r -d '' f; do
    process_one "$f"
  done < <(find "$target" -type f \( -iname '*.jpg' -o -iname '*.jpeg' -o -iname '*.png' \) ! -iname '*-[0-9]*w.*' -print0)
done

echo
echo "processed: $processed file(s)"
if [ "$DRY_RUN" != "1" ] && [ "$processed" -gt 0 ]; then
  echo "originals: $(human "$total_before") -> $(human "$total_after")"
fi
