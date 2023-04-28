<?php
$game = \helper\game::find_by_slug($slug);

// in($game);die;
if (!$game) {
    load_response()->redirect('/');
}

// $title = $game->name;
// $excerpt = $game->excerpt;

$data['custom'] = \helper\themes::get_layout('header/metadata_game', array('game' => $game));

echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_play', array('game' => $game));
echo \helper\themes::get_layout('header/richtext', array('game' => $game)); //schema
echo \helper\themes::get_layout('footer');
