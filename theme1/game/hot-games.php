<?php

$custom = \helper\themes::get_layout('/header/metadata_hotgame');
$data['custom'] = $custom;
$title = 'Hot Games';
$is_hot = 'yes';
$description = "Play hot games at " . \helper\options::options_by_key_type('site_name');
?>
<?php echo \helper\themes::get_layout('header', $data); ?>    
<?php echo \helper\themes::get_layout('menu'); ?>
<?php echo \helper\themes::get_layout('game_item', array('title' => $title, 'is_hot' => $is_hot, 'description' => $description)); ?>
<?php echo \helper\themes::get_layout('footer'); ?>
