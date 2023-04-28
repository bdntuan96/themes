<?php
//nếu có game khác biệt thì sd:
//Gán phần tử đầu tiên của mảng $games_home vào $game_main
$game_main = $games_home[0];
//xóa bỏ phần tử đầu tiên của mảng $games_home để khi foreach ở dưới ko bị ảnh hưởng đến
// in($games_home);die;
unset($games_home[0]);

$banner = \helper\options::options_by_key_type('banner', 'general');
$site_description = \helper\options::options_by_key_type('site_description', 'general');

?>

<!-- main__categories-->
<style>
    .header-section {
        background: url('<?php echo $banner; ?>') no-repeat;
        background-position: center center;
        background-size: cover;
        position: relative;
        z-index: 1;
    }
</style>
<!-- background header -->
<div class="header-section">
    <div class="container">
        <div class="row">
            <div class="header-section__title text-2">
                <p><?php echo $site_description; ?></p>
            </div>
        </div>
    </div>
    <div class="ol-01"></div>
</div>
<!-- main__categories-->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="row--wrap">
                <div class="width-50 main-game">
                    <a class="item set-bg" href="/<?php echo $game_main->slug; ?>" style="background-image: url('<?php echo $game_main->image; ?>');">
                        <div class="ol-01"></div>
                        <div class="wrap-text">
                            <h3 class="text-1"><?php echo $game_main->name; ?></h3>
                            <div class="btn-url text-2" href="/<?php echo $game_main->slug; ?>">Play Now</div>
                        </div>
                    </a>
                </div>
                <div class="width-50">
                    <div class="flex-box-wrap">
                        <?php foreach ($games_home as $item) : ?>
                            <div class="width-50-child pdl-15">
                                <a class="item set-bg" href="/<?php echo $item->slug; ?>" style="background-image: url('<?php echo $item->image; ?>');">
                                    <div class="ol-01"></div>
                                    <div class="wrap-text">
                                        <h3 class="text-1"><?php echo $item->name; ?></h3>
                                        <div class="btn-url text-2" href="/<?php echo $item->slug; ?>">Play Now</div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>