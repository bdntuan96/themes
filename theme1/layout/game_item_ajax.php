<div  class="w-full text-center foreach">
    <?php foreach ($games as $item): ?>
        <?php $game_cate = \helper\game::find_related_category($item->id); ?>
        <div class="bz game">
            <a href="/<?php echo $item->slug; ?>" class="d-block game-a">
                <img class="d-block" width="190" height="140" src="<?php echo \helper\image::get_thumbnail($item->image, 190, 140, 'm'); ?>" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" />                            
                <div class="bz w-full ab-info">
                    <span class="text-overflow title-game"><?php echo $item->name; ?></span>
                    <m class="label-title-game"><?php echo $game_cate[0]->name; ?></m>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<?php if ($paging_content): ?>
    <?php echo \helper\themes::get_layout('pagination', array('paging_content' => $paging_content)); ?>
<?php endif; ?>