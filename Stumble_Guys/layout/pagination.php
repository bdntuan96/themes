<?php
$themes_url = '/' . DIR_THEME;
//product.php >product_item.php

// in ($url);die;
// $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// if ($keywords) {
//     $url = $url . "?q=" . $keywords . "&";
// } else {
//     $url = $url . "?";
// }

?>
<div class="pagination">
    <div class="gif hidden">
        <img id="loading_img" src="<?php echo $themes_url; ?>rs/imgs/uk-page-loading.gif">
    </div>
    <div class="overwrite s_paging">
        <?php
        //'paging': =$paging -> foreach
        $paging = $paging_content['paging'];
        foreach ($paging as $page) {
            //if selected: a->span not click

            // if ($page['selected']) {
            //     echo '<span class="next_page active_">' . $page['label'] . '</span>';
            // } else {
            //     echo '<a class="next_page" href="' . $url . 'page=' . $page['value'] . '">' . $page['label'] . '</a>';
            // }

            //1.khai báo java<scrip> echo \helper\themes::get_layout('header/analytics'); + java<scrip> với các biến $ rỗng => trong thẻ <head>
            // + nhúng file <script src="<?php echo $theme_url ?(>)rs/js/jquery-3.4.1.min"></script> vào => dưới thẻ </footer> trong footer.php
            //3.phân trang theo kiểu ajax: onclick => footer: <script> function paging(p) > gửi các loại data bằng= (data:) 
            // + ko cần phần php ở trên: $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);...
            //4.sang product xem có các biến cần chưa($page,...) 
            // + đặt id="ajax-append"(ở footer tí gán) cho thẻ chứa phần echo ra game_item_ajax.php + lấy các biến cần phân trang gửi qua product_item => pagination
            // + lấy các giá trị $biến cần => gán kiểu java <script> = php ở dưới cùng trang
            //5. sang footer cuối trang: js cho nó đồng bộ vs product
            //6.sang tao file ajax>paging.php(thuộc đường dẫn abc.cde có dấu '.' nên nó nhảy vào file ajax>paging.php) gọi ra theo phương thức get, post da khai o footer
            // + xem nó có cái gì cố định lấy nốt ra, và xét nó nếu có $tag thì sao nữa (giống bên product) + echo ra $html =>vào product_item
            if ($page['selected']) {
                echo '<span class="next_page active">' . $page['label'] . '</span>';
            } else {
                echo '<span class="next_page" onclick=paging(' . $page["value"] . ')>' . $page['label'] . '</span>';
            }
        }
        ?>
        <!-- <span class="next_page active_" style="">1</span>
        <span class="next_page" onclick="paging(2)">2</span>
        <span class="next_page" onclick="paging(1)">|&lt;</span>
        <span class="next_page" onclick="paging(3)">3</span>
        <span class="next_page" onclick="paging(4)">4</span>
        <span class="next_page active_" style="">5</span> -->
    </div>
</div>