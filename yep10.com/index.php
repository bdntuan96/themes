<?php
//graft metadata
// $custom = \helper\themes::get_layout('header/metadata_home');
// echo \helper\themes::get_layout('header', array('custom' => $custom)); c1~c2 down
$data['custom'] = \helper\themes::get_layout('header/metadata_home');
echo \helper\themes::get_layout('header', $data);
//echo \helper\themes::get_header($data); c2

echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('product');
echo \helper\themes::get_layout('slogan');
echo \helper\themes::get_layout('footer');
