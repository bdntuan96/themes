<?php
$limit = \helper\options::options_by_key_type('game_related_limit', 'display');
if (!$limit) {
    $limit = 50;
}

// $limit = 10;
$page = 1;
$order_type = "DESC";
$display = "yes";
$field_order = "views";
$not_equal['slug'] = $game->slug;

//comment
$url = load_url()->current_url();

$list_cate = \helper\game::find_related_category($game->id);
$list_tags = \helper\game::find_related_tag($game->id);

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

$games_views = \helper\game::get_paging($page, 20, $keywords, $type, $display, $is_hot, $is_new, "views", $order_type, NULL, $not_equal);

//game_more base "publish_date" $category_id= NULL
$games_news = \helper\game::get_paging($page, 10, $keywords, $type, $display, $is_hot, $is_new, "publish_date", $order_type, NULL, $not_equal);

// when accessing url -> update_views($game->id);
\helper\game::update_views($game->id);
?>

<div class="main game-main">
    <div class="main-wrap">
        <div class="game_play">
            <div class="grid-clayover">
                <div class="span-5x5">
                    <div class="play-game">
                        <iframe class="iframe-default" id="iframehtml5" title="<?php echo $game->name; ?>" width="100%" height="<?php echo ($game->height > 600) ? $game->height : 600 ?>px" src="/<?= $game->slug ?>.embed" frameborder="0" border="0" scrolling="no" allowfullscreen></iframe>
                        <?php echo \helper\themes::get_layout('header_game', array('game' => $game)); ?>
                    </div>
                </div>
                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_category)); ?>
            </div>
        </div>
        <div class="infor-game-item">
            <div class="container">
                <div class="row">
                    <div class="game__content span-content">
                        <?php echo \helper\themes::get_layout('bread_crumb', array('arr_bread' => $arr_bread)); ?>
                        <div class="op">
                            <h1 class="title-option"><?php echo $game->name; ?></h1>

                            <!-- rate -->
                            <div id="append-rate"></div>

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
                            <?php echo \helper\themes::get_layout('tag_item', array('list_cate' => $list_cate, 'list_tags' => $list_tags)); ?>

                            <!-- comment.php -game_lay.php -->
                            <div id="append-comment"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="game-more">
            <div class="grid-clayover">
                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_news)); ?>
            </div>
        </div>
    </div>
</div>
<script>
    id_game = "<?php echo $game->id; ?>";
    url_game = "<?php echo $url; ?>";

    let obj = {
        name: "<?php echo $game->name ?>",
        slug: "<?php echo $game->slug ?>",
        image: "<?php echo $game->image ?>",
    };
</script>