<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$page = $_GET['page'];
if ($page == null) {
    $page = 1;
}
$display = 'yes';
$limit = \helper\options::options_by_key_type('game_home_limit', 'display');
if (!$limit) {
    $limit = 24;
}
$enable_ads = \helper\game::get_ads_control();
$field_order = \helper\options::options_by_key_type('field_order', 'display');
if (!$field_order) {
    $field_order = 'publish_date';
}
$num_links = 3;
$order_type = 'DESC';
$tags_id = $tag->id;
$category_id = $category->id;
if ($tags_id != '') {
    //tim danh sach game theo tag_id duoc truyen vao
    $games = \helper\game::paging_by_tag($tags_id, $page, $limit);
    $count = \helper\game::count_by_tag($tags_id);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
} else {
    $games = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
    $count = \helper\game::get_count($keywords, $type, $dipslay, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
}
$slogan = \helper\options::options_by_key_type('company_slogan', 'company');
$categories = \helper\category::paging(1, 10);
?>

<div class="bz w-full big-title">
    <div class="w-full h-full inside">
        <div class="box">
            <?php if (!$title) : ?>
                <h1 class="home-title"><?php echo \helper\options::options_by_key_type('site_name'); ?></h1>
                <div class="tab">
                    <?php if ($slogan) : ?>
                        <?php echo html_entity_decode($slogan); ?>
                    <?php else : ?>
                        <p><?php echo \helper\options::options_by_key_type('site_description'); ?></p>
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <h1 class="home-title"><?php echo $title; ?></h1>
                <?php if ($description) : ?>
                    <div class="tab">
                        <p><?php echo $description; ?></p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</div>
<div class="bz main-container">
    <div class="containing">
        <div class="throw-game">
            <div class="d-flex jeach-game-item">
                <div class="w-50">
                    <?php if ($title) : ?>
                        <h2 class="pick change-title"><?php echo $title; ?></h2>
                    <?php else : ?>
                        <h2 class="pick change-title">All Games</h2>
                    <?php endif; ?>
                </div>
                <?php if (!$title) : ?>
                    <div class="w-50 group-a">
                        <div id="sort-by" class="p-r sort-by">
                            <div class="p-r show-list">
                                <h4 class="pick" data-status="off">Sort by: <span id="by" class="by">All Games</span></h4>
                                <!--<i id="chevron" class="fa fa-chevron-down" aria-hidden="true"></i>-->
                                <span id="chevron">
                                    <svg fill="#fff" width="18px" height="18px" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#fff" d="M2.39 6.49a1.5 1.5 0 0 1 2.12-.1L9 10.47l4.49-4.08a1.5 1.5 0 0 1 2.02 2.22L10 13.62A1.474 1.474 0 0 1 9 14a1.523 1.523 0 0 1-1-.38L2.49 8.61a1.5 1.5 0 0 1-.1-2.12z"/>
                                    </svg>

                                </span>
                            </div>
                            <div class="list-cate-ajax">
                                <span class="text-overflow value this-pick" onclick="sortBy(this, '')">All Games</span>
                                <?php foreach ($categories as $cate) : ?>
                                    <span class="text-overflow value" onclick="sortBy(this, '<?php echo $cate->id; ?>')"><?php echo $cate->name; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="list-games-item">
                <?php if (!count($games)) : ?>
                    <?php echo \helper\themes::get_layout('not_found', array('keywords' => $keywords)); ?>
                <?php else : ?>
                    <div id="ajax-append">
                        <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'paging_content' => $paging_content)); ?>
                    </div>
                    <div class="gif">
                        <img id="loading_img" class="hidden" src="/<?php echo DIR_THEME ?>rs/imgs/icon_loader.gif" />
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    let order_type = "<?php echo $order_type; ?>";
    let field_order = "<?php echo $field_order; ?>";
    let tag_id = "<?php echo $tags_id; ?>";
    let category_id = "<?php echo $category_id; ?>";
    let keywords = "<?php echo $keywords; ?>";
    let is_hot = "<?php echo $is_hot; ?>";
    let is_new = "<?php echo $is_new; ?>";
    let limit = "<?php echo $limit; ?>";

    $(".pick").on('click', function () {
        $(".list-cate-ajax").slideToggle();
        let status = $(this).data('status');
        if (status == 'off') {
            $("#chevron").css({
                'transform': "rotate(180deg)"
            });
            $(this).data('status', 'on');
        } else {
            $("#chevron").css({
                'transform': "rotate(0)"
            });
            $(this).data('status', 'off');
        }
    });

    function sortBy(element, id) {
        $(".value").removeClass("this-pick");
        $(element).addClass("this-pick");
        $("#by").html($(element).text());
        $(".change-title").html($(element).text());
        $(".list-cate-ajax").hide();
        $("#chevron").css({
            'transform': "rotate(0)"
        });
        $('.pick').data('status', 'off');
        category_id = id;
        paging(1);
    }

    function paging(p) {
        $(".gif").removeClass("hidden");
        var url = '/paging.ajax';
        $.ajax({
            type: "POST",
            url: url,
            data: {
                page: p,
                keywords: keywords,
                tag_id: tag_id,
                category_id: category_id,
                field_order: field_order,
                order_type: order_type,
                is_hot: is_hot,
                is_new: is_new,
                limit: limit
            },
            success: function (xxxx) {
                $(".gif").addClass("hidden");
                if (xxxx !== '') {
                    $("#ajax-append").html(xxxx);
                }
            }
        });
    }
</script>