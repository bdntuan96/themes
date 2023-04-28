<?php

$page = load_request()->request('page');

if ($page == null) {
    $page = 1;
}
$display = 'yes';
$num_links = 3;
$limit = load_request()->post_value('limit');
if (!$limit) {
    $limit = 24;
}
$category_id = load_request()->post_value('category_id');
$keywords = load_request()->post_value('keywords');
if (!$keywords) {
    $keywords = null;
}
$field_order = load_request()->post_value('field_order');
if (!$field_order) {
    $field_order = "publish_date";
}
$order_type = load_request()->post_value('order_type');
if (!$order_type) {
    $order_type = "DESC";
}
$tags_id = load_request()->post_value('tags_id');
$is_hot = load_request()->post_value('is_hot');
if (!$is_hot) {
    $is_hot = null;
}
$is_new = load_request()->post_value('is_new');
if (!$is_new) {
    $is_new = null;
}

if ($tags_id) {
    $games = \helper\game::paging_by_tag($tags_id, $page, $limit);
    $count = \helper\game::count_by_tag($tags_id);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
} else {
    $games = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id);
    $count = \helper\game::get_count($keywords, $type, $display, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
}
if (count($games)) {
    echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'paging_content' => $paging_content));
} else {
    echo '<div class="search_found"><p>Sorry could not find any games!</p></div>';
}


