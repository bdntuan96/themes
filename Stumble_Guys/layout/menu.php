<?php
$logo = \helper\options::options_by_key_type('logo');
$site_name = \helper\options::options_by_key_type('site_name', 'general');
// $list_category = \helper\category::paging(1, 10, '', 'name', 'desc');

$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
// in($menu_header);die;

?>

<a id="top"></a>
<header>
    <div class="header">
        <div class="fill fill-left"></div>
        <div class="container" style="display:flex;flex-grow: 1;width:100%;flex: 1 1 auto;">
            <div class="row">
                <div class="d-flex al navbar">
                    <div class="nav-branch">
                        <a href="/" class="bz d-block h-full w-full a-logo-box">
                            <img src="<?php echo \helper\image::get_thumbnail($logo, '', 50, 'h') ?>" width="" height="64" alt="<?php echo $site_name; ?>" title="<?php echo $site_name; ?>" />
                        </a>
                    </div>
                    <div class="h-full nav-categories">
                        <div class="h-full d-flex cate-search">
                            <div class="d-flex group-category">
                                <?php foreach ($menu_header as $menu) : ?>
                                    <div class="d-flex al jc nav-category-item"><a class="button-nav-category" href="<?php echo $menu->url; ?>"><?php echo $menu->title; ?></a></div>
                                <?php endforeach; ?>
                            </div>
                            <div class="d-flex al search-box">
                                <form action="/search" method="GET">
                                    <div class="search-row">
                                        <input type="text" class="bz w-full h-full form-input" name="q" placeholder="Search" />
                                        <button type="submit" class="form-submit" aria-label="search">
                                            <svg fill="#0a94e4" width="16" height="16" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667 S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6 c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fill fill-right"></div>
    </div>

    <div class="mobile-header">
        <div class="container">
            <div class="row">
                <div class="d-r-flex sp row-mobile-header">
                    <div class="on-click menu-show">
                        <svg fill="#fff" height="24" viewBox="0 -53 384 384" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                            <path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                            <path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                        </svg>
                    </div>
                    <div class="logo-show">
                        <a href="/" class="bz d-block h-full w-full a-logo-box" style="padding-right:0">
                            <img src="<?php echo \helper\image::get_thumbnail($logo, '', 50, 'h') ?>" width="" height="64" alt="<?php echo $site_name; ?>" />
                        </a>
                    </div>
                    <div class="on-click search-show">
                        <svg fill="#fff" width="24" height="24" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667 S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6 c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-categories">
        <div class="container">
            <div class="row">
                <ul class="mobile-ul-categories" style="padding:10px 0">
                    <?php foreach ($menu_header as $menu) : ?>
                        <li class="bz d-block">
                            <a class="bz d-block a-mobile-category" href="/games/<?php echo $menu->slug; ?>"><?php echo $menu->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-searching-box">
        <form action="/search" method="GET">
            <div class="control-mobile-searching">
                <input class="w-full h-full box-mobile-search" type="text" placeholder="Search" name="q" required="" />
            </div>
        </form>
    </div>
</header>