<div class="navplay-item">
    <?php foreach ($games as $k => $item) : ?>
        <a class="navplay-item-link" href="<?php echo $item->slug ?>" title="<?php echo $item->name ?>">
            <div class="navplay-item-show">
                <img src="<?php echo \helper\image::get_thumbnail($item->image, 69, 69, 'f') ?>" width="69" height="69" alt="<?php echo $item->name ?>" title="<?php echo $item->name ?>">
                    <div class="text navplay-item-show-title"><?php echo $item->name ?></div>
            </div>
        </a>
    <?php endforeach ?>
</div>