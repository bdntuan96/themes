<?php
$keywords = trim(strtolower(str_replace('+', ' ', load_request()->request('q'))));
if (!$keywords) {
    load_response()->redirect('/');
}
$custom = \helper\themes::get_layout('/header/metadata_search', array('keywords' => $keywords));
$data['custom'] = $custom;
$enable_ads = \helper\game::get_ads_control();
$title = "Search Results";
$description = 'Searchs result with keywords: ' . '<b>' . $keywords . '</b>';
echo \helper\themes::get_header($data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_item', array('keywords' => $keywords, 'title' => $title, 'description' => $description));
echo \helper\themes::get_layout('footer');
?>
