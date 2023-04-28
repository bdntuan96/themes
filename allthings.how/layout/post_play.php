<?php
$limit = \helper\options::options_by_key_type('game_related_limit', 'display');
if (!$limit) {
    $limit = 3;
}
$page = 1;
$display = 'yes';
$order_by = 'views';
$order_type = 'DESC';
$not_equal['id'] = $post->id;

//comment + rate
$url = load_url()->current_url();
$id_post = $post->id;

// btn category/tag vs id
$list_cate = \helper\posts::find_related_category($post->id);
$list_tags = \helper\posts::find_related_tag($post->id);

// breadcrumb down + category + (posts(category) + >tag>index.php)
if (count($list_cate)) {
    $arr_bread = array(
        array(
            'name' => $list_cate[0]->name,
            'slug' => $list_cate[0]->slug,
            'source' => 'posts/' . $list_cate[0]->slug,
        ),
        array(
            'name' => $post->title,
        )
    );
    $category_id = $list_cate[0]->id;
} else {
    $arr_bread = array((array(
        'name' => $post->title,
    )
    ));
}

if ($category_id) {
    // foreach => Avoid duplicate cate + tag: stt cate->tag
    foreach ($list_cate as $cate_id) {
        // $category_id =>  $cate_id->id 
        $g = \helper\posts::paging($page, $limit, $cate_id->id, $keywords, $is_hot, $order_by, $order_type, $not_equal, $format);
        foreach ($g as $g1) {
            $g2[] = $g1;
        }
    }
    $posts_category = \helper\game::remove_duplicate_game($g2);
    $posts_category = array_values($posts_category);
} else {
    $posts_category = \helper\posts::paging($page, $limit, $category_id, $keywords, $is_hot, $order_by, $order_type, $not_equal, $format);
}

$posts_news = \helper\posts::paging($page, $limit, $category_id, $keywords, $is_hot, "publish_date", $order_type, $not_equal, $format);

$post_featured = \helper\posts::get_top('WEEk', 4, 'series');
if (!$post_featured) {
    $post_featured = \helper\posts::paging(1, 4, $category_id, $keywords, $is_hot, "views", $order_type, $not_equal, $format);
}
// when accessing url -> update_views($post->id);
\helper\posts::tracking_view($post->id);
?>

<div class="post-play">
    <div class="highlight">
        <div class="container">
            <div class="row">
                <div class="flex-wrap post-play2">
                    <?php
                    // $list_cate = \helper\posts::find_related_category($post->id);
                    if ($list_cate) {
                        $name_cate = $list_cate[0]->name;
                        $slug_cate = $list_cate[0]->slug;
                    }
                    ?>
                    <div class=" flex-sb post-item post-highligh">
                        <div class="post-content">
                            <?php if ($name_cate) : ?>
                                <div class="post-meta post-before">
                                    <a href="/posts/<?php echo $slug_cate; ?>" class="post-cate"><?php echo $name_cate; ?></a>
                                </div>
                            <?php else : ?>
                                <div class="post-meta">
                                    <span class="post-cate2"></span>
                                </div>
                            <?php endif; ?>

                            <div class="post-desc">
                                <h1 class="post-title">
                                    <span class="post-title-span"><?php echo $post->title; ?></span>
                                </h1>
                                <div class="post-summary">
                                    <p><?php echo $post->excerpt; ?></p>
                                </div>
                                <span class="publish">
                                    <!-- 2023-03-16 16:59:06
                                                        // March 20, 2023 -->
                                    <span><?php echo \helper\datetime::convert_date($post->publish_date, "Y-m-d H:i:s", "F d, Y"); ?></span>
                                </span>
                            </div>
                        </div>
                        <div class="post-item-img-wrap">
                            <img class="post-item-img" src="<?php echo \helper\image::get_thumbnail($post->image, 570, 320, "m") ?>" width=570 height=320 alt="<?php echo $post->title; ?>" title="<?php echo $post->title; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="flex-sb content-area">
                    <div class="content-area-wrap">
                        <!-- bread_crumb -->
                        <?php echo \helper\themes::get_layout('bread_crumb', array('arr_bread' => $arr_bread)) ?>

                        <!-- rate -->
                        <div id="append-rate" class="rate-post">
                            <?php //echo \helper\themes::get_layout('full_rate_mini', array('id'=>$post->id)) 
                            ?>
                        </div>

                        <!-- content -->
                        <div class="content-show">
                            <?php echo html_entity_decode($post->content); ?>
                        </div>

                        <!-- category + tag-btn -->
                        <br>
                        <?php echo \helper\themes::get_layout('tag_item', array('list_cate' => $list_cate, 'list_tags' => $list_tags)); ?>

                        <!-- comment -->
                        <div id="append-comment"></div>
                    </div>
                    <div class="featured posts-sidebar">
                        <!-- <div class="flex-wrap column"> -->
                        <h3 class="featured-title2">
                            <span>Related Posts</span>
                        </h3>
                        <div class="flex-wrap featured-sidebar">
                            <?php echo \helper\themes::get_layout('post_item_ajax', array('posts' => $posts_category)); ?>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="featured post-more">
                    <!-- <div class="flex-wrap column"> -->
                    <h3 class="featured-title2">
                        <span>POSTS NEWS</span>
                    </h3>
                    <div class="flex-wrap">
                        <?php echo \helper\themes::get_layout('post_item_ajax', array('posts' => $posts_news)); ?>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    <section class="featured">
        <div class="container">
            <div class="row">
                <div class="featured-title">
                    <span>Featured</span>
                </div>
                <div class="flex-wrap">
                    <?php echo \helper\themes::get_layout('post_item_ajax', array('posts' => $post_featured)); ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    id_post = "<?php echo $id_post; ?>"
    url_post = "<?php echo $url; ?>"
</script>