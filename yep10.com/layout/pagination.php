<?php
//product.php >product_item.php

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
// in ($url);die;

if ($keywords) {
    $url = $url . "?q=" . $keywords . "&";
} else {
    $url = $url . "?";
}

// in($paging_content);
?>
<div class="container">
    <div class="row">
        <div class="panigation">
            <?php
            //'paging': =$paging -> foreach
            $paging = $paging_content['paging'];
            foreach ($paging as $page) {
                //if selected: a->span not click
                if ($page['selected']) {
                    echo '<span class="btn active" href="#!">' . $page['label'] . '</span>';
                } else {
                    echo '<a class="btn" href="' . $url . 'page=' . $page['value'] . '">' . $page['label'] . '</a>';
                }
            }
            ?>
        </div>
    </div>
</div>