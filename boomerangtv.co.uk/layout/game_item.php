<?php
$limit = \helper\options::options_by_key_type('game_home_limit', 'display');
if (!$limit) {
    $limit = 50;
}

// $limit = 1;
if (!$field_order) {
    $field_order = "publish_date";
}
$display = "yes";
$order_type = "DESC";

if ($page == null) {
    $page = 1;
}
$num_links = 3;

if ($tag_ids) {
    $games = \helper\game::paging_by_tag($tag_ids, $page, $limit);
    $count = \helper\game::count_by_tag($tag_ids);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
} else {
    $games = \helper\game::get_paging($page, $limit, $keywords, $type, $dispasflay, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
    $count = \helper\game::get_count($keywords, $type, $display, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
}

$title = \helper\options::options_by_key_type('site_name');
$description = \helper\options::options_by_key_type('site_description');

if ($category) {
    $arr_bread = array(
        array(
            "name" => $category->name,
        ),
    );
    $title = $category->name;
    $description = $category->description;
}

if ($tag) {
    $arr_bread = array(
        array(
            "name" => $tag->name,
        ),
    );
    $title = $tag->name;
    $description = $tag->description;
}

if ($keywords) {
    $arr_bread = array(
        array(
            "name" => "search",
        ),
    );
    $title = "Search results";
    $description = "Search results with keywords: $keywords";
}

$list_cate = \helper\category::find_by_taxonomy('game');

?>
<?php
if (!count($games)) : ?>
    <?php echo \helper\themes::get_layout('error', array('keywords' => $keywords)); ?>
<?php else : ?>
    <div class="main">
        <div class="container">
            <div class="row">

                <section class="games">
                    <div class="games-wrap">
                        <div class="games-title">
                            <h2 class="games-title-h2 text"><?php echo ($is_home) ? "All Games" : $title ?></h2>
                        </div>
                        <div id="ajax-append">
                            <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'paging_content' => $paging_content)); ?>

                        </div>

                    </div>
                </section>
            </div>
            <div class="row">
                <div class="game__content">
                    <h1 class="title-option text"><?php echo $title; ?></h1>
                    <div><?php echo $slogan ? html_entity_decode($slogan) : html_entity_decode($description); ?></div>
                </div>
            </div>
            <div class="row">
                <section class="category">
                    <?php foreach ($list_cate as $k => $cate) : ?>
                        <a class="button category-item flex-sb <?php echo ($k % 2 == 0) ? "" : "bg-pink" ?>" href="/games/<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>">
                            <span class="text"><?php echo $cate->name; ?></span>
                            <?php if ($cate->image) : ?>
                                <img class="category-icon" src="<?php echo \helper\image::get_thumbnail($cate->image, 60, 60, "m") ?>" width="60" height="60" alt="<?php echo $cate->name; ?>" title="<?php echo $cate->name; ?>">
                            <?php else : ?>
                                <svg class="category-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 63 63" style="enable-background:new 0 0 63 63;" xml:space="preserve">
                                    <g id="games">
                                        <g id="games_1_">
                                            <path style="fill:#FFFFFF;" d="M58.992,19.129C55.953,9.868,48.863,9,48.863,9H47.55c-1.285,0-3.09,0.534-3.966,1.474
			l-2.824,3.389c-1.1,1.32-2.729,2.083-4.446,2.083H31.5h-4.813c-1.718,0-3.347-0.763-4.446-2.083l-2.824-3.389
			C18.541,9.534,16.735,9,15.45,9h-1.314c0,0-7.09,0.868-10.129,10.129c-2.853,8.695-3.473,16.64-3.473,22.862
			C0.535,52.987,7.047,54,7.047,54s1.013,0,3.183,0s4.341-3.039,6.656-7.958c2.315-4.92,3.617-5.643,6.511-5.643s8.103,0,8.103,0
			s5.209,0,8.103,0s4.196,0.723,6.511,5.643C48.429,50.961,50.6,54,52.77,54s3.183,0,3.183,0s6.511-1.013,6.511-12.01
			C62.465,35.768,61.845,27.824,58.992,19.129z M15.873,32.151c-3.836,0-6.945-3.11-6.945-6.945c0-3.836,3.109-6.945,6.945-6.945
			s6.945,3.11,6.945,6.945C22.818,29.042,19.709,32.151,15.873,32.151z M47.127,17.682c1.279,0,2.315,1.037,2.315,2.315
			c0,1.279-1.037,2.315-2.315,2.315c-1.279,0-2.315-1.036-2.315-2.315C44.812,18.718,45.848,17.682,47.127,17.682z M42.207,27.521
			c-1.279,0-2.315-1.036-2.315-2.315c0-1.279,1.036-2.315,2.315-2.315c1.279,0,2.315,1.036,2.315,2.315
			C44.523,26.484,43.486,27.521,42.207,27.521z M47.127,32.73c-1.279,0-2.315-1.037-2.315-2.315c0-1.279,1.036-2.315,2.315-2.315
			c1.279,0,2.315,1.036,2.315,2.315C49.442,31.693,48.406,32.73,47.127,32.73z M51.757,27.521c-1.279,0-2.315-1.036-2.315-2.315
			c0-1.279,1.036-2.315,2.315-2.315c1.279,0,2.315,1.036,2.315,2.315C54.072,26.484,53.036,27.521,51.757,27.521z" />
                                        </g>
                                    </g>
                                    <g id="Layer_1">
                                    </g>
                                </svg>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </section>
            </div>
        </div>
    </div>
<?php endif; ?>
<script>
    keywords = "<?php echo $keywords; ?>";
    field_order = "<?php echo $field_order ?>";
    order_type = "<?php echo $order_type ?>";
    category_id = "<?php echo $category_id ?>";
    is_hot = "<?php echo $is_hot ?>";
    is_new = "<?php echo $is_new ?>";
    tags_id = "<?php echo $tags_id ?>";
    limit = "<?php echo $limit ?>";
    title = "<?php echo $title ?>";
    $is_home = "<?php echo $is_home ?>";

</script>