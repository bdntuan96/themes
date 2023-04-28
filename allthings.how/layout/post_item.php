<?php
$limit = \helper\options::options_by_key_type('game_home_limit', 'display');

if (!$limit) {
    $limit = 30;
}
// $limit = 19;
// *3 =>%3 (integer)
$limit = ceil($limit / 3) * 3;
$display = 'yes';
$order_type = 'DESC';
$order_by = "views";

if ($page == null) {
    $page = 1;
}

if ($tag_ids) {
    $posts = \helper\posts::paging_by_tag($page, $limit, $tag_ids, $keywords, $is_hot, $not_equal, $format, $not_equal);
    $paging_content = \helper\posts::paginglink_by_tag($tag_ids, $page, $limit);
    // $posts = \helper\posts::paging_by_tag($page, $limit, $tag_ids, $field_order, $order_type, $not_equal);
    // $paging_content = \helper\posts::paginglink_by_tag($tag_ids, $page, $limit);
} else {
    $posts = \helper\posts::paging($page, $limit, $category_id, $keywords, $is_hot, $order_by, $order_type, $not_equal, $format);
    $paging_content = \helper\posts::paginglink($page, $limit, $category_id, $keywords, $is_hot, $not_equal, $format);
}

// vs paging
// in($paging_content);die; 
// => ['paging'],['total'],['count']

// hidden load-more if 
$max_count = $paging_content['count'] < $limit;
// js hidden load-more if 
$max_page = $paging_content['total'];

$post_new = \helper\posts::paging(1, 4, $category_id, $keywords, $is_hot, "publish_date", "DESC", $not_equal, $format);

$post_featured = \helper\posts::get_top('WEEk', 4, 'series');
if (!$post_featured) {
    $post_featured = \helper\posts::paging(1, 4, $category_id, $keywords, $is_hot, "views", "DESC");
}

$title = \helper\options::options_by_key_type('site_name');
$description = \helper\options::options_by_key_type('site_description');

if ($category) {
    $arr_bread = array(
        array(
            'name' => $category->name,
        ),
    );
    $title = $category->name;
    $description = $category->description;
}

if ($tag) {
    $arr_bread = array(
        array(
            'name' => $tag->name,
        ),
    );
    $title = $tag->name;
    $description = $tag->description;
}
if ($keywords) {
    $arr_bread = array(
        array(
            'name' => 'Search',
        ),
    );
    $title = "Search with keywords: $keywords";
    $description = "Search results";
}
?>

<?php
if (!count($posts)) :
    echo \helper\themes::get_layout('error', array('keywords' => $keywords)); ?>
<?php else : ?>
    <main class="main">
        <div class="term-heading">
            <div class="container">
                <div class="row">
                    <?php if (!$is_home) : ?>
                        <div class="row">
                            <div class="flex-sb search-back">
                                <div class="search-infor">
                                    <h1 class="entry-title"><?php echo $title; ?></h1>
                                    <span><?php echo html_entity_decode($description); ?></span>
                                </div>
                                <div class="search-count">
                                    <span><?php echo $paging_content['count'];
                                            ?></span>
                                    <span>Articles</span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


        <?php if ($is_home) :
        ?>
            <section class="highlight">
                <div class="container">
                    <div class="row">
                        <div class="flex-wrap">
                            <?php foreach ($post_new as $k => $item) : ?>
                                <?php
                                $list_cate = \helper\posts::find_related_category($item->id);
                                if ($list_cate) {
                                    $name_cate = $list_cate[0]->name;
                                    $slug_cate = $list_cate[0]->slug;
                                }
                                $width = 366;
                                $height = 206;
                                if ($k == 0) {
                                    $width = $width * 2 + 30;
                                    $height = $height * 2;
                                }
                                ?>
                                <div class="post-item responsive <?php echo $k == 0 ? "post-highligh flex-sb" : "" ?>">
                                    <a href="/<?php echo $item->slug; ?>" class="post-item-img-wrap">
                                        <img class="post-item-img" src="<?php echo \helper\image::get_thumbnail($item->image, $width, $height, "m") ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" alt="<?php echo $item->title; ?>" title="<?php echo $item->title; ?>">
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
                        </div>
                    </div>
                </div>
            </section>
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
        <?php endif; ?>

        <section class="allposts">
            <div class="container">
                <div class="row">
                    <!-- push id => append when click -->
                    <div class="flex-wrap" id="ajax-append">
                        <?php echo \helper\themes::get_layout('post_item_ajax', array('posts' => $posts, 'paging_content' => $paging_content));
                        ?>
                    </div>
                    <!-- pagination -->
                    <?php if (!$max_count) :
                    ?>
                        <div class="pagination">
                            <!-- add a page attribute to know which $page it is on (in web page=1 => $page +=1)  -->
                            <button class="load-more" aria-label="load-more" page="<?php echo $page += 1; ?>">
                                <span class="load-text">Load more</span>


                                <div class="loading_mask hidden">
                                    <img src="<?php echo "/" . DIR_THEME; ?>rs/imgs/uk-page-loading.gif" alt="loading" title="loading" class="loading_img">
                                </div>
                            </button>
                        </div>
                    <?php endif;
                    ?>
                </div>
            </div>
        </section>
    </main>
<?php endif; ?>
<script>
    keywords = "<?php echo $keywords; ?>";
    order_by = "<?php echo $order_by ?>";
    order_type = "<?php echo $order_type ?>";
    category_id = "<?php echo $category_id ?>";
    is_hot = "<?php echo $is_hot ?>";
    is_new = "<?php echo $is_new ?>";
    tags_id = "<?php echo $tags_id ?>";
    limit = "<?php echo $limit ?>";
    max_page = "<?php echo $max_page ?>";
</script>