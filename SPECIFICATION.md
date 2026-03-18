# AIR Protocol Specification v0.1.0

## Overview

AIR (AI Readable) is a lightweight HTTP-based protocol for structured business data exchange optimized for AI consumption.

## Core Principles

1. **Discovery-First**: Root endpoint reveals capabilities
2. **Parameter-Driven**: Query only needed data
3. **JSON-Native**: Consistent, parseable responses
4. **HTTP-Standard**: Uses proven web protocols

## Endpoint Structure

### Base Pattern
```
https://domain.com/air/
https://subdomain.domain.com/
air://domain.com/  (future URI scheme)
```

### Query Parameters
- `contact` - Contact information
- `services` - Available services/products  
- `services=keyword` - Filtered services
- `geo` - Geographic information
- `availability` - Hours, status, scheduling
- `credentials` - Certifications, testimonials
- `faq` - Frequently asked questions
- `all` - Complete dataset

## Response Format

### Discovery Response (No Parameters)
```json
{
  "air_version": "0.1.0",
  "name": "Company Name",
  "type": "Industry/Category", 
  "description": "Brief description",
  "capabilities": [
    "contact",
    "services", 
    "geo",
    "availability"
  ],
  "specialties": ["keyword1", "keyword2"],
  "quick_facts": {
    "location": "City, Country",
    "established": "2020",
    "employees": "5-10"
  },
  "last_updated": "2026-03-18T16:45:00Z"
}
```

### Contact Response
```json
{
  "contact": {
    "name": "Company Name",
    "legal_name": "Legal Entity Name",
    "phone": "+49...",
    "email": "info@company.com",
    "website": "https://company.com",
    "address": {
      "street": "Street Address",
      "city": "City",
      "postal_code": "12345",
      "country": "DE"
    },
    "social": {
      "linkedin": "https://linkedin.com/company/...",
      "twitter": "https://twitter.com/..."
    }
  }
}
```

### Services Response
```json
{
  "services": [
    {
      "id": "service1",
      "name": "Service Name",
      "description": "Service description",
      "category": "Category",
      "keywords": ["keyword1", "keyword2"],
      "pricing": {
        "type": "fixed|hourly|quote",
        "value": 150,
        "currency": "EUR",
        "unit": "hour"
      },
      "availability": "available|limited|unavailable"
    }
  ]
}
```

### Geographic Response
```json
{
  "geo": {
    "coordinates": {
      "lat": 51.4158,
      "lng": 9.7910
    },
    "address": {
      "street": "Street Address",
      "city": "City", 
      "postal_code": "12345",
      "country": "DE"
    },
    "service_area": {
      "radius_km": 50,
      "regions": ["Region1", "Region2"],
      "travel_policy": "On-site available within 50km"
    }
  }
}
```

### Availability Response
```json
{
  "availability": {
    "status": "open|closed|busy",
    "hours": {
      "monday": "09:00-17:00",
      "tuesday": "09:00-17:00",
      "wednesday": "09:00-17:00", 
      "thursday": "09:00-17:00",
      "friday": "09:00-17:00",
      "saturday": "closed",
      "sunday": "closed"
    },
    "timezone": "Europe/Berlin",
    "next_available": "2026-03-19T09:00:00Z",
    "booking": {
      "method": "phone|email|online",
      "url": "https://booking-system.com",
      "advance_notice": "24 hours"
    }
  }
}
```

## HTTP Response Codes

- `200 OK` - Successful response
- `400 Bad Request` - Invalid parameter
- `404 Not Found` - No AIR endpoint  
- `429 Too Many Requests` - Rate limiting
- `500 Internal Server Error` - Server error

## Headers

### Request Headers
```
Accept: application/json
User-Agent: AI-Client/1.0
```

### Response Headers
```
Content-Type: application/json; charset=utf-8
Cache-Control: public, max-age=3600
AIR-Version: 0.1.0
```

## Implementation Guidelines

### For Website Owners

1. **Choose deployment method:**
   - Subdomain: `air.company.com`
   - Path: `company.com/air/`
   - Separate domain: `company.air`

2. **Implement discovery endpoint first**
3. **Add parameters incrementally**
4. **Update `last_updated` timestamp**
5. **Consider caching (1-hour recommended)**

### For AI Clients

1. **Always start with discovery call**
2. **Respect rate limits**
3. **Cache responses appropriately**  
4. **Handle errors gracefully**
5. **Check `air_version` for compatibility**

## Security Considerations

- **Public data only** - No sensitive information
- **Rate limiting** recommended
- **HTTPS required** for production
- **CORS headers** for browser access

## Future Extensions

- Authentication for private data
- Webhooks for real-time updates  
- GraphQL-style field selection
- Binary formats for large datasets

## Validation

Valid AIR implementations must:
1. Return valid JSON
2. Include `air_version` in discovery response
3. Support at least discovery endpoint
4. Use correct HTTP status codes
5. Include proper CORS headers

---

*This specification is subject to change during alpha phase.*