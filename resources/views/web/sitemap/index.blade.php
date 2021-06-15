<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
            <loc>https://www.dessangepakistan.com/</loc> 
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
        <url>
            <loc>https://www.dessangepakistan.com/about</loc> 
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
        <url>
            <loc>https://www.dessangepakistan.com/deals</loc> 
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
        <url>
            <loc>https://www.dessangepakistan.com/lookbook</loc> 
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
        <url>
            <loc>https://www.dessangepakistan.com/contact</loc> 
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
        
    @foreach ($men_major_type as $men_major_type)
        <url>
            <loc>https://www.dessangepakistan.com/men/{{ $men_major_type->slug }}</loc> 
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach    
    @foreach ($women_major_type as $women_major_type)
        <url>
            <loc>https://www.dessangepakistan.com/women/{{ $women_major_type->slug }}</loc> 
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach 
    
    @foreach ($sub_type_women as $sub_type_women)
        <url>
            <loc>https://www.dessangepakistan.com/women-services/{{ $sub_type_women->slug }}</loc> 
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach 
  
     
</urlset>