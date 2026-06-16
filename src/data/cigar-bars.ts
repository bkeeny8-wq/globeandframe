export type CigarLocation = {
  city: string;
  venue: string;
  cigars: string;
  foodDrink: string;
  vibe: string;
  description: string;
};

export type CigarContinent = {
  name: string;
  count: string;
  locations: CigarLocation[];
  tbd?: boolean;
};

export const cigarContinents: CigarContinent[] = [
  {
    name: "Europe",
    count: "9 locations",
    locations: [
      {
        city: "London",
        venue: "Cigars at No. 10",
        cigars: "Available",
        foodDrink: "Drinks / Hotel service",
        vibe: "Upscale",
        description:
          "A refined London cigar setup with a polished feel. More of a proper experience than just a place to smoke.",
      },
      {
        city: "Athens",
        venue: "Alexander's Cigar Lounge",
        cigars: "Available",
        foodDrink: "Drinks",
        vibe: "Classic lounge",
        description:
          "A straightforward cigar lounge option in Athens. Comfortable, focused, and easy to build an evening around.",
      },
      {
        city: "Lisbon",
        venue: "Bairro Alto Hotel Rooftop",
        cigars: "Allowed",
        foodDrink: "Food & Drinks",
        vibe: "Upscale rooftop",
        description:
          "Less of a cigar lounge and more of a setting. The rooftop atmosphere makes this a strong option when you want a cigar with a view.",
      },
      {
        city: "Paris",
        venue: "Cubana Café",
        cigars: "Available",
        foodDrink: "Food & Drinks",
        vibe: "Casual",
        description:
          "A more relaxed Paris option where the experience feels less formal and easier to drop into.",
      },
      {
        city: "Monaco",
        venue: "Rampoldi",
        cigars: "Available",
        foodDrink: "Food & Drinks",
        vibe: "Upscale",
        description:
          "A polished Monaco setting where the cigar is part of a broader elevated evening.",
      },
      {
        city: "Rome",
        venue: "Aleph Hotel",
        cigars: "Available",
        foodDrink: "Hotel bar / Drinks",
        vibe: "Upscale hotel",
        description:
          "A hotel setting that works well when you want something comfortable, polished, and easy after a day in Rome.",
      },
      {
        city: "Munich",
        venue: "Hotel Kempinski",
        cigars: "Available",
        foodDrink: "Hotel service",
        vibe: "Upscale hotel",
        description:
          "A refined hotel option in Munich with the kind of setting that makes a cigar feel like part of the evening.",
      },
      {
        city: "Barcelona",
        venue: "Estanc Duaso",
        cigars: "Available",
        foodDrink: "Limited",
        vibe: "Cigar shop",
        description:
          "More cigar-focused than lounge-focused. A useful Barcelona stop if the priority is finding cigars first.",
      },
      {
        city: "Geneva",
        venue: "Wall Street Café",
        cigars: "Allowed",
        foodDrink: "Food & Drinks",
        vibe: "Casual polished",
        description:
          "A Geneva option that feels more approachable than overly formal, while still giving you a place to settle in.",
      },
    ],
  },
  {
    name: "South America",
    count: "1 location",
    locations: [
      {
        city: "Rio de Janeiro",
        venue: "Esch Café",
        cigars: "Available",
        foodDrink: "Food & Drinks",
        vibe: "Casual lounge",
        description:
          "An easygoing Rio option where cigars, food, and drinks all fit naturally into the experience.",
      },
    ],
  },
  {
    name: "North America",
    count: "6 locations",
    locations: [
      {
        city: "New York",
        venue: "Merchant Cigar Bar",
        cigars: "Available",
        foodDrink: "Food & Drinks",
        vibe: "Upscale",
        description:
          "One of the better cigar bar experiences in New York. Proper setup, strong atmosphere, and easy to turn into a full night.",
      },
      {
        city: "Charleston",
        venue: "Charlestowne Tobacco & Wine",
        cigars: "Available",
        foodDrink: "Wine / Drinks",
        vibe: "Relaxed",
        description: "A slower, more relaxed cigar stop that fits the pace of Charleston well.",
      },
      {
        city: "San Diego",
        venue: "Cuban Cigar Factory",
        cigars: "Available",
        foodDrink: "Drinks",
        vibe: "Casual",
        description:
          "A cigar-first stop in San Diego. Better for the smoke itself than a long, polished dinner-and-drinks setup.",
      },
      {
        city: "Nashville",
        venue: "Casa de Montecristo",
        cigars: "Available",
        foodDrink: "Drinks",
        vibe: "Lounge",
        description: "A reliable cigar lounge setup in Nashville with a more dedicated cigar-bar feel.",
      },
      {
        city: "Key West",
        venue: "Greene Street Cigar",
        cigars: "Available",
        foodDrink: "Drinks",
        vibe: "Casual island",
        description:
          "A casual Key West cigar stop that fits the island pace. Easy, unfussy, and better as part of a wandering evening.",
      },
      {
        city: "Las Vegas",
        venue: "Montecristo Cigar Bar",
        cigars: "Available",
        foodDrink: "Food & Drinks",
        vibe: "Upscale lounge",
        description:
          "A polished Vegas cigar bar with the kind of full-service setup that makes it easy to stay longer than planned.",
      },
    ],
  },
  {
    name: "Asia",
    count: "1 location",
    locations: [
      {
        city: "Singapore",
        venue: "Capitol Cigar & Whisky Lounge",
        cigars: "Available",
        foodDrink: "Drinks",
        vibe: "Upscale lounge",
        description:
          "A refined Singapore cigar lounge that leans into a proper, slower experience. Strong humidor, serious whisky list, and a setting that feels intentional rather than touristy.",
      },
    ],
  },
  {
    name: "Africa",
    count: "Coming soon",
    tbd: true,
    locations: [],
  },
];
