export const SITE_URL = "https://globeandframe.com";
export const SITE_NAME = "Globe & Frame";
export const DEFAULT_DESCRIPTION =
  "Plan better trips with guides built from real experience — city guides, itineraries, and travel advice from first-hand trips.";
export const DEFAULT_OG_IMAGE = "/images/bradon-about.jpg";

export function absoluteUrl(path: string): string {
  return new URL(path, SITE_URL).href;
}

export function organizationSchema() {
  return {
    "@type": "Organization",
    "@id": `${SITE_URL}/#organization`,
    name: SITE_NAME,
    url: SITE_URL,
    logo: absoluteUrl("/images/logo.svg"),
    description: DEFAULT_DESCRIPTION,
    sameAs: ["https://globeandframeco.etsy.com"],
  };
}

export function webPageSchema({
  title,
  description,
  url,
}: {
  title: string;
  description: string;
  url: string;
}) {
  return {
    "@type": "WebPage",
    "@id": `${url}#webpage`,
    url,
    name: title,
    description,
    isPartOf: { "@id": `${SITE_URL}/#website` },
    publisher: { "@id": `${SITE_URL}/#organization` },
  };
}

export function websiteSchema() {
  return {
    "@type": "WebSite",
    "@id": `${SITE_URL}/#website`,
    url: SITE_URL,
    name: SITE_NAME,
    description: DEFAULT_DESCRIPTION,
    publisher: { "@id": `${SITE_URL}/#organization` },
  };
}

export function articleSchema({
  title,
  description,
  url,
}: {
  title: string;
  description: string;
  url: string;
}) {
  return {
    "@type": "Article",
    headline: title,
    description,
    url,
    mainEntityOfPage: { "@id": `${url}#webpage` },
    author: { "@type": "Person", name: "Brandon Keeney" },
    publisher: { "@id": `${SITE_URL}/#organization` },
  };
}

export function itemListSchema({
  name,
  description,
  url,
  items,
}: {
  name: string;
  description: string;
  url: string;
  items: { name: string; url?: string }[];
}) {
  return {
    "@type": "ItemList",
    name,
    description,
    url,
    itemListElement: items.map((item, index) => ({
      "@type": "ListItem",
      position: index + 1,
      name: item.name,
      ...(item.url ? { url: item.url } : {}),
    })),
  };
}

export function collectionPageSchema({
  title,
  description,
  url,
  items,
}: {
  title: string;
  description: string;
  url: string;
  items: { name: string; description?: string }[];
}) {
  return {
    "@type": "CollectionPage",
    name: title,
    description,
    url,
    mainEntity: {
      "@type": "ItemList",
      itemListElement: items.map((item, index) => ({
        "@type": "ListItem",
        position: index + 1,
        item: {
          "@type": "ImageGallery",
          name: item.name,
          ...(item.description ? { description: item.description } : {}),
        },
      })),
    },
  };
}

export function buildJsonLd(...nodes: Record<string, unknown>[]) {
  return {
    "@context": "https://schema.org",
    "@graph": [websiteSchema(), organizationSchema(), ...nodes],
  };
}
