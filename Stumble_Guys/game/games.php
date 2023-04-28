<?php
$field_order = "views";
$data['custom'] = \helper\themes::get_layout('header/metadata_games');
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('product', array('field_order' => $field_order));
echo \helper\themes::get_layout('footer');
