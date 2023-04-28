<?php
//
//lấy link slug trong hàm find_by_slug
$game = \helper\game::find_by_slug($slug);

// in($game);die;
//nếu ko tồn tại game thì đáp ứng tải->Chuyển hướng /về trang chủ
if (!$game) {
    load_response()->redirect('/');
}
$title = $game->name;
$excerpt = $game->excerpt;
$data['custom'] = \helper\themes::get_layout('header/metadata_game', array('game' => $game));

echo \helper\themes::get_layout('header', $data);
//đường dẫn lấy ra hàm Nhận bố cục(ở file layout) lấy file.php)

echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('page-header', array('game' => $game, 'title' => $title, 'excerpt' => $excerpt));

echo \helper\themes::get_layout('game_play', array('game' => $game));
echo \helper\themes::get_layout('header/richtext', array('game' => $game)); //schema
echo \helper\themes::get_layout('footer');
