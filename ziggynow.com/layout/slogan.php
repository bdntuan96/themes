<?php
$slogan = \helper\options::options_by_key_type('company_slogan', 'company');
$site_name = helper\options::options_by_key_type('site_name', 'general');

?>
<div class="container">
    <div class="row">
        <div class="game__content">
            <h1 class="title-option"><?php echo $site_name; ?></h1>
            <?php if ($slogan) : ?>
                <!-- gọi ra hàm giải mã thực thể html để hiện ra $slogan -->
                <?php echo html_entity_decode($slogan); ?>
            <?php endif; ?>

        </div>
    </div>
</div>