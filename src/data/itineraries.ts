export type Itinerary = {
  destinations: string;
  bestTime: string;
  why: string;
  available: boolean;
  etsyUrl: string;
};

export type ItineraryRegion = {
  name: string;
  countLabel: string;
  itineraries: Itinerary[];
};

export const ETSY_SHOP_URL = "https://globeandframeco.etsy.com";

export const threeDayItineraries: ItineraryRegion[] = [
  {
    name: "Europe",
    countLabel: "12 guides",
    itineraries: [
      {
        destinations: "Paris",
        bestTime: "Best: Apr, Sep",
        why: "A structured city guide built around neighborhoods, major sights, meals, and pacing. Covers the Louvre, Versailles, and the best baguette bakeries.",
        available: true,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "London",
        bestTime: "Best: Sep",
        why: "Historic pubs, Borough Market, and the best day trip structure for the British countryside.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Rome",
        bestTime: "Best: Apr\u2013May",
        why: "The Colosseum, Vatican, Pantheon, and Trevi Fountain \u2014 plus the best carbonara and cacio e pepe in the city.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Amsterdam",
        bestTime: "Best: Apr, Sep",
        why: "Rijksmuseum, Van Gogh, canal walks, and the Heineken Experience \u2014 structured to avoid crowds.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Barcelona",
        bestTime: "Best: May\u2013Jun, Sep",
        why: "Sagrada Fam\u00edlia, the Gothic Quarter, La Rambla, and a beach day. Paced for the city\u2019s natural rhythm.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Lisbon",
        bestTime: "Best: May, Oct",
        why: "Bel\u00e9m Tower, Castelo S\u00e3o Jorge, and the coastal beaches nearby. Europe\u2019s most underrated city guide.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Madrid",
        bestTime: "Best: Apr\u2013Jun",
        why: "The Prado, Royal Palace, tapas, and Hemingway\u2019s favorite bars. Art and food, in that order.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Dublin",
        bestTime: "Best: Sep\u2013Oct",
        why: "Guinness tour, Jameson, the Cliffs of Moher day trip, and the pubs that make it all worth it.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Munich",
        bestTime: "Best: Sep, Dec",
        why: "Oktoberfest or Christmas Markets, Dachau, Neuschwanstein, and the Hofbr\u00e4uhaus.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Prague",
        bestTime: "Best: May\u2013Jun, Sep",
        why: "Prague Castle, Charles Bridge at dawn, and the best beer city in Europe.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Vienna",
        bestTime: "Best: Apr\u2013Jun",
        why: "Imperial palaces, Naschmarkt, the Musikverein, and wiener schnitzel done properly.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Venice",
        bestTime: "Best: Apr\u2013May, Sep",
        why: "St. Mark\u2019s Square, Murano glass blowing, the Lido beach, and cicchetti bars in Cannaregio.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "United States",
    countLabel: "14 guides",
    itineraries: [
      {
        destinations: "New York City",
        bestTime: "Best: Apr\u2013Jun, Sep",
        why: "The High Line, Chelsea Market, Staten Island Ferry, and the best pizza and bagels in the world.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Chicago",
        bestTime: "Best: Jun, Sep",
        why: "Deep dish, the Bean, Wrigley Field, the architecture boat tour, and the Riverwalk.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "New Orleans",
        bestTime: "Best: Mar, Oct\u2013Nov",
        why: "Bourbon Street, the WWII Museum, beignets at Caf\u00e9 Du Monde, and the best gumbo in the city.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Charleston",
        bestTime: "Best: Mar\u2013Apr",
        why: "Rainbow Row, Fort Sumter, Low Country seafood, and the best Southern food scene in the US.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Savannah",
        bestTime: "Best: Apr, Oct",
        why: "Spanish moss, Forsyth Park, great seafood on the water, and an evening on the squares.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Washington DC",
        bestTime: "Best: Apr, Sep",
        why: "The National Mall, the Smithsonian, and the monuments \u2014 all free, all worth it.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "San Diego",
        bestTime: "Best: May\u2013Oct",
        why: "Balboa Park, La Jolla Cove, Torrey Pines, and the best Mexican food in the United States.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Los Angeles",
        bestTime: "Best: Year-round",
        why: "Hollywood Sign, Santa Monica, Rodeo Drive, and In-N-Out near LAX.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "San Francisco",
        bestTime: "Best: May\u2013Sep",
        why: "Golden Gate Bridge, Alcatraz, the Ferry Building, and Napa Valley as a day trip.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Denver",
        bestTime: "Best: Oct, Feb\u2013Mar",
        why: "Red Rocks, Union Station, the original Chipotle, and a base for Steamboat ski trips.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Steamboat Springs",
        bestTime: "Best: Jan\u2013Mar",
        why: "160+ slopes, Mountain Tap Brewery, and Strawberry Park Hot Springs after a long ski day.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Las Vegas",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Oct",
        why: "The Strip, Bacchanal Buffet, and a day trip to Valley of Fire or Red Rock Canyon.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Philadelphia",
        bestTime: "Best: Apr\u2013Jun, Sep",
        why: "Independence Hall, the Liberty Bell, Reading Terminal Market, and a cheesesteak crawl.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Key West",
        bestTime: "Best: Nov\u2013Apr",
        why: "Mallory Square sunset, Hemingway House, Half Shell Raw Bar, and the Dry Tortugas day trip.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Rest of World",
    countLabel: "8 guides",
    itineraries: [
      {
        destinations: "Cape Town",
        bestTime: "Best: Oct\u2013Nov",
        why: "Table Mountain, Robben Island, The Pot Luck Club, and the Winelands as a day trip.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Tokyo",
        bestTime: "Best: Mar\u2013Apr, Oct\u2013Nov",
        why: "Senso-ji, Shibuya Crossing, Tsukiji market breakfast, and A5 wagyu for dinner.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Sydney",
        bestTime: "Best: Nov\u2013Mar",
        why: "Opera House at sundown, Bondi Beach, Taronga Zoo, and the Blue Mountains.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Mexico City",
        bestTime: "Best: Jan\u2013Apr",
        why: "Teotihuac\u00e1n Pyramids, the Metropolitan Cathedral, tacos at five different spots, and mezcal.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Dublin",
        bestTime: "Best: Sep\u2013Oct",
        why: "Guinness, Jameson, the Cliffs of Moher, and every pub that opened before 1776.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "R\u00edo de Janeiro",
        bestTime: "Best: Apr\u2013Jun",
        why: "Christ the Redeemer, Copacabana, Caipirinha on the beach, and Santa Teresa.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "S\u00e3o Paulo",
        bestTime: "Best: Apr\u2013Jun",
        why: "Best burgers in South America, Vila Madalena street art, and the Japanese food scene.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Da Nang",
        bestTime: "Best: Feb\u2013May",
        why: "My Khe Beach, Dragon Bridge, Ba Na Hills, and a day trip to Hoi An.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
];

export const sevenDayItineraries: ItineraryRegion[] = [
  {
    name: "Western Europe",
    countLabel: "4 itineraries",
    itineraries: [
      {
        destinations: "London + Amsterdam",
        bestTime: "Best: Sep\u2013Oct",
        why: "Eurostar in 2.5 hrs. Pub culture and history into canal walks and world-class museums. No flying between.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "London + Paris",
        bestTime: "Best: Apr, Sep",
        why: "Eurostar direct. The classic. London pubs then Paris food and shopping. Opposite energies that complement perfectly.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Paris + Amsterdam",
        bestTime: "Best: Apr\u2013May, Sep",
        why: "Train or short flight. Canal cities with world-class museums. Pair the Louvre with the Rijksmuseum.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Paris + Bordeaux",
        bestTime: "Best: May\u2013Oct",
        why: "TGV, 2 hrs. Paris culture then Bordeaux wine country. Best food-and-drink focused pairing on the list.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Spain & Portugal",
    countLabel: "3 itineraries",
    itineraries: [
      {
        destinations: "Barcelona + Madrid",
        bestTime: "Best: Apr\u2013Jun, Sep",
        why: "High-speed AVE train, 2.5 hrs. Coast to capital \u2014 beach and nightlife into art and tapas.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Barcelona + Mallorca",
        bestTime: "Best: May\u2013Jun, Sep",
        why: "45-min flight. Barcelona city energy then Mallorca beach relaxation. Best Spanish island combo.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Lisbon + Madrid",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Oct",
        why: "Short flight or overnight train. Two underrated European capitals with exceptional food scenes.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Italy",
    countLabel: "3 itineraries",
    itineraries: [
      {
        destinations: "Rome + Milan",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Oct",
        why: "Frecciarossa, 3 hrs. Ancient Rome then fashion capital and Lake Como. Italy\u2019s two most distinct cities.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Rome + Venice",
        bestTime: "Best: Apr\u2013May, Sep\u2013Oct",
        why: "High-speed train, 3.5 hrs. History and carbonara in Rome, canals and aperitivo in Venice.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Milan + Venice",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Oct",
        why: "Train, 2.5 hrs. Lake Como day trip from Milan. Glass blowing on Murano from Venice.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "France",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Paris + Nice / Monaco",
        bestTime: "Best: May\u2013Sep",
        why: "TGV direct, 5.5 hrs or short flight. City culture then the French Riviera. Ros\u00e9 upgrade.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Paris + Val d\u2019Is\u00e8re",
        bestTime: "Best: Feb\u2013Mar",
        why: "Paris culture days then French Alps skiing. Geneva flight + transfer. The apr\u00e8s capital of the world.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Central Europe",
    countLabel: "5 itineraries",
    itineraries: [
      {
        destinations: "Munich + Vienna",
        bestTime: "Best: Sep, Dec",
        why: "Train, 4 hrs. Beer halls and history into art and classical music. Oktoberfest or Christmas Markets.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Munich + Prague",
        bestTime: "Best: Sep, Dec",
        why: "Train or 4-hr drive. Beer culture connects them. Both have great Christmas markets.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Munich + Innsbruck",
        bestTime: "Best: Dec\u2013Mar, Jun\u2013Sep",
        why: "Train, 1.5 hrs. City base then ski and Alps \u2014 or hiking in summer.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Vienna + Prague",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Oct, Dec",
        why: "Train, 4 hrs. Two of the best-preserved old towns in Europe. Classical music, architecture, great beer.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Prague + Budapest",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Oct",
        why: "Train, 3 hrs. Two Central European gems back to back. River cities with completely different personalities.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Greek & Adriatic",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Athens + Split",
        bestTime: "Best: May\u2013Jun, Sep",
        why: "Short flight. Ancient Greece then the Adriatic coast. History into beach relaxation.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Athens + Rome",
        bestTime: "Best: Apr\u2013May, Sep\u2013Oct",
        why: "Short flight. The two great ancient cities back to back. Best history pairing on the list.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Africa",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Cape Town + Kruger / Hazyview",
        bestTime: "Best: Sep\u2013Oct",
        why: "Internal flight. Cape Town city and coast, then safari. The complete South Africa experience.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Marrakech + Casablanca",
        bestTime: "Best: Oct\u2013Apr",
        why: "Train, 3 hrs. Souks and medina into a modern Moroccan city. Full Moroccan contrast.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Asia",
    countLabel: "3 itineraries",
    itineraries: [
      {
        destinations: "Tokyo + Singapore",
        bestTime: "Best: Mar\u2013Apr, Oct\u2013Nov",
        why: "6-hr flight. Two of the best food cities in the world. Efficient, clean, endlessly interesting.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Singapore + Bangkok",
        bestTime: "Best: Nov\u2013Mar",
        why: "2-hr flight. Modern food paradise into chaotic street food energy. Night markets and temples.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Singapore + Da Nang",
        bestTime: "Best: Feb\u2013May",
        why: "2.5-hr flight. Singapore food focus then beach and history in Vietnam. Great value pairing.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Australia",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Sydney + Cairns",
        bestTime: "Best: Nov\u2013Mar",
        why: "3-hr flight. Iconic Sydney city base then the Great Barrier Reef. Two essential Australian experiences.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Sydney + Gold Coast",
        bestTime: "Best: Nov\u2013Mar",
        why: "1.5-hr flight or drive. Opera House and Bondi then surf culture on the Gold Coast.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "USA \u2014 East Coast",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Washington DC + Philadelphia",
        bestTime: "Best: Mar\u2013May, Sep\u2013Nov",
        why: "Amtrak, 1 hr. History and free museums in DC, then Philly food and culture. Seamless rail trip.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Charleston + Savannah",
        bestTime: "Best: Mar\u2013May, Sep\u2013Nov",
        why: "2-hr drive. Two of the best Southern cities \u2014 food, history, beautiful streets.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "USA \u2014 South",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Nashville + New Orleans",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Nov",
        why: "Short flight. Live music and hot chicken, then jazz and gumbo. Two cities defined by their sound and food.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "New Orleans + Charleston",
        bestTime: "Best: Mar\u2013May, Oct\u2013Nov",
        why: "Short flight. Jazz and gumbo into Low Country shrimp and grits.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "USA \u2014 West",
    countLabel: "3 itineraries",
    itineraries: [
      {
        destinations: "Los Angeles + San Diego",
        bestTime: "Best: May\u2013Oct",
        why: "2-hr drive. LA food and culture, San Diego beach and relaxed pace. Natural California pair.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "San Francisco + Los Angeles",
        bestTime: "Best: May\u2013Oct",
        why: "1-hr flight or Pacific Coast Highway drive. Two California cities with completely different energy.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Denver + Steamboat Springs",
        bestTime: "Best: Dec\u2013Mar, Jun\u2013Sep",
        why: "3-hr drive. Denver craft beer and city base, then Steamboat ski and mountain town.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Latin America",
    countLabel: "1 itinerary",
    itineraries: [
      {
        destinations: "Rio de Janeiro + S\u00e3o Paulo",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Nov",
        why: "1-hr flight. Beach and Carnival energy then the food capital of South America.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
];

export const tenDayItineraries: ItineraryRegion[] = [
  {
    name: "Western Europe",
    countLabel: "3 itineraries",
    itineraries: [
      {
        destinations: "London + Paris + Amsterdam",
        bestTime: "Best: Sep\u2013Oct",
        why: "The classic Western Europe circuit. Eurostar between all three. 3 days each with one travel day built in.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Paris + Amsterdam + Bordeaux",
        bestTime: "Best: May, Sep",
        why: "Culture-heavy in Paris and Amsterdam, then unwind in Bordeaux wine country. All rail-connected.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "London + Amsterdam + Stockholm",
        bestTime: "Best: May\u2013Sep",
        why: "Northern European circuit. Short flights between each. Design, history, pubs. Scandinavian finish.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Spain & Portugal",
    countLabel: "3 itineraries",
    itineraries: [
      {
        destinations: "Barcelona + Madrid + Mallorca",
        bestTime: "Best: May\u2013Jun, Sep",
        why: "The full Spain circuit. City, capital, island. Barcelona \u2192 AVE to Madrid \u2192 fly Mallorca.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Lisbon + Barcelona + Mallorca",
        bestTime: "Best: May\u2013Jun, Sep",
        why: "Atlantic coast to Mediterranean. Coastal cities throughout, finishing on the best beach island in Spain.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Lisbon + Madrid + Barcelona",
        bestTime: "Best: Apr\u2013Jun, Sep",
        why: "West to east across Iberia. Lisbon hills \u2192 Madrid art \u2192 Barcelona coast. Three distinct feels.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Italy",
    countLabel: "3 itineraries",
    itineraries: [
      {
        destinations: "Rome + Milan + Venice",
        bestTime: "Best: Apr\u2013May, Sep\u2013Oct",
        why: "The Italian Grand Tour. All rail-connected. Ancient history \u2192 fashion capital \u2192 canal city.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Rome + Milan + Sardinia",
        bestTime: "Best: Jun, Sep",
        why: "City pair into island escape. Rome history \u2192 Milan food \u2192 Sardinia beach.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Rome + Nice / Monaco + Barcelona",
        bestTime: "Best: May\u2013Jun, Sep",
        why: "Mediterranean arc. Rome \u2192 Nice by train along the Riviera \u2192 Barcelona. Coastal throughout.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "France",
    countLabel: "1 itinerary",
    itineraries: [
      {
        destinations: "Paris + Nice / Monaco + Bordeaux",
        bestTime: "Best: May\u2013Jun, Sep",
        why: "The full French circuit. Capital \u2192 Riviera \u2192 wine country. Rail throughout. Best food and drink trip available.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Central Europe",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Munich + Vienna + Prague",
        bestTime: "Best: Sep, Dec",
        why: "The Central European circuit. Oktoberfest launch, then south to Vienna, then east to Prague.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Munich + Innsbruck + Vienna",
        bestTime: "Best: Dec\u2013Mar",
        why: "Bavaria \u2192 Alps \u2192 imperial Vienna. Train the whole way. Great ski/alpine with city culture.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Australia",
    countLabel: "1 itinerary",
    itineraries: [
      {
        destinations: "Sydney + Cairns + Gold Coast",
        bestTime: "Best: Nov\u2013Mar",
        why: "The full east coast Australia route. City \u2192 reef \u2192 surf. Worth every hour of the flight to get there.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "USA \u2014 East Coast",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Charleston + Savannah + Raleigh",
        bestTime: "Best: Mar\u2013May, Sep\u2013Nov",
        why: "The Southern Foodie Circuit. Three cities within driving distance with exceptional food scenes.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Washington DC + Philadelphia + New York",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Oct",
        why: "The Northeast Corridor. All Amtrak-connected. History \u2192 cheesesteaks \u2192 NYC everything.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "USA \u2014 West",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Las Vegas + Los Angeles + San Diego",
        bestTime: "Best: Apr\u2013Jun, Sep\u2013Oct",
        why: "West Coast and desert circuit. Vegas entertainment \u2192 LA sprawl \u2192 San Diego beach. Driveable.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "San Francisco + Los Angeles + San Diego",
        bestTime: "Best: May\u2013Sep",
        why: "California top to bottom. All driveable. Food cities with beaches as the reward at the end.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
  {
    name: "Asia",
    countLabel: "2 itineraries",
    itineraries: [
      {
        destinations: "Tokyo + Singapore + Bangkok",
        bestTime: "Best: Oct\u2013Nov, Mar\u2013Apr",
        why: "The Asia food circuit. Tokyo precision \u2192 Singapore fusion \u2192 Bangkok street food.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
      {
        destinations: "Singapore + Bangkok + Da Nang",
        bestTime: "Best: Nov\u2013Mar",
        why: "Southeast Asia sweep. Singapore hub \u2192 Bangkok intensity \u2192 Da Nang beach. Best value 10-day trip.",
        available: false,
        etsyUrl: "https://globeandframeco.etsy.com",
      },
    ],
  },
];
