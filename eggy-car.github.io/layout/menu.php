<?php
$logo = \helper\options::options_by_key_type('logo');
$title = \helper\options::options_by_key_type('site_name');
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');

?>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="header-wrap flex-sb">
                <div class="row-left flex center">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/" title="<?php echo $title; ?>">
                            <img src="<?php echo \helper\image::get_thumbnail($logo, '', 52, 'h') ?>" width="" height="52" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                        </a>
                    </div>
                    <!-- Search -->
                    <form class="search relative" method="GET" action="/search">

                        <button aria-label="search" class="btn-search absolute flex-center" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon-fill">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" />
                            </svg>
                        </button>

                        <input type="text" name="q" class="search_term" value="<?php echo $keywords; ?>" placeholder="Search" autocomplete="off" />
                    </form>

                </div>
                <div class="row-right flex center">
                    <div class="menu">
                        <ul class="flex flex-row font-display">
                            <?php foreach ($menu_header as $menu) : ?>
                                <li class="text">
                                    <a class="text" href="<?php echo $menu->url ?>"><?php echo $menu->title; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                    </div>
                    <div class="dark_mode">
                        <div class="dark_item">
                            <span class="light-on flex-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon-color">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z"></path>
                                </svg>
                            </span>
                            <span class="light-off flex-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon-color">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M11.38 2.019a7.5 7.5 0 1 0 10.6 10.6C21.662 17.854 17.316 22 12.001 22 6.477 22 2 17.523 2 12c0-5.315 4.146-9.661 9.38-9.981z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!--menu__icon mobile-->
                    <span class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon-color">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M18 18v2H6v-2h12zm3-7v2H3v-2h18zm-3-7v2H6V4h12z"></path>
                        </svg>
                    </span>
                    <!-- end -->
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
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.75716 7.75736C8.14768 7.36683 8.78084 7.36683 9.17137 7.75736L11.9998 10.5858L14.8283 7.75736C15.2188 7.36684 15.852 7.36684 16.2425 7.75736C16.6331 8.14789 16.6331 8.78105 16.2425 9.17158L13.4141 12L16.2424 14.8284C16.633 15.2189 16.633 15.8521 16.2424 16.2426C15.8519 16.6332 15.2187 16.6332 14.8282 16.2426L11.9998 13.4143L9.17146 16.2426C8.78094 16.6332 8.14777 16.6332 7.75725 16.2426C7.36672 15.8521 7.36672 15.219 7.75725 14.8284L10.5856 12L7.75716 9.17157C7.36663 8.78104 7.36663 8.14788 7.75716 7.75736Z" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3Z" />
            </svg>
        </div>

        <div class="mobile">
            <form class="search relative" method="GET" action="/search">
                <button aria-label="search" class="btn-search absolute flex-center" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon-fill">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" />
                    </svg>
                </button>
                <input type="text" name="q" class="search_term" value="<?php echo $keywords; ?>" placeholder="Search" autocomplete="off" />
            </form>
        </div>

        <div class="mobile--menu-wrap">
            <nav class="mobile__menu">
                <ul class="menu-colum  font-display">
                    <?php foreach ($menu_header as $menu) : ?>
                        <li class="actions">
                            <a href="<?php echo $menu->url ?>"><?php echo $menu->title; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- nav mobile end-->
</header>

<script>
    // ham cai dat nho cuc bo 
    function setLocalStorage(key, value) {
        localStorage.setItem(key, value);
    }

    function getLocalStorage(key) {
        return localStorage.getItem(key);

    }

    function removeLocalStorage(key) {
        localStorage.removeItem(key);
    }

    function checkValueOfThemeMode() {
        let theme_mode = getLocalStorage('theme_mode');
        //$("body").addClass(theme_mode);
        document.querySelector('body').classList.add(theme_mode);
        if (theme_mode && theme_mode == "lightmode") {
            document.querySelector('.light-on').setAttribute("style", "display: none");
            document.querySelector('.light-off').setAttribute("style", "display:flex!important");
        }
        //neu ma la light thi cai icon light an di => icon dark hiện lên
    }
    checkValueOfThemeMode();
</script>