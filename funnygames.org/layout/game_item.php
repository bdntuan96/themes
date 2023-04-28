<?php
// ======================= sd lặp =====================
$a = [4, 2, 3, 5, 6, 9, 0, 90, 101, 2, 3, 5, 6];

$b = [2, 11, 6, 4, 7, 8, 10, 2];

in($a);
in($b);

// lấy ra số chẵn
// $a_new = [];
// for ($i = 0; $i < count($a); $i++) {

//     if ($a[$i] % 2 == 0) {
//         // array_push($a_new, $a[$i]);
//         $a_new[] = $a[$i];
//     }
// }
// in($a_new);
// die;

//1. Lấy phần từ đầu tiên(value) trong mảng $a và $b.
// $first_1a = [];
// foreach($a as $k=> $a1) {
//     $first_1a[] = $a1; //break;
// }
// // in($first_1a); die;

// foreach($b as $k=> $b1) {
//     $first_1b = $b1; break;
// }

// for ($i = 0; $i < count($a); $i++) {
//     if ($i != 0) continue;
//     $first_1a = $a[$i];
// }

// in($first_1a); die;

//2. Lấy phần tử cuối cùng trong mảng $a và $b
// - xem mảng có bn phần tử
// - so sánh index của nó
// foreach($a as $k=> $a2) {
//     if(count($a) == $k+1) {
//         $first_2a = $a2;
//     }
// }
// // in($first_2a);die;

// foreach($b as $k=>$b2) {
//     if(count($b) == $k+1) {
//         $first_2b = $b2;
//     }
// }
// in($first_2b);die;

// for ($i = 0; $i < count($a); $i++) {
//     if ($i != count($a)) {
//         $last2a = $a[$i];
//         continue;
//     }
// }
// in($last2a);die;

//3. Thêm phần tử 7 lên đầu mảng $a và $b.
// $first_3a = [];
// foreach($a as $k=> $a3){
//     if($k==0){
//         $first_3a[] = 7;
//     }
//     $first_3a[] = $a3;
// }

// $first_3b = [];
// foreach($b as $k=>$b3) {
//     if($k == 0) {
//         $first_3b[] = 7;
//     }
//     $first_3b[] = $b3;
// }

// in($first_3b);die;

//4. Chèn phần tử 70 vào cuối mảng $a và $b. 
// => mặc định thêm phần tử vào đã là $a[] = value; vào cuối của mảng.
// foreach($a as $k=>$a4) {
//     if($k == 0) {
//         $a[] = 70; break;
//     }
// }
// in($a);die;

// foreach($a as $k=>$a4) {
//     if(count($a)== $k+1) {
//         $a[] = 70; 
//     }
// }

// $a[] = 70;
// $b[] = 70;
// in($a);die;

// 5. Lấy mảng phần tử từ vị trí số 4 đến 10 $a và $b.
// $slice_5a = [];
// foreach ($a as $k => $a5){
//     if($k >= 4 && $k <= 10) {
//         $slice_5a[] = $a5;
//     }
// }
// in($slice_5a);die;

//6. Tính trung bình cộng của mảng $a và $b.
// $sum_6a = array_sum($a); //tổng các số trong mảng
// $count_6a = count($a); // số phần tử của mảng
// $average_6a = $sum_6a/$count_6a;
// in($average_6a);die;

// for($t6a = 0; $t6a<count($a); $t6a++) {
//     $sum_6a += $a[$t6a];
//     $average_6a = $sum_6a/count($a);
// }
// in($average_6a);

// foreach($a as $a6) {
//     $sum_6a += $a6;
//     // in($sum_6a);
//     $count_6a = count($a);
//     $average_6a = $sum_6a/$count_6a;
// }
// in($average_6a);

// foreach($b as $k =>$b6) {
//     $sum_6b += $b6;
//     $count_6b = count($b);
//     $average_6b = $sum_6b/$count_6b;
// }
// in($average_6b);die;



//7. Sắp xếp lại mảng theo thứ tự tăng dần $a và $b.
// - for nó ra với vòng lặp đầu tiên từ key $t=0 với đếm số key của mảng;
// - for tiếp ra vòng lặp thứ 2 lặp từ key $t+1 để lấy cái sau so sánh với cái trước
// - nếu value sau mà nhỏ hơn trước thì cho chuyển nó lên trên;
// - đặt biến để lưu lại và gán
// for($t=0; $t <= count($a) - 1; $t++) {
//     for($s=$t+1; $s <= count($a) -1; $s++) {
//         if($a[$s] < $a[$t]) {
//             $truoc = $a[$t];
//             $a[$t] = $a[$s];
//             $a[$s] = $truoc;
//         }
//     }
// }

// for($t2 = 0; $t2<= count($b)-1; $t2++) {
//     for($s2 = $t2+1; $s2 <= count($b)-1; $s2++) {
//         if($b[$s2] < $b[$t2]) {
//             $truoc2 = $b[$t2];
//             $b[$t2] = $b[$s2];
//             $b[$s2] = $truoc2;
//         }
//     }
// }
// in($a);
// in($b);die;


//8.Sắp xếp lại mảng theo thứ tự giảm dần $a và $b. vì ko biết key lớn nhất là bn nên vẫn
// - for ra với vòng lặp đầu tiên từ key $t8a=0 với đếm số key của mảng
// - for tiếp vòng lặp thứ 2 lặp từ ley $s8a = $t8a+1; để lấy cái sau so sánh với cái trước;
// - nếu value sau mà lớn hơn trước thì chuyển nó lên trên;
// - đặt biến để lưu lại và gán;
// for($t8a = 0; $t8a <= count($a)-1; $t8a++) {
//     for($s8a = $t8a+1; $s8a<= count($a)-1; $s8a++){
//         if($a[$s8a] > $a[$t8a]) {
//             $truoc8a = $a[$t8a];
//             $a[$t8a] = $a[$s8a];
//             $a[$s8a] = $truoc8a;
//         }
//     }
// }
// in($a);
// in($b);die;


//9. Loại bỏ phần tử số 2 và 3 ở $a rồi thay thế bằng mảng $b
// $arr_not = array_slice($a, 2, 3);
// if($arr_not) {
//     unset($a[2]);
//     $a[3] = $b;
//     $a = array_values($a);
// }
// in($a);die;

// for($t9a = 0; $t9a < count($a); $t9a++) {
//     if($t9a == 2) {
//         unset($a[2]);
//     } elseif($t9a == 3) {
//         $a[3] = $b;
//         $a = array_values($a);
//     }
// }
// in($a);die;

// foreach($a as $k=>$value9a) {
//     if($k == 2) {
//         unset($a[2]);
//         $a[3] = $b;
//         $a= array_values($a);
//     }
// }
// in($a);die;


//10. Xóa bỏ các phần tử trùng lặp trong mảng $a và $b.
// $unique_10a = array_unique($a);
// $unique_10b = array_unique($b);
// in($unique_10a);
// in($unique_10b);die;

// for($t10a = 0; $t10a < count($a); $t10a++) {
//     for($s10a = $t10a +1; $s10a <count($a); $s10a++) {
//         if($a[$s10a] == $a[$t10a]) {
//             unset($a[$s10a]);
//         }
//     }
// }
// in($a);die;


// 11. random của mảng
// - for nó ra với vòng lặp ko được quá dữ liệu có $count
// - đặt biến lưu lại random: sd hàm rand(min, max)(từ 0, $count-1 ko vượt quá số key) => một số int 
// - đặt biến lưu lại value của vòng for đầu($truoc=$game[$t];)
// - gán lại cho biến đầu = biến sau (đổi chỗ cho nhau)
// - gán lại cho biến sau = biến trước (đổi chỗ cho nhau)

// $a = [1, 2, 3, 4, 5, 6, 7, 8, 101, 12, 13, 15, 16];
// in($a);
// for ($t11a = 0; $t11a < count($a); $t11a++) {
//     $s11a = rand(0, count($a) - 1);
//     $truoc11a = $a[$t11a];
//     $a[$t11a] = $a[$s11a];
//     $a[$s11a] = $truoc11a;
// }
// in($a);
// die;