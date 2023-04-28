<?php
$base_url = \helper\options::options_by_key_type('base_url');
$base_url = preg_replace('/([\/]+)$/', '', $base_url);
$url = $base_url . '/' . $game->slug;
$list_tags = \helper\game::find_related_tag($game->id);
$list_cate = \helper\game::find_related_category($game->id);
$theme_url = \helper\url::theme_url();
$display = 'yes';
$limit = \helper\options::options_by_key_type('game_related_limit', 'display');
if (!$limit) {
    $limit = 20;
}
$limit = (round($limit / 6)) * 6;
$page = 1;
$order_type = "DESC";
$order_by = \helper\options::options_by_key_type('field_order', 'display');
if (!$order_by) {
    $order_by = 'publish_date';
}

$not_equal['id'] = $game->id;

if (count($list_cate)) {
    $category_id = $list_cate[0]->id;
}
if (count($list_tags)) {
    $tag_ids = $list_tags[0]->id;
}
$limit_vertical = 6;
if ($tag_ids) {
    $games_tag = \helper\game::paging_by_tag($tag_ids, $page, $limit_vertical, $order_by, $order_type, $type, $not_equal);
} else {
    $games_tag = \helper\game::get_paging($page, $limit_vertical, $keywords, $type, $display, $is_hot, "yes", "views", $order_type, null, $not_equal);
}

if ($category_id) {
    $games_category = \helper\game::get_paging($page, $limit_vertical, $keywords, $type, $display, $is_hot, $is_new, $order_by, $order_type, $category_id, $not_equal);
} else {
    $games_category = \helper\game::get_paging($page, $limit_vertical, $keywords, $type, $display, 'yes', $is_new, $order_by, $order_type, null, $not_equal);
}
$new_game = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $order_by, $order_type, null, $not_equal);
?>


<div class="game_play">
    <div class="containing">
        <div class="p-r throw-game">
            <div class="game-frame">
                <?php if ($enable_ads) : ?>
                    <div class="throw-ads-300x600 throw-ads-left">
                        <?php echo \helper\themes::get_layout('ads_layout/300x600', array('enable_ads' => $enable_ads)); ?>
                    </div>
                <?php endif; ?>
                <div class="show-more-game left-game">
                    <div class="on-game">
                        <?php echo \helper\themes::get_layout('game_item_more', array('games' => $games_tag)); ?>
                    </div>
                </div>
                <div class="iframe">
                    <iframe id="iframehtml5" width="100%" height="<?php echo ($game->height) ? $game->height : 560 ?>" src="/<?= $game->slug ?>.embed" frameborder="0" border="0" scrolling="no" class="iframe-default" allowfullscreen></iframe>
                    <?php echo \helper\themes::get_layout('header_game', array('game' => $game)); ?>
                </div>
                <div class="show-more-game right-game">
                    <div class="on-game">
                        <?php echo \helper\themes::get_layout('game_item_more', array('games' => $games_category)); ?>
                    </div>
                </div>
                <?php if ($enable_ads) : ?>
                    <div class="throw-ads-300x600 throw-ads-right">
                        <?php echo \helper\themes::get_layout('ads_layout/300x600', array('enable_ads' => $enable_ads)); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($enable_ads) : ?>
                <div class="throw-ads-768x90">
                    <?php echo \helper\themes::get_layout('ads_layout/768x90', array('enable_ads' => $enable_ads)); ?>
                    <div style="height:20px;"></div>
                </div>
            <?php endif; ?>
            <div class="custom-games">
                <div class="bz group-b game-info">
                    <h2 class="title-option">About: <?php echo $game->name; ?></h2>
                    <?php if ($game->content) : ?>
                        <?php echo html_entity_decode($game->content); ?>
                    <?php else: ?>
                        <p><?php echo $game->excerpt; ?></p>
                    <?php endif; ?>
                    <?php if ($game->controlsguide) : ?>
                        <h2 class="title-option">Instructions</h2>
                        <?php echo html_entity_decode($game->controlsguide); ?>
                    <?php endif; ?>
                    <?php if (count($list_cate) || count($list_tags)) : ?>
                        <h3 class="title-option">Categories & Tags</h3>
                        <div class="list_cate">
                            <?php foreach ($list_cate as $cate) : ?>
                                <a class="text-overflow meta" href="/games/<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>"><?php echo $cate->name; ?></a>
                            <?php endforeach; ?>
                            <?php foreach ($list_tags as $tag) : ?>
                                <a class="text-overflow meta" href="/tags/<?php echo $tag->slug; ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="bz group-b game-rate">
                    <h2 class="title-option">Discuss <?php echo $game->name; ?></h2>
                    <?php echo \helper\themes::get_layout('comment', array('url' => $url)); ?>
                </div>
            </div>

            <?php if (count($new_game)) : ?>
                <div class="relate-box">
                    <h3 class="title-option text-center">new games</h3>
                    <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $new_game)); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>