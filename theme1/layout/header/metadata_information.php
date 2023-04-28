<?php

$site_title = \helper\options::options_by_key_type('site_title');
switch ($slug) {
    case 'about-us':
        $title = 'About Us';
        break;
    case 'copyright-infringement-notice-procedure':
        $title = 'Copyright Infringement Notice Procedure';
        break;
    case 'contact-us':
        $title = 'Contact Us';
        break;
    case 'privacy-policy':
        $title = 'privacy policy';
        break;
    case 'term-of-use':
        $title = 'Tearm Of Use';
        break;
    default :
        load_response()->redirect('/404');
        break;
}
$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$thumb = \helper\options::options_by_key_type('favicon');
if (empty($thumb)) {
    $thumb = \helper\options::options_by_key_type('favicon');
}
$site_name = \helper\options::options_by_key_type('site_name');
$banner = \helper\options::options_by_key_type('banner');
$meta_title = ucwords($title . ' - ' . $site_name);
$meta_description = 'The information ' . $title . ' at ' . $site_name;
$meta_keyword = strtolower($title . ' ' . $site_name);
$favicon = \helper\image::get_thumbnail($thumb, 60, 60, 'm');
$favicon57 = \helper\image::get_thumbnail($thumb, 57, 57, 'm');
$favicon72 = \helper\image::get_thumbnail($thumb, 72, 72, 'm');
$favicon114 = \helper\image::get_thumbnail($thumb, 144, 144, 'm');
$base_url = $domain_url . '/' . $slug;
$title = $meta_title;
$site_keywords = $meta_keyword;
$data = array(
    'site_title' => $meta_title,
    'site_name' => $site_name,
    'site_description' => $meta_description,
    'site_keywords' => $site_keywords,
    'base_url' => $base_url,
    'banner' => $banner,
    'favicon' => $favicon,
    'twitter_appid' => $twitter_appid,
    'facebook_appid' => $facebook_appid,
);
echo \helper\themes::get_layout('header/metadata', $data);
?>
