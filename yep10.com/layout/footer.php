<?php
$theme_url = '/' . DIR_THEME;
$site_name = helper\options::options_by_key_type('site_name', 'general');
?>
<footer class="<?php echo $not_mg; ?>">
    <div class="container">
        <div class="row">
            <div class="display-mobile d-f j-s a-c">
                <div class="infor">
                    <a class="link" href="/about-us">About Us</a>
                    <a class="link" href="/copyright-infringement-notice-procedure">Copyright Infringement Notice Procedure</a>
                    <a class="link" href="/contact-us">Contact Us</a>
                    <a class="link" href="/term-of-use">Term Of Use</a>
                </div>
                <div class="webgame">
                    <a class="web_name" href="/"><span> <?php echo $site_name; ?>&nbsp; | &nbsp;</span></a>
                    <a class="link" href="/privacy-policy">Privacy Policy</a>
                </div>
        </div>
    </div>
</footer>

<script src="<?php echo $theme_url; ?>rs/js/script.js"></script>

</body>

</html>