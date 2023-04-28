<?php
$logo = \helper\options::options_by_key_type('logo', 'general');
$site_name = \helper\options::options_by_key_type('site_name', 'general');
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
$menu_header = \helper\menu::to_menu_directory_style($menu_header);
$upload_image = \helper\options::options_by_key_type('upload_image', 'image');
$page = 1;
$list_category = \helper\category::paging(1, 10, '', 'name', 'desc');
?>
<header>
    <div class="container">
        <div class="row">
            <div class="header--wrap d-f j-s">
                <div class="row-left  d-f j-s">
                    <div class="logo">
                        <a href="/">
                            <img src="<?php echo \helper\image::get_thumbnail($logo, '', 60, 'h'); ?>" title="<?php echo $site_name ?>" alt="<?php echo $site_name ?>" width="" height="60">
                        </a>
                    </div>
                    <!-- navigation -->
                    <div class="menu text">
                        <span class="btn-home" href="#!">Categories
                            <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.29297 6.70711C3.68349 6.31658 4.31666 6.31658 4.70718 6.70711L12.0001 14L19.293 6.70711C19.6835 6.31658 20.3167 6.31658 20.7072 6.70711L21.4143 7.41421C21.8048 7.80474 21.8048 8.4379 21.4143 8.82843L13.0607 17.182C12.4749 17.7678 11.5252 17.7678 10.9394 17.182L2.58586 8.82843C2.19534 8.4379 2.19534 7.80474 2.58586 7.41422L3.29297 6.70711Z" fill="" />
                            </svg>
                        </span>
                        <div class="dn-actions">
                            <div class="actions">
                                <?php foreach ($list_category as $category) : ?>
                                    <a href="/games/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--menu__icon mobile-->
                <div class="menu__icon">
                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 7H16V9H8V7Z" fill="#fff" />
                        <path d="M8 11H16V13H8V11Z" fill="#fff" />
                        <path d="M16 15H8V17H16V15Z" fill="#fff" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 2H2V22H22V2ZM20 4H4V20H20V4Z" fill="#fff" />
                    </svg>
                </div>
                <!-- end -->
                <div class="row-right  d-f j-s">
                    <div class="facebook">
                        <a href="/">
                            <svg fill="#000000" width="30px" height="30px" viewBox="-9.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <title>facebook</title>
                                <path d="M7.44 26.68h-2.92c-1 0-1.84-0.84-1.84-1.84v-6.56h-0.84c-1 0-1.84-0.84-1.84-1.84v-2.48c0-1 0.84-1.84 1.84-1.84h0.88v-0.8c0-3.68 2.12-6 5.56-6 1.2 0 2.24 0.080 2.68 0.12 0.92 0.12 1.6 0.92 1.6 1.84v2.48c0 1-0.84 1.84-1.84 1.84h-1.36v0.52h1.28c1 0 1.84 0.84 1.84 1.84 0 0.12 0 0.2-0.040 0.32l-0.4 2.4c-0.12 0.88-0.92 1.56-1.84 1.56h-0.84v6.56c-0.040 1.040-0.88 1.88-1.92 1.88zM1.84 13.8c-0.080 0-0.16 0.080-0.16 0.16v2.48c0 0.080 0.080 0.16 0.16 0.16h1.72c0.48 0 0.84 0.36 0.84 0.84v7.36c0 0.080 0.080 0.16 0.16 0.16h2.92c0.080 0 0.16-0.080 0.16-0.16v-7.36c0-0.48 0.36-0.84 0.84-0.84h1.68c0.080 0 0.16-0.080 0.16-0.16l0.4-2.48c0-0.080-0.080-0.16-0.16-0.16h-2.12c-0.48 0-0.84-0.36-0.84-0.84v-1.68c0-0.36 0.040-0.6 0.12-0.8s0.2-0.32 0.4-0.4c0.2-0.12 0.48-0.16 0.88-0.16h1.68c0.080 0 0.16-0.080 0.16-0.16v-2.48c0-0.080-0.080-0.16-0.16-0.16-0.32-0.040-1.32-0.12-2.44-0.12-3.36 0-3.88 2.72-3.88 4.32v1.64c0 0.48-0.36 0.84-0.84 0.84 0 0-1.68 0-1.68 0z"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="wrap--form">
                        <form class="search" method="GET" action="/search">
                            <!-- <input type="text" name="q" class="search_term" value="<?php //echo $keywords; 
                                                                                        ?>" placeholder="Search Games..." autocomplete="off" /> -->
                            <input type="text" name="q" class="search_term" value="Search Games..." autocomplete="off" />

                            <button aria-label="search" class="btn-search" type="submit">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- click opacity mobile -->
    <div class="offcanvas-menu-overlay"></div>

    <!-- nav mobile -->
    <div class="offcanvans--menu-wrap">
        <div class="offcanvas__close">
            <a href="#!">
                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.75716 7.75736C8.14768 7.36683 8.78084 7.36683 9.17137 7.75736L11.9998 10.5858L14.8283 7.75736C15.2188 7.36684 15.852 7.36684 16.2425 7.75736C16.6331 8.14789 16.6331 8.78105 16.2425 9.17158L13.4141 12L16.2424 14.8284C16.633 15.2189 16.633 15.8521 16.2424 16.2426C15.8519 16.6332 15.2187 16.6332 14.8282 16.2426L11.9998 13.4143L9.17146 16.2426C8.78094 16.6332 8.14777 16.6332 7.75725 16.2426C7.36672 15.8521 7.36672 15.219 7.75725 14.8284L10.5856 12L7.75716 9.17157C7.36663 8.78104 7.36663 8.14788 7.75716 7.75736Z" fill="#fff" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3Z" fill="#fff" />
                </svg>
            </a>
        </div>

        <div class="mobile">
            <form class="search" method="GET" action="/search">
                <input type="text" name="q" class="search_term" value="<?php echo $keywords; ?>" placeholder="Search Games..." autocomplete="off" />

                <button aria-label="search" class="btn-search" type="submit">
                </button>
            </form>
        </div>

        <div class="mobile--menu-wrap">
            <nav class="mobile__menu">
                <ul class="menu-colum">
                    <?php foreach ($list_category as $category) : ?>
                        <li class="actions">
                            <!-- data object -->
                            <a href="<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- nav mobile end-->
</header>