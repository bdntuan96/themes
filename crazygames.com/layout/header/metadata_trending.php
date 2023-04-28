<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
// $url = load_url()->current_url(); đang lỗi bỏ đi
// url ko được viết hoa 
$url = $domain_url . '/trending';

$thumb = \helper\options::options_by_key_type('favicon');
$title = "Trending Game";
$site_name = \helper\options::options_by_key_type('site_name');
$banner = \helper\options::options_by_key_type('banner');
$meta_description = "ALl Trending Game at " . $site_name;
$site_keywords = strtolower('Trending Game, free Trending Game');
$favicon = \helper\image::get_thumbnail($thumb, 60, 60, 'm');
$favicon57 = \helper\image::get_thumbnail($thumb, 57, 57, 'm');
$favicon72 = \helper\image::get_thumbnail($thumb, 72, 72, 'm');
$favicon114 = \helper\image::get_thumbnail($thumb, 144, 144, 'm');
$data = array(
    'site_title' => $title,
    'site_name' => $site_name,
    'site_description' => $meta_description,
    'site_keywords' => $site_keywords,
    'base_url' => $url,
    'banner' => $banner,
    'favicon' => $favicon,
    'favicon57' => $favicon57,
    'favicon72' => $favicon72,
    'favicon114' => $favicon114
);
echo \helper\themes::get_layout('header/metadata', $data);
