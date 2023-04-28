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
//    + nếu kiểm tra nếu key==0 && file mà có dữ liệu rồi thì cho nó cách cả dòng trên và dưới
//    + nếu ko phải đầu ko phải cuối và chưa có dữ liệu thì cứ mặc định cho nó xuống dòng
// $path_g1 = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_1.json";
// $path_save = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_saveafdsfa.json";
// $path_backup = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_1backup.json";

// $atxt = file_get_contents($path_g1);
// $btxt = file_put_contents($path_save, $atxt);
// if($btxt) {
//    if(rename($path_g1, $path_backup)) {
//       rename($path_save, $path_g1);
//    }
// }

// $open_g1 = file_get_contents($path_g1); //nó là cả 1 string
// if ($open_g1) {
//    $decode_g1 = json_decode($open_g1);
//    foreach ($decode_g1 as $k => $item) {
//       if ($k == count($decode_g1) - 1) {
//          $a = json_encode($item);
//       } elseif ($k == 0 && filesize($path_save)) {
//          $a = "\n" . json_encode($item) . "\n";
//       } else {
//          $a = json_encode($item) . "\n";
//       }
//       // put thêm từng dòng vs $a vào file mới
//       if (file_exists($path_save)) {
//          $appen = file_put_contents($path_save, $a, FILE_APPEND);
//       } else {
//          $creat_g1 = file_put_contents($path_save, $a);
//       }
//    }
// } 


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



// 4. Đọc tất cả các file có đuôi .json từ folder data 
// 4.1. kiểm tra các file.json đó nếu mảng nào có key là [source_html] mà xuất hiện chuỗi "https://lagged.com"
// 4.2. Thì lưu tất cả mảng có key [source_html] đó lại vào trong 1 file trong folder data2.
// - Hàm is_dir() kiểm tra xem tên tệp được chỉ định có phải là một thư mục hay không. TRUE/FALSE 
// - Hàm opendir() mở một xử lý thư mục.	Trả về tài nguyên xử lý thư mục khi thành công. FALSE khi thất bại
// - Hàm readdir() Trả về một mục từ một xử lý thư mục.(tên tệp) khi thành công, FALSE
// => sau khi lấy ra được Mảng danh sách các file có đuôi .json   //in($file1);die;
// sd for để lấy từng file ra một => kiểm tra tồn tại file thì
// => decode ra thành mảng => for tiếp để trỏ đển key [source_html] của mảng
// => kiểm tra từng key xem có chuỗi = Hàm strpos() ***lưu ý cách sd hàm phải kiểm tra !==false nếu ko nó chỉ lấy ở cuối ko lấy ở đầu
// cho nó tự for từng dòng một vào 1 mảng trống
// sau khi có dữ liệu từ vòng for(kết thúc) => mã hóa mảng dữ liệu đó lại và put sang file mới bên folder data 2;
// kêt thúc đóng lệnh mở folder data
$dir = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data";
if (is_dir($dir)) {
   if ($dh = opendir($dir)) {
      $file1 = [];
      while (($file = readdir($dh)) !== false) {
         if (strpos($file, ".json")) {
            $file1[] = $dir . "/" . $file;
         }
      }
     
      $d2_save_a1 = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data2/d2_save_a1.json";
      $d2_file1 = [];
      for ($t = 0; $t < count($file1); $t++) {
         $file1_a1 = file_get_contents($file1[$t]);
         if ($file1_a1) {
            $decode_a1 = json_decode($file1_a1);
            for ($s = 0; $s < count($decode_a1); $s++) {
               if (strpos($decode_a1[$s]->source_html, "https://lagged.com") !== false) {
                  $d2_file1[] = $decode_a1[$s];
               }
            }
         }
      }
      $d2_file1_encode = json_encode($d2_file1);
      $d2_file1_put = file_put_contents($d2_save_a1, $d2_file1_encode);
      closedir($dh);
   }
}



// // 5. lấy ra như trên mà thêm bước cho nó về từng dòng mới put sang
// $dir = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data";
// if (is_dir($dir)) {
//    if ($dh = opendir($dir)) {
//       $file1 = [];
//       while (($file = readdir($dh)) !== false) {
//          if (strpos($file, ".json")) {
//             $file1[] = $dir . "/" . $file;
//          }
//       }
//       $d2_save_a2 = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data2/d2_save_a2.json";

//       $d2_file1 = [];
//       for ($t = 0; $t < count($file1); $t++) {
//          $file1_a1 = file_get_contents($file1[$t]);
//          if ($file1_a1) {
//             $decode_a1 = json_decode($file1_a1);
//             // in($decode_a1);die;
//             for ($s = 0; $s < count($decode_a1); $s++) {
//                if (strpos($decode_a1[$s]->source_html, "https://lagged.com") !== false) {
//                   $d2_file1[] = $decode_a1[$s];
//                }
//             }
//          }
//       }
//       // in($d2_file1);
//       // die;
//       // dữ liệu là mảng mà chưa encode thì có thể sd vòng foreach này
//       foreach ($d2_file1 as $k => $item) {
//          if ($k == count($d2_file1) - 1) {
//             $a = json_encode($item);
//          } elseif ($k == 0 && filesize($d2_save_a2)) {
//             $a = "\n" . json_encode($item) . "\n";
//          } else {
//             $a = json_encode($item) . "\n";
//          }
//          // put thêm từng dòng vs $a vào file mới
//          if (file_exists($d2_save_a2)) {
//             $appen = file_put_contents($d2_save_a2, $a, FILE_APPEND);
//          } else {
//             $creat_g1 = file_put_contents($d2_save_a2, $a);
//          }
//       }

//       closedir($dh);
//    }
// }
