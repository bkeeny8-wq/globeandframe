import { allCityGuides } from "../data/city-guides";

/**
 * Maps an itinerary's `destinations` string to a representative city-guide
 * photo, reusing the existing /images/city-guides/<slug>.jpg library
 * (57 slugs, one image each — see city-guides.ts). Returns undefined when no
 * confident match is found so the card can fall back to a branded placeholder.
 */

const slugByName = new Map<string, string>();
for (const guide of allCityGuides) {
  slugByName.set(guide.name.toLowerCase(), guide.slug);
}
const knownSlugs = new Set(allCityGuides.map((guide) => guide.slug));

const slugify = (value: string) =>
  value
    .toLowerCase()
    .normalize("NFD")
    .replace(/\p{M}/gu, "")
    .replace(/[^a-z0-9]+/g, "-")
    .replace(/^-|-$/g, "");

export function itineraryImage(destinations: string): string | undefined {
  // Multi-city itineraries ("Rome & Florence", "Lisbon, Porto") — use the first city.
  const firstCity = destinations.split(/[,&/+]|→|–|—|\band\b/i)[0].trim();
  if (!firstCity) return undefined;

  const lc = firstCity.toLowerCase();

  // 1) exact city-guide name
  let slug = slugByName.get(lc);

  // 2) slugified name matches a known guide slug
  if (!slug) {
    const candidate = slugify(firstCity);
    if (knownSlugs.has(candidate)) slug = candidate;
  }

  // 3) a guide name that shares a prefix (e.g. "Nice" vs "Nice · France")
  if (!slug) {
    for (const [name, guideSlug] of slugByName) {
      if (name.startsWith(lc) || lc.startsWith(name)) {
        slug = guideSlug;
        break;
      }
    }
  }

  return slug ? `/images/city-guides/${slug}.jpg` : undefined;
}
