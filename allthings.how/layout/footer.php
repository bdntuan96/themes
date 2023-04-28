<?php $theme_url = '/' . DIR_THEME;
?>
<footer class="<?php echo $game_lay; ?>">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="flex-center">
                    <!-- share -->
                    <?php echo \helper\themes::get_layout('header_game', array('post' => $post)); ?>

                    <div class="infor">
                        <a class="link" href="/about-us">About Us</a>
                        <a class="link" href="/copyright-infringement-notice-procedure">Copyright Infringement Notice Procedure</a>
                        <a class="link" href="/contact-us">Contact Us</a>
                        <a class="link" href="/term-of-use">Term Of Use</a>
                        <a class="link" href="/privacy-policy">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
</footer>

<script src="<?php echo '/' . DIR_THEME; ?>rs/js/jquery-3.4.1.min"></script>
<!-- comment -->
<script src="<?php echo $theme_url; ?>rs/js/jquery.validate.min.js"></script>
<script src="<?php echo $theme_url; ?>rs/js/script.js"></script>
</body>

</html>