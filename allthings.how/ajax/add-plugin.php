<?php
$id_post = $_POST['id_post'];
$url_post = $_POST['url_post'];
$data_result = [];
if ($id_post) {
    $html_rate = \helper\themes::get_layout('full_rate_mini', array('id' => $id_post));
    // $html_like = \helper\themes::get_layout('like',array('id=>$id_post'));
}

if ($url_post) {
    $html_comment = \helper\themes::get_layout('comment', array('url' => $url_post));
}
$data_result['rate'] = $html_rate;
$data_result['comment'] = $html_comment;
// $data_result['like'] = $html_like;

echo json_encode($data_result);