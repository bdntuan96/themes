<?php
$limit = \helper\options::options_by_key_type('game_related_limit','display');
if(!$limit) {
    $limit = 4;
}

$page = 1;
$display = 'yes';
$field_order = "views";
$order_type = "DESC";
$not_equal['id'] = $game->id;

//comment
$url = load_url()->current_url();


// in($list_cate);die; array=>game base id => 1 game object fist

$list_cate = \helper\game::find_related_category($game->id);
$list_tags = \helper\game::find_related_tag($game->id);

// in($arr_bread );die;

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
        ),
    );
    $category_id = $list_cate[0]->id;
} else {
    $arr_bread = array(
        array(
            'name' => $game->name,
        )
    );
}

if ($category_id) {
    foreach ($list_cate as $cate_id) {
        $game_cate = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $cate_id->id, $not_equal);
        foreach ($game_cate as $game_cate1) {
            $game_cate2[] = $game_cate1;
        }
    }
    //filter game same same + resset arr 
    $games_category = \helper\game::remove_duplicate_game($game_cate2);
    $games_category = array_values($games_category);
} else {
    //else: $category_id =>NULL
    $games_category = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, NULL, $not_equal);
}
//game_more base "publish_date" $category_id= NULL
$games_news = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, "publish_date", $order_type, NULL, $not_equal);

?>

<div class="game_play">
    <div class="container">
        <br>
        <div class="row">
            <div class="page-section">
                <iframe class="block" id="iframehtml5" title="<?php echo $game->name; ?>" width="100%" height="<?php echo ($game->height > 600) ? $game->height : 600 ?>" src="/<?= $game->slug ?>.embed" frameborder="0" border="0" scrolling="no" class="iframe-default" allowfullscreen></iframe>
                <?php echo \helper\themes::get_layout('header_game', array('game' => $game)); ?>
            </div>
            <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_category)); ?>

            <div class="game__content">
                <?php echo \helper\themes::get_layout('bread_crumb', array('arr_bread' => $arr_bread)); ?>
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
                <h3 class="title-option">Categories & Tags</h3>
                <?php echo \helper\themes::get_layout('tag_item', array('list_cate' => $list_cate, 'list_tags' => $list_tags, 'is_game_play' => 'is_game_play')); ?>

                <?php
                // comment.php -game_lay.php ========================================================================
                echo '<h2>Discuss for ' . $game->name . '</h2>';
                //echo \helper\themes::get_layout('comment', array('url' => $url));
                ?>
                <div id="append-comment"></div>
            </div>
            <div class="games_more">
                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_news, 'flag' => true)); ?>
            </div>

        </div>
    </div>
</div>
<script>
    id_game = "<?php echo $game->id; ?>";
    url_game = "<?php echo $url; ?>";
</script>