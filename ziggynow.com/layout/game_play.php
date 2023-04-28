<?php
//lấy trong cài đặt cấu hình trang chủ seo
$game_related_limit = \helper\options::options_by_key_type('game_related_limit', 'display');
if ($game_related_limit) {
    $limit = $game_related_limit;
} else {
    $limit = 14;
}

//phần bình luận cho game của mn
//$url = url hien tai cua site
$url = load_url()->current_url();
$page = 1;
$order_type = "DESC";
$display = 'yes';
$field_order = "views";
$not_equal['id'] = $game->id;

// breadcrumb.php + pagination.php
//móc tag + danh mục: được gắn sd hàm lấy_có liên quan_tag
$list_tags = \helper\game::find_related_tag($game->id);
$list_cate = \helper\game::find_related_category($game->id);
// in($game);
// in($list_tags);

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
    //get all game with the same category
    foreach ($list_cate as $cateid) {
        $g = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, "publish_date", $order_type, $cateid->id, $not_equal);
        foreach ($g as $g1) {
            $g2[] = $g1;
        }
    }
    $games_category = \helper\game::remove_duplicate_game($g2);
} else {
    //if not category
    $games_category = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, "publish_date", $order_type, null, $not_equal);
}

?>

<div class="container">
    <?php echo \helper\themes::get_layout('breadcrumb', array('arr_bread' => $arr_bread)); ?>
    <div class="row">
        <div class="page-section">
            <iframe id="iframehtml5" title="<?php echo $game->name; ?>" width="100%" height="<?php echo ($game->height > 600) ? $game->height : 600 ?>" src="/<?= $game->slug ?>.embed" frameborder="0" border="0" scrolling="no" class="iframe-default" allowfullscreen></iframe>
            <?php echo \helper\themes::get_layout('header_game', array('game' => $game)); ?>
        </div>
    </div>
        <?php echo \helper\themes::get_layout('product_item', array('games' => $games_category)); ?>
    <!-- phần hiện ds game bên product_item.php -->

    <!-- phần content bên sologan.php -->

    <!-- phần Categories & Tags -->
    <div class="row">
        <div class="game__content">
            <h2 class="title-option">About: <?php echo $game->name; ?></h2>
            <!-- lấy ra: nội dung hoặc đoạn trích/mô tả của $game -->
            <?php if ($game->content) : ?>
                <?php echo html_entity_decode($game->content); ?>
            <?php else : ?>
                <p><?php echo $game->excerpt; ?></p>
            <?php endif; ?>

            <!-- lấy ra phần hướng dẫn điều khiển của $game -->
            <?php if ($game->controlsguide) : ?>
                <h2 class="title-option">Instructions</h2>
                <?php echo html_entity_decode($game->controlsguide); ?>
            <?php endif; ?>

            <!-- kiểm tra = đếm count đúng $list_cate HOẶC $list_tags -->
            <!-- tag category >tag>index.php -->
            <?php if (count($list_cate) || count($list_tags)) : ?>
                <h3 class="title-option">Categories & Tags</h3>
                <?php foreach ($list_cate as $cate) : ?>
                    <a class="tags-btn" href="/games/<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>"><?php echo $cate->name; ?></a>
                <?php endforeach; ?>

                <?php foreach ($list_tags as $tag) : ?>
                    <a class="tags-btn" href="/tag/<?php echo $tag->slug; ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php

            // cho hiển thị ra phần comment.php ========================================================================
            echo '<h2>Discuss for ' . $game->name . '</h2>';
            echo \helper\themes::get_layout('comment', array('url' => $url));
            ?>
        </div>
    </div>
</div>