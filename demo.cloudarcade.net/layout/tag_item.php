<!-- //action -->
<?php if (count($list_cate) || count($list_tags)) : ?>
    <h2 class="title-option">Categories & Tags</h2>
    <div class="tag">
        <ul class="flex-align flex-wrap">
            <!-- filter logic: games>index.php(category): $slug + $category_id -->
            <?php foreach ($list_cate as $cate) : ?>
                <li class="tag_item">
                    <a class="tag_btn" href="/games/<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>">
                        <?php if ($cate->image) : ?>
                            <span>
                                <img class="icon_tag" src="<?php echo \helper\image::get_thumbnail($cate->image, 17, 17, "m") ?>" width="17" height="17" alt="<?php echo $cate->name; ?>"  title="<?php echo $cate->name; ?>">
                            </span>
                        <?php endif; ?>
                        <span><?php echo $cate->name; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            <!-- filter logic: tag>index.php(tag): $slug + $tags_id -->
            <?php foreach ($list_tags as $tag) : ?>
                <li class="tag_item">

                    <a class="tag_btn" href="/tag/<?php echo $tag->slug; ?>" title="<?php echo $tag->name; ?>">
                        <?php if ($tag->image) : ?>
                            <span>
                                <img class="icon_tag" src="<?php echo \helper\image::get_thumbnail($tag->image, 17, 17, "m") ?>" width="17" height="17" alt="<?php echo $tag->name; ?>"  title="<?php echo $tag->name; ?>">
                            </span>
                        <?php endif; ?>
                        <span><?php echo $tag->name; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>
<?php endif; ?>