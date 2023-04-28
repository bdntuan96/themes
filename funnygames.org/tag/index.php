<?php
$tag = \helper\tag::find_tag_by_slug($slug, 'game');
if (!$tag) {
    load_response()->redirect('/');
}
$tags_id = $tag->id;

$data['custom'] = \helper\themes::get_layout('header/metadata_tag', array('tag' => $tag));
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu', array('tags_id' => $tags_id, 'tag' => $tag, 'slug'=>$slug));
// echo \helper\themes::get_layout('game_item');
// echo \helper\themes::get_layout('footer');
