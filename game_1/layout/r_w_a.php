<?php
// $theme_url = '/' . DIR_THEME;
// $path_url = 'data/game_1.json';
// ham nay khi var_dump/echo nó mới hiện ra noi dung cua duong dan 
// echo file_get_contents($path_url, 1);
// die;

// ============================================ file Read/Open ==================================================
// 1. mở file với hàm fopen(), chúng ta có thể đọc/ghi file(vs "r...."). => nó chỉ đọc, còn mở file cần các hàm khác
// - sau khi hoàn thành thì nên đóng lại file với hàm fclose("tệp"/biến $chứa_tên_tệp): tránh chạy lung tung tốn tài nguyên
// $path = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_1.json";
$path = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/game_1.js";
$path_txt = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/test.txt";
// tham số chứa tên tệp/file để: đọc("r")
$myfile = fopen($path, "r") or die("Không thể truy cập tới tệp");

// 1.1*. echo Hàm fread() giúp đọc được file(khi đã mở file ở trên với hàm fopen() ở trên)
// Tham số $myfile chứa tên của tệp để đọc và tham số filesize($path) chỉ định số byte tối đa để đọc.
// echo fread($myfile, filesize($path));
// fclose($myfile);

// 1.2*. Hàm feof() có thể kiểm tra đến cuối file(đang mở) hay chưa “end-of-file” (EOF) 
// rất hữu ích để lặp qua dữ liệu có độ dài không xác định. bằng vòng lặp while đến hết 
// kiểm tra nếu ko tồn tại Hàm feof() thì mới chạy vòng lặp bằng Hàm fgets() để đọc từng dòng cho đến hết file(có thể nối thêm <br> hoặc các kí tự cho dễ nhìn)
//     // Xuất một dòng cho đến hết tệp
while(!feof($myfile)) {
    echo fgets($myfile) . "<br>";
}
fclose($myfile);

// 1.2.1. Hàm fgets() trả về một dòng (single line) từ file(đang mở). 
// Lưu ý: Sau khi gọi hàm fgets(), con trỏ tệp đã chuyển xuống dòng tiếp theo.
// + có thể sd vòng lặp while lấy hết các dòng(có thể nối thêm <br> hoặc các kí tự cho dễ nhìn)
// echo fgets($myfile);
// fclose($myfile);

// 1.2.2. Hàm fgetc trả về một ký tự đơn lẻ từ một file. 
// Lưu ý: Sau khi gọi hàm fgetc(), con trỏ tệp di chuyển đến ký tự tiếp theo.
// + có thể sd vòng lặp while lấy hết các kí tự(có thể nối thêm <br> hoặc các kí tự cho dễ nhìn)
// echo fgetc($myfile) . " ";
// while (!feof($myfile)) {
//     echo fgetc($myfile) . " - ";
// }
// fclose($myfile);



// 2. đọc một file và ghi file đó vào output buffer
// => readfile() đọc và hiện thẳng ra màn hình(ko cần echo) + còn echo thì trả về số bytes đọc được từ file: 119896
// $numberofbytes = readfile($path);
// echo "<br>Số bytes đọc được từ file: " . $numberofbytes;


// ============================================ file Write/Create + Append ==================================================
// $path_txt2 = "C:/xampp/htdocs/tuanlocal.com/themes/game_1/data/newfile.txt";
// // // 1. tham số chứa tên tệp/file để: ghi("w")
// $myfile = fopen($path_txt2, "w") or die("Không thể truy cập tới tệp");

// Hàm fwrite() để ghi vào một tập tin. Tắt/xóa đi sẽ mất <=> ghi đè cũng mất 
// fwrite($myfile, $txt) Tham số $myfile chứa tên của tệp để ghi vào và tham số thứ hai là chuỗi được ghi.
// mỗi lần gọi hàm chỉ ghi ra được 1 biến truyền vào thôi + trả về số int(tổng:các chữ và ký tự)

// $txt = "Tuan day\n";
// if($txt) {
//     // Thực thi 2nv: cho hiện ra để biết + tự nó thực thi hàm ghi đó luôn
//     echo 'Ghi thêm chuỗi: '.'"'.fwrite($myfile, $txt) .'"'.' ký tự vào file newfile.txt <br>';
// }
// $txt = "Tien day\n";
// if($txt) {
//     echo 'Ghi thêm chuỗi: '.'"'.fwrite($myfile, $txt) .'"'.' ký tự vào file newfile.txt <br>';
// }
// fclose($myfile);

// // 2. tham số chứa tên tệp/file để: append-nối("a")
// $myfile = fopen($path_txt2, "a") or die("Không thể truy cập tới tệp");
// $txt = "Tu day\n";
// if($txt) {
//     echo 'Ghi thêm chuỗi: '.'"'.fwrite($myfile, $txt) .'"'.' ký tự vào file newfile.txt <br>';
// }
// $txt = "Goofy Goof\n";
// if($txt) {
//     echo 'Ghi thêm chuỗi: '.'"'.fwrite($myfile, $txt) .'"'.' ký tự vào file newfile.txt <br>';
// }
// fclose($myfile);
