<?php 
$data['custom'] = \helper\themes::get_layout('header/metadata_hotgame');
$title = 'Hot games';
$is_hot = 'yes';
$description = 'Play hot games at '. \helper\options::options_by_key_type('site_name');

echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_item', array('title' => $title, 'description' => $description, 'is_hot' => $is_hot));
echo \helper\themes::get_layout('footer');