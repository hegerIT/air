# AIR Deployment - Super Simple Setup

> **Deploy AIR in 10 minutes to any web hosting**

## What You Need

1. **Web hosting** with subdomain support
2. **`air.yourdomain.com`** subdomain pointing to your hosting  
3. **2 files** from this repository

## Files to Deploy

Copy exactly these 2 files to your `air.yourdomain.com` directory:

1. **`index.html`** - The AIR parser (handles all requests)
2. **`data.md`** - Your business data (markdown format)

**That's it. No PHP, no database, no complex setup.**

---

## Step 1: Create Subdomain

### Most Hosting Providers:
1. Login to hosting control panel (cPanel, Plesk, etc.)
2. Go to **Subdomains** 
3. Create **`air`** subdomain pointing to new folder
4. Example: `air.yourbusiness.com` → `/public_html/air/`

### DNS Only Setup:
If you control DNS directly:
```
air.yourbusiness.com  CNAME  yourbusiness.com
```

---

## Step 2: Upload Files

### Via FTP/SFTP:
```bash
# Upload to your air subdomain folder
scp index.html user@yourhost.com:/path/to/air.yourbusiness.com/
scp data.md user@yourhost.com:/path/to/air.yourbusiness.com/
```

### Via Hosting File Manager:
1. Open file manager in hosting control panel
2. Navigate to air subdomain folder  
3. Upload `index.html` and `data.md`
4. Done!

### Via Git (Advanced):
```bash
git clone https://github.com/hegerIT/air.git
cp air/index.html /path/to/air.yourbusiness.com/
cp air/data.md /path/to/air.yourbusiness.com/
```

---

## Step 3: Customize Your Data

Edit **`data.md`** with your business information:

```markdown
# Your Business Name

## Kontakt
- **Telefon:** +49 XXX XXXXX
- **Email:** info@yourbusiness.com

## Services  
### Main Service
- **Price:** €100/hour
- **Description:** What you do
- **Availability:** Mon-Fri 9-17
```

**Use the same `## Section` format as the heger.IT example.**

---

## Step 4: Test Your AIR

### Quick Tests:
```bash
# Discovery
curl https://air.yourbusiness.com/

# Contact
curl https://air.yourbusiness.com/?contact

# Services  
curl https://air.yourbusiness.com/?services
```

### Browser Test:
Visit in browser:
- `https://air.yourbusiness.com/` 
- `https://air.yourbusiness.com/?contact`

You should see JSON responses with your business data.

---

## Step 5: AI Test

Ask ChatGPT, Claude, or Siri:
> "What services does [Your Business] offer? Check air.yourbusiness.com"

**If AI can read your data → YOU'RE IN THE AI ECONOMY! 🚀**

---

## Common Hosting Platforms

### Shared Hosting (cPanel):
1. **Subdomain** → Create `air` subdomain
2. **File Manager** → Upload 2 files  
3. **Done** ✅

### GitHub Pages:
1. **Repository** → Create `air.yourbusiness.com` repo
2. **Settings** → Enable GitHub Pages
3. **Upload** → `index.html` + `data.md`  
4. **Custom Domain** → Point `air.yourbusiness.com`

### Netlify:
1. **Deploy** → Drag & drop folder with 2 files
2. **Domain** → Add `air.yourbusiness.com` 
3. **Done** ✅

### Vercel:
```bash
npm i -g vercel
vercel --name air-yourbusiness
vercel --domains air.yourbusiness.com
```

---

## Troubleshooting

### ❌ "Site not found"
- Check subdomain DNS (can take 1-24 hours)
- Verify subdomain points to correct folder
- Check file names are exactly `index.html` and `data.md`

### ❌ "No data returned" 
- Verify `data.md` has `## Section` headers
- Check markdown syntax (no broken formatting)
- Test locally: open `index.html?contact` in browser

### ❌ "CORS errors"
- Most hosting works automatically
- If problems: add this to `.htaccess`:
  ```apache
  Header add Access-Control-Allow-Origin "*"
  ```

### ❌ "AI can't read my site"
- Test manually with `curl` first
- Verify JSON output format
- Check that `air.*` subdomain is live

---

## Performance Tips

### Fast Loading:
- ✅ Files are already optimized (< 50KB total)
- ✅ No database queries  
- ✅ Client-side parsing = instant responses

### SEO (Optional):
Add to `index.html` `<head>`:
```html
<meta name="description" content="AI-readable business data">
<meta name="robots" content="noindex,follow">
```

### Analytics (Optional):
Add Google Analytics to track AI usage:
```html
<!-- Standard GA code in <head> -->
```

---

## Updating Your Data

### Method 1: Direct Edit
1. Edit `data.md` locally
2. Upload to server  
3. Changes live immediately

### Method 2: Git Workflow  
1. Edit in GitHub repository
2. Pull changes to server
3. Or use automatic deployment hooks

### Method 3: CMS Integration
*(Coming soon: WordPress plugin, etc.)*

---

## What's Next?

1. **⭐ Star this repository** - Show support!
2. **Share your AIR URL** - Tell AI community  
3. **Join the ecosystem** - Help define the standard
4. **Monitor usage** - Track AI assistant requests

---

**🎉 CONGRATULATIONS!**

Your business is now discoverable by AI assistants worldwide.

Welcome to the AI economy! 🚀

---

*Need help? Open an [issue](https://github.com/hegerIT/air/issues) or contact via air.heger.it*