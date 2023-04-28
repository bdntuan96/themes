<?php 
$category = \helper\category::find_category_by_slug($slug,'posts');
if(!$category) {
    load_response()->redirect('/');
}
$category_id = $category->id;
$data['custom']=\helper\themes::get_layout('header/metadata_category',array('category'=>$category));
echo \helper\themes::get_layout('header',$data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('post_item', array('category' => $category, 'category_id' => $category_id, 'slug' => $lug));
echo \helper\themes::get_layout('footer');

