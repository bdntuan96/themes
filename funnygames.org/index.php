<?php
set_time_limit(0);
ini_set('memory_limit', '256M');


// 1. lấy ra mảng game: count để đếm xem nó có bn game(tránh th mảng ko có gì/ít/quá nhiểu)
// 2. for nó ra với vòng lặp ko được quá dữ liệu có $count
// 3. đặt biến lưu lại random: sd hàm rand(min, max)(từ 0, $count-1 ko vượt quá số key) => một số int 
// 4. đặt biến lưu lại value của vòng for đầu($truoc=$game[$t];)
// 5. gán lại cho biến đầu = biến sau (đổi chỗ cho nhau)
// 6. gán lại cho biến sau = biến trước (đổi chỗ cho nhau)
// $game = \helper\game::get_paging(1, 30, $keyword, $type, "yes", $is_hot, $is_new, "views", 'DESC', null, $not_equal);
// $count = count($game);
// for($t=0; $t <$count; $t++) {
//     $sau_ran= rand(0, $count-1);
//     $truoc = $game[$t];
//     $game[$t] = $game[$sau_ran];
//     $game[$sau_ran] = $truoc;
// }

// in($game);die;

// echo \helper\themes::get_layout('array');
echo \helper\themes::get_layout('game_item');
