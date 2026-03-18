# AIR - AI Readable Protocol

> **A simple, universal standard for AI-to-AI communication on the web.**

## The Problem

Current websites are designed for humans, not AI. When AI assistants need business information, they must:
- Parse complex HTML structures
- Extract data from unstructured content  
- Handle inconsistent formats across sites
- Waste resources on irrelevant information

## The Solution

**AIR** provides a standardized, parameterized API for structured business data that AI can query efficiently.

## Quick Example

```bash
# Discovery - What can this site provide?
GET https://air.heger.it/
→ Returns available capabilities and quick facts

# Contact Information
GET https://air.heger.it?contact
→ Returns structured contact data

# Services with filtering
GET https://air.heger.it?services=tomedo
→ Returns only tomedo-related services
```

## Core Concepts

### 1. Discovery-First
Every AIR endpoint returns what's available without parameters:
```json
{
  "name": "heger.IT GmbH",
  "type": "IT-Services",
  "capabilities": ["contact", "services", "geo", "availability"],
  "specialties": ["tomedo", "apple", "telematik"]
}
```

### 2. Parameterized Queries
Request only what you need:
- `?contact` - Contact information
- `?services` - Service catalog
- `?services=keyword` - Filtered services
- `?geo` - Location and service area
- `?availability` - Hours, status, scheduling
- `?all` - Everything

### 3. Structured JSON Response
All data in consistent, AI-readable JSON format.

### 4. Speed-Optimized
- HTTP-based (proven, fast)
- Minimal data transfer
- No HTML parsing required
- Direct machine consumption

## Implementation

### For Website Owners

1. **Simple Setup**: Add AIR endpoint to your domain
2. **Easy Config**: Define your business data once
3. **Auto-Discovery**: AI finds and uses your data automatically

### For AI Developers

1. **Universal Interface**: Same API pattern across all AIR sites
2. **Predictable Responses**: Consistent JSON structure
3. **Error Handling**: Standard HTTP status codes

## Specification Status

🚧 **This protocol is in active development.**

- **Version**: 0.1.0-alpha
- **Status**: Proof of concept
- **Demo**: https://air.heger.it

## Getting Started

### Website Implementation
*(Coming soon - generators and templates)*

### AI Integration  
*(Coming soon - client libraries)*

## Comparison to Existing Standards

| Standard | Complexity | AI-Friendly | Adoption |
|----------|------------|-------------|----------|
| Schema.org | High | Medium | Low |
| OpenAPI | High | Medium | Medium |
| AIR | Low | High | TBD |

## Contributing

We welcome contributions to make AIR the universal standard for AI-web communication.

1. Fork this repository
2. Create your feature branch
3. Submit a pull request

## License

MIT License - Use freely for any purpose.

## Roadmap

- [x] Core specification design
- [x] Live demo (air.heger.it)
- [ ] Documentation site
- [ ] Website generators
- [ ] CMS plugins (WordPress, etc.)
- [ ] AI client libraries
- [ ] Community adoption

---

**AIR** - Making the web readable for AI, one site at a time.