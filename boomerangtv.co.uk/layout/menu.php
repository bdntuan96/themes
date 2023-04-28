<?php
$theme_url = '/' . DIR_THEME;
$logo = \helper\options::options_by_key_type('logo');
$site_name = \helper\options::options_by_key_type('site_name');
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
$menu_header = \helper\menu::to_menu_directory_style($menu_header);

// in($menu_header);die;
$page = 1;
$limit = 30;
$games_news = \helper\game::get_paging($page, $limit, $keywords, $type, "yes", null, null, "views", "DESC", NULL, NULL);

$array_menu = [
    '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297 297" xml:space="preserve" fill="#fff">
    <g>
        <g id="XMLID_45_">
            <g>
                <path style="fill:#d2006e;" d="M81.13,140.2c4.58,0,8.3,3.72,8.3,8.3s-3.72,8.3-8.3,8.3s-8.3-3.72-8.3-8.3
S76.55,140.2,81.13,140.2z" />
                <path style="fill:#d2006e;" d="M148.5,140.2c4.58,0,8.31,3.72,8.31,8.3s-3.73,8.3-8.31,8.3s-8.3-3.72-8.3-8.3
S143.92,140.2,148.5,140.2z" />
                <path style="fill:#d2006e;" d="M215.88,140.2c4.57,0,8.3,3.72,8.3,8.3s-3.73,8.3-8.3,8.3c-4.58,0-8.31-3.72-8.31-8.3
S211.3,140.2,215.88,140.2z" />
                <path style="fill:#d2006e;" d="M148.5,20.88c70.37,0,127.63,57.25,127.63,127.62S218.87,276.12,148.5,276.12
S20.88,218.87,20.88,148.5S78.13,20.88,148.5,20.88z M245.06,148.5c0-16.09-13.09-29.18-29.18-29.18s-29.19,13.09-29.19,29.18
s13.1,29.18,29.19,29.18S245.06,164.59,245.06,148.5z M177.68,148.5c0-16.09-13.09-29.18-29.18-29.18s-29.18,13.09-29.18,29.18
s13.09,29.18,29.18,29.18S177.68,164.59,177.68,148.5z M110.31,148.5c0-16.09-13.09-29.18-29.18-29.18s-29.18,13.09-29.18,29.18
s13.09,29.18,29.18,29.18S110.31,164.59,110.31,148.5z" />
                <path d="M148.5,0C230.39,0,297,66.62,297,148.5S230.39,297,148.5,297C66.62,297,0,230.38,0,148.5S66.62,0,148.5,0z M276.13,148.5
c0-70.37-57.26-127.62-127.63-127.62S20.88,78.13,20.88,148.5S78.13,276.12,148.5,276.12S276.13,218.87,276.13,148.5z" />
                <path d="M215.88,119.32c16.09,0,29.18,13.09,29.18,29.18s-13.09,29.18-29.18,29.18s-29.19-13.09-29.19-29.18
S199.79,119.32,215.88,119.32z M224.18,148.5c0-4.58-3.73-8.3-8.3-8.3c-4.58,0-8.31,3.72-8.31,8.3s3.73,8.3,8.31,8.3
C220.45,156.8,224.18,153.08,224.18,148.5z" />
                <path d="M148.5,119.32c16.09,0,29.18,13.09,29.18,29.18s-13.09,29.18-29.18,29.18s-29.18-13.09-29.18-29.18
S132.41,119.32,148.5,119.32z M156.81,148.5c0-4.58-3.73-8.3-8.31-8.3s-8.3,3.72-8.3,8.3s3.72,8.3,8.3,8.3
S156.81,153.08,156.81,148.5z" />
                <path d="M81.13,119.32c16.09,0,29.18,13.09,29.18,29.18s-13.09,29.18-29.18,29.18s-29.18-13.09-29.18-29.18
S65.04,119.32,81.13,119.32z M89.43,148.5c0-4.58-3.72-8.3-8.3-8.3s-8.3,3.72-8.3,8.3s3.72,8.3,8.3,8.3S89.43,153.08,89.43,148.5
z" />
            </g>
        </g>
    </g>
</svg>',

    '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
    <style type="text/css">
        .st0 {
            enable-background: new;
        }

        .st1 {
            fill: #FFFFFF;
        }

        .st2 {
            fill: #009BDF;
        }
    </style>
    <g>
        <path class="st0" d="M49.2,53.3c-3.5,0-5.9-4.2-7.9-8.4c-1.8-3.9-2.4-3.9-4-3.9H22.7c-1.6,0-2.2,0-4.1,3.9c-2.4,5-4.7,8.4-7.9,8.4
h-3H7.5C7.3,53.3,0,52,0,40.5c0-7.8,1.1-14.7,3.3-21.3C6.3,9.8,13.7,8.7,14,8.7h0.1h1.3c1.5,0,3.7,0.5,5.1,1.9l0.1,0.1l2.6,3.1
c0.6,0.7,1.5,1.2,2.4,1.2h8.7c0.9,0,1.8-0.4,2.4-1.2l2.5-3.1c1.3-1.5,3.5-2.1,5.2-2.1h1.3h0.1c0.3,0,7.7,1.1,10.9,10.5
c2.2,6.6,3.3,13.6,3.3,21.3c0,11.5-7.3,12.8-7.6,12.8L49.2,53.3C49.2,53.3,49.2,53.3,49.2,53.3z" />
        <path class="st1" d="M49.2,51.3c-3.5,0-5.9-4.2-7.9-8.4c-1.8-3.9-2.4-3.9-4-3.9H22.7c-1.6,0-2.2,0-4.1,3.9c-2.4,5-4.7,8.4-7.9,8.4
h-3H7.5C7.3,51.3,0,50,0,38.5c0-7.8,1.1-14.7,3.3-21.3C6.3,7.8,13.7,6.7,14,6.7h0.1h1.3c1.5,0,3.7,0.5,5.1,1.9l0.1,0.1l2.6,3.1
c0.6,0.7,1.5,1.2,2.4,1.2h8.7c0.9,0,1.8-0.4,2.4-1.2l2.5-3.1c1.3-1.5,3.5-2.1,5.2-2.1h1.3h0.1c0.3,0,7.7,1.1,10.9,10.5
c2.2,6.6,3.3,13.6,3.3,21.3c0,11.5-7.3,12.8-7.6,12.8L49.2,51.3C49.2,51.3,49.2,51.3,49.2,51.3z" />
        <path class="st2" d="M30,37c0,0,4.7,0,7.3,0s3.8,0.6,5.9,5.1s4.1,7.2,6.1,7.2s2.9,0,2.9,0S58,48.4,58,38.5c0-5.6-0.5-12.8-3.2-20.7
c-2.8-8.3-9.2-9.1-9.2-9.1h-1.2c-1.2,0-2.8,0.5-3.6,1.4l-2.5,3.1c-1,1.2-2.4,1.9-4,1.9H30h-4.3c-1.5,0-3-0.7-4-1.9L19.2,10
c-0.9-0.9-2.5-1.4-3.7-1.4h-1.2c0,0-6.4,0.8-9.1,9.1C2.5,25.7,2,32.9,2,38.5c0,9.9,5.9,10.8,5.9,10.8s0.9,0,2.9,0s3.9-2.7,6.1-7.2
c2.1-4.4,3.3-5.1,5.9-5.1S30,37,30,37z" />
        <circle class="st1" cx="15.8" cy="23.3" r="6.2" />
        <path class="st1" d="M41.7,23.3c0,1.2-0.9,2.1-2.1,2.1s-2.1-0.9-2.1-2.1s0.9-2.1,2.1-2.1S41.7,22.1,41.7,23.3z" />
        <circle class="st1" cx="48.2" cy="23.3" r="2.1" />
        <path class="st1" d="M46.2,18.6c0,1.2-0.9,2.1-2.1,2.1S42,19.8,42,18.6c0-1.2,0.9-2.1,2.1-2.1S46.2,17.4,46.2,18.6z" />
        <path class="st1" d="M46.2,28c0,1.2-0.9,2.1-2.1,2.1S42,29.2,42,28s0.9-2.1,2.1-2.1S46.2,26.8,46.2,28z" />
    </g>
</svg>',

];
?>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="search">
                <form method="GET" action="/search" class="search-wrap">
                    <input class="button search_term" type="text" name="q" value="<?php echo $keywords; ?>" placeholder="Search" autocomplete="off">
                    <button aria-label="search" type="submit" class="btn-search">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.5C4.75329 0.5 0.5 4.75329 0.5 10C0.5 15.2467 4.75329 19.5 10 19.5C12.082 19.5 14.0076 18.8302 15.5731 17.6944L20.2929 22.4142C20.6834 22.8047 21.3166 22.8047 21.7071 22.4142L22.4142 21.7071C22.8047 21.3166 22.8047 20.6834 22.4142 20.2929L17.6944 15.5731C18.8302 14.0076 19.5 12.082 19.5 10C19.5 4.75329 15.2467 0.5 10 0.5ZM3.5 10C3.5 6.41015 6.41015 3.5 10 3.5C13.5899 3.5 16.5 6.41015 16.5 10C16.5 13.5899 13.5899 16.5 10 16.5C6.41015 16.5 3.5 13.5899 3.5 10Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container-header">
        <div class="row">
            <div class="header-wrap">
                <nav>
                    <div class="flex-sb nav-wrap">
                        <a href="/" class="logo-wrap" title="<?php echo $site_name ?>">
                            <img class="logo" src="<?php echo \helper\image::get_thumbnail($logo, '', 110, "h"); ?>" width="" height="110" alt="<?php echo $site_name ?>" title="<?php echo $site_name ?>">
                        </a>
                        <a class="nav-item-wrap" href="/" title="home">
                            <div class="nav-item">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                                    <g>
                                        <path class="st01" d="M57.8,26.8l-6.5-5.1v-6.2c0-2.1-1.7-3.8-3.8-3.8h-4.7c-1.1,0-2.1,0.5-2.8,1.3l-7.2-5.6c-0.8-0.6-1.8-1-2.8-1
    s-2,0.3-2.8,1l-25,19.3c-1.5,1.2-1.8,3.3-0.6,4.9C2.2,32.5,3.2,33,4.3,33c0.8,0,1.5-0.3,2.1-0.7l2.6-2v18.6c0,3.7,3,6.7,6.7,6.7
    h28.6c3.7,0,6.7-3,6.7-6.7V30.3l2.6,2c0.6,0.5,1.4,0.7,2.1,0.7c1.1,0,2.1-0.5,2.7-1.3C59.6,30.1,59.3,28,57.8,26.8z" />
                                        <path class="st02" d="M57.8,24.8l-6.5-5.1v-6.2c0-2.1-1.7-3.8-3.8-3.8h-4.7c-1.1,0-2.1,0.5-2.8,1.3l-7.2-5.6c-0.8-0.6-1.8-1-2.8-1
    s-2,0.3-2.8,1l-25,19.3c-1.5,1.2-1.8,3.3-0.6,4.9C2.2,30.5,3.2,31,4.3,31c0.8,0,1.5-0.3,2.1-0.7l2.6-2v18.6c0,3.7,3,6.7,6.7,6.7
    h28.6c3.7,0,6.7-3,6.7-6.7V28.3l2.6,2c0.6,0.5,1.4,0.7,2.1,0.7c1.1,0,2.1-0.5,2.7-1.3C59.6,28.1,59.3,26,57.8,24.8z" />
                                        <path class="st03" d="M56.9,28.4c-0.3,0.4-0.7,0.6-1.2,0.6c-0.3,0-0.6-0.1-0.9-0.3L30,9.5L5.2,28.7c-0.6,0.5-1.6,0.4-2.1-0.3
    c-0.5-0.6-0.4-1.6,0.3-2.1L28.4,7c0.9-0.7,2.3-0.7,3.2,0l9.5,7.3v-0.9c0-1,0.8-1.8,1.8-1.8h4.7c1,0,1.8,0.8,1.8,1.8v7.2l7.3,5.7
    C57.3,26.9,57.4,27.8,56.9,28.4z M11,29.9v17c0,2.6,2.1,4.7,4.7,4.7h8.8V38.1c0-1.3,1-2.3,2.3-2.3h6.4c1.3,0,2.3,1,2.3,2.3v13.4
    h8.8c2.6,0,4.7-2.1,4.7-4.7V30L30,15.3L11,29.9z" />
                                    </g>
                                </svg>
                            </div>
                            <span>Home</span>
                        </a>
                        <?php foreach ($menu_header as $k => $menu) : ?>
                            <a class="nav-item-wrap <?php echo ($k % 2 == 0) ? 'color-pink' : 'color-blue' ?>" href="<?php echo $menu->url; ?>" title="<?php echo $menu->title; ?>">
                                <div class="nav-item">
                                    <div class="nav-item-icon">
                                        <?php echo $array_menu[$k] ? $array_menu[$k] : $array_menu[1]; ?>
                                    </div>
                                </div>
                                <span><?php echo $menu->title; ?></span>
                            </a>
                        <?php endforeach; ?>
                        <!-- menu-mobile -->
                        <div class="menu-mobile">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 63 63" style="enable-background:new 0 0 63 63;" xml:space="preserve">
                                <g id="menu">
                                    <path style="fill:#000000;" d="M53.946,53.245H9.054c-1.55,0-2.806-1.256-2.806-2.806V46.23c0-1.55,1.256-2.806,2.806-2.806h44.893
		c1.55,0,2.806,1.256,2.806,2.806v4.209C56.752,51.989,55.497,53.245,53.946,53.245z M53.946,36.41H9.054
		c-1.55,0-2.806-1.256-2.806-2.806v-4.209c0-1.55,1.256-2.806,2.806-2.806h44.893c1.55,0,2.806,1.256,2.806,2.806v4.209
		C56.752,35.155,55.497,36.41,53.946,36.41z M53.946,19.575H9.054c-1.55,0-2.806-1.256-2.806-2.806v-4.209
		c0-1.55,1.256-2.806,2.806-2.806h44.893c1.55,0,2.806,1.256,2.806,2.806v4.209C56.752,18.32,55.497,19.575,53.946,19.575z" />
                                </g>
                                <g id="Layer_1">
                                </g>
                            </svg>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- ========== carousel market ===============  -->
<div class="wrapper">
    <div class="carousel">
        <?php foreach ($games_news as $item) : ?>
            <div class="carousel-item">
                <a class="carousel-entity" href="<?php echo $item->slug ?>" title="<?php echo $item->name; ?>">
                    <img class="carousel-img" src="<?php echo \helper\image::get_thumbnail($item->image, 110, 110, "m") ?>" width="110" height="110" alt="<?php echo $item->name; ?>" title="<?php echo $item->name; ?>">
                    <span class="carousel-showtitle">
                        <?php echo $item->name; ?>
                    </span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<!-- menu mobile-show -->
<div class="mobile-show">
    <div class="mobile-show-wrap">
        <div class="flex-sb">
            <a href="/" class="logo-wrap" title="<?php echo $site_name ?>">
                <img class="logo" src="<?php echo \helper\image::get_thumbnail($logo, '', 110, "h"); ?>" width="" height="110" alt="<?php echo $site_name ?>" title="<?php echo $site_name ?>">
            </a>
            <div class="close">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 63 63" style="enable-background:new 0 0 63 63;" xml:space="preserve">
                    <g id="cross">
                        <g id="menu_1_">
                            <path style="fill:#FFFFFF;" d="M59.593,49.456L41.637,31.5l17.956-17.956c1.593-1.593,1.593-4.199,0-5.792l-4.344-4.344
			c-1.593-1.593-4.199-1.593-5.792,0L31.5,21.363L13.544,3.407c-1.593-1.593-4.199-1.593-5.792,0L3.407,7.751
			c-1.593,1.593-1.593,4.199,0,5.792L21.363,31.5L3.552,49.456c-1.593,1.593-1.593,4.199,0,5.792l4.344,4.344
			c1.593,1.593,4.199,1.593,5.792,0l17.956-17.956l17.812,17.812c1.593,1.593,4.199,1.593,5.792,0l4.344-4.344
			C61.186,53.511,61.186,51.049,59.593,49.456z" />
                        </g>
                    </g>
                    <g id="Layer_1">
                    </g>
                </svg>
            </div>
        </div>


        <div class="list-menu">
            <?php foreach ($menu_header as $k => $menu) : ?>
                <a class="nav-item-wrap-mobile <?php echo ($k % 2 == 0) ? 'color-pink' : 'color-blue' ?>" href="<?php echo $menu->url; ?>" title="<?php echo $menu->title; ?>">
                    <div class="nav-item-mobile">
                        <div class="nav-item-icon-mobile">
                            <?php echo $array_menu[$k] ? $array_menu[$k] : $array_menu[1]; ?>
                        </div>
                    </div>
                    <span><?php echo $menu->title; ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- click opacity mobile -->
<div class="overlay"></div>


<script>
    let limit_slider = "<?php echo $limit; ?>"
</script>