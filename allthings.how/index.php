<?php
// $posts = \helper\posts::paging($page = 1, $limit = 10, $category_id = '', $keywords = '', $is_hot = '', $order_by = 'id', $order_type = 'DESC', $not_equal = array(), $format = '');
// $paging_content = \helper\posts::paginglink($page, $limit, null, $keywords, $is_hot, $not_equal, $format);
// $slug = "those-shared-security-challenges-were-on-stark";
// $post = \helper\posts::find_by_slug($slug);

$data['custom'] = \helper\themes::get_layout('header/metadata_home');
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu', array('is_home'=>true));
echo \helper\themes::get_layout('post_item', array('is_home'=>true, 'post_new'=> $post_new));
echo \helper\themes::get_layout('footer');
