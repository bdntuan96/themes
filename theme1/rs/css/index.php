<?php
die;
header('Content-type:text/css');
$listCss = ['normalize.css', 'common.css', 'style_pogo.css',"responsive.css"];
$stringCss = '';
foreach ($listCss as $linkFile) {
    $stringCss .= file_get_contents($linkFile);
}
file_put_contents('all.css', $stringCss);
?>