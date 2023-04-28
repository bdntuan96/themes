
<div class="pagination">
    <?php
    //'paging': =$paging -> foreach
    $paging = $paging_content['paging'];
    //if selected: a->span not click
    foreach ($paging as $page) {
        if ($page['selected']) {
            echo '<span class="btn active">' . $page['label'] . '</span>';
        } else {
            echo '<span class="btn" onclick=paging(' . $page["value"] . ')>' . $page['label'] . '</span>';
        }
    }
    ?>
</div>