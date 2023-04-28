<?php

//get slug table tag
$tag = \helper\tag::find_tag_by_slug($slug, 'game');
// in($tag);
// die;

if (!$tag) {
    load_response()->redirect('/');
}
$tags_id = $tag->id;
$games = \helper\game::paging_by_tag($tags_id, $page, $limit, $order_by, $order_type, $not_equal);

$data['custom'] = \helper\themes::get_layout('header/metadata_tag', array('tag' => $tag));
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('product', array('tags_id' => $tags_id, 'tag' => $tag));
echo \helper\themes::get_layout('slogan');
echo \helper\themes::get_layout('footer'); 
// in($games);die;