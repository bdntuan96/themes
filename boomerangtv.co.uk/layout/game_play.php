<?php
$limit = \helper\options::options_by_key_type('game_related_limit', 'display');
if (!$limit) {
    $limit = 3;
}
$page = 1;
$display = 'yes';
$field_order = 'views';
$order_type = 'DESC';
$not_equal['id'] = $game->id;

//comment + rate
$url = load_url()->current_url();
$id_game = $game->id;

// tim danh sach cac danh muc duoc gan voi game, theo game->id.
// tra ve mot mang danh sach cac danh muc neu co hoac null
$list_cate = \helper\game::find_related_category($game->id);


// tim danh sach cac tag duoc gan voi game, theo game->id.
// tra ve mot mang danh sach cac tag neu co hoac null
$list_tags = \helper\game::find_related_tag($game->id);
// in($list_cate);die; array=>game base id => 1 game object fist

// breadcrumb down + category + (tag games category >tag>index.php)
if (count($list_cate)) {
    $arr_bread = array(
        array(
            'name' => $list_cate[0]->name,
            'slug' => $list_cate[0]->slug,
            'source' => 'games/' . $list_cate[0]->slug,
        ),
        array(
            'name' => $game->name,
        )
    );
    $category_id = $list_cate[0]->id;
} else {
    $arr_bread = array((array(
        'name' => $game->name,
    )
    ));
}
if ($category_id) {
    foreach ($list_cate as $cate_id) {
        $g = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $cate_id->id, $not_equal);
        foreach ($g as $g1) {
            $g2[] = $g1;
        }
    }
    //filter game same same + resset arr 
    $games_category = \helper\game::remove_duplicate_game($g2);
    $games_category = array_values($games_category);
} else {
    //else: $category_id =>NULL
    $games_category = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, NULL, $not_equal);
}
//game_more base "publish_date" $category_id= NULL
$games_news = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, "publish_date", $order_type, NULL, $not_equal);

// when accessing url -> update_views($game->id);
\helper\game::update_views($game->id);
// \helper\game::increate_like($game->id);

?>

<section class="game-play">
    <div class="container">
        <div class="row">
            <div class="game-play-infor">
                <iframe class="iframe-default" id="iframehtml5" title="<?php echo $game->name; ?>" width="100%" height="<?php echo ($game->height > 600) ? $game->height : 600 ?>px" src="/<?= $game->slug ?>.embed" frameborder="0" border="0" scrolling="no" allowfullscreen></iframe>
                <?php echo \helper\themes::get_layout('header_game', array('game' => $game)); ?>
            </div>
            <div class="game-more">

                <h2 class="more-game">Related Games</h2>
                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_category)); ?>
            </div>
            <div class="game__content">
                <!-- bread_crumb -->
                <?php echo \helper\themes::get_layout('bread_crumb', array('arr_bread' => $arr_bread)) ?>
                <h1 class="title-option"><?php echo $game->name; ?></h1>
                <!-- full_rate_mini -->
                <div id="append-rate"></div>
                <?php //echo \helper\themes::get_layout('full_rate_mini', array('id' => $game->id)); 
                ?>
                <!-- desc $game -->
                <?php if ($game->content) : ?>
                    <?php echo html_entity_decode($game->content); ?><br>
                <?php else : ?>
                    <p><?php echo $game->excerpt; ?></p><br>
                <?php endif; ?>

                <!-- controlguide $game -->
                <?php if ($game->controlsguide) : ?>
                    <h2 class="title-option">Instructions: </h2>
                    <?php echo html_entity_decode($game->controlsguide); ?>
                <?php endif; ?>
                <br>
                <?php echo \helper\themes::get_layout('tag_item', array('list_cate' => $list_cate, 'list_tags' => $list_tags, 'is_game_play' => 'is_game_play')); ?>

                <?php
                // comment.php -game_lay.php ========================================================================
                echo '<h2>Discuss for ' . $game->name . '</h2>';
                //echo \helper\themes::get_layout('comment', array('url' => $url));
                ?>
                <div id="append-comment"></div>
            </div>
            <div class="game-more game-more2">
                <h2 class="more-game">More Games</h2>
                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_news)); ?>
            </div>
        </div>
    </div>
</section>

<script>
    id_game = "<?php echo $id_game; ?>";
    url_game = "<?php echo $url; ?>";
</script>