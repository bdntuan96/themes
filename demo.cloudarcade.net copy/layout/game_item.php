<?php
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

// in($count);die;

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

$list_cate = \helper\category::find_by_taxonomy('game');
// $list_tags = \helper\tag::find_tag_by_taxonomy('game');

$games_news = \helper\game::get_paging($page, 12, $keywords, $type, $display, $is_hot, $is_new, "publish_date", $order_type, NULL, $not_equal);
$games_views = \helper\game::get_paging($page, 12, $keywords, $type, $display, $is_hot, $is_new, "views", $order_type, NULL, $not_equal);
?>
<?php
if (!count($games)) : ?>
    <?php echo \helper\themes::get_layout('error', array('keywords' => $keywords)); ?>
<?php else : ?>
    <main class="main">
        <div class="container">
            <div class="row">

                <?php if ($is_home) : ?>
                    <div class="games">
                        <div class="flex-align games-title">
                            <svg class="games-title-svg" viewBox="0 0 8 8" id="meteor-icon-kit__regular-plus-xxs" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 3V0.83333C3 0.3731 3.4477 0 4 0C4.5523 0 5 0.3731 5 0.83333V3H7.1667C7.6269 3 8 3.4477 8 4C8 4.5523 7.6269 5 7.1667 5H5V7.1667C5 7.6269 4.5523 8 4 8C3.4477 8 3 7.6269 3 7.1667V5H0.83333C0.3731 5 0 4.5523 0 4C0 3.4477 0.3731 3 0.83333 3H3z" />
                            </svg>
                            NEW GAMES
                        </div>
                        <div class="games-list">
                            <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_news)) ?>
                        </div>
                    </div>

                    <div class="games">
                        <div class="flex-align games-title">
                            <svg class="games-title-svg" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M458.622 255.92l45.985-45.005c13.708-12.977 7.316-36.039-10.664-40.339l-62.65-15.99 17.661-62.015c4.991-17.838-11.829-34.663-29.661-29.671l-61.994 17.667-15.984-62.671C337.085.197 313.765-6.276 300.99 7.228L256 53.57 211.011 7.229c-12.63-13.351-36.047-7.234-40.325 10.668l-15.984 62.671-61.995-17.667C74.87 57.907 58.056 74.738 63.046 92.572l17.661 62.015-62.65 15.99C.069 174.878-6.31 197.944 7.392 210.915l45.985 45.005-45.985 45.004c-13.708 12.977-7.316 36.039 10.664 40.339l62.65 15.99-17.661 62.015c-4.991 17.838 11.829 34.663 29.661 29.671l61.994-17.667 15.984 62.671c4.439 18.575 27.696 24.018 40.325 10.668L256 458.61l44.989 46.001c12.5 13.488 35.987 7.486 40.325-10.668l15.984-62.671 61.994 17.667c17.836 4.994 34.651-11.837 29.661-29.671l-17.661-62.015 62.65-15.99c17.987-4.302 24.366-27.367 10.664-40.339l-45.984-45.004z" />
                            </svg>
                            POPULAR GAMES
                        </div>
                        <div class="games-list">
                            <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_views)) ?>
                        </div>
                    </div>
                <?php endif ?>

                <div class="games">
                    <div class="flex-align games-title">
                        <?php if ($is_home) : ?>
                            <svg class="games-title-svg svg-larger" viewBox="0 -6 24 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin" class="jam jam-gamepad-retro-f">
                                <path d='M7 5V4a1 1 0 1 0-2 0v1H4a1 1 0 1 0 0 2h1v1a1 1 0 1 0 2 0V7h1a1 1 0 1 0 0-2H7zM6 0h12a6 6 0 1 1-4.472 10h-3.056A6 6 0 1 1 6 0zm12 5a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-2 2a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm4 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-2 2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z' />
                            </svg>
                            <span>YOU MAY LIKE</span>
                        <?php else : ?>
                            <div class="infor-page">
                                <div class="flex-sb infor-page-wrap">
                                    <h1 class="infor-page-title"><?php echo $title ?></h1>
                                    <span class="total-page">Total game: <?php echo $count; ?></span>
                                </div>
                                <div class="infor-page-desc"><?php echo html_entity_decode($description) ?></div>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="games-list" id="ajax-append">
                        <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'paging_content' => $paging_content)) ?>
                    </div>
                </div>

                <?php if ($slogan) : ?>
                    <div class="infor-web">
                        <div class="game__content">
                            <h1 class="title-option"><?php echo $title; ?></h1>
                            <div><?php echo html_entity_decode($slogan); ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
<?php endif ?>

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