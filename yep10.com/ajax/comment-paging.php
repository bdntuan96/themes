<?php
 
$page = (int) $_GET['page'];
$limit = (int) $_GET['limit'];
$url = $_GET['url'];
$sort = $_GET['sort'];
$datacontent = \helper\themes::get_layout('comment_paging', array('page' => $page, 'limit' => $limit, 'url' => $url, 'sort' => $sort));
echo $datacontent;
?>
