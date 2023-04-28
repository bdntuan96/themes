<?php
$keywords = $_POST['keywords'];
$page = 1;
$limit = 12;
$display = "yes";
$games = \helper\game::get_paging($page, $limit, $keywords, null, $display, null, null, "views", "DESC", null, null);
if ($games) {
    $html = \helper\themes::get_layout('game_item_ajax', array('games' => $games, "flag" => true));
    echo $html;
} else {
    echo "<span class='flex-center search-error'>Not found!</span>";

}
