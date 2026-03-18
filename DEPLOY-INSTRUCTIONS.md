# AIR Deployment Instructions

Simple deployment guide for the AIR protocol.

## Requirements

1. Web hosting with subdomain support
2. Subdomain configuration: `air.yourdomain.com`
3. Two files from this repository

## Files to Deploy

Upload these files to your `air.yourdomain.com` directory:

1. **`index.html`** - AIR protocol parser
2. **`data.md`** - Your business information in markdown format

No server-side processing required.

## Step 1: Configure Subdomain

### Standard Hosting Control Panel:
1. Access hosting control panel (cPanel, Plesk, etc.)
2. Navigate to **Subdomains**
3. Create `air` subdomain pointing to new directory
4. Result: `air.yourbusiness.com` → `/public_html/air/`

### DNS Configuration:
```
air.yourbusiness.com  CNAME  yourbusiness.com
```

## Step 2: Upload Files

### FTP/SFTP Upload:
```bash
scp index.html user@host.com:/path/to/air.yourbusiness.com/
scp data.md user@host.com:/path/to/air.yourbusiness.com/
```

### File Manager Upload:
1. Access hosting file manager
2. Navigate to air subdomain directory
3. Upload `index.html` and `data.md`

## Step 3: Configure Business Data

Edit `data.md` with your business information using the provided template structure:

```markdown
## Contact
- Company: Your Business Name
- Phone: +1-555-123-4567
- Email: contact@yourbusiness.com

## Services  
- Service 1: Description and pricing
- Service 2: Description and pricing

## Location
- Address: Street Address
- City: Your City
- Country: Your Country
```

## Step 4: Verification

Test the following endpoints:

- `https://air.yourbusiness.com/` (discovery)
- `https://air.yourbusiness.com/?contact` (contact information)
- `https://air.yourbusiness.com/?services` (service catalog)

Verify JSON responses contain your business data.

## Platform-Specific Instructions

### GitHub Pages:
1. Create repository: `air.yourbusiness.com`
2. Enable GitHub Pages in repository settings
3. Upload `index.html` and `data.md`
4. Configure custom domain: `air.yourbusiness.com`

### Netlify:
1. Deploy via drag-and-drop with the two files
2. Configure custom domain: `air.yourbusiness.com`

### Shared Hosting (cPanel):
1. Create `air` subdomain via Subdomains section
2. Upload files via File Manager
3. Verify subdomain accessibility

## Troubleshooting

### Domain Resolution Issues:
- Verify subdomain DNS configuration
- Allow 1-24 hours for DNS propagation
- Confirm subdomain points to correct directory

### File Access Problems:
- Verify file names: `index.html` and `data.md`
- Check file permissions (readable by web server)
- Confirm files are in subdomain root directory

### Data Format Issues:
- Verify `data.md` uses proper markdown syntax
- Ensure section headers use `## Format`
- Test locally by opening `index.html?contact` in browser

### CORS Configuration:
Most hosting platforms handle this automatically. If needed, add to `.htaccess`:
```apache
Header add Access-Control-Allow-Origin "*"
```

## Maintenance

### Data Updates:
1. Edit `data.md` locally or via repository
2. Upload updated file to server
3. Changes are effective immediately

### Monitoring:
- Monitor server logs for AIR endpoint requests
- Track usage patterns from AI systems
- Update data based on usage feedback

## Performance Considerations

- Total file size: < 50KB
- No database dependencies
- Client-side processing for optimal response time
- Standard HTTP caching applies

## Security Notes

- AIR endpoints serve public business information
- No authentication required for basic business data
- Private information should not be included in `data.md`
- Standard web security practices apply

---

For questions or issues, refer to the project documentation or submit an issue via the repository.