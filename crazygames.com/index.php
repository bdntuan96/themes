<?php
$slogan = \helper\options::options_by_key_type('company_slogan', 'company');
$title = \helper\options::options_by_key_type('site_name');
$description = \helper\options::options_by_key_type('site_description');

$data['custom'] = \helper\themes::get_layout('header/metadata_home');
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu', array('slug' => "/"));
echo \helper\themes::get_layout('game_item', array('slogan' => $slogan, 'title'=>$title, 'description'=>$description, 'is_home' => true));
echo \helper\themes::get_layout('footer');
