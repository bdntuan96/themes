<?php
//
$category = \helper\category::find_category_by_slug($slug, 'game');

// in($category);
if (!$category) {
    load_response()->redirect('/');
}
$category_id = $category->id;


$data['custom'] = \helper\themes::get_layout('header/metadata_category', array('category' => $category));
// echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_header($data);
// in($category);die;
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('product', array('category_id' => $category_id, 'category' => $category));
echo \helper\themes::get_layout('slogan');
echo \helper\themes::get_layout('footer');

// in($games);