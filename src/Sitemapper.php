<?php

namespace Apertagraffa\Sitemapper;


/**
 * Class Sitemapper
 * @package Apertagraffa
 */
class Sitemapper implements SitemapperInterface
{
    /**
     * @var string
     */
    protected $header = '<?xml version="1.0" encoding="UTF-8"?>';

    /**
     * @var string
     */
    protected $open_urlset = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    /**
     * @var string
     */
    protected $end_urlset = '</urlset>';

    /**
     * @var string
     */
    protected $compositing = '';

    /**
     * @var bool
     */
    protected $save_to_disk = false;

    /**
     * Add a node in xml tree
     * @param $location
     * @param string $lastmod
     * @param string $changefreq
     * @param string $priority
     */
    public function addUrl($location, $lastmod = null, $changefreq = null, $priority = null) {
        $output = '<url>';
            $output .= '<loc>' . url($location) . '</loc>';
            if (!is_null($lastmod)) {
                $datetime = new \DateTime($lastmod);
                $output .= '<lastmod>' . $datetime->format('Y-m-d\TH:i:sP') . '</lastmod>';
            }
            if (!is_null($changefreq)) $output .= '<changefreq>' . $changefreq . '</changefreq>';
            if (!is_null($priority)) $output .= '<priority>' . $priority . '</priority>';
        $output .= '</url>';
        $this->compositing .= $output;
    }

    /**
     * Set saving to disk option
     * @param $boolean
     */
    public function setSaveToDisk($boolean) {
        $this->save_to_disk = $boolean;
    }

    /**
     * create the final xml tree
     * @return string
     */
    public function render() {
        if (is_file( public_path('sitemap.xml') )) {
            response()->file( public_path('sitemap.xml') );
        } else {
            $sitemap = $this->header;
            $sitemap .= $this->open_urlset;
            $sitemap .= $this->compositing;
            $sitemap .= $this->end_urlset;

            return $sitemap;
        }


    }

}
