<?php
//sau khi truyền từ trang chủ index thì ta gọi trực tiếp hàm function ra = key và loại type
$logo = \helper\options::options_by_key_type('logo', 'general');
$site_name = \helper\options::options_by_key_type('site_name', 'general');
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
$menu_header = \helper\menu::to_menu_directory_style($menu_header);
$upload_image = \helper\options::options_by_key_type('upload_image', 'image');

?>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="row--wrap fix-mobile">
                <div class="header__wraplogo">
                    <div class="header__logo">
                        <a href="/">
                            <img src="<?php echo $logo; ?>" width="" height="" title="<?php echo $site_name; ?>" alt="<?php echo $site_name; ?>" />
                        </a>
                    </div>
                </div>

                <div class="header__wrapmenu">
                    <nav class="header--m300">
                        <ul class="header__right">
                            <?php foreach ($menu_header as $menu) : ?>
                                <li class="header__active border-none">
                                    <!-- trỏ dữ liệu kiểu object -->
                                    <a href="<?php echo $menu->url; ?>"><?php echo $menu->title; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>

                <!-- form search -->
                <div class="wrap--form">
                    <form class="search" method="GET" action="/search">
                        <input type="text" name="q" class="search_term" value="<?php echo $keywords; ?>" placeholder="Search Games" autocomplete="off" />

                        <button class="btn-search" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <!--menu__icon mobile-->
                <div class="menu__icon">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- tạo thẻ bóng mờ mobile -->
<div class="offcanvas-menu-overlay actives"></div>

<!-- nav mobile -->
<div class="offcanvans--menu-wrap">
    <div class="offcanvas__close">
        <i class="fa-regular fa-circle-xmark"><a href="#!"></a></i>
    </div>

    <div class="mobile">
        <form class="search" method="GET" action="/search">
            <input type="text" name="q" class="search_term" value="" placeholder="Search Games" autocomplete="off" />
            <button class="btn-search" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>

    <div class="mobile--menu-wrap">
        <nav class="mobile__menu">
            <ul class="menu-colum">
                <?php foreach ($menu_header as $menu) : ?>
                    <li class="header__active">
                        <!-- trỏ dữ liệu kiểu object -->
                        <a href="<?php echo $menu->url; ?>"><?php echo $menu->title; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>
<!-- nav mobile end-->