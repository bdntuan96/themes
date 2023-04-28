<?php

$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$thumb = $tag->image;
if (!$tag->image) {
    $thumb = \helper\options::options_by_key_type('favicon');
} else {
    $thumb = $tag->image;
}
$metadata = $tag->metadata;
$meta_description = $tag->description;
if ($meta_description == null || $meta_description == '') {
    $meta_description = 'Search results by: '. $tag->name;
    
}

$meta_keyword = strtolower($tag->name);
$url = $domain_url . '/tag/' . $tag->slug;
$meta_title = ucwords($tag->name);
$title = $meta_title . " - " . \helper\options::options_by_key_type('site_name');
$favicon = \helper\image::get_thumbnail($thumb, 60, 60, 'm');
$favicon57 = \helper\image::get_thumbnail($thumb, 57, 57, 'm');
$favicon72 = \helper\image::get_thumbnail($thumb, 72, 72, 'm');
$favicon114 = \helper\image::get_thumbnail($thumb, 114, 114, 'm');

$data = array(
    'site_title' => $title,
    'site_name' => $title,
    'site_description' => $meta_description,
    'site_keywords' => $meta_keyword,
    'base_url' => $url,
    'banner' => $banner,
    'favicon' => $favicon,
    'favicon57' => $favicon57,
    'favicon72' => $favicon72,
    'favicon114' => $favicon114
);
echo \helper\themes::get_layout('header/metadata', $data);
?>
