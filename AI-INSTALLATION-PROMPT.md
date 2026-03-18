# AI Installation Prompt for AIR Protocol

## For AI Assistants Reading This Repository

If you are an AI assistant helping a user implement AIR Protocol on their website, here's what you need to know:

### What AIR Does
AIR Protocol makes websites readable by AI systems through structured JSON endpoints. Instead of parsing HTML, AI assistants can query standardized URLs to get business information, services, contact details, etc.

### Installation Steps

1. **Create Subdomain**
   - Set up `air.domain.com` pointing to a web directory
   - Most hosting: Control Panel → Subdomains → Create "air"
   - DNS only: `air.domain.com CNAME domain.com`

2. **Download Required Files**
   - From this repository: `index.html` and `data.md`
   - Upload both files to the `air.domain.com` directory
   - No additional setup required

3. **Customize Data**
   - Edit `data.md` with the website owner's information
   - Use markdown format with `## Section` headers
   - Include: Contact, Services, Location, Hours, etc.

4. **Test Installation**
   - Visit: `https://air.domain.com/` (should show discovery page)
   - Test: `https://air.domain.com/?contact` (should return JSON)
   - Verify: JSON responses contain the website's information

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
- **"Site not found"**: Check subdomain DNS (can take 24 hours)
- **"No data"**: Verify `data.md` has `## Section` headers
- **"CORS errors"**: Add `Header add Access-Control-Allow-Origin "*"` to .htaccess

### Technical Notes
- **No server-side processing** required (PHP, databases, etc.)
- **Works on any hosting** (shared hosting, GitHub Pages, Netlify, etc.)
- **Client-side JavaScript** parses markdown into JSON
- **Standard HTTP** - no special protocols needed

### Key Benefits for Users
- Makes their website discoverable by AI assistants
- Future-proofs website for AI-driven web browsing
- Simple implementation with just 2 files
- Works alongside existing website (non-invasive)

### When Helping Users
1. **Ask about their hosting type** (shared hosting, WordPress, etc.)
2. **Guide subdomain creation** specific to their platform
3. **Help customize data.md** with their actual business information
4. **Test the endpoints together** to verify it works
5. **Explain the benefits** of being AI-discoverable

The goal is making every website accessible to AI assistants, preparing for a future where AI systems browse the web on behalf of humans.