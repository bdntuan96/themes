<?php
$page = $_POST['p'];
$keywords = $_POST['keywords'];
$field_order = $_POST['field_order'];
$order_type = $_POST['order_type'];
$category_id = $_POST['category_id'];
$is_hot = $_POST['is_hot'];
$is_new = $_POST['is_new'];
$tags_id = $_POST['tags_id'];
$limit = $_POST['limit'];


$display = 'yes';

if (!$field_order) {
    $field_order = 'publish_date';
}

//=>$paging_content > pagination.php
$num_links = 3;


if ($tags_id) {
    $games = \helper\game::paging_by_tag($tags_id, $page, $limit, $order_by, $order_type, $not_equal);
    $count = \helper\game::count_by_tag($tags_id);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
} else {
    //get all in $games based $category_id
    $games  = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
    $count = \helper\game::get_count($keywords, $type, $display, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
}

// đặt cả phần html 'game_item_ajax' này vào biến => để tí cho nó vào mảng nhỏ của $data
$html = \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'paging_content' => $paging_content));

// đặt cả phần html 'pagination' này vào biến => để tí cho nó vào mảng nhỏ của  $data
$pagination = \helper\themes::get_layout('pagination', array('games' => $games, 'paging_content' => $paging_content));


$data['html'] = $html;
$data['pagination'] = $pagination;

// để gủi được mảng $data sang js ta phải json nó lại mới gửi được đi(sang bên js lại parse nó ra vs: let data = JSON.parse(response);)
echo json_encode($data);
