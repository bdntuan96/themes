<?php
// copy path xong cần đổi lại \ => / thì mới đúng đường dẫn nha
// $path = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_1.json";
// in($path); die;
// hàm đọc file thành một chuỗi string theo đường dẫn ngang cấp
// $string_decode = file_get_contents($path);

// ***file chưa được giải mã thì giải mã nó
// $json =  json_decode($string_decode);
// $name = $json[$i]->name;
// sắp xếp lại mảng theo stt tăng dần: theo của số kí tự trong phần tử name của mảng json
// nếu mà đếm sổ ký tự(của từng phần tử trỏ đến key=name) trong mảng for sau thì đổi thứ tự chúng cho nhau(=cách gán lại vị trí/hoán đổi)
// for ($t = 0; $t < count($json); $t++) {
//     for ($s = $t + 1; $s < count($json)-1; $s++) {
//         if (strlen($json[$s]->name) > strlen($json[$t]->name)) {
//             $truoc = $json[$t];
//             $json[$t] = $json[$s];
//             $json[$s] = $truoc;
//         }
//     }
// }
// in($json);

// tìm chuỗi Lagged.com trong key=description của các phần tử trong mảng json; 
// lấy nó ra và gán lại thôi;
// foreach($json as $itemj) {
//    $itemj->description = str_replace("Lagged.com", "tuanlocal.com", $itemj->description);
// }

// for ($t = 0; $t < count($json); $t++) {
//    $json[$t]->description = str_replace("Lagged.com", "tuanlocal.com", $json[$t]->description);
// }

// ***phải mã hóa nó lại nó mới ghi được vào file mới
// $json_encode = json_encode($json);

// $path_strlen = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_1strlen.json";
// $put = file_put_contents($path_strlen, $json_encode);
// if ($put) {
//    echo 'ghi vào file mới thành công + số byte đã được ghi vào tệp: ' . $put;
// }


// $put_more = file_put_contents($path_strlen, $json_encode, FILE_APPEND);
// if ($put_more) {
//    echo 'ghi thêm dữ liệu vào file mới thành công + số byte đã được ghi vào tệp: ' . $put_more;
// }

// var_dump(file_put_contents($a, "ầ", FILE_APPEND));
// in($json);

// Thêm mảng vào file mới
// $path_test = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/appen.json";
// $open_path_test = file_get_contents($path_test);

// $arr = [
//    "name"=>"Loi",
//    "class"=> "1a",
//    "age"=> "6"
// ];
// // in($arr);
// foreach($arr as $item) {
//    file_put_contents($path_test, $item."\n", FILE_APPEND);
// }

// 2. từ file game_1.json(dữ liệu là cả 1 string) put nó lại vào file khác/mới(nếu file có rồi thì chỉ append) cho dữ liệu nó về từng dòng 1
// - tạo biến $đường dẫn đến file gốc và biến đường dẫn $đến file mới(tên thế nào cũng được/có thì nó append ko thì tự nó tạo ra luôn)
// - ĐỌC file cần xử lí vs Hàm file_get_contents($đường dẫn file gốc) => hàm có thể decode thành MẢNG ở dưới để foreach từng dòng
// - kiểm tra nếu đọc file gốc mà có thì decode nó về mảng và foreach ra để lấy được từng dòng 1
//    + nếu key đến cuối cùng thì ko cho nó enter xuống dòng nữa
//    + nếu kiểm tra file mà có dữ liệu rồi thì vẫn giữ nó xuống dòng và có thêm cả cách dòng trên
//    + nếu ko phải đầu ko phải cuối và chưa có dữ liệu thì cứ mặc định cho nó xuống dòng
$path_g1 = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_1.json";
$path_save = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_sav65165126e.json";
$open_g1 = file_get_contents($path_g1); //nó là cả 1 string
if ($open_g1) {
   $decode_g1 = json_decode($open_g1);
   foreach ($decode_g1 as $k => $item) {
      if ($k == count($decode_g1) - 1) {
         $a = json_encode($item);
      } elseif ($k == 0 && filesize($path_save)) {
         $a = "\n" . json_encode($item) . "\n";
      } else {
         $a = json_encode($item) . "\n";
      }
      // put thêm từng dòng vs $a vào file mới
      if (file_exists($path_save)) {
         file_put_contents($path_save, $a, FILE_APPEND);
      } else {
         file_put_contents($path_save, $a);
      }
   }
} 

// $path_g2 = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_1.json";
// $path_save_g2 = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_1save.json";


// // 3. từ file game_save.json(dữ liệu là các dòng 1) decode lại vào file mới cho dữ liệu nó giống game_1.json(dữ liệu là cả 1 string); 
// // *** ở trên encode từng dòng => giờ decode từng dòng
// // - tạo biến $đường dẫn đến file gốc và biến đường dẫn $đến file mới(tên thế nào cũng được/có thì nó append ko thì tự nó tạo ra luôn)
// // - ĐỌC file cần xử lí vs Hàm fopen(file, r(chính là read chỉ đọc))=> hàm có thể tùy biến ở dưới để lấy từng dòng/từng ký tự...
// // => kiểm tra nếu nó tồn tại thì sd vòng while để đọc đến cuối cùng của file + Hàm fgets() đọc từng dòng
// // - tạo ra 1 mảng rồi gán decode từng dòng vào mảng;
// // - rồi encode cả mảng đó lại bên trong thằng put sang file mới luôn;
// $path_save2 = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_save.json";
// $path_save_new = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_save_new.json";
// $handle = fopen($path_save2, "r"); 
// $arr_save = [];
// if ($handle) {
//    while (($line = fgets($handle)) !== false) {
//       $arr_save[] = json_decode($line);
//    }
//    fclose($handle);
// }
// file_put_contents($path_save_new, json_encode($arr_save));