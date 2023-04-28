<?php

$id_game = $_POST['id_game'];
if ($id_game) {
    $id_save = \helper\game::increate_like($id_game);
    // $html_like = \helper\themes::get_layout('header_game', array('likes'=>$id_save));
}
// $data_result['like'] = $html_like;

// Để conver giá trị chỉ định thành định dạng JSON: trả về giá trị đã encode JSON và echo nó ra để có output
echo json_encode("blabla...chỉ cần chạy nó để thực thi nv ở trên");