export type AirlineCategory = {
  label: string;
  text: string;
};

export type AirlineRanking = {
  rank: number;
  name: string;
  score: string;
  badge: string;
  badgeClass: "excellent" | "verygood" | "good" | "fair";
  route: string;
  aircraft: string;
  flown: string;
  bestFor: string;
  categories: AirlineCategory[];
  verdict: string;
};

export type AirlineComingSoon = {
  name: string;
  route: string;
  aircraft: string;
  scheduled: string;
};

export const airlineRankings: AirlineRanking[] = [
  {
    rank: 1,
    name: "Singapore Airlines",
    score: "9.2",
    badge: "Top Pick",
    badgeClass: "excellent",
    route: "Singapore → New York JFK",
    aircraft: "Airbus A350-900 ULR",
    flown: "November 2025",
    bestFor: "Getting to Asia in style",
    categories: [
      {
        label: "Lounge",
        text: "At SIN, the flagship lounge has strong food and drink options with plenty of space. Clean, comfortable, and easy to settle into.",
      },
      {
        label: "Seat",
        text: "A good seat, not great. The additional bedding is the real highlight and makes a noticeable difference on a flight this long.",
      },
      {
        label: "Meals & Drinks",
        text: "Excellent pacing throughout the flight with an extremely well curated food and drink selection.",
      },
      {
        label: "Amenity Kit",
        text: "The weakest part of the experience. Average and feels below what you would expect at this level.",
      },
      {
        label: "Service",
        text: "Easily the highlight. The crew is attentive throughout, proactively making your bed and keeping service flowing without being intrusive.",
      },
      {
        label: "Value",
        text: "180,000 Chase miles for an 18-hour flight. Strong value given the length of the flight and the level of service.",
      },
    ],
    verdict:
      "A world-renowned product for a reason. From check-in to deplaning, the experience is consistently excellent. The only real miss is the amenity kit, but everything else delivers at a high level and justifies the cost on a flight of this length.",
  },
  {
    rank: 2,
    name: "Air France",
    score: "9.0",
    badge: "Excellent",
    badgeClass: "excellent",
    route: "NYC → Paris → Marrakech",
    aircraft: "Airbus A350-1000",
    flown: "November 2024",
    bestFor: "Business class points redemptions",
    categories: [
      {
        label: "Lounge",
        text: "At JFK, the lounge felt underwhelming. If you are not checking a bag, the Delta One lounge can meaningfully improve the pre-flight experience.",
      },
      {
        label: "Seat",
        text: "The A350 product is excellent. Direct aisle access, closing doors, and a clean, modern cabin make it feel private and refined.",
      },
      {
        label: "Meals & Drinks",
        text: "Authentically French cuisine paired with a strong wine selection. One of the better food and beverage programs in business class.",
      },
      {
        label: "Amenity Kit",
        text: "Standard kit with socks, dental set, earplugs, and eye mask. Functional, but not a standout.",
      },
      {
        label: "Service",
        text: "Polished and relaxed. The self-serve drinks concept adds a casual luxury feel that makes the experience more enjoyable.",
      },
      {
        label: "Value",
        text: "Booked at 35,000 miles plus roughly $200 — one of the best value business class experiences available.",
      },
    ],
    verdict:
      "Air France delivers one of the most complete business class experiences available. The A350 seat, strong food and wine, and polished service set a high bar. Note: the Air France 777 experience is not the same — make sure you are on the A350 before booking.",
  },
  {
    rank: 3,
    name: "United Polaris",
    score: "8.7",
    badge: "Very Good",
    badgeClass: "verygood",
    route: "Paris → Newark",
    aircraft: "Boeing 777-200",
    flown: "November 2024",
    bestFor: "Consistent product",
    categories: [
      {
        label: "Lounge",
        text: "The Star Alliance lounge at CDG was solid, though not especially memorable. United's Polaris lounges are stronger when departing from a United hub.",
      },
      {
        label: "Seat",
        text: "Reliable and consistent across the wide-body fleet. Not the flashiest seat, but gives you a predictable lie-flat experience.",
      },
      {
        label: "Meals & Drinks",
        text: "Good enough to keep you satisfied, but not a standout. The drink selection is solid, though the food can feel repetitive.",
      },
      {
        label: "Amenity Kit",
        text: "Standard and useful. Covers the basics without becoming a major reason to choose the product.",
      },
      {
        label: "Service",
        text: "Dependable, but not a wow experience. It avoids being disappointing, which matters more than people think on long-haul flights.",
      },
      {
        label: "Value",
        text: "A strong balance of quality and cost. Rarely the most exciting option, but one of the most predictable.",
      },
    ],
    verdict:
      "United Polaris ranks here because it is consistent. If you want to ensure a reliable experience without researching plane and route differences on every booking, this is a home run.",
  },
  {
    rank: 4,
    name: "Delta One",
    score: "7.0",
    badge: "Good",
    badgeClass: "good",
    route: "New York JFK → Stockholm",
    aircraft: "Boeing 767-300",
    flown: "October 2024",
    bestFor: "Best lounge experience",
    categories: [
      {
        label: "Lounge",
        text: "The Delta One Lounge at JFK is the highlight. From check-in to security to the lounge itself, the ground experience feels genuinely premium.",
      },
      {
        label: "Seat",
        text: "The older 767-300 product is the weak point. It feels dated and does not live up to the Delta One name or price.",
      },
      {
        label: "Meals & Drinks",
        text: "The food and beverage experience needs improvement if Delta wants to compete with stronger international carriers.",
      },
      {
        label: "Amenity Kit",
        text: "Standard and serviceable, but not enough to lift the overall onboard experience.",
      },
      {
        label: "Service",
        text: "Fine, but the dated onboard product made it hard for the flight to feel truly elevated.",
      },
      {
        label: "Value",
        text: "The lounge experience helps, but hard to justify paying for Delta One again on one of the older aircraft products.",
      },
    ],
    verdict:
      "Delta One ranks here because the ground experience is excellent but the onboard product does not match it. The Delta One Lounge at JFK is genuinely impressive, but the older 767-300 seat makes the overall experience feel incomplete. With the right aircraft, Delta could rank higher.",
  },
  {
    rank: 5,
    name: "ANA",
    score: "7.0",
    badge: "Good",
    badgeClass: "good",
    route: "Chicago → Tokyo",
    aircraft: "Boeing 777-300",
    flown: "November 2025",
    bestFor: "Service and food",
    categories: [
      {
        label: "Lounge",
        text: "Access to the Polaris Lounge in Chicago is a major plus. Strong food, good drinks, and a comfortable space before a long-haul flight.",
      },
      {
        label: "Seat",
        text: "The older 777 product feels dated and lacks the privacy of newer business class seats. Functional, but clearly behind modern competitors.",
      },
      {
        label: "Meals & Drinks",
        text: "The Japanese meal option is excellent — thoughtful, well prepared, and a clear step above standard airline food.",
      },
      {
        label: "Amenity Kit",
        text: "A solid kit with useful items, but not something that stands out compared to top-tier airlines.",
      },
      {
        label: "Service",
        text: "Exceptional. Attentive, respectful, and consistently thoughtful throughout. One of the best service experiences in business class.",
      },
      {
        label: "Value",
        text: "Strong on the soft product side, but harder to justify compared to newer seats offered by other airlines.",
      },
    ],
    verdict:
      "ANA stands out for its service and food, both among the best in business class. However, the older seat holds it back from ranking higher. If the hard product matched the soft product, this would be a top-tier experience across the board.",
  },
];

export const airlineComingSoon: AirlineComingSoon = {
  name: "Lufthansa",
  route: "Newark → Budapest",
  aircraft: "Boeing 747-800",
  scheduled: "June 2026",
};
