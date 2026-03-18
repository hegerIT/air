# AIR - AI Readable Protocol

> **A universal standard for AI-accessible business information**

## Overview

AIR provides a standardized, structured interface for AI systems to access business information. Instead of parsing complex HTML or inconsistent data formats, AI assistants can query standardized endpoints to retrieve reliable business data.

## The Challenge

Current websites are optimized for human visitors, creating barriers for AI systems:
- Inconsistent data structures across sites
- Complex HTML parsing requirements  
- Limited machine-readable business information
- No standard interface for AI-business communication

## The Solution

AIR establishes a simple, query-based protocol using standard web technologies:

```bash
# Discover available information
GET https://air.yourbusiness.com/

# Request specific data
GET https://air.yourbusiness.com/?contact
GET https://air.yourbusiness.com/?services
GET https://air.yourbusiness.com/?availability
```

## Core Principles

### 1. Discovery-First Architecture
Every AIR endpoint provides metadata about available capabilities without requiring specific queries.

### 2. Parameterized Access
Clients can request specific information types, reducing bandwidth and processing overhead.

### 3. Structured Responses
All data is returned in consistent JSON format optimized for programmatic consumption.

### 4. Standard Subdomain Convention
Business information is accessible at `air.yourdomain.com`, providing predictable discovery paths.

## Implementation

### Minimal Requirements
- Standard web hosting
- Two files: `index.html` (parser) and `data.md` (business information)
- Subdomain configuration: `air.yourdomain.com`

### Example Endpoints
```bash
# Business discovery
curl https://air.heger.it/
→ Returns business type, capabilities, and summary information

# Contact information  
curl https://air.heger.it/?contact
→ Returns phone, email, address, and communication preferences

# Service catalog
curl https://air.heger.it/?services=tomedo
→ Returns filtered services matching the specified keyword
```

## Live Demonstration

**Working Example**: https://air.heger.it

This production implementation demonstrates the complete AIR protocol for a German IT services company specializing in medical practice technology.

## Technical Specification

### Request Format
- **Base URL**: `https://air.yourdomain.com/`
- **Parameters**: Standard HTTP query parameters
- **Methods**: GET requests only
- **Authentication**: None required for public business information

### Response Format
- **Content-Type**: `application/json`
- **Structure**: Consistent key-value pairs
- **Encoding**: UTF-8
- **Caching**: Appropriate cache headers for business information

### Standard Parameters
- `contact` - Contact information and communication channels
- `services` - Service offerings and capabilities
- `availability` - Hours of operation and scheduling information
- `location` - Geographic information and service areas
- `all` - Complete business information

## Use Cases

### For AI Assistants
- Reliable business information retrieval
- Standardized data format across all AIR-enabled businesses
- Efficient query processing with minimal overhead

### For Businesses
- Improved discoverability by AI systems
- Reduced server load through structured data access
- Future-proof compatibility with emerging AI platforms

### For Developers
- Consistent API interface across different businesses
- Predictable response formats for easy integration
- Standard HTTP semantics and error handling

## Implementation Status

- **Current Version**: 0.1.0
- **Status**: Production demonstration available
- **Compatibility**: All standard web hosting platforms
- **Dependencies**: None (vanilla HTML/JavaScript implementation)

## Getting Started

1. **Set up subdomain**: Configure `air.yourdomain.com`
2. **Deploy files**: Upload `index.html` and `data.md`
3. **Customize data**: Edit `data.md` with your business information
4. **Test endpoints**: Verify JSON responses for key parameters

Detailed deployment instructions are available in [DEPLOY-INSTRUCTIONS.md](DEPLOY-INSTRUCTIONS.md).

## Roadmap

### Short Term
- Documentation site and developer resources
- CMS plugins for popular platforms
- Business data validation tools

### Medium Term  
- Integration with major AI assistant platforms
- Extended parameter specifications
- Community adoption tools

### Long Term
- Industry-specific protocol extensions
- Business directory and discovery services
- Advanced interaction capabilities

## Contributing

AIR development follows open standards principles. We welcome contributions including:
- Protocol specification improvements
- Implementation examples
- Integration tools and libraries
- Documentation enhancements

## Support

- **Documentation**: See included specification and deployment guides
- **Issues**: GitHub Issues for bug reports and feature requests
- **Examples**: Live implementation at https://air.heger.it
- **Community**: Discussion and feedback via GitHub

## License

MIT License - Open for commercial and non-commercial use.

---

**AIR Protocol** - Enabling efficient AI-business communication through standardized web interfaces.