<?php
$game_related_limit = \helper\options::options_by_key_type('game_related_limit', 'display');
if ($game_related_limit) {
    $limit = $game_related_limit;
} else {
    $limit = 14;
}

$url = load_url()->current_url();
$page = 1;
$order_type = "DESC";
$display = 'yes';
$field_order = "views";
$not_equal['id'] = $game->id;

//get tag down html .game__content
$list_tags = \helper\game::find_related_tag($game->id);
//get category down
$list_cate = \helper\game::find_related_category($game->id);
// in($game);
// in($list_tags);

/* breadcrumb down + category*/
if (count($list_cate)) {
    $arr_bread = array(
        array(
            'name' => $list_cate[0]->name,
            'slug' => $list_cate[0]->slug,
            'source' => 'games/' . $list_cate[0]->slug
        ),
        array(
            'name' => $game->name
        )
    );
    $category_id = $list_cate[0]->id;
} else {
    $arr_bread = array(
        array(
            'name' => $game->name
        )
    );
}

if ($category_id) {
    //get all game with the same category => game same same display down
    foreach ($list_cate as $cateid) {
        $g = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $cateid->id, $not_equal);
        foreach ($g as $g1) {
            $g2[] = $g1;
        }
    }
    $games_category = \helper\game::remove_duplicate_game($g2);
} else {
    //if not category
    $games_category = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, null, $not_equal);
}

$games_news = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, "publish_date", $order_type, null, $not_equal);

?>

<div class="container">
    <div class="row">
        <div class="container-1024">
            <?php echo \helper\themes::get_layout('breadcrumb', array('arr_bread' => $arr_bread)); ?>

            <div class="page-section">
                <iframe id="iframehtml5" title="<?php echo $game->name; ?>" width="100%" height="<?php echo ($game->height > 600) ? $game->height : 600 ?>" src="/<?= $game->slug ?>.embed" frameborder="0" border="0" scrolling="no" class="iframe-default" allowfullscreen></iframe>
                <?php echo \helper\themes::get_layout('header_game', array('game' => $game)); ?>
            </div>

            <!-- tag category >tag>index.php -->
            <?php if (count($list_cate) || count($list_tags)) : ?>
                <div class="tag">
                    <?php foreach ($list_cate as $cate) : ?>
                        <a class="tags-btn" href="/games/<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>"><?php echo $cate->name; ?></a>
                    <?php endforeach; ?>
                    <?php foreach ($list_tags as $tag) : ?>
                        <a class="tags-btn" href="/tag/<?php echo $tag->slug; ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php echo \helper\themes::get_layout('product_item', array('games' => $games_category, 'flag' => true)); ?>
            <!-- list game - product_item.php -->

            <!-- content - sologan.php -->

            <!-- Categories & Tags -->

            <div class="game__content">
                <h1 class="title-option">About: <?php echo $game->name; ?></h1>
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
                <?php

                // comment.php -game_lay.php ========================================================================
                echo '<h2>Discuss for ' . $game->name . '</h2>';
                echo \helper\themes::get_layout('comment', array('url' => $url));
                ?>
            </div>
            <div class="games_more">
                <?php echo \helper\themes::get_layout('product_item', array('games' => $games_news, 'flag' => true)); ?>
            </div>
        </div>
    </div>
</div>