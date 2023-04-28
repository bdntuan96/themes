<?php
// Start the session: lấy ra phiên của trang web lưu lại
session_start();

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
// 1. lay ra mảng 30 con game => lấy random 9 con tu mảng
$game_all = \helper\game::get_paging($page, 36, $keywords, $type, $display, $is_hot, $is_new, "views", "DESC", NULL, $not_equal);
// lấy ra 9 KEY ngẫu nhiên của game_all => nó trả về là 1 mảng vs các key = số random
$ran_game = Array_rand($game_all, 9);
// khai báo mảng trống trước sau đó để gán
$game_random = [];
// mảng số thì foreach nó ra để lấy từng số rồi gán ngược lại nó vs mảng trống vừa khai báo
foreach($ran_game as $ran) {
    $game_random[] = $game_all[$ran];
}

//game_more base "publish_date" $category_id= NULL
$games_news = \helper\game::get_paging($page, 9, $keywords, $type, $display, $is_hot, $is_new, "publish_date", "DESC", NULL, $not_equal);

// when accessing url -> update_views($game->id);
\helper\game::update_views($game->id);
?>

<div class="game-play">
    <div class="container">
        <div class="row">
            <div class="game-play-wrap">
                <div class="play">
                    <div class="play-game">
                        <iframe class="iframe-default" id="iframehtml5" title="<?php echo $game->name; ?>" width="100%" height="<?php echo ($game->height > 600) ? $game->height : 600 ?>px" src="/<?= $game->slug ?>.embed" frameborder="0" border="0" scrolling="no" allowfullscreen></iframe>
                        <?php echo \helper\themes::get_layout('header_game', array('game' => $game)); ?>
                    </div>

                    <div class="game__content play-content">
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

                <div class="navplay">
                    <div class="container-play">
                        <div class="row">
                            <div class="navplay-list">
                                <div class="flex-align navplay-title">
                                    <svg class="navplay-title-svg" viewBox="0 0 8 8" id="meteor-icon-kit__regular-plus-xxs" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 3V0.83333C3 0.3731 3.4477 0 4 0C4.5523 0 5 0.3731 5 0.83333V3H7.1667C7.6269 3 8 3.4477 8 4C8 4.5523 7.6269 5 7.1667 5H5V7.1667C5 7.6269 4.5523 8 4 8C3.4477 8 3 7.6269 3 7.1667V5H0.83333C0.3731 5 0 4.5523 0 4C0 3.4477 0.3731 3 0.83333 3H3z" />
                                    </svg>
                                    NEW GAMES
                                </div>
                                <div>
                                    <?php echo \helper\themes::get_layout('game_item_ajax_play', array('games' => $games_news)) ?>
                                </div>
                            </div>

                            <div class="navplay-list">
                                <div class="flex-align navplay-title">
                                    <svg class="navplay-title-svg navplay-title-svg-larger" viewBox="0 -6 24 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin" class="jam jam-gamepad-retro-f">
                                        <path d='M7 5V4a1 1 0 1 0-2 0v1H4a1 1 0 1 0 0 2h1v1a1 1 0 1 0 2 0V7h1a1 1 0 1 0 0-2H7zM6 0h12a6 6 0 1 1-4.472 10h-3.056A6 6 0 1 1 6 0zm12 5a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-2 2a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm4 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-2 2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z' />
                                    </svg>
                                    RANDOM GAMES
                                </div>
                                <div>
                                    <?php echo \helper\themes::get_layout('game_item_ajax_play', array('games' => $game_random)) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="games">
                <div class="flex-align games-title">
                    <svg class="games-title-svg svg-larger" width="" height="" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9 4.5C15.9 3 14.418 2 13.26 2c-.806 0-.869.612-.993 1.82-.055.53-.121 1.174-.267 1.93-.386 2.002-1.72 4.56-2.996 5.325V17C9 19.25 9.75 20 13 20h3.773c2.176 0 2.703-1.433 2.899-1.964l.013-.036c.114-.306.358-.547.638-.82.31-.306.664-.653.927-1.18.311-.623.27-1.177.233-1.67-.023-.299-.044-.575.017-.83.064-.27.146-.475.225-.671.143-.356.275-.686.275-1.329 0-1.5-.748-2.498-2.315-2.498H15.5S15.9 6 15.9 4.5zM5.5 10A1.5 1.5 0 0 0 4 11.5v7a1.5 1.5 0 0 0 3 0v-7A1.5 1.5 0 0 0 5.5 10z" />
                    </svg>
                    SIMILAR GAMES
                </div>
                <div class="games-list">
                    <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_category)) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    id_game = "<?php echo $game->id; ?>";
    url_game = "<?php echo $url; ?>";
</script>