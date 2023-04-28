<?php
$theme_url = '/' . DIR_THEME;
$logo = \helper\options::options_by_key_type('logo');
$site_name = \helper\options::options_by_key_type('site_name');
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
$menu_header = \helper\menu::to_menu_directory_style($menu_header);

// $list_category = \helper\category::paging(1, 10, '','name', 'desc');
// $list_tags = \helper\tag::paging(1, 10, '', 'name', 'desc');
$list_cate = \helper\category::find_by_taxonomy('game');
$list_tags = \helper\tag::find_tag_by_taxonomy('game');
// in($menu_header);die;
$page = 1;
$limit = 12;
$games_news = \helper\game::get_paging($page, $limit, $keywords, $type, "yes", null, null, "views", "DESC", NULL, NULL);
?>
<svg class="hex" xmlns="http:https://www.w3.org/2000/svg" xmlns:xlink="http:https://www.w3.org/1999/xlink" width="100%" height="100%">
    <defs>
        <pattern id="boxes" patternUnits="userSpaceOnUse" width="300" height="573" patternTransform="scale(1) translate(2) rotate(45)">
            <rect width="150" height="200" transform="skewY(30)" id="left"></rect>
            <rect x="150" y="173" width="150" height="200" transform="skewY(-30)" id="right"></rect>
            <use xlink:href="#right" transform="translate(-150, 285)"></use>
            <use xlink:href="#left" transform="translate(150, 285)"></use>
        </pattern>
    </defs>
    <rect width="100%" height="100%" fill="url(#boxes)"></rect>
</svg>
<?php
$array_menu = [
    "Home" => '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="gold" fill="none">
    <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9"></path>
    <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6"></path>
</svg>',

    "Menu" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <line x1="3" y1="12" x2="21" y2="12"></line>
    <line x1="3" y1="6" x2="21" y2="6"></line>
    <line x1="3" y1="18" x2="21" y2="18"></line>
</svg>',

    "Search" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#555">
    <circle cx="11" cy="11" r="8"></circle>
    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
</svg>'
];
?>

<nav class="nav-menu">
    <!--if home => bg blue-->
    <!-- index => $is_home => "bg-slect"  -->
    <?php foreach ($array_menu as $k => $menu) : ?>
        <?php if ($k == "Home") : ?>
            <a class="nav-icon <?php echo $is_home; ?>" href="/" data-id="<?php echo $k; ?>">
                <?php echo $menu; ?>
            </a>
        <?php else : ?>
            <span class="nav-icon" href="<?php echo $k ?>" data-id="<?php echo $k; ?>">
                <?php echo $menu; ?>
            </span>
        <?php endif; ?>
    <?php endforeach; ?>
</nav>

<div class="controls category" id="Menu">
    <?php if (count($list_cate) || count($list_tags)) : ?>
        <?php foreach ($list_cate as $cate) : ?>
            <a href="/games/<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>" class="category-item">
                <div class="category_icon">
                    <?php if ($cate->image) : ?>
                        <img class="img-control" src="<?php echo \helper\image::get_thumbnail($cate->image, 70, 70, "m") ?>" width="96" height="96" alt="<?php echo $cate->name; ?>" title="<?php echo $cate->name; ?>">
                    <?php else : ?>
                        <img src="<?php echo $theme_url; ?>rs/imgs/match-3.jpg" alt="<?php echo $cate->name; ?>" width="96" height="96" title="<?php echo $cate->name; ?>">
                    <?php endif; ?>
                </div>
                <div class="category_title">
                    <span class="text-overflow3"><?php echo $cate->name; ?></span>
                </div>
            </a>
        <?php endforeach; ?>
        <?php foreach ($list_tags as $tag) : ?>
            <a href="/tag/<?php echo $tag->slug; ?>" title="<?php echo $tag->name; ?>" class="category-item">
                <div class="category_icon">
                    <?php if ($tag->image) : ?>
                        <img class="img-control" src="<?php echo \helper\image::get_thumbnail($tag->image, 70, 70, 'm') ?>" width="96" height="96" alt="<?php echo $tag->name; ?>" title="<?php echo $tag->name; ?>">
                    <?php else : ?>
                        <img src="<?php echo $theme_url; ?>rs/imgs/match-3.jpg" alt="<?php echo $tag->name; ?>" width="96" height="96" title="<?php echo $tag->name; ?>">
                    <?php endif; ?>
                </div>
                <div class="category_title">
                    <span class="text-overflow3"><?php echo $tag->name; ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
    <button aria-label="close" type="button" class="closebtn"></button>
</div>

<div class="controls search-wrap" id="Search">
    <div class="row">
        <a class="brand-logo" href="/" title="<?php echo $site_name; ?>">
            <img class="logo" src="<?php echo \helper\image::get_thumbnail($logo, '', 60, "h") ?>" width="" height="60" alt="<?php echo $site_name; ?>" title="<?php echo $site_name; ?>">
        </a>
        <div class="search" method="GET" action="/search">
            <input id="game-search" class="search_term" type="text" name="q" value="<?php echo $keywords; ?>" placeholder="Search ..." autocomplete="off">
            <button aria-label="search" class="btn-search" type="submit">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.5C4.75329 0.5 0.5 4.75329 0.5 10C0.5 15.2467 4.75329 19.5 10 19.5C12.082 19.5 14.0076 18.8302 15.5731 17.6944L20.2929 22.4142C20.6834 22.8047 21.3166 22.8047 21.7071 22.4142L22.4142 21.7071C22.8047 21.3166 22.8047 20.6834 22.4142 20.2929L17.6944 15.5731C18.8302 14.0076 19.5 12.082 19.5 10C19.5 4.75329 15.2467 0.5 10 0.5ZM3.5 10C3.5 6.41015 6.41015 3.5 10 3.5C13.5899 3.5 16.5 6.41015 16.5 10C16.5 13.5899 13.5899 16.5 10 16.5C6.41015 16.5 3.5 13.5899 3.5 10Z" fill="#000000" />
                </svg>
            </button>
        </div>

        <section class="menu_header">
            <div class="menu-more">
                <nav class="menu-list">
                    <?php foreach ($menu_header as $menu) : ?>
                        <a class="menu-item" href="<?php echo $menu->url ?>"><?php echo $menu->title; ?></a>
                    <?php endforeach; ?>
                </nav>
            </div>

            <div class="loading_search hidden">
                <img src="<?php echo $theme_url; ?>rs/imgs/uk-page-loading.gif" width="" height="" alt="loading" title="loading" class="loading_img">
            </div>

            <div class="grid-clayover game-show" id="search-ajax">
                <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_news, 'flag' => true)); ?>
            </div>
        </section>

        <button aria-label="close" type="button" class="closebtn"></button>
    </div>
</div>
<div class="overlay"></div>

<script>
    keywords = "<?php echo $keywords; ?>";
    limit = "<?php echo $limit ?>";
    page = "<?php echo $page ?>";
</script>