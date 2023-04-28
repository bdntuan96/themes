<?php
/*Gọi ra 1 trang có những cột trong bảng db
(xem hàm get_paging ở dưới để biết có những gì):
- giới hạn =5 con
- kiểu hiển thị phải =có
- chọn theo thứ tự views
- chọn theo kiểu = giảm dần*/
$page = 1;
$limit = 5;
$display = 'yes';
$field_order = "views";
$order_type = "DESC"; //ASC
//gọi hàm lấy trang của game có các biến 
$games_home = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);


//ghép metadata
// $custom = \helper\themes::get_layout('header/metadata_home');
// echo \helper\themes::get_layout('header', array('custom' => $custom)); c1~c2 bên dưới
$data['custom'] = \helper\themes::get_layout('header/metadata_home');
echo \helper\themes::get_layout('header', $data);

echo \helper\themes::get_layout('menu');

//cho hiển thị ra file main.php: gán giá trị biến $games_home khai báo ở trên vào mảng vs key=games_home
//sang bên file main.php chỉ cần gọi biến $games_home(nó mới hiểu) và lấy đc các giá trị ra
echo \helper\themes::get_layout('main', array('games_home' => $games_home));
echo \helper\themes::get_layout('product', array('is_home'=> 'is_home'));
echo \helper\themes::get_layout('slogan');
echo \helper\themes::get_layout('footer');

//Moc site_description thay cho cai banner
//Tao them lop mau den de` len anh cho hien chu ro hon
//Va hien thi noi dung $slogan vao trang chu neu co. ( neu ko nho thi xem lai trang slug game/index.php )
// sua lai full rate
//Code them Breadcrumb navigation
//Nhap vao link o anh product
//comment lại bằng TA
