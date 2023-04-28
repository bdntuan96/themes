<?php
$slug = "rocket-clash-3d";
$game = \helper\game::find_by_slug($slug);
if (!$game) {
    load_response()->redirect('/');
}

//$custom = \helper\themes::get_layout('header/metadata_home');
//echo \helper\themes::get_layout('header', array('custom' => $custom)); c1~c2 down
$data['custom'] = \helper\themes::get_layout('header/metadata_home');

echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_play', array('game' => $game));
echo \helper\themes::get_layout('header/richtext_home', array('game' => $game));
echo \helper\themes::get_layout('footer');
