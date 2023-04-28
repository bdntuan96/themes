<?php
$post = \helper\posts::find_by_slug($slug);
if (!$post) {
    load_response()->redirect('/');
}

$data['custom'] = \helper\themes::get_layout('header/metadata_game', array('post' => $post));

echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('post_play', array('post' => $post));
echo \helper\themes::get_layout('footer', array('game_lay' => 'game_play'));
