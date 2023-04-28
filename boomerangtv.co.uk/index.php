<?php
$slogan = \helper\options::options_by_key_type('company_slogan', 'company');

$data['custom'] = \helper\themes::get_layout('header/metadata_home');
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu', array('is_home' => 'bg-select fix'));
echo \helper\themes::get_layout('game_item', array('slogan' => $slogan, 'is_home' => true));
echo \helper\themes::get_layout('footer');
