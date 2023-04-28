<!-- <div class="row" id="more-game"> -->
    <div class="d-r-flex flow-game">
        <?php foreach ($games as $k => $games_item) : ?>
            <div class="throw-game">
                <a class="card-game" href="/<?php echo $games_item->slug; ?>">
                    <figure class="image-card-game">
                        <img width="177" height="100" src="<?php echo \helper\image::get_thumbnail($games_item->image, 177, 100, 'f'); ?>" title="<?php echo $games_item->name; ?>" alt="<?php echo $games_item->name; ?>" />
                    </figure>
                    <div class="title-card-game">
                        <div class="title-name">
                            <span class="text-overflow"><?php echo $games_item->name; ?></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        <?php //in($games_item);die;
        ?>
    </div>
<!-- </div> -->
<?php
echo \helper\themes::get_layout('pagination', array('paging_content' => $paging_content, 'keywords' => $keywords, 'category_id' => $category_id));
?>