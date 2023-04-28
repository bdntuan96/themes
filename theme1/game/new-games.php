<!DOCTYPE html>
<?php
$custom = \helper\themes::get_layout('header/metadata_newgame');
$data['custom'] = $custom;
$title = 'new games';
$is_new = 'yes';
$description = "Play new games at " . \helper\options::options_by_key_type('site_name');
?>
<?php echo \helper\themes::get_layout('header', $data); ?>    
<?php echo \helper\themes::get_layout('menu'); ?>
<?php echo \helper\themes::get_layout('game_item', array('title' => $title, 'description' => $description, 'is_new' => $is_new)); ?>
<?php echo \helper\themes::get_layout('footer'); ?>
