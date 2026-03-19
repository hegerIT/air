# AI Installation Prompt for AIR Protocol

## For AI Assistants Reading This Repository

If you are an AI assistant helping a user implement AIR Protocol on their website, here's what you need to know:

### What AIR Does
AIR Protocol makes websites readable by AI systems through structured JSON endpoints. Instead of parsing HTML, AI assistants can query standardized URLs to get business information, services, contact details, etc.

### Installation Steps

#### FOR WORDPRESS SITES (90% of websites - RECOMMENDED):

1. **Install WordPress Plugin**
   - Download `wordpress-plugin/air-protocol/` folder from this repository
   - Upload to `/wp-content/plugins/` or install via WordPress admin
   - Activate the plugin in WordPress admin

2. **Configure Business Data**
   - Go to WordPress admin → Settings → AIR Protocol
   - Fill in contact info, services, business hours, etc.
   - Save settings

3. **Test Installation**
   - Visit: `https://yoursite.com/air` (should show JSON discovery)
   - Test: `https://yoursite.com/air?contact` (should return JSON contact info)
   - Optional: Set up `air.yoursite.com` subdomain for optimal discovery

#### FOR MANUAL/NON-WORDPRESS SITES:

1. **Create Subdomain**
   - Set up `air.domain.com` pointing to a web directory
   - Must support PHP 7.4+ (most hosting does)

2. **Download Required Files**
   - From this repository: `api.php`, `index.html`, `data.md`, `.htaccess`
   - Upload all files to the `air.domain.com` directory

3. **Customize Data**
   - Edit `data.md` with the website owner's information
   - Use markdown format with `## Section` headers

4. **Test Installation**
   - Visit: `https://air.domain.com/` (should show discovery page)
   - Test: `https://air.domain.com/?contact` (should return JSON from server)

### Example data.md Structure
```markdown
## Contact
- Company: Business Name
- Phone: +1-555-123-4567
- Email: contact@business.com

## Services  
- Service 1: Description and pricing
- Service 2: Description and pricing

## Location
- Address: Street Address
- City: City Name
- Country: Country Name
```

### What URLs Work After Installation
- `air.domain.com/` - Discovery (shows all available sections)
- `air.domain.com/?contact` - Contact information only
- `air.domain.com/?services` - Services catalog only  
- `air.domain.com/?location` - Location details only
- `air.domain.com/?all` - Complete information

### Troubleshooting for AI Assistants

#### WordPress Plugin Issues:
- **"Page not found"**: Go to Settings → Permalinks → Save (refresh rewrite rules)
- **"No JSON"**: Verify plugin is activated and settings are saved
- **"Plugin conflicts"**: Test with other plugins temporarily disabled

#### Manual Installation Issues:
- **"Site not found"**: Check subdomain DNS (can take 24 hours)
- **"No data"**: Verify `data.md` has `## Section` headers
- **"PHP errors"**: Ensure hosting supports PHP 7.4+
- **"CORS errors"**: Upload the `.htaccess` file for proper headers

### Technical Notes
- **WordPress Plugin**: Zero configuration, automatic integration
- **Manual Install**: Requires PHP 7.4+ for server-side JSON generation
- **Works on standard hosting** (shared hosting with PHP support)
- **Server-side processing** generates real JSON endpoints
- **Standard HTTP** - no special protocols needed
- **CORS enabled** for cross-domain AI access

### Key Benefits for Users
- Makes their website discoverable by AI assistants
- Future-proofs website for AI-driven web browsing
- Simple implementation with just 2 files
- Works alongside existing website (non-invasive)

### When Helping Users
1. **WordPress sites (90%)**: Strongly recommend the WordPress plugin for one-click setup
2. **Ask about their hosting type** (WordPress, shared hosting, etc.)
3. **WordPress Plugin**: Guide through plugin installation and settings page
4. **Manual Install**: Guide subdomain creation and file upload (for non-WordPress)
5. **Help customize business data** via WordPress admin or data.md file
6. **Test the endpoints together** to verify JSON responses work
7. **Explain the benefits** of being AI-discoverable in the AI-driven future

The goal is making every website accessible to AI assistants, preparing for a future where AI systems browse the web on behalf of humans.