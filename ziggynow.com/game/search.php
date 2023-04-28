<?php
if (isset($_REQUEST['q'])) {
    $keywords = $_REQUEST['q'];
}
if (!$keywords) {
    load_response()->redirect('/');
}
$title = "Search Results";
$excerpt = "Search results with keywords: " . $keywords;


$data['custom'] = \helper\themes::get_layout('header/metadata_search', array('keywords' => $keywords));
echo \helper\themes::get_layout('header', $data);

echo \helper\themes::get_layout('menu', array('keywords'=> $keywords));
echo \helper\themes::get_layout('page-header', array('title' => $title, 'excerpt' => $excerpt));
echo \helper\themes::get_layout('product', array('is_title' => true, 'keywords' => $keywords));
echo \helper\themes::get_layout('footer');
