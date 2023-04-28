<?php
$game_related_limit = \helper\options::options_by_key_type('game_related_limit', 'display');
// $game_category_limit = \helper\options::options_by_key_type('game_category_limit', 'display');
if ($game_related_limit) {
    $limit = $game_related_limit;
} else {
    $limit = 24;
}

$url = load_url()->current_url();
$page = 1;
$order_type = "DESC";
$display = 'yes';
$field_order = "views";
$not_equal['id'] = $game->id;

//get tag down html 
$list_tags = \helper\game::find_related_tag($game->id);
//get category down
$list_cate = \helper\game::find_related_category($game->id);

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
    //phần + more bên phải màn hình cho nó hiện ra cả mảng giống khi ấn vào tag action
    //neu ma ton tai thang $category1 thi nhap vao more game nhay den trang danh muc cua category1
    $category1 = $list_cate[0];
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
        $g = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $cateid->id, $not_equal);
        foreach ($g as $g1) {
            $g2[] = $g1;
        }
    }

    // 2 biến này: giúp hiển thị game bên phải(.game-relate-tag) là loại tương tự game hiện tại 
    //hàm lọc/xóa trò chơi trùng lặp hiện ra khi có nhiều tag
    $games_category = \helper\game::remove_duplicate_game($g2);
    //reset lại key giá trị mảng bằng mảng mới khi đã xóa lặp ở trên
    $games_category = array_values($games_category);
} else {
    //if not category
    $games_category = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, null, $not_equal);
}

$games_news = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, "publish_date", $order_type, null, $not_equal);

?>

<?php echo \helper\themes::get_layout('bread_crumb', array('arr_bread' => $arr_bread, 'is_home' => true)); ?>

<div class="game_play">
    <div class="container">
        <div class="row">
            <div class="d-flex flop-game-row">
                <div class="game-frame-container">
                    <div class="game">
                        <iframe id="iframehtml5" class="d-block" width="100%" height="<?php echo ($game->height > 664) ? $game->height : 664 ?>" src="/<?= $game->slug ?>.embed" frameborder="0" border="0" scrolling="no" class="iframe-default" allowfullscreen>
                        </iframe>
                        <div class="d-flex al intro-game-box">
                            <div class="game-thumb">
                                <img width="46" height="46" src="<?php echo \helper\image::get_thumbnail($game->image, 46, 46, 'f'); ?>" title="<?php echo $game->name; ?>" alt="<?php echo $game->name; ?>" />
                            </div>
                            <div class="title-game-visible color-fff"><?php echo $game->name; ?></div>
                            <div class="d-flex list_button">
                                <button class="button is-like" data-class="active-like">
                                    <svg version="1.1" fill="#5795ea" width="20" height="20" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 478.2 478.2" style="enable-background:new 0 0 478.2 478.2;" xml:space="preserve">
                                        <g>
                                            <path d="M457.575,325.1c9.8-12.5,14.5-25.9,13.9-39.7c-0.6-15.2-7.4-27.1-13-34.4c6.5-16.2,9-41.7-12.7-61.5 c-15.9-14.5-42.9-21-80.3-19.2c-26.3,1.2-48.3,6.1-49.2,6.3h-0.1c-5,0.9-10.3,2-15.7,3.2c-0.4-6.4,0.7-22.3,12.5-58.1 c14-42.6,13.2-75.2-2.6-97c-16.6-22.9-43.1-24.7-50.9-24.7c-7.5,0-14.4,3.1-19.3,8.8c-11.1,12.9-9.8,36.7-8.4,47.7 c-13.2,35.4-50.2,122.2-81.5,146.3c-0.6,0.4-1.1,0.9-1.6,1.4c-9.2,9.7-15.4,20.2-19.6,29.4c-5.9-3.2-12.6-5-19.8-5h-61 c-23,0-41.6,18.7-41.6,41.6v162.5c0,23,18.7,41.6,41.6,41.6h61c8.9,0,17.2-2.8,24-7.6l23.5,2.8c3.6,0.5,67.6,8.6,133.3,7.3 c11.9,0.9,23.1,1.4,33.5,1.4c17.9,0,33.5-1.4,46.5-4.2c30.6-6.5,51.5-19.5,62.1-38.6c8.1-14.6,8.1-29.1,6.8-38.3 c19.9-18,23.4-37.9,22.7-51.9C461.275,337.1,459.475,330.2,457.575,325.1z M48.275,447.3c-8.1,0-14.6-6.6-14.6-14.6V270.1 c0-8.1,6.6-14.6,14.6-14.6h61c8.1,0,14.6,6.6,14.6,14.6v162.5c0,8.1-6.6,14.6-14.6,14.6h-61V447.3z M431.975,313.4 c-4.2,4.4-5,11.1-1.8,16.3c0,0.1,4.1,7.1,4.6,16.7c0.7,13.1-5.6,24.7-18.8,34.6c-4.7,3.6-6.6,9.8-4.6,15.4c0,0.1,4.3,13.3-2.7,25.8 c-6.7,12-21.6,20.6-44.2,25.4c-18.1,3.9-42.7,4.6-72.9,2.2c-0.4,0-0.9,0-1.4,0c-64.3,1.4-129.3-7-130-7.1h-0.1l-10.1-1.2 c0.6-2.8,0.9-5.8,0.9-8.8V270.1c0-4.3-0.7-8.5-1.9-12.4c1.8-6.7,6.8-21.6,18.6-34.3c44.9-35.6,88.8-155.7,90.7-160.9 c0.8-2.1,1-4.4,0.6-6.7c-1.7-11.2-1.1-24.9,1.3-29c5.3,0.1,19.6,1.6,28.2,13.5c10.2,14.1,9.8,39.3-1.2,72.7 c-16.8,50.9-18.2,77.7-4.9,89.5c6.6,5.9,15.4,6.2,21.8,3.9c6.1-1.4,11.9-2.6,17.4-3.5c0.4-0.1,0.9-0.2,1.3-0.3 c30.7-6.7,85.7-10.8,104.8,6.6c16.2,14.8,4.7,34.4,3.4,36.5c-3.7,5.6-2.6,12.9,2.4,17.4c0.1,0.1,10.6,10,11.1,23.3 C444.875,295.3,440.675,304.4,431.975,313.4z" />
                                        </g>
                                    </svg>
                                </button>
                                <button class="button is-dislike" data-class="active-dislike">
                                    <svg version="1.1" fill="#f836a8" width="20" height="20" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 478.174 478.174" style="enable-background:new 0 0 478.174 478.174;" xml:space="preserve">
                                        <g>
                                            <path d="M457.525,153.074c1.9-5.1,3.7-12,4.2-20c0.7-14.1-2.8-33.9-22.7-51.9c1.3-9.2,1.3-23.8-6.8-38.3 c-10.7-19.2-31.6-32.2-62.2-38.7c-20.5-4.4-47.4-5.3-80-2.8c-65.7-1.3-129.7,6.8-133.3,7.3l-23.5,2.8c-6.8-4.8-15.1-7.6-24-7.6h-61 c-23,0-41.6,18.7-41.6,41.6v162.5c0,23,18.7,41.6,41.6,41.6h61c7.2,0,13.9-1.8,19.8-5c4.2,9.2,10.4,19.7,19.6,29.4 c0.5,0.5,1,1,1.6,1.4c31.4,24.1,68.4,110.9,81.5,146.3c-1.3,11-2.6,34.8,8.4,47.7c4.9,5.7,11.7,8.8,19.3,8.8 c7.7,0,34.3-1.8,50.9-24.7c15.7-21.8,16.6-54.4,2.6-97c-11.8-35.8-12.9-51.7-12.5-58.1c5.4,1.2,10.7,2.3,15.8,3.2h0.1 c0.9,0.2,22.9,5.1,49.2,6.3c37.4,1.8,64.5-4.7,80.3-19.2c21.8-19.9,19.2-45.3,12.7-61.5c5.6-7.3,12.4-19.2,13-34.4 C471.925,178.974,467.325,165.674,457.525,153.074z M109.225,222.674h-61c-8.1,0-14.6-6.6-14.6-14.6v-162.5 c0-8.1,6.6-14.6,14.6-14.6h61c8.1,0,14.6,6.6,14.6,14.6v162.5C123.825,216.174,117.325,222.674,109.225,222.674z M430.925,232.374 c0,0.1,3.5,5.6,4.7,13.1c1.5,9.3-1.1,17-8.1,23.4c-19.1,17.4-74.1,13.4-104.8,6.6c-0.4-0.1-0.8-0.2-1.3-0.3 c-5.5-1-11.4-2.2-17.4-3.5c-6.4-2.3-15.2-2-21.8,3.9c-13.3,11.8-11.8,38.6,4.9,89.5c11,33.4,11.4,58.6,1.2,72.7 c-8.6,11.9-22.8,13.4-28.2,13.5c-2.4-4-3.1-17.7-1.3-29c0.3-2.2,0.1-4.5-0.6-6.7c-1.9-5.1-45.8-125.3-90.7-160.9 c-11.7-12.7-16.8-27.6-18.6-34.3c1.2-3.9,1.9-8.1,1.9-12.4v-162.4c0-3-0.3-6-0.9-8.8l10.1-1.2h0.1c0.6-0.1,65.7-8.5,130-7.1 c0.4,0,0.9,0,1.4,0c30.3-2.4,54.8-1.7,72.9,2.2c22.4,4.8,37.2,13.2,44,25.1c7.1,12.3,3.2,25,2.9,26.2c-2.1,5.6-0.2,11.7,4.6,15.3 c29.6,22.2,16,48.1,14.2,51.3c-3.3,5.2-2.5,11.8,1.8,16.3c8.6,9,12.8,18,12.5,26.8c-0.4,13.1-10.5,22.9-11.2,23.5 C428.225,219.474,427.325,226.774,430.925,232.374z" />
                                        </g>
                                    </svg>
                                </button>
                                <button class="button is-fullscreen" id="expand" data-class="false">
                                    <svg version="1.1" fill="#5795ea" width="24" height="24" x="0px" y="0px" viewBox="0 0 384.97 384.97" style="enable-background:new 0 0 384.97 384.97;" xml:space="preserve">
                                        <g id="Fullscreen">
                                            <path d="M384.97,12.03c0-6.713-5.317-12.03-12.03-12.03H264.847c-6.833,0-11.922,5.39-11.934,12.223 c0,6.821,5.101,11.838,11.934,11.838h96.062l-0.193,96.519c0,6.833,5.197,12.03,12.03,12.03c6.833-0.012,12.03-5.197,12.03-12.03 l0.193-108.369c0-0.036-0.012-0.06-0.012-0.084C384.958,12.09,384.97,12.066,384.97,12.03z" />
                                            <path d="M120.496,0H12.403c-0.036,0-0.06,0.012-0.096,0.012C12.283,0.012,12.247,0,12.223,0C5.51,0,0.192,5.317,0.192,12.03 L0,120.399c0,6.833,5.39,11.934,12.223,11.934c6.821,0,11.838-5.101,11.838-11.934l0.192-96.339h96.242 c6.833,0,12.03-5.197,12.03-12.03C132.514,5.197,127.317,0,120.496,0z" />
                                            <path d="M120.123,360.909H24.061v-96.242c0-6.833-5.197-12.03-12.03-12.03S0,257.833,0,264.667v108.092 c0,0.036,0.012,0.06,0.012,0.084c0,0.036-0.012,0.06-0.012,0.096c0,6.713,5.317,12.03,12.03,12.03h108.092 c6.833,0,11.922-5.39,11.934-12.223C132.057,365.926,126.956,360.909,120.123,360.909z" />
                                            <path d="M372.747,252.913c-6.833,0-11.85,5.101-11.838,11.934v96.062h-96.242c-6.833,0-12.03,5.197-12.03,12.03 s5.197,12.03,12.03,12.03h108.092c0.036,0,0.06-0.012,0.084-0.012c0.036-0.012,0.06,0.012,0.096,0.012 c6.713,0,12.03-5.317,12.03-12.03V264.847C384.97,258.014,379.58,252.913,372.747,252.913z" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="game-relate-tag">

                    <?php foreach ($games_category as $k => $game_item) : ?>
                        <?php if ($k > 3) {
                            break;
                        } ?>
                        <div class="throw-game">
                            <a class="card-game" href="<?php echo $game_item->slug; ?>">
                                <figure class="image-card-game">
                                    <img width="177" height="100" src="<?php echo \helper\image::get_thumbnail($game_item->image, 177, 100, 'f'); ?>" title="<?php echo $game_item->name; ?>" alt="<?php echo $game_item->name; ?>" />
                                </figure>
                                <div class="title-card-game">
                                    <div class="title-name">
                                        <span class="text-overflow"><?php echo $game_item->name; ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <?php if ($category1) : ?>
                        <div class="throw-game realted-more">
                            <a class="btn__more" aria-label="More" href="/games/<?php echo $category1->slug; ?>">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                                    <path id="XMLID_23_" d="M315,0H15C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V15 C330,6.716,323.284,0,315,0z M255,180h-75v75c0,8.284-6.716,15-15,15s-15-6.716-15-15v-75H75c-8.284,0-15-6.716-15-15 s6.716-15,15-15h75V75c0-8.284,6.716-15,15-15s15,6.716,15,15v75h75c8.284,0,15,6.716,15,15S263.284,180,255,180z" />
                                </svg>
                                More
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="d-r-flex game-information">
                <div class="game-info">
                    <div class="description__site">
                        <h1 class="home-title" style="color:#2a2a2a"><?php echo $game->name; ?></h1>

                        <?php echo \helper\themes::get_layout('full_rate_mini', array('id' => $game->id)); ?>
                        <div class="content-decode">
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
                            <?php ?>
                        </div>
                    </div>
                </div>

                <div class="game-categories-and-tags">
                    <div>
                        <div class="mini-pixel-zoom">

                            <!-- tag games category >tag>index.php -->
                            <?php if (count($list_cate) || count($list_tags)) : ?>
                                <div class="d-r-flex in-box-category-tags">
                                    <?php foreach ($list_cate as $cate) : ?>
                                        <a class="a-tag-box" href="/games/<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>">
                                            <span class="category-name"><?php echo $cate->name; ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                    <?php foreach ($list_tags as $tag) : ?>
                                        <a class="a-tag-box" href="/tag/<?php echo $tag->slug; ?>" title="<?php echo $tag->name; ?>">
                                            <span class="category-name"><?php echo $tag->name; ?></span>
                                        </a>

                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <h2 style="color:#2a2a2a;font-size:24px"><?php echo '<h2>Discuss for ' . $game->name . '</h2>';  ?></h2>
                            <div id="append-comment">
                                <?php echo \helper\themes::get_layout('comment', array('url' => $url)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="more-game">
            <?php echo \helper\themes::get_layout('product_item', array('games' => $games_news)); ?>
        </div>