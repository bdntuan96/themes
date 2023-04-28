<?php

$keywords = strtolower(str_replace('+', ' ', load_request()->request('q')));
if (!$keywords) {
    echo json_encode('<a class="text-overflow a-search"><p>Sorry could not find any games!</p></a>');
    return;
}
$display = 'yes';
$order_type = "DESC";
$field_order = "views";
$limit = 5;
$page = 1;
$games = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type);
if (count($games)) {
    echo json_encode(\helper\themes::get_layout('search_ajax', array('games' => $games)));
} else {
    echo json_encode('<a class="text-overflow value"><p>Not found!</p></a>');
}
?>
