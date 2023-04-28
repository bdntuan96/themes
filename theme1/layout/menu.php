<?php
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
$enable_ads = \helper\game::get_ads_control();
?>

<?php if ($enable_ads) : ?>
    <div class="offset-banner">
        <div class="throw-ads-970x90">
            <?php echo \helper\themes::get_layout('ads_layout/970x90', array('enable_ads' => $enable_ads)); ?>
        </div>
        <div class="throw-ads-468x60">
            <?php echo \helper\themes::get_layout('ads_layout/468x60', array('enable_ads' => $enable_ads)); ?>
        </div>
    </div>
<?php endif; ?>
<!--<div class="bz text-center messenger">
    Welcome to <a href="/" style="color:#2757a5; text-decoration: underline;" class="font-bold"><?php echo \helper\options::options_by_key_type('site_name'); ?></a>. Wish you have moments of fun entertainment
</div> -->
<div class="w-full p-r menu">
    <div class="bz h-full w-full d-flex al list_menu">
        <div id="show-menu" class="ab-menu">
            <svg fill="#fff" height="24px" viewBox="0 -21 384 384" width="24px" xmlns="http://www.w3.org/2000/svg">
                <path d="m362.667969 0h-341.335938c-11.753906 0-21.332031 9.578125-21.332031 21.332031v42.667969c0 11.753906 9.578125 21.332031 21.332031 21.332031h341.335938c11.753906 0 21.332031-9.578125 21.332031-21.332031v-42.667969c0-11.753906-9.578125-21.332031-21.332031-21.332031zm0 0" />
                <path d="m362.667969 128h-341.335938c-11.753906 0-21.332031 9.578125-21.332031 21.332031v42.667969c0 11.753906 9.578125 21.332031 21.332031 21.332031h341.335938c11.753906 0 21.332031-9.578125 21.332031-21.332031v-42.667969c0-11.753906-9.578125-21.332031-21.332031-21.332031zm0 0" />
                <path d="m362.667969 256h-341.335938c-11.753906 0-21.332031 9.578125-21.332031 21.332031v42.667969c0 11.753906 9.578125 21.332031 21.332031 21.332031h341.335938c11.753906 0 21.332031-9.578125 21.332031-21.332031v-42.667969c0-11.753906-9.578125-21.332031-21.332031-21.332031zm0 0" />
            </svg>
        </div>
        <div class="bz logo">
            <a href="/" title="<?php echo \helper\options::options_by_key_type('site_name'); ?>">
                <img width="74" height="51" src="<?php echo \helper\image::get_thumbnail(\helper\options::options_by_key_type('logo'), 74, 51, 'm'); ?>" alt="<?php echo \helper\options::options_by_key_type('site_name'); ?>" title="<?php echo \helper\options::options_by_key_type('site_name'); ?>" />
            </a>
        </div>
        <div class="menu-header">
            <div class="h-full d-flex">
                <?php foreach ($menu_header as $menu) : ?>
                    <a href="<?php echo $menu->url ?>" class="d-flex al header-item"><?php echo $menu->title; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="p-r search-box">
            <input id="txt-search" class="bz w-full h-full item-search" autocomplete="off" placeholder="Search games" />
            <span class="item-button">
                <svg fill="#fff" width="16" height="16" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667
                                  S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6
                                  c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z
                                  M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z" />
                        </g>
                    </g>
                </svg>
            </span>
            <div id="list-suggest" class="link-suggest">
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>
<div class="overlay-full"></div>
<div class="mobile-menu">
    <div class="p-r top-close-mobile">
        <div class="close-mobile">
            <svg fill="#fff" height="24px" viewBox="0 0 365.696 365.696" width="24px" xmlns="http://www.w3.org/2000/svg">
                <path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0" />
            </svg>
        </div>
    </div>
    <div class="list_mobile_menu">
        <?php foreach ($menu_header as $menu) : ?>
            <a class="mobile-header-item" href="<?php echo $menu->url ?>"><?php echo $menu->title; ?></a>
        <?php endforeach; ?>
    </div>
</div>