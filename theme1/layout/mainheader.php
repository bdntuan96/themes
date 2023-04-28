<?php

$url = \helper\options::options_by_key_type('base_url');
$title = \helper\options::options_by_key_type('site_title');
$description = \helper\options::options_by_key_type('site_description');
$keywords = \helper\options::options_by_key_type('site_keywords');
$icon = $url . \helper\options::options_by_key_type('favicon');
$favicon57 = $url . \helper\image::get_thumbnail($icon, 57, 57, 'm');
$favicon72 = $url . \helper\image::get_thumbnail($icon, 72, 72, 'm');
$favicon144 = $url . \helper\image::get_thumbnail($icon, 144, 144, 'm');
$thumbfacebook = $url . \helper\options::options_by_key_type('logo');
$titlefacebook = $title;
$urlfacebook = $url;
$data = array(
    'title' => $title,
    'description' => $description,
    'keywords' => $keywords,
    'icon' => $icon,
    'thumbfacebook' => $thumbfacebook,
    'titlefacebook' => $titlefacebook,
    'urlfacebook' => $urlfacebook,
    'favicon57' => $favicon57,
    'favicon72' => $favicon72,
    'favicon144' => $favicon144
);

echo \helper\themes::get_layout('metadata', $data);
?>