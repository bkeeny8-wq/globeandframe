export type BagRating = "excellent" | "verygood" | "good" | "fair" | "poor";

export type WeekendBag = {
  rank: number;
  name: string;
  price: string;
  rating: BagRating;
  ratingLabel: string;
  tagline: string;
  durability: string;
  usability: string;
  take: string;
  photo: string;
};

export const weekendBags: WeekendBag[] = [
  {
    rank: 1,
    name: "Béis Convertible Weekender",
    price: "$128",
    rating: "excellent",
    ratingLabel: "Excellent",
    tagline: "The Mary Poppins bag, but actually built for travel",
    durability: "Highly durable with thoughtful compartments and easy access throughout",
    usability: "Flexible, personal-item friendly, and easy to travel with",
    take: "The Mary Poppins bag. When you open the top, it feels like the suitcase Mary Poppins lugs around pulling out lampshades. It has room for shoes, a separate laptop compartment with a leather sleeve, and easy access to everything you need mid-flight. It also collapses well when you need it to squeeze under a seat, which is a huge advantage when you are pushing airline limits. It may draw a bit more attention than a smaller weekend bag, but the versatility more than makes up for it. At under $200, it was not even a close competition.",
    photo: "/images/weekend-bags/beis-convertible-weekender.jpg",
  },
  {
    rank: 2,
    name: "Lo & Sons Catalina Deluxe",
    price: "$215",
    rating: "verygood",
    ratingLabel: "Very Good",
    tagline: "A polished weekender with a genuinely useful shoe compartment",
    durability: "Strong construction with smart packing separation",
    usability: "Easy to pack, though slightly less convenient in transit",
    take: "I had high hopes for this bag, and it mostly lived up to expectations. The shoe compartment underneath the rest of the bag is genuinely useful, and I liked it much more than a side shoe pocket. It feels like a proper weekend bag without becoming ridiculous. It loses the top spot because the Béis bag has better construction, more features, and better access while moving through an airport. Still, this is a very strong option.",
    photo: "/images/weekend-bags/lo-and-sons-catalina-deluxe.jpg",
  },
  {
    rank: 3,
    name: "Stubble & Co The Weekender",
    price: "$235",
    rating: "verygood",
    ratingLabel: "Very Good",
    tagline: "A cleaner, more rugged weekender with real travel versatility",
    durability: "Durable, simple, and easy to work with",
    usability: "Versatile and travel-friendly, but missing shoe separation",
    take: "This had many of the same basics as the Monos bag, but the more duffle-like construction and greater versatility made it easier to use. It feels less rigid, more adaptable, and better suited to someone who wants a weekend bag that can handle different kinds of trips. Compared to the top two bags, it loses points for not having a shoe compartment. Still, this is definitely a good men's weekend bag.",
    photo: "/images/weekend-bags/stubble-weekender.jpg",
  },
  {
    rank: 4,
    name: "Monos Metro Weekender",
    price: "$250",
    rating: "good",
    ratingLabel: "Good",
    tagline: "Massive, structured, and almost too much bag",
    durability: "Structured and sturdy, but less flexible",
    usability: "Great capacity, weak personal-item flexibility",
    take: "This bag is massive. It has space for multiple shoes, fit everything with ease, and is a true weekend bag. If your only goal is packing capacity, it performs well. The problem is that it is so large it could never really be mistaken for a personal item. If I never tried to use this bag as a quasi-personal item, it would rank higher. The rigid construction limits how useful it is once you are actually moving through airports.",
    photo: "/images/weekend-bags/monos-metro-weekender.jpg",
  },
  {
    rank: 5,
    name: "Herschel Novel Duffle",
    price: "$110",
    rating: "fair",
    ratingLabel: "Fair",
    tagline: "Affordable and sturdy, but more gym bag than travel system",
    durability: "Durable enough, but basic organization",
    usability: "Works for clothes, not ideal for tech or camera gear",
    take: "It was obvious this was the cheapest bag. That does not make it terrible, but without a laptop compartment and with its basic construction, it feels more like a gym bag than a suitcase. It could not hold my laptop or camera in a way that made sense. Unlike the lower-ranked bags, it did fit all the clothing. Side note: I think the Herschel Novel Duffle Tech is likely a much better weekend bag.",
    photo: "/images/weekend-bags/herschel-novel-duffle.jpg",
  },
  {
    rank: 6,
    name: "Away Weekender",
    price: "$245",
    rating: "poor",
    ratingLabel: "Poor",
    tagline: "The replacement bag that made me miss the old one",
    durability: "Acceptable build, frustrating compartment layout",
    usability: "Hard to access and smaller in practice than expected",
    take: "The bag that needed replacing was a former design of the Away Weekender. This new version is atrocious. It scores better than the July bag because it at least fit some clothes, but the split design makes the middle hard to access mid-flight. The compartment is too small, and there is not a good place for shoes. Even with more space than the July bag, it still barely fit two summer outfits.",
    photo: "/images/weekend-bags/away-weekender.jpg",
  },
  {
    rank: 7,
    name: "July Carry All Weekender",
    price: "$195",
    rating: "poor",
    ratingLabel: "Poor",
    tagline: "More purse than overnight bag",
    durability: "Decent build, but almost no useful organization",
    usability: "Too small to function as a real weekend bag",
    take: "This bag was terrible. It was more of a purse than an overnight bag. It would hold maybe a T-shirt and a pair of shorts at most, with no extra compartments of any kind. Maybe the larger version works better, but this one is not it.",
    photo: "/images/weekend-bags/july-carry-all-weekender.jpg",
  },
];

export const reviewCriteria = [
  {
    name: "Capacity",
    description: "Three days of clothing, shoes, a laptop, and a camera. No capacity, no chance.",
  },
  {
    name: "Durability",
    description: "Built to handle overhead bins, car trunks, and real travel wear.",
  },
  {
    name: "Access",
    description: "Easy to grab essentials mid-flight. This matters more than you think.",
  },
  {
    name: "Usability",
    description: "Can it function as a personal item when needed? This is where most bags fail.",
  },
  {
    name: "Cost",
    description: "Under $300. Spending more for something getting thrown around did not make sense.",
  },
];
