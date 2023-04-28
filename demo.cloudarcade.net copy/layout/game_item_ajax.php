<?php
$theme_url = '/' . DIR_THEME;
?>
<div class="item">
    <?php foreach ($games as $k => $item) : ?>
        <a class="item-link" href="/<?php echo $item->slug ?>" title="<?php echo $item->name ?>">
            <div class="item-show">
                <img class="item-show-img" src="<?php echo \helper\image::get_thumbnail($item->image, 160, 160, 'f') ?>" width="160" height="160" alt="<?php echo $item->name ?>" title="<?php echo $item->name ?>">
                <div class="item-show-infor">
                    <div class="star-rating">
                        <!-- rate -->
                        <?php $rate = \helper\game::get_rate($item->id);
                        $round_rate = round($rate['rate_average']);
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i > $round_rate) {
                                echo '<img src="' . $theme_url . 'rs/imgs/star-off.svg" alt="star" title="star">';
                            } else {
                                echo '<img src="' . $theme_url . 'rs/imgs/star-on.svg" alt="star" title="star">';
                            }
                        } ?>
                    </div>
                    <div class="text title"><?php echo $item->name ?></div>
                </div>
            </div>
        </a>
    <?php endforeach ?>
</div>

<?php if ($paging_content) {
    echo \helper\themes::get_layout('pagination', array('paging_content' => $paging_content, 'keywords' => $keywords, 'category_id' => $category_id));
}
?>