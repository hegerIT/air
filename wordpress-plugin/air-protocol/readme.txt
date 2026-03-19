=== AIR Protocol ===
Contributors: hegerit
Tags: ai, json, api, machine-readable, seo, structured-data
Requires at least: 5.0
Tested up to: 6.4
Stable tag: 0.1.0
Requires PHP: 7.4
License: MIT
License URI: https://opensource.org/licenses/MIT

Makes your WordPress site AI-readable through the AIR (AI Readable) protocol. Structured JSON endpoints for AI assistants.

== Description ==

**Future-proof your website for AI assistants.**

The AIR Protocol plugin automatically generates structured JSON endpoints that AI systems can easily read and understand. As AI assistants become the primary way people discover and interact with websites, having machine-readable data becomes essential.

= What AIR Protocol Does =

* **Automatic AI Endpoints**: Creates `/air` and `/.well-known/air` endpoints
* **Structured Data**: Converts your WordPress content into clean JSON format
* **Zero Configuration**: Works immediately with sensible defaults
* **Customizable**: Add business hours, services, contact info through admin panel
* **Compatible**: Integrates with WooCommerce, custom post types, and existing content

= Key Features =

* 🤖 **AI-Ready**: Optimized for ChatGPT, Claude, and other AI assistants
* 📱 **Universal**: Works with any AI system that can make HTTP requests
* 🚀 **Fast**: Lightweight, cached JSON responses
* 🔒 **Secure**: Read-only endpoints, no authentication required
* 🌐 **Standard**: Follows emerging AIR protocol specification

= Live Demo =

See AIR Protocol in action: [air.heger.it](https://air.heger.it)

= How It Works =

1. Install and activate the plugin
2. Configure your business information in Settings → AIR Protocol
3. AI assistants can now query your site:
   - `yoursite.com/air` - Discovery endpoint
   - `yoursite.com/air?contact` - Contact information
   - `yoursite.com/air?services` - Your services/products
   - `yoursite.com/air?location` - Location and hours

= Automatic Integrations =

* **WooCommerce**: Products automatically appear as services
* **Custom Post Types**: "Services" post type automatically included
* **WordPress Core**: Site title, description, admin email included
* **Contact Info**: Phone, address, hours configurable in admin

= Why AIR Protocol? =

As AI assistants replace traditional web browsing, websites need a way to communicate structured information directly to AI systems. Instead of AI trying to parse HTML (which often fails), AIR provides clean, reliable JSON data.

**This isn't just about SEO – it's about being discoverable in an AI-driven world.**

== Installation ==

1. Upload the plugin files to `/wp-content/plugins/air-protocol/`
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Go to Settings → AIR Protocol to configure your information
4. Test your endpoints: visit `yoursite.com/air`

= Recommended Setup =

For optimal AI discovery, set up a subdomain `air.yoursite.com` pointing to your WordPress installation. This follows the AIR protocol standard.

== Frequently Asked Questions ==

= What is the AIR Protocol? =

AIR (AI Readable) is an emerging standard for making websites machine-readable by AI assistants. Instead of parsing complex HTML, AI systems can query structured JSON endpoints to get reliable business information.

= Will this affect my site's performance? =

No. AIR endpoints are lightweight and can be cached. The plugin only activates when AI systems specifically request AIR data.

= Do I need to change my existing website? =

Not at all. AIR Protocol works alongside your existing site. Your human visitors see the normal website, while AI assistants get structured data through special endpoints.

= What data is shared with AI systems? =

Only the business information you configure: contact details, services, hours, etc. No private data, user accounts, or sensitive information is exposed.

= How do I know if AI systems are using my AIR data? =

Check your server logs for requests to `/air` endpoints. You can also use the built-in validator tool to test your implementation.

= Can I customize what data is available? =

Yes! The admin panel lets you configure contact info, business hours, services, and company details. The plugin also automatically pulls from WooCommerce and custom post types.

== Screenshots ==

1. Admin settings panel for configuring business information
2. JSON output example showing structured contact data  
3. Validator tool for testing your AIR implementation
4. Endpoint discovery showing available data sections

== Changelog ==

= 0.1.0 =
* Initial release
* Core AIR Protocol implementation
* Admin configuration panel
* WooCommerce integration
* Built-in validator tool
* Automatic endpoint generation

== Upgrade Notice ==

= 0.1.0 =
Initial release of the AIR Protocol plugin.

== Support ==

* Documentation: [GitHub Repository](https://github.com/hegerIT/air)
* Live Example: [air.heger.it](https://air.heger.it)
* Issues: [GitHub Issues](https://github.com/hegerIT/air/issues)

== Technical Details ==

= Endpoints Created =
* `/.well-known/air` - Protocol discovery
* `/air` - Main API endpoint
* `/air?contact` - Contact information
* `/air?services` - Service catalog
* `/air?location` - Location and hours
* `/air?about` - Company information

= Requirements =
* WordPress 5.0+
* PHP 7.4+
* URL rewriting enabled (standard on most hosts)

= Integration Notes =
* Respects WordPress caching plugins
* CORS headers included for cross-domain AI access
* JSON-LD compatible output format
* Follows REST API conventions