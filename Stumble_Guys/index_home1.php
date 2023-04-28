<?php 
//$custom = \helper\themes::get_layout('header/metadata_home');
//echo \helper\themes::get_layout('header', array('custom' => $custom)); c1~c2 down
$data['custom'] = \helper\themes::get_layout('header/metadata_home');

echo \helper\themes::get_layout('header',$data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('product');
// echo \helper\themes::get_layout('game_play');
echo \helper\themes::get_layout('footer');
