# How to Deploy AIR to air.heger.it

Quick instructions for deploying the AIR server to the live domain.

## Files to Upload

Upload these files to `/var/www/air.heger.it/`:

1. **index.php** - Rename `air-server.php` to `index.php`
2. **business-data.json** - The business data file
3. **.htaccess** - Apache configuration (optional, for clean URLs)

## Step by Step

### 1. Connect to Server
```bash
ssh user@s100.heger.it
```

### 2. Navigate to Directory
```bash
cd /var/www/air.heger.it/
```

### 3. Backup Existing Files
```bash
mv index.html index.html.backup
```

### 4. Upload Files
Copy the content from these files:
- `air-server.php` → `/var/www/air.heger.it/index.php`
- `business-data.json` → `/var/www/air.heger.it/business-data.json`

### 5. Set Permissions
```bash
chmod 644 index.php business-data.json
chown www-data:www-data index.php business-data.json
```

### 6. Test the Deployment
```bash
# Test locally on server
curl "https://air.heger.it/"
curl "https://air.heger.it/?contact"
curl "https://air.heger.it/?services"
```

## Expected Results

### Discovery Endpoint
`https://air.heger.it/` should return:
```json
{
  "air_version": "0.1.0",
  "name": "heger.IT GmbH",
  "type": "IT-Dienstleister",
  ...
}
```

### Contact Endpoint  
`https://air.heger.it/?contact` should return contact information.

### Services Endpoint
`https://air.heger.it/?services` should return all services.
`https://air.heger.it/?services=tomedo` should return filtered services.

## Troubleshooting

### Common Issues

**500 Internal Server Error:**
- Check file permissions
- Verify PHP syntax: `php -l index.php`
- Check error logs: `tail -f /var/log/apache2/error.log`

**JSON Not Loading:**
- Verify business-data.json exists
- Check file permissions  
- Validate JSON syntax: `cat business-data.json | python -m json.tool`

**CORS Issues:**
- Headers are included in PHP script
- Should work automatically

### Error Logs
```bash
# Apache error log
tail -f /var/log/apache2/error.log

# PHP error log (if configured)
tail -f /var/log/php_errors.log
```

## Optional: Clean URLs

Create `.htaccess` file for prettier URLs:
```apache
RewriteEngine On
RewriteRule ^([^?]*)\?(.*)$ index.php?$2 [L,QSA]
```

This allows:
- `air.heger.it/contact` instead of `air.heger.it/?contact`
- `air.heger.it/services` instead of `air.heger.it/?services`

## Testing Different Clients

### Browser
Visit in browser to see JSON responses:
- https://air.heger.it/
- https://air.heger.it/?contact

### cURL
```bash
curl -H "Accept: application/json" "https://air.heger.it/"
```

### AI Testing
Test with ChatGPT/Claude:
"What services does heger.IT offer? Check air.heger.it"

## Monitoring

### Basic Health Check
```bash
# Should return 200 OK
curl -I "https://air.heger.it/"

# Should contain AIR-Version header
curl -I "https://air.heger.it/" | grep AIR-Version
```

### Performance
- Responses should be < 100ms
- JSON should be properly cached (1 hour)
- GZIP compression should be enabled

## Updating Business Data

To update information:

1. **Edit business-data.json** locally
2. **Test changes** with local PHP server
3. **Upload updated file** to server
4. **Test live endpoint**
5. **Update last_updated timestamp**

The API will automatically reflect changes without downtime.

---

**After deployment, AIR will be live and ready for AI consumption!**