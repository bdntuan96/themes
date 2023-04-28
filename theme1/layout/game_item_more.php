<?php foreach ($games as $item) : ?>
    <div class="game-more-relate">
        <a href="/<?php echo $item->slug; ?>" class="d-block game-a">
            <img class="d-block" width="100" height="100" src="<?php echo \helper\image::get_thumbnail($item->image, 100, 100, 'm'); ?>" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" />
            <h3 class="text-overflow game-more-title"><?php echo $item->name; ?></h3>
        </a>
    </div>
<?php endforeach; ?>