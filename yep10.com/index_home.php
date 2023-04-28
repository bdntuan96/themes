<?php
$slug = "minescraft-steve-adventures";

//get link slug in function: find_by_slug
$game = \helper\game::find_by_slug($slug);

// in($game);die;
if (!$game) {
    load_response()->redirect('/');
}

$data['custom'] = \helper\themes::get_layout('header/metadata_home', array('game' => $game));
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_play', array('game' => $game));
echo \helper\themes::get_layout('header/richtext_home', array('game' => $game));
echo \helper\themes::get_layout('footer');
