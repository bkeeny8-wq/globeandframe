export type F1Location = {
  city: string;
  venue: string;
  description: string;
};

export type F1Continent = {
  name: string;
  count: string;
  locations: F1Location[];
  tbd?: boolean;
};

export const f1Continents: F1Continent[] = [
  {
    name: "Europe",
    count: "4 locations",
    locations: [
      {
        city: "London",
        venue: "The Court",
        description:
          "Packed, loud, and exactly what you want when the race is on. This is the kind of spot where F1 feels like an event, not background noise.",
      },
      {
        city: "Paris",
        venue: "The Long Hop",
        description:
          "Reliable and easy. A good place when you want the race on without spending half the afternoon hunting for a screen.",
      },
      {
        city: "Rome",
        venue: "Finnegan Irish Pub",
        description:
          "A practical race-day pub in a city where finding the exact sport you want can sometimes take effort.",
      },
      {
        city: "Split",
        venue: "Harat's Irish Pub",
        description:
          "More functional than fancy, but useful when you want a straightforward place to catch a race while traveling.",
      },
    ],
  },
  {
    name: "North America",
    count: "3 locations",
    locations: [
      {
        city: "New York",
        venue: "Féile — Midtown South",
        description:
          "One of the better NYC setups. Early races feel intentional here, with screens, fans, and enough energy to make the alarm worth it.",
      },
      {
        city: "New York",
        venue: "Bailey's — Upper East Side",
        description:
          "A neighborhood option for when you want the race without turning it into a full production.",
      },
      {
        city: "San Diego",
        venue: "Shakespeare's Pub",
        description:
          "A natural fit for international sports. Easy, casual, and reliable enough when you are watching from the West Coast.",
      },
    ],
  },
  {
    name: "Africa",
    count: "1 location",
    locations: [
      {
        city: "Cape Town",
        venue: "The Fireman's Arms",
        description:
          "A proper sports pub setup in a great travel city. Familiar, easy, and exactly the type of place you hope to find when a race is on.",
      },
    ],
  },
  {
    name: "South America",
    count: "Coming soon",
    tbd: true,
    locations: [],
  },
  {
    name: "Asia",
    count: "Coming soon",
    tbd: true,
    locations: [],
  },
];
