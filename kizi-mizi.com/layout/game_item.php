<?php
$logo = \helper\options::options_by_key_type('logo');

$limit = \helper\options::options_by_key_type('game_home_limit', 'display');
if (!$limit) {
    $limit = 50;
}

if (!$field_order) {
    $field_order = "publish_date";
}
$display = "yes";
$order_type = "DESC";

if ($page == null) {
    $page = 1;
}
$num_link = 3;

if ($tag_ids) {
    $games = \helper\game::paging_by_tag($tag_ids, $page, $limit);
    $count = \helper\game::count_by_tag($tag_ids);
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

$max_page = ceil($count / $limit);

?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="grid-clayover" id="ajax-append">
                <div class="grid-item span-1x4  fun">
                    <?php if (!$is_home2) : ?>
                        <h2 class="main-title main-title2">Have fun</h2>
                    <?php else : ?>
                        <h2 class="main-title">🟠<?php echo $title; ?> (<?php echo $count; ?>)</h2>
                    <?php endif; ?>

                </div>
                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'category_id' => $category_id, 'paging_content' => $paging_content, 'keywords' => $keywords)); ?>
            </div>
        </div>
        <div class="row">
            <div class="game__content brand">
                <?php echo \helper\themes::get_layout('bread_crumb', array('arr_bread' => $arr_bread)); ?>
                <div class="op">
                    <h1 class="title-option"><?php echo $title; ?></h1>
                    <div><?php echo $slogan ? html_entity_decode($slogan) : html_entity_decode($description); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    keywords = "<?php echo $keywords; ?>";
    field_order = "<?php echo $field_order ?>";
    order_type = "<?php echo $order_type ?>";
    category_id = "<?php echo $category_id ?>";
    is_hot = "<?php echo $is_hot ?>";
    is_new = "<?php echo $is_new ?>";
    tags_id = "<?php echo $tags_id ?>";
    limit = "<?php echo $limit ?>";
    max_page = "<?php echo $max_page ?>";
</script>