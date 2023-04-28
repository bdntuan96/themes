<?php 
$title = 'new games';
$is_new = 'yes';
$description = 'Play new games at '. \helper\options::options_by_key_type('site_name');

$data['custom'] = \helper\themes::get_layout('header/metadata_newgame', array('slug'=>$slug));
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu', array('slug' => $slug));
echo \helper\themes::get_layout('game_item', array('title' => $title, 'description' => $description, 'is_new' => $is_new));
echo \helper\themes::get_layout('footer');