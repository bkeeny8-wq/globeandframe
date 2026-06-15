# Globe & Frame

Travel guides, itineraries, and photography from real experience.

- **Live site (current):** https://globeandframe.com/
- **Shop:** https://globeandframeco.etsy.com
- **Contact:** bkeeny8@gmail.com

## Local development

```bash
npm install
npm run dev
```

## Deploy to GitHub Pages

1. Create a new GitHub repo named `globeandframe`
2. Push this project to `main`:

```bash
cd ~/Projects/globeandframe
git add .
git commit -m "Initial Globe & Frame site"
git remote add origin git@github.com:YOUR_USERNAME/globeandframe.git
git push -u origin main
```

3. On GitHub, go to **Settings → Pages**
4. Under **Build and deployment**, set **Source** to **GitHub Actions**
5. The workflow deploys automatically on every push to `main`

### Custom domain

`public/CNAME` is already set to `globeandframe.com`. After the first deploy:

1. In **Settings → Pages → Custom domain**, enter `globeandframe.com`
2. Update DNS at your registrar:
   - `A` records → GitHub Pages IPs: `185.199.108.153`, `185.199.109.153`, `185.199.110.153`, `185.199.111.153`
   - Or `CNAME` for `www` → `YOUR_USERNAME.github.io`
3. Enable **Enforce HTTPS** once DNS propagates

You can keep WordPress live until DNS is switched over.


## Add new content

- **Articles:** `src/content/articles/your-slug.md`
- **Itineraries:** `src/content/itineraries/your-slug.md`
- **City guides:** `src/content/city-guides/your-slug.md`

Commit and push — the site rebuilds automatically.
