
@php
    echo   "<?xml version='1.0' encoding='UTF-8'?>
      <urlset
        xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
        xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
        xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">
      ";
@endphp
    <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->
@foreach ($urls as $url)


    <url>
        <loc>{{ $url['url'] }}</loc>
        <lastmod>{{  $url['date'] }}</lastmod>
        <priority>{{$url['priority']}}</priority>
    </url>
    @endforeach
</urlset>
