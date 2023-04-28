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
                <button class="menu-icon" aria-label="Open or close menu">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 5C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H4ZM3 12C3 11.4477 3.44772 11 4 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H4C3.44772 13 3 12.5523 3 12ZM3 18C3 17.4477 3.44772 17 4 17H20C20.5523 17 21 17.4477 21 18C21 18.5523 20.5523 19 20 19H4C3.44772 19 3 18.5523 3 18Z" />
                    </svg>
                </button>

                <a href="/" class="logo">
                    <img src="<?php echo \helper\image::get_thumbnail($logo, '', 50) ?>" width="" height="50" alt="<?php echo $site_name; ?>" title="<?php echo $site_name; ?>">
                </a>
                <nav class="flex-align navbar">
                    <?php foreach ($menu_header as $k => $menu) : ?>
                        <?php if ($menu->child_items) : ?>
                            <div class="nav-item nav-child" data-id="<?php echo $k ?>">
                                <?php echo $menu->title; ?>
                                <svg class="nav-svg" viewBox="-6.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <title>dropdown</title>
                                    <path d="M18.813 11.406l-7.906 9.906c-0.75 0.906-1.906 0.906-2.625 0l-7.906-9.906c-0.75-0.938-0.375-1.656 0.781-1.656h16.875c1.188 0 1.531 0.719 0.781 1.656z"></path>
                                </svg>
                                <!-- dropdown menu -->
                                <div class="nav-child-list hidden-list" id="<?php echo $k ?>">
                                    <?php foreach ($menu->child_items as $menu_item) : ?>
                                        <a class="text nav-child-item" href="<?php echo $menu_item->url; ?>" title="<?php echo $menu_item->title; ?>"><?php echo $menu_item->title; ?></a>
                                    <?php endforeach ?>
                                </div>
                            </div>

                        <?php else : ?>
                            <a class="nav-item" href="<?php $menu->url; ?>" title="<?php echo $menu->title; ?>"><?php echo $menu->title; ?></a>
                        <?php endif ?>
                    <?php endforeach ?>
                </nav>

                <form class="search" method="GET" action="/search">
                    <input class="search-term" type="text" name="q" value="<?php echo $keywords ?>" placeholder="Search game" autocomplete="off">
                    <button class="btn-search" type="submit" aria-label="Search">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.5C4.75329 0.5 0.5 4.75329 0.5 10C0.5 15.2467 4.75329 19.5 10 19.5C12.082 19.5 14.0076 18.8302 15.5731 17.6944L20.2929 22.4142C20.6834 22.8047 21.3166 22.8047 21.7071 22.4142L22.4142 21.7071C22.8047 21.3166 22.8047 20.6834 22.4142 20.2929L17.6944 15.5731C18.8302 14.0076 19.5 12.082 19.5 10C19.5 4.75329 15.2467 0.5 10 0.5ZM3.5 10C3.5 6.41015 6.41015 3.5 10 3.5C13.5899 3.5 16.5 6.41015 16.5 10C16.5 13.5899 13.5899 16.5 10 16.5C6.41015 16.5 3.5 13.5899 3.5 10Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- ============ nav-collapses =========== -->
<div class="nav-collapses">
    <form class="search" method="GET" action="/search">
        <input class="search-term" type="text" name="q" value="<?php echo $keywords ?>" placeholder="Search game" autocomplete="off">
        <button class="btn-search" type="submit" aria-label="Search">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.5C4.75329 0.5 0.5 4.75329 0.5 10C0.5 15.2467 4.75329 19.5 10 19.5C12.082 19.5 14.0076 18.8302 15.5731 17.6944L20.2929 22.4142C20.6834 22.8047 21.3166 22.8047 21.7071 22.4142L22.4142 21.7071C22.8047 21.3166 22.8047 20.6834 22.4142 20.2929L17.6944 15.5731C18.8302 14.0076 19.5 12.082 19.5 10C19.5 4.75329 15.2467 0.5 10 0.5ZM3.5 10C3.5 6.41015 6.41015 3.5 10 3.5C13.5899 3.5 16.5 6.41015 16.5 10C16.5 13.5899 13.5899 16.5 10 16.5C6.41015 16.5 3.5 13.5899 3.5 10Z" />
            </svg>
        </button>
    </form>

    <div class="nav-collapses-list">
        <?php foreach ($menu_header as $k => $menu) : ?>
            <?php if ($menu->child_items) : ?>
                <div class="nav-item nav-child" data-id="<?php echo $k ?>">
                    <?php echo $menu->title; ?>
                    <svg class="nav-svg" viewBox="-6.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <title>dropdown</title>
                        <path d="M18.813 11.406l-7.906 9.906c-0.75 0.906-1.906 0.906-2.625 0l-7.906-9.906c-0.75-0.938-0.375-1.656 0.781-1.656h16.875c1.188 0 1.531 0.719 0.781 1.656z"></path>
                    </svg>
                    <!-- dropdown menu -->
                    <div class="nav-child-list hidden-list" id="<?php echo $k ?>">
                        <?php foreach ($menu->child_items as $menu_item) : ?>
                            <a class="text nav-child-item" href="<?php echo $menu_item->url; ?>" title="<?php echo $menu_item->title; ?>"><?php echo $menu_item->title; ?></a>
                        <?php endforeach ?>
                    </div>
                </div>

            <?php else : ?>
                <a class="nav-item" href="<?php $menu->url; ?>" title="<?php echo $menu->title; ?>"><?php echo $menu->title; ?></a>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>

<!-- ============ category =========== -->
<div class="category">
    <div class="container">
        <div class="row">
            <nav class="category-wrap">
                <div class="category-list">
                    <?php if (count($list_cate)) : ?>
                        <?php foreach ($list_cate as $cate) : ?>
                            <a class="category-item" href="/games/<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>"><?php echo $cate->name; ?></a>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
                <button class="category-btn" count="0" aria-label="open/close list category">MORE</button>

                <div class="category-more">
                    <div class="category-more-wrap" >
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>