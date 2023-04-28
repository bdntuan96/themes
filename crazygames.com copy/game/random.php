<?php
// Start the session: lấy ra phiên của trang web lưu lại
session_start();
//lay het game ra nay
$limit = 25;
$random = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, 'views', 'DESC', $category_id, $not_equal);
// rand(min, max): cho ra sô ngẫu nhiên trong khoảng min max
// vì key nó chạy từ [0] nên -1 cho đủ = $limit
$ran = rand(0, $limit - 1);

// kiểm tra nếu tồn tại phiên người dùng vừa dùng $_SESSION và
//  có phiên người dùng trùng với $ran => $_SESSION['ran'] == $ran thì chạy randdom mới(rand)
// nếu random mới(rand) vẫn trùng(vs thằng vừa chơi) $rand == $ran thì chạy vào vòng lặp while
// while đến khi nào ko trùng nữa thì thôi gán lại nó $ran = $rand;
if ($_SESSION && $_SESSION['ran'] == $ran) {
    // cho chạy random mới. chạy ra mà vẫn trùng thì cho nó vào vòng lặp while đến khi nào ko trùng thì thôi
    $rannew = rand(0, $limit - 1);
    while ($rannew == $ran) {
        $rannew = rand(0, $limit - 1);
    }
    // gán cho thằng ran bằng ran mới(rannew)
    $ran = $rannew;
}
// gán cho phiên hiện tại bằng ran
$_SESSION['ran'] = $ran;
// Gán biến $slugRandom = mảng $random(lọc game ở trên lấy ra 1 mảng duy nhất thôi) vs key=$ran(ran nó cho ra kết quả là số ~ key của mảng)
$slugRandom = $random[$ran]->slug;

// chuyển trang đến slug random
header("Location: /$slugRandom");
exit;
