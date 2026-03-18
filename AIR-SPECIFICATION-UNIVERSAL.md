# AIR Protocol - Universal Specification v2.0

## Vision: The Future of Web Interaction

**AIR (AI Readable) is the universal standard for AI-to-AI web communication.** 

In the near future, humans won't browse websites anymore. Instead:
1. **Human asks AI assistant:** "I'm hungry for Chinese food"
2. **AI assistant queries restaurant AIR data:** Menu, allergies, availability
3. **AI assistant checks review portals via AIR:** TripAdvisor, Google Reviews  
4. **AI assistant books table via AIR API:** Direct reservation
5. **Human gets result:** "Table booked at Golden Dragon, 7 PM, allergy-safe"

**AIR makes every website AI-readable and AI-interactive.**

---

## Core Principles

### 1. Trust Through Verification
- **No self-reported metrics** (reviews, ratings)
- **Only verifiable data** or **links to authoritative sources**
- **Immutable facts** (address, phone, legal name)

### 2. Universal Compatibility  
- **2-file system:** `data.md` + `index.html`
- **Works everywhere:** Static sites, WordPress, GitHub Pages
- **No backend required:** Pure HTML/JS solution

### 3. Progressive Enhancement
- **Basic info first:** Contact, services, hours
- **Advanced features:** APIs, real-time data, integrations
- **Future-proof:** Extensible for new interaction types

### 4. AI-First Design
- **Structured data:** Easy parsing for AI
- **Consistent format:** Same patterns across all sites
- **Action-oriented:** What can AI DO with this data?

---

## File Structure

Every AIR implementation consists of exactly 2 files:

```
domain.com/
├── data.md      # All business data in Markdown
└── index.html   # AI parser + human interface
```

### URLs
```
domain.com/              → Discovery (available sections)
domain.com/?contact      → Contact information
domain.com/?services     → Services/products
domain.com/?availability → Hours, booking, real-time status
domain.com/?location     → Address, service area
domain.com/?actions      → Available AI interactions
domain.com/?all          → Complete dataset
```

---

## Universal Data Categories

### Core Categories (Required)
Every AIR implementation must include:

#### 1. **Entity** - Who/what this is
```markdown
## Entity
- **Name:** Legal business name
- **Type:** Restaurant | IT-Service | Medical Practice | etc.
- **Category:** Food & Drink | Technology | Healthcare | etc.
- **Description:** One-line elevator pitch
- **Established:** Year founded
- **Legal ID:** Business registration number (if public)
```

#### 2. **Contact** - How to reach
```markdown
## Contact
- **Phone:** +49 123 456789
- **Email:** info@business.com
- **Website:** https://business.com
- **Emergency:** +49 123 456789 (if applicable)
```

#### 3. **Location** - Where to find
```markdown
## Location  
- **Address:** Street, Number
- **City:** City Name
- **Postal Code:** 12345
- **Country:** DE
- **Coordinates:** 52.5200, 13.4050
- **Timezone:** Europe/Berlin
```

#### 4. **Availability** - When accessible
```markdown
## Availability
- **Monday:** 09:00-17:00
- **Tuesday:** 09:00-17:00
- **Wednesday:** Closed
- **Status:** Open | Closed | Limited
- **Last Updated:** 2026-03-18T17:30:00Z
```

### Extended Categories (Optional)

#### 5. **Services** - What is offered
```markdown
## Services
### Service Name
- **Price:** 50€ | Free | On Request
- **Duration:** 30 minutes
- **Description:** What exactly is included
- **Requirements:** Age 18+, ID required, etc.
- **Availability:** Available | Limited | Unavailable
- **Booking:** Required | Optional | Walk-in

### Another Service
- **Price:** 120€/hour
- **Category:** Consultation
- **Online:** Available via video call
```

#### 6. **Products** - Physical items for sale
```markdown
## Products  
### Product Name
- **Price:** 29.99€
- **Category:** Electronics | Food | Clothing
- **Stock:** In Stock | Limited | Out of Stock
- **Shipping:** 2-3 days
- **Weight:** 0.5kg
- **Dimensions:** 10x5x2 cm
- **SKU:** PROD-001

### Food Item (Restaurant)
- **Price:** 12.50€
- **Category:** Main Course
- **Allergies:** Gluten, Dairy, Nuts
- **Dietary:** Vegetarian | Vegan | Halal | Kosher
- **Spice Level:** Mild | Medium | Hot
- **Ingredients:** Chicken, rice, vegetables
```

#### 7. **Actions** - What AI can do
```markdown
## Actions
### Book Appointment
- **Method:** API
- **Endpoint:** https://api.business.com/booking
- **Parameters:** date, time, service, customer_info
- **Auth Required:** API key on request
- **Advance Notice:** 24 hours
- **Max Future:** 90 days

### Order Products  
- **Method:** E-commerce integration
- **Platform:** Shopify | WooCommerce | Custom
- **API:** https://shop.business.com/api
- **Payment:** Credit Card, PayPal, SEPA
- **Delivery:** Local area only

### Get Real-time Status
- **Method:** Status API  
- **Endpoint:** https://api.business.com/status
- **Updates:** Current wait time, availability
- **Frequency:** Every 5 minutes
```

#### 8. **Media** - Visual information
```markdown
## Media
### Photos
- **Logo:** /images/logo.png
- **Interior:** /images/gallery/interior.jpg
- **Products:** /images/products/
- **Team:** /images/team.jpg

### Videos
- **Introduction:** /videos/intro.mp4
- **Product Demo:** https://youtube.com/watch?v=abc123
- **Virtual Tour:** /videos/tour.mp4

### Documents
- **Menu:** /documents/menu.pdf
- **Price List:** /documents/prices.pdf
- **Terms:** /legal/terms.pdf
```

#### 9. **Verification** - Trust signals
```markdown
## Verification
### External Reviews
- **Google Maps:** https://maps.google.com/place/business123
- **TripAdvisor:** https://tripadvisor.com/restaurant123
- **Yelp:** https://yelp.com/biz/business123
- **Industry Portal:** https://specific-industry.com/business123

### Certifications
- **ISO 9001:** Valid until 2027-12-31
- **FDA Approved:** Certificate #FDA-123456
- **Industry Certification:** Valid until 2025-06-30

### Business Registry
- **Registration:** Handelsregister HRB 123456
- **Tax ID:** DE123456789
- **License:** Business License #BL-789
```

#### 10. **Policies** - Rules and terms
```markdown
## Policies
### Booking Policy
- **Cancellation:** 24h notice required
- **No-show Fee:** 50% of service price  
- **Rescheduling:** Free up to 2 times
- **Payment:** Due at time of service

### Privacy Policy
- **Data Collection:** Minimal required data only
- **Data Storage:** EU servers, GDPR compliant
- **Data Sharing:** Never shared with third parties
- **Contact:** privacy@business.com

### Accessibility
- **Wheelchair Access:** Full accessibility
- **Parking:** 2 disabled spaces available
- **Assistance:** Service animals welcome
- **Languages:** German, English, Spanish
```

---

## Industry-Specific Extensions

### Restaurant/Food Service
```markdown
## Menu
### Appetizers
- **Spring Rolls (4pcs):** 4.50€ | Vegetarian | Allergies: Gluten, Soy
- **Tom Yum Soup:** 6.80€ | Spicy | Allergies: Shellfish, Fish sauce

### Main Courses  
- **Pad Thai:** 12.90€ | Choice of protein | Allergies: Peanuts, Fish sauce
- **Green Curry:** 13.50€ | Hot spice level | Allergies: Coconut, Fish sauce

## Reservations
- **Method:** Phone + Online
- **Online:** https://booking.restaurant.com
- **Advance:** Same day to 30 days
- **Party Size:** 1-12 people
- **Special Requests:** Dietary restrictions, celebrations
```

### Healthcare/Medical
```markdown
## Specialties
- **General Medicine:** Primary care, check-ups
- **Cardiology:** Heart conditions, ECG
- **Dermatology:** Skin conditions, cosmetic

## Insurance
- **Accepted:** Public health insurance (GKV)
- **Private:** All major private insurers
- **Self-Pay:** Rates available on request
- **Billing:** Direct billing to insurance

## Appointments
- **Booking:** Phone during office hours
- **Emergency:** 24/7 emergency number
- **Wait Time:** Typically 5-15 minutes
- **Cancellation:** 24h notice preferred
```

### Retail/E-commerce
```markdown
## Inventory
### Product Categories
- **Electronics:** In stock, 2-year warranty
- **Clothing:** Seasonal collection, size guide available
- **Books:** Special orders within 5 days

## Shipping
- **Local Delivery:** Same day for orders before 2 PM
- **National:** 2-3 business days
- **International:** 5-10 business days
- **Free Shipping:** Orders over 50€

## Returns
- **Period:** 30 days from delivery  
- **Condition:** Original packaging, unused
- **Refund:** Full refund or store credit
- **Exchange:** Size/color exchanges free
```

---

## Technical Implementation

### Data Format Rules
1. **Markdown structure:** Use `## Section` for main categories
2. **Subsections:** Use `### Subsection` for grouping
3. **Data format:** `- **Key:** Value` for structured data
4. **Lists:** Simple `- Item` for unstructured lists
5. **No HTML:** Keep it pure Markdown for universality

### API Response Format
```json
{
  "air_version": "2.0.0",
  "section": "contact",
  "data": {
    "Phone": "+49 123 456789",
    "Email": "info@business.com"
  },
  "last_updated": "2026-03-18T17:30:00Z"
}
```

### Error Handling
```json
{
  "error": "Section not found",
  "available_sections": ["contact", "services", "location"],
  "suggestion": "Try /?contact instead"
}
```

---

## Trust & Security

### Data Integrity
- **Self-reported data only:** Facts the business controls (hours, services, contact)
- **External verification:** Links to authoritative sources (Google Maps, review sites)
- **No metrics:** No self-reported ratings, reviews, or performance claims
- **Timestamps:** All data includes last-updated timestamps

### Privacy Protection  
- **Public data only:** No personal information of employees/customers
- **Business information:** Only publicly available business data
- **Contact data:** Only official business contact information
- **No tracking:** AIR implementation should not track visitors

---

## Future Extensions

### Version 3.0 Planned Features
- **Real-time APIs:** Live inventory, wait times, availability
- **Payment integration:** Direct purchasing through AI agents  
- **Webhook support:** Notifications for changes
- **Multi-language:** Automatic language detection/translation
- **Schema validation:** Automatic data validation tools

### Community Wishlist
- **Blockchain verification:** Immutable business data
- **AI agent authentication:** Verified AI-to-AI communication
- **Federated search:** Cross-platform business discovery
- **Universal booking protocol:** Standardized reservation system

---

This specification is a living document. As more businesses adopt AIR and new use cases emerge, we'll continue expanding the standard to meet real-world needs.

**Current Status:** Draft 2.0 - Feedback welcome
**Last Updated:** 2026-03-18
**Next Review:** 2026-04-15