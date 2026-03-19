# AIR - AI Readable Protocol

> **The universal standard for AI-accessible websites**

## Overview

AIR makes every website readable by AI assistants. Instead of parsing complex HTML, AI systems access standardized JSON endpoints to retrieve structured information about businesses, services, products, or any website content.

**Every website needs AIR.** As AI assistants replace web browsing, websites without structured data access will become invisible to AI-driven discovery and interaction.

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

### Option 1: WordPress Plugin (Recommended)
- **One-click installation** from WordPress admin
- **Automatic integration** with WooCommerce, custom post types  
- **Admin interface** for business data management
- **Zero configuration** required

### Option 2: Manual Installation  
- Standard web hosting
- Three files: `api.php` (JSON API), `index.html` (fallback), `data.md` (business data)
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
- **Status**: Production ready with WordPress plugin
- **Compatibility**: WordPress 5.0+, standard web hosting platforms
- **Dependencies**: PHP 7.4+ for server implementation, WordPress for plugin

## Getting Started

### WordPress Sites (90% of websites)
1. **Install Plugin**: Download and activate the AIR Protocol WordPress plugin
2. **Configure Data**: Go to Settings → AIR Protocol, fill in business information  
3. **Test Implementation**: Visit `yoursite.com/air` to verify JSON responses
4. **Optional**: Set up `air.yoursite.com` subdomain for optimal discovery

### Manual Installation
1. **Deploy Files**: Upload `api.php`, `index.html`, and `data.md` to `air.yourdomain.com`
2. **Configure Data**: Edit `data.md` with your business information
3. **Test Endpoints**: Verify JSON responses work correctly
4. **Validate**: Use the included validator tool

Detailed instructions: [WordPress Plugin Guide](wordpress-plugin/INSTALL.md) | [Manual Deployment](DEPLOY-INSTRUCTIONS.md)

## Roadmap

### Current Focus ✅
- **WordPress Plugin**: Production ready, one-click installation
- **Validation Tools**: Built-in validator and testing suite  
- **Server-side JSON**: Real API endpoints, not client-side parsing

### Next Phase
- **WordPress.org Submission**: Official plugin repository listing
- **Shopify Integration**: App store plugin for Shopify stores
- **Agency Partnerships**: Distribution through web development agencies

### Expanding Access
- **CMS plugins** for instant AIR deployment
- **Website builder integrations** (Squarespace, Webflow, etc.)
- **E-commerce platform modules** for product catalogs
- **Enterprise tools** for large-scale deployments

### Future Vision
- **AI-to-AI commerce**: Direct bookings, purchases, and transactions
- **Industry standards**: Healthcare, hospitality, retail-specific extensions  
- **Global directory**: Discoverable registry of AIR-enabled websites
- **Advanced interactions**: Real-time availability, dynamic pricing, automated negotiations

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