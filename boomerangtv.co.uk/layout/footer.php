<?php
$theme_url = '/' . DIR_THEME;
$description = \helper\options::options_by_key_type('site_description');
$logo = \helper\options::options_by_key_type('logo');
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="flex-sb">
                <div class="infor">
                    <a class="link" href="/about-us">About Us</a>
                    <a class="link" href="/copyright-infringement-notice-procedure">Copyright Infringement Notice Procedure</a>
                    <a class="link" href="/contact-us">Contact Us</a>
                    <a class="link" href="/term-of-use">Term Of Use</a>
                    <a class="link" href="/privacy-policy">Privacy Policy</a>
                </div>
                <div class="description">
                    <?php echo $description; ?>
                    <a href="/" class="logo-wrap" title="<?php echo $site_name ?>">
                    <img class="logo" width="" height="110" src="<?php echo \helper\image::get_thumbnail($logo, '', 110, "h"); ?>" alt="<?php echo $site_name ?>" title="<?php echo $site_name ?>">
                </a>
                </div>
            </div>
        </div>
</footer>
<div class="loading_mask hidden">
    <img src="<?php echo $theme_url; ?>rs/imgs/uk-page-loading.gif" width="" height="" alt="loading" title="loading" class="loading_img">
</div>

<script src="<?php echo $theme_url ?>rs/js/jquery-3.4.1.min"></script>

<!-- slick carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js"></script>

<!-- comment -->
<script src="<?php echo $theme_url; ?>rs/js/jquery.validate.min.js"></script>
<script src="<?php echo $theme_url; ?>rs/js/script.js"></script>
