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
// $limit = $_POST['title'];
// $limit = $_POST['is_home'];


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

// var_dump($games);
// $html = \helper\themes::get_layout('game_item', array('games' => $games, 'paging_content' => $paging_content, 'title'=>$title, 'is_home'=>$is_home));
$html = \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'paging_content' => $paging_content, 'title'=>$title, 'is_home'=>$is_home));
echo $html;
