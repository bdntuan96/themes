<!-- //action -->
<div class="tag">
    <ul class="flex center flex-wrap <?php echo $is_game_play ?>">
        
            <li class="tag_item <?php echo $is_game_play ?> <?php echo ($is_home) ? 'bg-default' : '' ?>">
                <a href="/" class="tag_btn font-display">All</a>
            </li>

        <?php if (count($list_cate) || count($list_tags)) : ?>
            <!-- filter logic: games>index.php(category): $slug + $category_id -->
            <?php foreach ($list_cate as $cate) : ?>
                <li class="tag_item <?php echo ($cate->slug == $slug && $category_id) ? 'bg-default' : '' ?>">
                    <a href="/games/<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>" class="tag_btn font-display">
                        <?php if ($cate->image) : ?>
                            <span>
                                <img class="icon_tag" src="<?php echo \helper\image::get_thumbnail($cate->image, 20, 20, "m") ?>" width="20" height="20" alt="<?php echo $cate->name; ?>">
                            </span>
                        <?php endif; ?>
                        <span><?php echo $cate->name; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            <!-- filter logic: tag>index.php(tag): $slug + $tags_id -->
            <?php foreach ($list_tags as $tag) : ?>
                <li class="tag_item <?php echo ($tag->slug == $slug && $tags_id) ? 'bg-default' : '' ?>>">

                    <a href="/tag/<?php echo $tag->slug; ?>" title="<?php echo $tag->name; ?>" class="tag_btn font-display">
                        <?php if ($tag->image) : ?>
                            <span>
                                <img class="icon_tag" src="<?php echo \helper\image::get_thumbnail($tag->image, 20, 20, "m") ?>" width="20" height="20" alt="<?php echo $tag->name; ?>">
                            </span>
                        <?php endif; ?>
                        <span><?php echo $tag->name; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>

    </ul>
</div>