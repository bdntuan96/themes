<?php
$site_name = helper\options::options_by_key_type('site_name');

$list_cate = \helper\category::find_by_taxonomy('game');
$list_tags = \helper\tag::find_tag_by_taxonomy('game');

$game_home_limit = \helper\options::options_by_key_type('game_home_limit', 'display');
if ($game_home_limit) {
    $limit = $game_home_limit;
} else {
    $limit = 16;
}
// $limit =1; 
if (!$field_order) {
    $field_order = "publish_date";
}
$page = 1;
$order_type = "DESC";
$display = "yes";
$num_link = 3;

// in($list_cate);
if ($tags_id) {
    $games = \helper\game::paging_by_tag($tags_id, $page, $limit, $order_by, $order_type, $not_equal);
    $count = \helper\game::count_by_tag($tags_id);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_link);
} else {
    $games = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
    $count = \helper\game::get_count($keywords, $type, $display, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_link);
}

$title = \helper\options::options_by_key_type('site_name');
$description = \helper\options::options_by_key_type('site_description');

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
if (!count($games)) : ?>
    <?php echo \helper\themes::get_layout('error', array('keywords' => $keywords)); ?>
<?php else : ?>
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="slogan">
                    <h1><?php echo $title; ?></h1>
                    <div class="font-display text-overflow3"><?php if ($description) {
                                                                    echo html_entity_decode($description);
                                                                } ?></div>
                </div>
            </div>

            <div class="row">
                <!-- $slug: tag>index + games>index (base tag+cate)
             - $tags_id + $category_id => filter game name same same 
             - * $is_home { => base: /index + (tag>index + games>index)} -->
                <?php echo \helper\themes::get_layout('tag_item', array('list_cate' => $list_cate, 'list_tags' => $list_tags, 'is_home' => $is_home, 'slug' => $slug, 'tags_id' => $tags_id, 'category_id' => $category_id)); ?>
            </div>

            <div class="row" id="ajax-append">
                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'category_id' => $category_id, 'paging_content' => $paging_content, 'keywords' => $keywords)); ?>
            </div>

            <?php if ($slogan) : ?>
                <div class="row">
                    <div class="game__content">
                        <h2 class="title-option"><?php echo $site_name; ?></h2>
                        <div> <?php echo html_entity_decode($slogan); ?></div>
                    </div>
                </div>
            <?php endif; ?>
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