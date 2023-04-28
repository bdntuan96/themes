<?php
$title = \helper\options::options_by_key_type('site_name');
$logo = \helper\options::options_by_key_type('logo');
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
$menu_header = \helper\menu::to_menu_directory_style($menu_header);
// $page = 1;
// $list_category = \helper\category::paging(1, 10, '','name', 'desc');
// $list_tags = \helper\tag::paging(1, 10, '', 'name', 'desc');
$list_cate = \helper\category::find_by_taxonomy('game');
$list_tags = \helper\tag::find_tag_by_taxonomy('game');
// in($menu_header);die; arr=>object
?>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="header-wrap flex-sb">
                <div class="nav-brand">
                    <a href="/" class="logo" title="<?php echo $title; ?>">
                        <img src="<?php echo \helper\image::get_thumbnail($logo, '', 30, 'h'); ?>" width="" height="30" alt="<?php echo $title; ?>">
                    </a>
                </div>
                <div class="navbar flex-sb">
                    <div class="nav-menu">
                        <?php if (count($list_cate) || count($list_tags)) : ?>
                            <div class="menu-item">
                                <?php foreach ($lis_cate as $cate) : ?>
                                    <a class="button" href="<?php echo $cate->slug; ?>" title="<?php echo $cate->name; ?>"><?php echo $cate->name; ?></a>
                                <?php endforeach; ?>

                                <?php foreach ($list_tags as $tag) : ?>
                                    <a class="button" href="<?php echo $tag->slug; ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
                                <?php endforeach; ?>
                            </div>

                        <?php endif; ?>

                        <div class="menu-link">
                                    <a href=""></a>

                            <?php //foreach ($menu_header as $menu) : 
                            ?>
                            <a href="<?php //echo $menu->url; 
                                        ?>" title="<?php //echo $menu->title; 
                                                    ?>"><?php //echo $menu->title; 
                                                        ?></a>
                            <?php //endforeach; 
                            ?>
                        </div>
                        <!-- <div class="menu-dropdown">
                            <div class="container-1232">
                                <div class="row">
                                    <div class="column-wrap">
                                        <div class="column">
                                            <span class="title"></span>
                                            <div class="grid">
                                                <a href=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="nav-exten">
                        <div class="user-link">
                            <a href="" class="user-menu">
                                <span class="icon">

                                </span>
                            </a>
                        </div>
                        <!-- <div class="menu-dropdown">
                            <div class="container-1232">
                                <div class="row">
                                    <div class="column-wrap">
                                        <div class="column">
                                            <span class="title"></span>
                                            <div class="grid">
                                                <a href=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                        <!-- Search -->
                        <form class="search relative" method="GET" action="/search">

                            <button aria-label="search" class="btn-search absolute flex-center" type="submit">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon-fill">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" />
                                </svg> -->

                                <svg class="svg-inline--fa fa-magnifying-glass" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"></path>
                                </svg>
                            </button>

                            <input type="text" name="q" class="search_term" value="<?php //echo $keywords; 
                                                                                    ?>" placeholder="Search" autocomplete="off" />
                        </form>

                        <!-- <div class="navbar-link is-arrowless field has-addons" aria-label="Search menu" aria-expanded="false">
                            <div class="control">
                                <input class="input navbar-control" type="search" placeholder="Search" autocomplete="false" aria-labelledby="searchButton">
                            </div>
                            <div class="control">
                                <button id="searchButton" class="button navbar-control" type="submit" aria-label="Submit search query">
                                    <span class="icon">
                                        <svg class="svg-inline--fa fa-magnifying-glass" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>