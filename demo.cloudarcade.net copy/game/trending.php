<?php 
$title = 'Trending Game';
$description = 'Play Trending Game at '. \helper\options::options_by_key_type('site_name');

$data['custom'] = \helper\themes::get_layout('header/metadata_trending', array('slug'=>$slug));
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu', array('slug'=>$slug));
echo \helper\themes::get_layout('game_item', array('title' => $title, 'description' => $description));
echo \helper\themes::get_layout('footer');