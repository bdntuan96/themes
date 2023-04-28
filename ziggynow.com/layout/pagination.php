<?php
//product.php >product_item.php

//lấy ra url trangd đang hiện: phân tích_url gọi ra
$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
// in ($url);die;

//nếu có keywords http://tuanlocal.com/search?q=a
//ngược lại http://tuanlocal.com/search?q=n&page=2
if ($keywords) {
    $url = $url . "?q=" . $keywords . "&";
} else {
    $url = $url . "?";
}

//neu co tag thi url se nhu the nao
//neu co category thi url nhu the nao
//neu search thi url nhu the nao
//neu ko co 3 cai tren thi url nhu the nao

// in($paging_content);
//$paging_content được đặt và truyền từ product sang product_item.php sang
?>
<div class="container">
    <div class="row">
        <div class="panigation">
            <?php
            //phải gọi 'paging' ra vì có sẵn mảng này và gán =$paging để lặp foreach
            $paging = $paging_content['paging'];
            foreach ($paging as $page) {
                //nếu có selected (đã chọn) này thì cho thẻ a->span để ko bấm vào đc nữa(trang đang mở thì ko bấm đc nữa)
                if ($page['selected']) {
                    echo '<span class="btn active" href="">' . $page['label'] . '</span>';
                } else {
                    echo '<a class="btn" href="' . $url . 'page=' . $page['value'] . '">' . $page['label'] . '</a>';
                }
            }
            ?>
        </div>
    </div>
</div>