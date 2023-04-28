<?php
$page = $_POST['p'];
$keywords = $_POST['keywords'];
$order_by = $_POST['order_by'];
$order_type = $_POST['order_type'];
$category_id = $_POST['category_id'];
$is_hot = $_POST['is_hot'];
$is_new = $_POST['is_new'];
$tags_id = $_POST['tags_id'];
$limit = $_POST['limit'];
// $limit = $_POST['title'];
// $limit = $_POST['is_home'];


$display = 'yes';

if (!$order_by) {
    $order_by = 'publish_date';
}

//=>$paging_content > pagination.php

if ($tag_ids) {
    $posts = \helper\posts::paginglink_by_tag($tag_ids, $page, $limit);
    $paging_content = \helper\posts::paginglink($page, $limit, null, $keywords, $is_hot, $not_equal, $format);
} else {
    $posts = \helper\posts::paging($page, $limit, $category_id, $keywords, $is_hot, $order_by, $order_type, $not_equal, $format);
    $paging_content = \helper\posts::paginglink($page, $limit, $category_id, $keywords, $is_hot, $not_equal, $format);
}

$html = \helper\themes::get_layout('post_item_ajax', array('posts' => $posts, 'paging_content' => $paging_content));
echo $html;
