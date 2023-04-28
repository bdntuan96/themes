<?php
//value=page in pagination.php
if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}

//admin =>seting limit 
$game_home_limit = \helper\options::options_by_key_type('game_home_limit', 'display');
if (!$game_home_limit) {
    $limit = 50;
} else {
    $limit = $game_home_limit;
}

$order_type = "DESC";
$display = 'yes';

if (!$field_order) {
    $field_order = "publish_date";
}

//=>$paging_content > pagination.php
$num_links = 3;

//paging get $game based $tag_id 
if ($tags_id) {
    $games = \helper\game::paging_by_tag($tags_id, $page, $limit, $order_by, $order_type, $not_equal);
    $count = \helper\game::count_by_tag($tags_id);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
} else {
    //get all in $games based $category_id
    $games = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
    $count = \helper\game::get_count($keywords, $type, $display, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
}

if ($category) {
    $arr_bread = array(
        array(
            'name' => $category->name
        )
    );
}

if ($tag) {
    $arr_bread = array(
        array(
            'name' => $tag->name
        )
    );
}

if ($keywords) {
    $arr_bread = array(
        array(
            'name' => "Search -  $keywords"
        )
    );
}
?>

<!-- main__product -->
<?php
//error.php
if (!count($games)) : ?>
    <?php echo \helper\themes::get_layout('error', array('error' => $keywords)); ?>

<?php else : ?>
    <!-- 
    - bread_crumb.php -based: $arr_bread
    - product_item.php -based: games' => $games, 'category_id' => $category_id, 
    'paging_content' => $paging_content, 'keywords' => $keywords :=> pagination.php*
 -->
    <section class="main">
        <div class="container">
            <div class="row">
                <?php echo \helper\themes::get_layout('breadcrumb', array('arr_bread' => $arr_bread)); ?>

                <?php echo \helper\themes::get_layout('product_item', array('games' => $games, 'category_id' => $category_id, 'paging_content' => $paging_content, 'keywords' => $keywords)); ?>
            </div>
    </section>
<?php endif; ?>