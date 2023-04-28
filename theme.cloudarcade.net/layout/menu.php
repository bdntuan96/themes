<?php
$theme_url = '/' . DIR_THEME;
$logo = \helper\options::options_by_key_type('logo');
$site_name = \helper\options::options_by_key_type('site_name');
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
$menu_header = \helper\menu::to_menu_directory_style($menu_header);
// in($menu_header);die;
// $list_category = \helper\category::paging(1, 10, '','name', 'desc');
// $list_tags = \helper\tag::paging(1, 10, '', 'name', 'desc');
$list_cate = \helper\category::find_by_taxonomy('game');
$list_tags = \helper\tag::find_tag_by_taxonomy('game');

// $games = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
// $game_new = \helper\game::get_paging(1, 15, $keywords, $type, "yes", null, "yes", "publish_date", "DESC", null, null);
?>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="flex-sb">
                <div class="sidebar">
                    <div class="side-header">
                        <a href="/" class="logo" title="<?php echo $site_name ?>">
                            <img src="<?php echo \helper\image::get_thumbnail($logo, '', 38, 'h') ?>" width="" height="38" alt="<?php echo $site_name ?> title="<?php echo $site_name ?>">
                        </a>
                    </div>
                </div>

                <div class="home">

                </div>
            </div>
        </div>
    </div>
</header>
