<div class="grid-clayover">

    <!--$games_hot->metadata json-->
    <!-- $flag =>game_play.php -->
    <?php foreach ($games as $k => $games_hot) : ?>
        <?php
        $metadata = json_decode($games_hot->metadata);
        $is_zoom = $metadata->is_zoom; ?>
        <?php if ($is_zoom == 'yes' && !$flag) { ?>
            <div class="grid-item span-2x2">
                <div class="hot-badge"></div>
                <a href="/<?php echo $games_hot->slug; ?>" class="grid-bg set-bg">
                    <img src="<?php echo \helper\image::get_thumbnail($games_hot->image, 273, 273, 'f'); ?>" class="grid_image" width="273" height="273" title="<?php echo $games_hot->name; ?>" alt="<?php echo $games_hot->name; ?>">

                    <span class="thumb">
                        <span class="gametitle text"><?php echo $games_hot->name; ?></span>
                        <span class="playbtn">play</span>
                    </span>
                </a>
            </div>

        <?php } else { ?>
            <div class="grid-item">
                <div class="new-badge"></div>
                <a href="/<?php echo $games_hot->slug; ?>" class="grid-bg set-bg">
                    <img src="<?php echo \helper\image::get_thumbnail($games_hot->image, 129, 129, 'f'); ?>" class="grid_image" width="129" height="129" title="<?php echo $games_hot->name; ?>" alt="<?php echo $games_hot->name; ?>">

                    <span class="thumb">
                        <span class="gametitle text"><?php echo $games_hot->name; ?></span>
                        <span class="playbtn">play</span>
                    </span>
                </a>
            </div>
        <?php } ?>
    <?php endforeach; ?>
</div>

<?php
if ($paging_content) {
    echo \helper\themes::get_layout('pagination', array('paging_content' => $paging_content, 'keywords' => $keywords, 'category_id' => $category_id));
}
?>