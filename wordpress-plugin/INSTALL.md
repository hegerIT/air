# WordPress AIR Protocol Plugin Installation

## Quick Install (Recommended)

1. **Download Plugin Folder**
   ```bash
   # Download the air-protocol folder
   # Upload to your WordPress plugins directory
   ```

2. **Upload to WordPress**
   - Via FTP: Upload `air-protocol` folder to `/wp-content/plugins/`
   - Via WordPress Admin: Zip the `air-protocol` folder, upload via Plugins → Add New → Upload

3. **Activate Plugin**
   - Go to WordPress Admin → Plugins
   - Find "AIR Protocol" and click Activate

4. **Configure Settings**
   - Go to Settings → AIR Protocol
   - Fill in your business information
   - Save settings

5. **Test Installation**
   - Visit `yoursite.com/air` (should show JSON response)
   - Use the built-in validator tool

## WordPress.org Submission (Coming Soon)

Once reviewed and approved, the plugin will be available directly from the WordPress plugin repository for one-click installation.

## Manual Configuration

### Permalink Requirements
- Pretty permalinks must be enabled (Settings → Permalinks → anything except "Plain")
- Most WordPress sites have this enabled by default

### Subdomain Setup (Recommended)
For optimal AI discovery, set up `air.yoursite.com`:

1. **DNS Configuration:**
   ```
   air.yoursite.com  CNAME  yoursite.com
   ```

2. **WordPress Configuration:**
   - No additional WordPress config needed
   - The plugin automatically handles subdomain requests

### Server Requirements
- PHP 7.4+
- WordPress 5.0+
- URL rewriting enabled (standard on most hosts)

## Troubleshooting

### "Page Not Found" for AIR endpoints
1. Check that pretty permalinks are enabled
2. Go to Settings → Permalinks → Save (refresh rewrite rules)
3. Ensure .htaccess is writable

### No JSON output
1. Check for plugin conflicts
2. Verify the plugin is activated
3. Check server error logs

### Subdomain not working
1. Verify DNS propagation (can take 24 hours)
2. Check that the subdomain points to the same server/directory
3. Test main domain endpoints first: `yoursite.com/air`

## Validation

After installation, test your AIR implementation:

1. **Discovery Endpoint:**
   ```
   curl https://yoursite.com/.well-known/air
   ```

2. **API Endpoint:**
   ```
   curl https://yoursite.com/air
   ```

3. **Specific Data:**
   ```
   curl https://yoursite.com/air?contact
   curl https://yoursite.com/air?services
   ```

4. **Use Built-in Validator:**
   Go to Settings → AIR Protocol and click "Test Your Implementation"

## Integration Notes

### WooCommerce Integration
- Automatically includes products as services
- Product names and prices appear in services section
- No additional configuration needed

### Custom Post Types
- "Services" post type automatically included
- Other post types can be added via filters (for developers)

### Existing SEO/Schema
- AIR Protocol is complementary to existing SEO
- Works alongside schema.org, JSON-LD, etc.
- Does not interfere with existing structured data

## Performance Notes

- JSON responses are lightweight (typically < 5KB)
- Responses can be cached by WordPress caching plugins
- No database queries for static configuration data
- CORS headers included for cross-domain requests

## Security

- Read-only endpoints (no write operations)
- No authentication required (public business data only)
- No sensitive WordPress data exposed
- Standard WordPress security practices apply

## Support

- **Documentation:** [GitHub Repository](https://github.com/hegerIT/air)
- **Live Demo:** [air.heger.it](https://air.heger.it)
- **Issues:** [GitHub Issues](https://github.com/hegerIT/air/issues)
- **Email:** support@heger.it (for installation help)

---

**Next Steps After Installation:**
1. Configure your business data in the admin panel
2. Test endpoints with the validator
3. Set up air.yoursite.com subdomain for optimal discovery
4. Monitor server logs for AI assistant requests
5. Keep business information updated as it changes