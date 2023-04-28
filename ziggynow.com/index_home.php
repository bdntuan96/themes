<?php
// biến trang chơi game_play.php của con game "minescraft-steve-adventures" thành trang chủ:
// 1. tạo cái trang này là index trang chủ mới(copy cái index trang chủ ra rồi sửa)
// 2. tạo thẻ slug bằng chính con game ấy > đặt biến $game = \helper\game::find_by_slug($slug); và if kiểm tra nó
// 3. xem lại "metadata_..." đúng là "metadata_home" chưa
// 4. thêm (richtext.php + richtext_home.php) vào file header
// 5. xóa phần if dòng 6-8: layout\header\richtext.php
// đổi tên trang chủ name thành site_name; tương tự vậy vơí description ->site_description
// dòng 13: $SoftwareApplication['name'] = $game->name;  ==>$SoftwareApplication['name'] = \helper\options::options_by_key_type('site_name');
// dòng 16: $SoftwareApplication['description'] = $game->excerpt;  ==>$SoftwareApplication['description'] = \helper\options::options_by_key_type('site_description'); 
// 6. truyền echo \helper\themes::get_layout('header/richtext', array('game' => $game)); //schema 
//   -> cho nó vào file game (index.php)
// 7. kiểm tra thẻ meta có đúng ko vào web:http://json.parser.online.fr/  xanh hết là đc
// 8. thay phần echo hiện ra trang chủ(product.php) thành phần chơi game(game_play.php) và truyền slug mới vs biến $game mơi khai báo ở trên
// 9. hiện echo thêm ở dưới get_layout echo \helper\themes::get_layout('header/richtext_home', array('game' => $game));
// giúp đảo lại biến $game nhân vào

$slug = "minescraft-steve-adventures";

//lấy link slug trong hàm find_by_slug
$game = \helper\game::find_by_slug($slug);

// in($game);die;
//nếu ko tồn tại game thì đáp ứng tải->Chuyển hướng /về trang chủ
if (!$game) {
    load_response()->redirect('/');
}
$title = $game->name;
$excerpt = $game->excerpt;
$data['custom'] = \helper\themes::get_layout('header/metadata_home', array('game' => $game));

echo \helper\themes::get_layout('header', $data);
//đường dẫn lấy ra hàm Nhận bố cục(ở file layout) lấy file.php)

echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('page-header', array('game' => $game, 'title' => $title, 'excerpt' => $excerpt));
echo \helper\themes::get_layout('game_play', array('game' => $game));
echo \helper\themes::get_layout('header/richtext_home', array('game' => $game));
echo \helper\themes::get_layout('footer');
