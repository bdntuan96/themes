<?php
$category = \helper\category::find_category_by_slug($slug, 'game');
if (!$category) {
    load_response()->redirect('/');
}
$category_id = $category->id;

// in($slug);die;
// in ($category);
//$category send array => header/metadata_category.php 
$data['custom'] = \helper\themes::get_layout('header/metadata_category', array('category' => $category));
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_item', array('category_id' => $category_id, 'category' => $category, 'slug'=>$slug, 'is_home'=>false));
echo \helper\themes::get_layout('footer');