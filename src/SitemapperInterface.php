<?php
/**
 * Created by apertagraffa
 * for project Package_Development
 * Date: 10/05/16
 * Time: 12:30
 */
namespace Apertagraffa\Sitemapper;


/**
 * Class Sitemapper
 * @package Apertagraffa
 */
interface SitemapperInterface
{
    /**
     * Add a node in xml tree
     * @param $location
     * @param string $lastmod
     * @param string $changefreq
     * @param string $priority
     */
    public function addUrl($location, $lastmod = null, $changefreq = null, $priority = null);

    /**
     * Set saving to disk option
     * @param $boolean
     */
    public function setSaveToDisk($boolean);

    /**
     * create the final xml tree
     * @return string
     */
    public function render();
}