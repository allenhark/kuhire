<?php
header("Content-type: text/xml");
echo'<?xml version="1.0" encoding="UTF-8" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>'.base_url().'</loc>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>'.base_url('join').'</loc>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>'.base_url('login').'</loc>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>'.base_url('rent').'</loc>
        <changefreq>always</changefreq>
        <priority>0.5</priority>
    </url>
    
    <url>
        <loc>'.base_url('about').'</loc>
        <changefreq>always</changefreq>
        <priority>0.5</priority>
    </url>
    
    <url>
        <loc>'.base_url('faq').'</loc>
        <changefreq>always</changefreq>
        <priority>0.5</priority>
    </url>
    
    <url>
        <loc>'.base_url('add').'</loc>
        <changefreq>monthly</changefreq>
        <priority>1</priority>
    </url>
    
    <url>
        <loc>'.base_url('contact-us').'</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>';
    ?>
    
    <?php foreach($links->result () as $url) { ?>

    <url>
        <loc><?php echo base_url($url->slug)?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>

    <?php } ?>
    
</urlset>