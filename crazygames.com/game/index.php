<?php
$game = \helper\game::find_by_slug($slug);
if (!$game) {
    load_response()->redirect('/');
}

$data['custom'] = \helper\themes::get_layout('header/metadata_game', array('game' => $game));

echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu', array('slug'=> $slug));
echo \helper\themes::get_layout('game_play', array('game' => $game));
echo \helper\themes::get_layout('header/richtext', array('game' => $game)); //schema
echo \helper\themes::get_layout('footer');
