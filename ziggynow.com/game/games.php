<?php
$field_order = "views";
//đường dẫn lấy ra hàm Nhận bố cục(ở file layout) lấy file.php)
$data['custom'] = \helper\themes::get_layout('header/metadata_games');
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('page-header', array('title' => "Games", 'excerpt' => 'All games at ' . \helper\options::options_by_key_type('site_name')));

//truyền $field_order sang product sử lí 
echo \helper\themes::get_layout('product', array('is_title' => true, 'field_order' => $field_order));
echo \helper\themes::get_layout('footer');
