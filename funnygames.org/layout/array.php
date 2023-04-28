<?php
$a = [4, 2, 3, 5, 6, 9, 0, 90, 101, 2, 3, 5, 6];

$b = [2, 5, 6, 4, 7, 8, 10];

in($a);
in($b);

//1. Lấy phần từ đầu tiên(value) trong mảng $a và $b.
// $value_a = $a[0];
// $value_a1a = current($a); //để lấy phần tử đầu tiên của một mảng
// $value_a1 = reset($a); //con trỏ bên trong của một mảng thành phần tử đầu tiên(khi trước đó nó có next($a)hay lệch key) của nó và trả về giá trị của phần tử mảng đầu tiên hoặc FALSE(mảng trống).

// $value_b = $b[0];
// $value_b1b = current($b);
// $value_b1 = reset($b);

// // in($value_a);
// // in($value_a1a);
// // in($value_a1);
// in($value_b);
// in($value_b1b);
// in($value_b1);die;


//2. Lấy phần tử cuối cùng trong mảng $a và $b
// => mảng $a và $b sẽ bị khuyết đi phần tử cuối
// $first_2a = array_pop($a);
// $first_2b = array_pop($b);

// $a_new = $a[count($a)-1] ;
// $b_new = $b[count($b)-1];
// in($a_new);
// in($b_new); 

//3. Thêm phần tử 7 lên đầu mảng $a và $b.
// => trả về int TỔNG số lượng phần tử của mảng $a và $b khi đã thêm mới 
// $first_3a = array_unshift($a, 7);
// $first_3b = array_unshift($b, 7);
// in($a);
// in($b);
// in($first_3a);
// in($first_3b);
// die;

//4. Chèn phần tử 70 vào cuối mảng $a và $b.
// => trả về int TỔNG số lượng phần tử của mảng $a và $b khi đã thêm mới 
// $first_4a = array_push($a, 70);
// $first_4b = array_push($b, 70);
// in($first_4a);
// in($first_4b);die;

//5. Lấy mảng phần tử từ vị trí số 4 đến 10 $a và $b.
// => mảng $a và $b vẫn ko bị thay đổi + cắt trả về mảng cắt 
// $first_5a = array_slice($a, 2, count($a)-1);
// $first_5b = array_slice($b, 4, count($a)-1);
// in($first_5a);
// in($first_5b);die;



//6. Tính trung bình cộng của mảng $a và $b.
// $sum_6a = array_sum($a); //tổng các số trong mảng
// $count_6a = count($a); // số phần tử của mảng
// $average_6a = $sum_6a/$count_6a;

// $sum_6b = array_sum($b);
// $count_6b = count($b);
// $average_6b = $sum_6b / $count_6b;
// in($average_6b);die;


//7. Sắp xếp lại mảng theo thứ tự tăng dần $a và $b.
// => sd Hàm sort(loại) sắp xếp lại mảng theo stt tăng dần(số/số chữ)
// sort($a);
// // foreach ($a as $a_item){
// //     echo "$a_item <br>";
// // }
// // echo "<br>";
// sort($b);
// // foreach ($b as $b_item) {
// //     echo "$b_item <br>";
// // }


//8.Sắp xếp lại mảng theo thứ tự giảm dần $a và $b. 
// => sd Hàm rsort(resset loại) sắp xếp lại mảng theo stt giảm dần(số/số chữ)
// rsort($a);
// rsort($b);
// in($a);
// in($b);
 

//9. Loại bỏ phần tử số 2 và 3 ở $a rồi thay thế bằng mảng $b
// $arr_not = array_slice($a, 2, 3);
// if($arr_not) {
//     unset($a[2]);
//     $a[3] = $b;
//     $a = array_values($a);
// }
// in($a);die;

//10. Xóa bỏ các phần tử trùng lặp trong mảng $a và $b.
// => trả về mảng mới
// $unique_10a = array_unique($a);
// $unique_10b = array_unique($b);

// in($unique_10a);
// in($unique_10b);