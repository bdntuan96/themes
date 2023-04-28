<?php
$limit = \helper\options::options_by_key_type('game_home_limit', 'display');
if (!$limit) {
    $limit = 50;
}
// $limit = 1;

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
    // $title = "Search with keywords: $keywords";
    $description = "Search results with keywords: $keywords";
}

$max_page = ceil($count / $limit);

$list_cate = \helper\category::find_by_taxonomy('game');
// $list_tags = \helper\tag::find_tag_by_taxonomy('game');
?>

<main class="main">
    <div class="main-wrap">
        <!-- ============================================================ Home 1 ====================================================================== -->
        <?php if ($is_home) : ?>
            <div class="game-list margin-top">
                <div class="game-list-title">
                    <h2 class="game-list-title-h2">Recommended for you</h2>
                </div>
                <!-- ========== carousel market ===============  -->
                <div class="wrapper">
                    <div class="carousel">
                        <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'is_home' => true)) ?>
                    </div>
                </div>
            </div>
            <?php if (count($list_cate)) : ?>
                <?php foreach ($list_cate as $cate) : ?>
                    <?php $game_cate = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $cate->id, $not_equal); ?>
                    <div class="game-list">
                        <div class="game-list-title">
                            <h2 class="game-list-title-h2"><?php echo $cate->name; ?></h2>
                            <a href="/games/<?php echo $cate->slug; ?>" class="game-list-link">
                                View more</a>
                        </div>
                        <!-- ========== carousel market ===============  -->
                        <div class="wrapper">
                            <div class="carousel">
                                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $game_cate, 'is_home' => true)) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if ($slogan) : ?>
                <div class="infor-web-game">
                    <div class="container">
                        <div class="row">
                            <div class="infor-web">
                                <div class="game__content brand">
                                    <h1 class="title-option"><?php echo $title; ?></h1>
                                    <div><?php echo html_entity_decode($slogan); ?></div>
                                </div>

                                <div class="show-more">
                                    <button class="show-more-title" aria-label="open show more or close show more">Show More</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php else : ?>

            <!-- ============================================================ Home 2 ====================================================================== -->
            <?php echo \helper\themes::get_layout('game_home', array('games'=>$games, 'keywords'=>$keywords, 'title'=>$title, 'description'=>$description, 'paging_content'=>$paging_content, 'category_id'=>$category_id));?>
        <?php endif; ?>
</main>

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