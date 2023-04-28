<div class="pagination">
    <div class="gif hidden">
        <img class="loadingImage" width="44" height="44" src="/<?php echo DIR_THEME ?>rs/imgs/loading.svg" />
    </div>
    <div class="s_paging">
        <?php
        foreach ($paging_content['paging'] as $page) {
            if ($page['label'] === '&gt;' || $page['label'] === '&lt;') {
                continue;
            }
            $active = "active_";
            if ($page['selected']) {
                echo '<span class="next_page ' . $active . '" style="">' . $page['label'] . '</span>';
            } else {
                echo '<span class="next_page" onclick="paging(' . $page['value'] . ')" >' . $page['label'] . '</span>';
            }
        }
        ?>
    </div>   
</div>