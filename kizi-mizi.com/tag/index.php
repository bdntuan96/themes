<?php
$tag = \helper\tag::find_tag_by_slug($slug, 'game');
if (!$tag) {
    load_response()->redirect('/');
}
$tag_ids = $tag->id;

$data['custom'] = \helper\themes::get_layout('header/metadata_tag', array('tag' => $tag));
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu', array('tag_ids' => $tag_ids, 'tag' => $tag, 'slug'=>$slug));
echo \helper\themes::get_layout('game_item', array('tag_ids' => $tag_ids, 'tag' => $tag, 'slug'=>$slug, 'is_home2'=>true));
echo \helper\themes::get_layout('footer');
