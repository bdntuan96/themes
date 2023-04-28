<?php
//thằng này nó lấy biến $slug trong db category = hàm lấy theo taxonomy = 'game' trong db
$category = \helper\category::find_category_by_slug($slug, 'game');
// in($category);
if (!$category) {
    load_response()->redirect('/');
}
$category_id = $category->id;

//lấy ra dữ liệu từ bảng: từ thư mục header/metadata_category.php và truyền ngược lại mảng 'category' => $category vào nó khi vừa khai báo ra ở đây
$data['custom'] = \helper\themes::get_layout('header/metadata_category', array('category' => $category));
echo \helper\themes::get_layout('header', $data);
// in($category);die;
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('page-header', array('title' => $category->name, 'excerpt' => $category->description));
echo \helper\themes::get_layout('product', array('is_title' => true, 'category_id' => $category_id, 'category' => $category, 'is_home'=> 'is_home'));
echo \helper\themes::get_layout('footer');

// in($games);