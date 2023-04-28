<?php
//lay het game ra nay
$limit = 20;
// $limit = 5;
$random = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
// in($random);die;
$ran = rand(0, $limit-1);
$item = $random[$ran];
// in($item);
// die;
$slug = header("Location: /$item->slug");
exit;

$game = \helper\game::find_by_slug($slug);
if (!$game) {
    load_response()->redirect('/');
}

$data['custom'] = \helper\themes::get_layout('header/metadata_game', array('game' => $game));
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_play', array('game' => $game));
echo \helper\themes::get_layout('footer');
