<?php

$category = \helper\category::find_category_by_slug($slug, 'game');
$category_id = $category->id;
$title = $category->name;
if ($category == null) {
    load_session()->set('error-refe', load_url()->current_url());
    load_response()->redirect('/error-404');
}
$enable_ads = \helper\game::get_ads_control();
$custom = \helper\themes::get_layout('header/metadata_category', array('category' => $category));
$data['custom'] = $custom;
echo \helper\themes::get_header($data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_item', array('category_id' => $category_id, 'title' => $title, 'description' => $category->description, 'category' => $category));
echo \helper\themes::get_layout('footer');
?>   
