<?php
// $theme_url = '/' . DIR_THEME;
$logo = \helper\options::options_by_key_type('logo');
$site_name = \helper\options::options_by_key_type('site_name');
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
$menu_header = \helper\menu::to_menu_directory_style($menu_header);
?>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="header-wrap flex-sb">
                <button class="menu-trigger" data-id="menu-action" aria-label="Open or close menu">
                    <span></span>
                </button>

                <a href="/" class="logo" title="<?php echo $site_name ?>">
                    <?php if ($is_home) : ?>
                        <h1>
                            <p style="width:0;height:0;color:transparent"><?php echo $site_name ?></p>
                            <img class="logo-img" src="<?php echo \helper\image::get_thumbnail($logo, '', 80, "h"); ?>" width="" height="80" alt="<?php echo $site_name ?>" title="<?php echo $site_name ?>">
                        </h1>
                    <?php else : ?>
                        <img class="logo-img" src="<?php echo \helper\image::get_thumbnail($logo, '', 80, "h"); ?>" width="" height="80" alt="<?php echo $site_name ?>" title="<?php echo $site_name ?>">
                    <?php endif; ?>
                </a>
                <nav class="menu flex-sb">
                    <div class="menu-item-wrap">
                        <?php foreach ($menu_header as $menu) : ?>
                            <a class="menu-item" href="<?php echo $menu->url; ?>" title="<?php echo $menu->title; ?>"><?php echo $menu->title; ?></a>
                        <?php endforeach; ?>
                    </div>
                    <button class="search-trigger" data-id="search-action" aria-label="Open or close search">
                        <span></span>
                    </button>
                </nav>
            </div>
            <div class="site-menu">
                <div class="site-menu-wrap">
                    <div class="site-menu-item">
                        <?php foreach ($menu_header as $menu) : ?>
                            <a href="<?php echo $menu->url; ?>" title="<?php echo $menu->title; ?>"><?php echo $menu->title; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="site-search">
                <div class="site-search-wrap">
                    <form method="GET" action="/search" class="flex-sb search-wrap">
                        <input class="button search-term" type="text" name="q" value="<?php echo $keywords; ?>" placeholder="Search..." autocomplete="off">
                        <button aria-label="search" type="submit" class="btn-search">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.5C4.75329 0.5 0.5 4.75329 0.5 10C0.5 15.2467 4.75329 19.5 10 19.5C12.082 19.5 14.0076 18.8302 15.5731 17.6944L20.2929 22.4142C20.6834 22.8047 21.3166 22.8047 21.7071 22.4142L22.4142 21.7071C22.8047 21.3166 22.8047 20.6834 22.4142 20.2929L17.6944 15.5731C18.8302 14.0076 19.5 12.082 19.5 10C19.5 4.75329 15.2467 0.5 10 0.5ZM3.5 10C3.5 6.41015 6.41015 3.5 10 3.5C13.5899 3.5 16.5 6.41015 16.5 10C16.5 13.5899 13.5899 16.5 10 16.5C6.41015 16.5 3.5 13.5899 3.5 10Z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<span class="site-actions-backdrop"></span>