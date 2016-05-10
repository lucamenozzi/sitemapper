# Manual sitemap generator
> Laravel 5.2 Package to generate hand-write sitemap (only for small websites)

## Synopsis
Sitemapper create a static sitemap in real time when requested via /sitemap.xml URI.  

Obviously, this package is for small website only: if you have 100 pages this strategy is wrong.  
But for your personal website or for your blog, maybe you could give it a chance.


## Installation
- add "apertagraffa/sitemapper": "*" to your composer.json
- create a get route to sitemap.xml: you can both use a callback in the route, but the best approach is to connect a controller method (to SitemapController, perhaps). 

## API Reference
You have only two methods, you can't make a mistake :)
- **$sitemap->addUrl($location, $lastmod = null, $changefreq = null, $priority = null)** : add a node to xml sitemap tree. **$location** is the static url, other parameters are optional;
- **$sitemap->render()**: create the final sitemap tree.

You can then 
```return response($sitemap->render(), 200)
               ->header('Content-Type', 'text/xml');```

That's all folks!