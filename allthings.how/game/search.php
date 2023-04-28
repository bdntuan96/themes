<?php
if (isset($_REQUEST['q'])) {
    $keywords = $_REQUEST['q'];
}
if (!$keywords) {
    load_response()->redirect('/');
}

$data['custom'] = \helper\themes::get_layout('header/metadata_search', array('keywords' => $keywords));
echo \helper\themes::get_layout('header', $data);
echo \helper\themes::get_layout('menu', array('keywords'=> $keywords));
echo \helper\themes::get_layout('post_item', array('keywords'=> $keywords));
echo \helper\themes::get_layout('footer');
