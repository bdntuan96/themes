<?php foreach ($games as $key => $games_new) : ?>
    <?php
    $metadata = json_decode($games_new->metadata);
    $is_zoom = $metadata->is_zoom; ?>
    <?php if ($is_zoom == 'yes' && !$flag) { ?>
        <a href="/<?php echo $games_new->slug; ?>" class="grid-item hover-item span-2x2">
            <img class="grid_image" src="<?php echo \helper\image::get_thumbnail($games_new->image, 208, 208, 'f'); ?>" width="208" height="208" alt="<?php echo $games_new->name; ?>" title="<?php echo $games_new->name; ?>">
            </img>
            <span class="title"><?php echo $games_new->name; ?></span>
        </a>
    <?php } else { ?>
        <a href="/<?php echo $games_new->slug; ?>" class="grid-item hover-item">
            <img class="grid_image" src="<?php echo \helper\image::get_thumbnail($games_new->image, 96, 96, 'f'); ?>" width="96" height="96" alt="<?php echo $games_new->name; ?>" title="<?php echo $games_new->name; ?>">
            </img>
            <span class="title"><?php echo $games_new->name; ?></span>
        </a>
    <?php } ?>
<?php endforeach; ?>