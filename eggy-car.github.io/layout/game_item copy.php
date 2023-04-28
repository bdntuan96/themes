<?php
$theme_url = '/' . DIR_THEME;

//admin =>seting limit 
$game_home_limit = \helper\options::options_by_key_type('game_home_limit', 'display');
if ($game_home_limit) {
    $limit = $game_home_limit;
} else {
    $limit = 50;
}

if (!$field_order) {
    $field_order = 'publish_date';
}

$limit =1;

$page = 1;
$order_type = 'DESC';
$display = 'yes';
$num_link = 3;

//tag>index.php
if ($tags_id) {
    $games = \helper\game::paging_by_tag($tags_id, $page, $limit, $order_by, $order_type, $not_equal);
    $count = \helper\game::count_by_tag($tags_id);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_link);
} else {
    $games = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
    $count = \helper\game::get_count($keywords, $type, $display, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_link);
}

//get all game category + tag = function
$categories = \helper\category::find_by_taxonomy('game');
$tags = \helper\tag::find_tag_by_taxonomy('game');

//page off all tag
$title = \helper\options::options_by_key_type('site_name');
$description = \helper\options::options_by_key_type('site_description');
//tag>index.php + games>index.php => bread_crumb.php 
if ($category) {
    $arr_bread = array(
        array(
            "name" => $category->name,
        ),
    );
    $title = $category->name;
    $description = $category->description;
}
if ($tag) {
    $arr_bread = array(
        array(
            "name" => $tag->name,
        ),
    );
    $title = $tag->name;
    $description = $tag->description;
}
if ($keywords) {
    $arr_bread = array(
        array(
            "name" => "Search",
        ),
    );
    $title = "Search results";
    $description = "Search results with keywords: $keywords";
}

?>
<?php
//error.php
if (!count($games)) : ?>
    <?php echo \helper\themes::get_layout('error', array('keywords' => $keywords, 'title' => $title)); ?>
<?php else : ?>
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="slogan">
                    <h1>
                        <span class="slogan_icon" style="background-image: url(<?php echo $theme_url; ?>rs/imgs/26a1.png);"></span>
                        <?php echo $title; ?>
                    </h1>
                    <p class="font-display"><?php echo $description; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="tag">
                    <ul class="flex center flex-wrap">
                        <li class="tag_item">
                            <span class="tag_btn font-display" style="background-color:rgb(19 23 64/1);">All</span>
                        </li>
                        <?php if (count($categories) || count($tags)) : ?>
                            <?php foreach ($categories as $catego) : ?>
                                <li class="tag_item">
                                    <a href="/games/<?php echo $catego->slug; ?>" title="<?php echo $catego->name; ?>" class="tag_btn font-display">
                                        <?php if ($catego->image) : ?>
                                            <span>
                                                <img class="icon_tag" src="<?php echo \helper\image::get_thumbnail($catego->image, 20, 20, "m") ?>" width="20" height="20" alt="<?php echo $catego->name; ?>">
                                            </span>
                                        <?php endif; ?>
                                        <span><?php echo $catego->name; ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <?php foreach ($tags as $tag_new) : ?>
                                <li class="tag_item">
                                    <a href="/tag/<?php echo $tag_new->slug; ?>" title="<?php echo $tag_new->name; ?>" class="tag_btn font-display">
                                        <?php if ($tag_new->image) : ?>
                                            <span>
                                                <img class="icon_tag" src="<?php echo \helper\image::get_thumbnail($tag_new->image, 20, 20, "m") ?>" width="20" height="20" alt="<?php echo $tag_new->name; ?>">
                                            </span>
                                        <?php endif; ?>
                                        <span><?php echo $tag_new->name; ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>

            <div class="row" id="ajax-append">
                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'category_id' => $category_id, 'paging_content' => $paging_content, 'keywords' => $keywords)); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<script>
    keywords = "<?php echo $keywords; ?>";
    field_order = "<?php echo $field_order ?>";
    order_type = "<?php echo $order_type ?>";
    category_id = "<?php echo $category_id ?>";
    is_hot = "<?php echo $is_hot ?>";
    is_new = "<?php echo $is_new ?>";
    tags_id = "<?php echo $tags_id ?>";
    limit = "<?php echo $limit ?>";
</script>