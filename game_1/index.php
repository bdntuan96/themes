<?php
// echo \helper\themes::get_layout("r_w_a");

$array = [1, 2, 3, 4];
$array2 = [4, 3, 2, 1];

foreach ($array as &$item) {
    $item = 3;
}
in($array);die;

$Bray = [];
foreach ($array2 as $item2) {
    $Bray[] = $item2;
}
// in($array2);
// die;


echo \helper\themes::get_layout("read_file");
