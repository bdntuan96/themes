<?php
$slug = \helper\options::options_by_key_type('slug_home');
$game = \helper\game::find_by_slug($slug);
if ($game == null) {
    load_response()->redirect('/');
}
$enable_ads = \helper\game::get_ads_control();
$domain_url = \helper\options::options_by_key_type('base_url');
$custom = \helper\themes::get_layout('header/metadata_game', array('game' => $game));
$data['custom'] = $custom;
?>
<?php

echo \helper\themes::get_header($data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_play', array('game' => $game, 'enable_ads' => $enable_ads));
echo \helper\themes::get_layout('header/richtext', array('game' => $game));
echo \helper\themes::get_layout('footer');
?>   
