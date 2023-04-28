<?php
//value=page in pagination.php vs paging  php

// if (isset($_REQUEST['page'])) {
//     $page = $_REQUEST['page'];
// } else {
//     $page = 1;
// }
$page = 1;

//admin =>seting limit 
$game_home_limit = \helper\options::options_by_key_type('game_home_limit', 'display');
if ($game_home_limit) {
    $limit = $game_home_limit;
} else {
    $limit = 24;
}

$order_type = 'DESC';
$display = 'yes';

if (!$field_order) {
    $field_order = 'publish_date';
}

//=>$paging_content > pagination.php
$num_links = 5;

// $not_equal['id'] = 1;
// $is_hot = 'yes';
//paging get $game based $tag_id 
if ($tags_id) {
    $games = \helper\game::paging_by_tag($tags_id, $page, $limit, $order_by, $order_type, $not_equal);
    $count = \helper\game::count_by_tag($tags_id);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
} else {
    //get all in $games based $category_id
    $games  = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
    $count = \helper\game::get_count($keywords, $type, $display, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
}

$title = \helper\options::options_by_key_type('site_name');
$description = \helper\options::options_by_key_type('site_description');
// bread_crumb.php
if ($category) {
    $arr_bread = array(
        array(
            'name' => $category->name
        )
    );
    //infor last downwn page tag
    $title = $category->name;
    $description = $category->description;
}
if ($tag) {
    $arr_bread = array(
        array(
            'name' => $tag->name
        )
    );
    $title = $tag->name;
    $description = $tag->description;
}

if ($keywords) {
    $arr_bread = array(
        array(
            'name' => 'Search'
        )
    );
    $title = "Search results";
    $description = "Search results with keywords: $keywords";
}

?>

<?php //if ($arr_bread) : 
?>
<?php echo \helper\themes::get_layout('bread_crumb', array('arr_bread' => $arr_bread, "title" => $title)); ?>
<?php //endif; 
?>

<?php
//error.php
if (!count($games)) : ?>
    <?php echo \helper\themes::get_layout('error', array('keywords' => $keywords, 'title' => $title)); ?>
<?php else : ?>
    <!-- <script type='text/javascript'>
        var themeurl = 'http://stumble-guys.net/themes/stumble-guys.net/';
   
        function get_format_url(controller, action) {
            var urlformat = '/:a:.:c:';
            urlformat = urlformat.replace(':c:', controller);
            return urlformat.replace(':a:', action);
        }
    </script> -->


    <!-- 
    - bread_crumb.php -based: $arr_bread
    - product_item.php -based: games' => $games, 'category_id' => $category_id, 
    ('paging_content' => $paging_content, 'keywords' => $keywords) :=> pagination.php*
 -->
 <div class="game_item">
        <div class="container">
            <div class="row" id="ajax-append">
                <?php echo \helper\themes::get_layout('product_item', array('games' => $games, 'category_id' => $category_id, 'paging_content' => $paging_content, 'keywords' => $keywords)); ?>
            </div>
            <div class="row">
                <div class="title-and-description-site">
                    <h2 class="home-title"><?php echo $title; ?></h2>
                    <div class="description__site"><?php echo $description; ?> </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    keywords = "<?php echo $keywords ?>";
    field_order = "<?php echo $field_order ?>";
    order_type = "<?php echo $order_type ?>";
    category_id = "<?php echo $category_id ?>";
    is_hot = "<?php echo $is_hot ?>";
    is_new = "<?php echo $is_new ?>";
    tags_id = "<?php echo $tags_id ?>";
    limit = "<?php echo $limit ?>";
</script>