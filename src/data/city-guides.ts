export type CityGuide = {
  name: string;
  slug: string;
  region: string;
  hook: string;
  content?: CityGuideContent;
};

export type CityGuideRegion = {
  name: string;
  guides: CityGuide[];
};

export type GuideListItem = {
  name: string;
  note: string;
};

export type CityGuideContent = {
  heroImage?: string;
  intro: string;
  bestTime?: string;
  highlights: GuideListItem[];
  whereToEat?: GuideListItem[];
  whereToStay?: GuideListItem[];
  whatToSkip?: string[];
  etsyItineraryUrl?: string;
  relatedSlugs?: string[];
};

/** Slugs with a live guide page at /city-guides/[slug]/ */
export const publishedCityGuideSlugs = new Set<string>(["london"]);

export const cityGuideRegions: CityGuideRegion[] = [
  {
    "name": "Europe",
    "guides": [
      {
        "name": "Amsterdam",
        "slug": "amsterdam",
        "region": "Netherlands \u00b7 Europe",
        "hook": "More than its reputation \u2014 great food, arts culture, and a canal-side Heineken to end the afternoon."
      },
      {
        "name": "Athens",
        "slug": "athens",
        "region": "Greece \u00b7 Europe",
        "hook": "The origin of Western Civilization with ancient ruins you can put your hands on \u2014 best paired with a Greek isle trip."
      },
      {
        "name": "Azores \u2014 S\u00e3o Miguel",
        "slug": "azores",
        "region": "Portugal \u00b7 Europe",
        "hook": "A hidden gem in the Atlantic \u2014 volcanic lakes, whale watching, and one of the least-crowded destinations in Europe."
      },
      {
        "name": "Barcelona",
        "slug": "barcelona",
        "region": "Spain \u00b7 Europe",
        "hook": "The best coastal city in Europe for nightlife, cuisine, and a beach that still works in late September."
      },
      {
        "name": "Bordeaux",
        "slug": "bordeaux",
        "region": "France \u00b7 Europe",
        "hook": "A wine adventure in southwest France that earns its place as one of the best food cities in the country."
      },
      {
        "name": "Dublin",
        "slug": "dublin",
        "region": "Ireland \u00b7 Europe",
        "hook": "Best with a group of friends, hopping pubs that predate the United States. Don\u2019t skip the Cliffs of Moher."
      },
      {
        "name": "Innsbruck",
        "slug": "innsbruck",
        "region": "Austria \u00b7 Europe",
        "hook": "A ski city nestled in the Alps with more to do than most \u2014 great addition to Munich, Zurich, or Vienna."
      },
      {
        "name": "Lisbon",
        "slug": "lisbon",
        "region": "Portugal \u00b7 Europe",
        "hook": "San Francisco with better food, lower crime, and a coastline worth crossing the world for."
      },
      {
        "name": "London",
        "slug": "london",
        "region": "United Kingdom \u00b7 Europe",
        "hook": "My favorite city in the world. Historic pubs, great transport, and the best Indian food outside India.",
        "content": {
          "intro": "London is the city I keep coming back to — layered, walkable, and endlessly re-visitable. This guide covers how I'd spend a first or fifth trip without wasting a day. /* TODO: owner voice */",
          "bestTime": "Best: late spring and September",
          "highlights": [
            {
              "name": "Historic pubs",
              "note": "/* TODO: verify specific picks */"
            },
            {
              "name": "Borough Market",
              "note": "Go hungry, go early."
            },
            {
              "name": "A West End show",
              "note": "/* TODO: booking tip */"
            }
          ],
          "whereToEat": [
            {
              "name": "Indian in the East End",
              "note": "/* TODO: verify */"
            }
          ],
          "whatToSkip": [
            "/* TODO: an honest 'skip this' the owner stands behind */"
          ],
          "etsyItineraryUrl": "https://globeandframeco.etsy.com",
          "relatedSlugs": ["paris"]
        }
      },
      {
        "name": "Madrid",
        "slug": "madrid",
        "region": "Spain \u00b7 Europe",
        "hook": "A good mid-trip stop for tapas and dry Spanish reds. Hemingway\u2019s favorite spots are still open."
      },
      {
        "name": "Mallorca",
        "slug": "mallorca",
        "region": "Spain \u00b7 Europe",
        "hook": "Caribbean-quality beaches with European cafe culture. More Americans should know this place exists."
      },
      {
        "name": "Milan",
        "slug": "milan",
        "region": "Italy \u00b7 Europe",
        "hook": "Come for the Last Supper, stay for the Aperol Spritz \u2014 and don\u2019t leave without a day at Lake Como."
      },
      {
        "name": "Munich",
        "slug": "munich",
        "region": "Germany \u00b7 Europe",
        "hook": "History, Oktoberfest, Neuschwanstein Castle, and the original Hofbr\u00e4uhaus \u2014 3\u20134 days worth, easily."
      },
      {
        "name": "Nice",
        "slug": "nice",
        "region": "France \u00b7 Europe",
        "hook": "Ros\u00e9, pebble beaches, and the most famous race track in the world \u2014 20 minutes apart by train."
      },
      {
        "name": "Paris",
        "slug": "paris",
        "region": "France \u00b7 Europe",
        "hook": "Everyone should go at least once. I go for the shopping \u2014 cheese, butter, wine, and mustard instead of clothing."
      },
      {
        "name": "Prague",
        "slug": "prague",
        "region": "Czech Republic \u00b7 Europe",
        "hook": "A vibrant summer getaway with one of the best old towns in Europe and beer that\u2019s genuinely excellent."
      },
      {
        "name": "Rome",
        "slug": "rome",
        "region": "Italy \u00b7 Europe",
        "hook": "Walk the Colosseum, eat carbonara, repeat. Book tickets for the Pantheon and Vatican in advance."
      },
      {
        "name": "Sardinia",
        "slug": "sardinia",
        "region": "Italy \u00b7 Europe",
        "hook": "Italy\u2019s hidden beach paradise with turquoise water that rivals the Caribbean."
      },
      {
        "name": "Split",
        "slug": "split",
        "region": "Croatia \u00b7 Europe",
        "hook": "A gem on the Adriatic \u2014 clear water, great food, and easy ferry access to the islands."
      },
      {
        "name": "Stockholm",
        "slug": "stockholm",
        "region": "Sweden \u00b7 Europe",
        "hook": "Good food, great music culture, and a Scandinavian design scene that makes the whole city feel considered."
      },
      {
        "name": "Tenerife",
        "slug": "tenerife",
        "region": "Spain \u00b7 Europe",
        "hook": "Nature, black sand beaches, and a sustainable travel destination with more personality than most Spanish islands."
      },
      {
        "name": "Val d\u2019Is\u00e8re",
        "slug": "val-disere",
        "region": "France \u00b7 Europe",
        "hook": "The apr\u00e8s capital of the world. Skiing above the tree line with Folie Douce at 3pm every day."
      },
      {
        "name": "Venice",
        "slug": "venice",
        "region": "Italy \u00b7 Europe",
        "hook": "The inventor of the aperitivo \u2014 go for the glass blowing on Murano and the unexpectedly great Lido beach."
      },
      {
        "name": "Vienna",
        "slug": "vienna",
        "region": "Austria \u00b7 Europe",
        "hook": "A symphony of elegance \u2014 imperial palaces, coffee houses, and a classical music scene unlike anywhere else."
      }
    ]
  },
  {
    "name": "United States",
    "guides": [
      {
        "name": "Charlotte",
        "slug": "charlotte",
        "region": "North Carolina \u00b7 USA",
        "hook": "A craft beer paradise in the American South with a food scene that punches above its size."
      },
      {
        "name": "Charleston",
        "slug": "charleston",
        "region": "South Carolina \u00b7 USA",
        "hook": "A Southern gem with one of the best food scenes in the country and streets that reward slow walking."
      },
      {
        "name": "Chicago",
        "slug": "chicago",
        "region": "Illinois \u00b7 USA",
        "hook": "Deep dish, Cubs games, and a lakefront that makes the Midwest feel like a proper destination."
      },
      {
        "name": "Denver",
        "slug": "denver",
        "region": "Colorado \u00b7 USA",
        "hook": "A gateway to the Rockies with a brewery scene and outdoor access that makes every weekend worth planning."
      },
      {
        "name": "Key West",
        "slug": "key-west",
        "region": "Florida \u00b7 USA",
        "hook": "A tropical paradise at the end of the road \u2014 sunsets on Mallory Square and a pace that forces you to slow down."
      },
      {
        "name": "Las Vegas",
        "slug": "las-vegas",
        "region": "Nevada \u00b7 USA",
        "hook": "Beyond the casinos \u2014 a culinary destination with some of the best restaurants in the country."
      },
      {
        "name": "Los Angeles",
        "slug": "los-angeles",
        "region": "California \u00b7 USA",
        "hook": "Sunshine, food trucks, and a sprawl that rewards having a plan \u2014 the beach neighborhoods are where the city actually lives."
      },
      {
        "name": "Nashville",
        "slug": "nashville",
        "region": "Tennessee \u00b7 USA",
        "hook": "Live music on every block, hot chicken worth the wait, and a city that knows how to have a good time without trying too hard."
      },
      {
        "name": "New Orleans",
        "slug": "new-orleans",
        "region": "Louisiana \u00b7 USA",
        "hook": "Culture, cuisine, and a nightlife scene that doesn\u2019t play by the rules of any other American city."
      },
      {
        "name": "New York City",
        "slug": "new-york",
        "region": "New York \u00b7 USA",
        "hook": "A city of neighborhoods that rewards knowing where to go \u2014 diversity, food, and energy unlike anywhere else."
      },
      {
        "name": "Philadelphia",
        "slug": "philadelphia",
        "region": "Pennsylvania \u00b7 USA",
        "hook": "History, food, and culture that New York overshadows but doesn\u2019t match \u2014 easy Amtrak from NYC."
      },
      {
        "name": "Raleigh",
        "slug": "raleigh",
        "region": "North Carolina \u00b7 USA",
        "hook": "A Southern gem for foodies and adventurers with a food scene that keeps getting better every year."
      },
      {
        "name": "San Diego",
        "slug": "san-diego",
        "region": "California \u00b7 USA",
        "hook": "Perfect weather and a pace that doesn\u2019t rush you \u2014 beach days, casual meals, and a rhythm that makes everything feel simple."
      },
      {
        "name": "San Francisco",
        "slug": "san-francisco",
        "region": "California \u00b7 USA",
        "hook": "A golden city with great views, great food, and a fog that keeps the energy interesting year-round."
      },
      {
        "name": "Savannah",
        "slug": "savannah",
        "region": "Georgia \u00b7 USA",
        "hook": "The perfect Southern getaway \u2014 live oaks, Spanish moss, and a walkable historic district that earns the reputation."
      },
      {
        "name": "Steamboat Springs",
        "slug": "steamboat-springs",
        "region": "Colorado \u00b7 USA",
        "hook": "The ski weekend you already know how to do \u2014 knowing the mountain and town makes all the difference."
      },
      {
        "name": "Washington DC",
        "slug": "washington-dc",
        "region": "District of Columbia \u00b7 USA",
        "hook": "A journey through history and culture with free world-class museums and a food scene that often surprises."
      }
    ]
  },
  {
    "name": "Africa",
    "guides": [
      {
        "name": "Cairo",
        "slug": "cairo",
        "region": "Egypt \u00b7 Africa",
        "hook": "You are going for the pyramids. Their sheer size leaves a lasting impression that photos don\u2019t prepare you for."
      },
      {
        "name": "Cape Town",
        "slug": "cape-town",
        "region": "South Africa \u00b7 Africa",
        "hook": "LA vibes on the waterfront, exceptional food, and the best gateway to an African safari you\u2019ll ever find."
      },
      {
        "name": "Casablanca",
        "slug": "casablanca",
        "region": "Morocco \u00b7 Africa",
        "hook": "A modern Moroccan city that surprises with its architecture, food, and the best entry point into the country."
      },
      {
        "name": "Hazyview / Kruger National Park",
        "slug": "kruger",
        "region": "South Africa \u00b7 Africa",
        "hook": "The safari that exceeded every expectation \u2014 elephants, lions on a water buffalo, and the white rhino in one day."
      },
      {
        "name": "Marrakech",
        "slug": "marrakech",
        "region": "Morocco \u00b7 Africa",
        "hook": "A sensory overload in the best way \u2014 souks, riads, and food worth the chaos of the medina."
      }
    ]
  },
  {
    "name": "Asia",
    "guides": [
      {
        "name": "Bangkok",
        "slug": "bangkok",
        "region": "Thailand \u00b7 Asia",
        "hook": "Street food, temples, and a chaotic energy that makes every day feel like an adventure you didn\u2019t plan for."
      },
      {
        "name": "Da Nang",
        "slug": "da-nang",
        "region": "Vietnam \u00b7 Asia",
        "hook": "A beach paradise with historic significance and a dollar that goes further than almost anywhere in Asia."
      },
      {
        "name": "Singapore",
        "slug": "singapore",
        "region": "Singapore \u00b7 Asia",
        "hook": "The cleanest, most efficient city in the world \u2014 a food paradise that rewards exploring beyond the tourist spots."
      },
      {
        "name": "Tokyo",
        "slug": "tokyo",
        "region": "Japan \u00b7 Asia",
        "hook": "Clean, efficient, and endlessly good to eat \u2014 a city that runs smoothly and always has something new worth finding."
      }
    ]
  },
  {
    "name": "Oceania",
    "guides": [
      {
        "name": "Cairns",
        "slug": "cairns",
        "region": "Australia \u00b7 Oceania",
        "hook": "The gateway to the Great Barrier Reef \u2014 snorkel it, then spend a day in the Daintree Rainforest."
      },
      {
        "name": "Gold Coast",
        "slug": "gold-coast",
        "region": "Australia \u00b7 Oceania",
        "hook": "Surf, sun, and a beach culture that gives you a feel for Australia without the crowds of Sydney."
      },
      {
        "name": "Sydney",
        "slug": "sydney",
        "region": "Australia \u00b7 Oceania",
        "hook": "The Opera House at sundown, Bondi Beach, and a whole continent worth going back for. Apply for the visa early."
      }
    ]
  },
  {
    "name": "Caribbean",
    "guides": [
      {
        "name": "Saint Martin",
        "slug": "saint-martin",
        "region": "Caribbean",
        "hook": "Two countries, one island \u2014 French cuisine on the north side, Dutch nightlife on the south."
      }
    ]
  },
  {
    "name": "Latin America",
    "guides": [
      {
        "name": "Mexico City",
        "slug": "mexico-city",
        "region": "Mexico \u00b7 North America",
        "hook": "A culinary and cultural journey that resets everything you thought you knew about Mexican food and city life."
      },
      {
        "name": "Rio de Janeiro",
        "slug": "rio",
        "region": "Brazil \u00b7 South America",
        "hook": "Christ the Redeemer, Copacabana, and a city that never feels like it\u2019s trying \u2014 it just is."
      },
      {
        "name": "S\u00e3o Paulo",
        "slug": "sao-paulo",
        "region": "Brazil \u00b7 South America",
        "hook": "Brazil\u2019s hidden gem for foodies \u2014 the best Japanese food outside Japan and a restaurant scene that surprises everyone."
      }
    ]
  }
];

export const allCityGuides: CityGuide[] = cityGuideRegions.flatMap((region) => region.guides);

export function getCityGuide(slug: string): CityGuide | undefined {
  return allCityGuides.find((guide) => guide.slug === slug);
}

export function relatedGuides(slug: string, max = 3): CityGuide[] {
  const guide = getCityGuide(slug);

  if (!guide) return [];

  const explicit = (guide.content?.relatedSlugs ?? [])
    .map(getCityGuide)
    .filter(
      (related): related is CityGuide =>
        Boolean(related) && related.slug !== slug && publishedCityGuideSlugs.has(related.slug),
    );
  const pool = explicit.length
    ? explicit
    : allCityGuides.filter(
        (candidate) =>
          candidate.region === guide.region &&
          candidate.slug !== slug &&
          publishedCityGuideSlugs.has(candidate.slug),
      );

  return pool.slice(0, max);
}
