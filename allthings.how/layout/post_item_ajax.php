<!-- <div class="flex posts-wrap" id="ajax-append"> -->
<?php foreach ($posts as $k => $item) : ?>
    <?php
    $list_cate = \helper\posts::find_related_category($item->id);
    if ($list_cate) {
        $name_cate = $list_cate[0]->name;
        $slug_cate = $list_cate[0]->slug;
    };
    ?>
    <div class="post-item">
        <a href="/<?php echo $item->slug; ?>" class="post-item-img-wrap">
            <img class="post-item-img" src="<?php echo \helper\image::get_thumbnail($item->image, 366, 206, "m") ?>" width="366" height="206" alt="<?php echo $item->title; ?>" title="<?php echo $item->title; ?>">
        </a>
        <div class="post-content">
            <?php if ($name_cate) : ?>
                <div class="post-meta post-before">
                    <a href="/posts/<?php echo $slug_cate; ?>" class="post-cate"><?php echo $name_cate; ?></a>
                </div>
            <?php else : ?>
                <div class="post-meta post-meta2">
                    <span class="post-cate2"></span>
                </div>
            <?php endif; ?>

            <a class="post-desc" href="/<?php echo $item->slug; ?>" title="<?php echo $item->title; ?>">
                <h2 class="post-title">
                    <span class="post-title-span"><?php echo $item->title; ?></span>
                </h2>
                <div class="post-summary">
                    <p><?php echo $item->excerpt; ?></p>
                </div>
                <span class="publish">
                    <!-- 2023-03-16 16:59:06
                        // March 20, 2023 -->
                    <span><?php echo \helper\datetime::convert_date($item->publish_date, "Y-m-d H:i:s", "F d, Y"); ?></span>
                </span>
            </a>
        </div>
    </div>
<?php endforeach; ?>
<!-- </div> -->