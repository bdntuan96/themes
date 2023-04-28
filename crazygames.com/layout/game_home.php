<?php
if (!count($games)) : ?>
    <?php echo \helper\themes::get_layout('error', array('keywords' => $keywords)); ?>
<?php else : ?>
    <div class="games">
        <div class="container">
            <div class="row">
                <h1 class="games-title"><?php echo $title; ?></h1>
                <div class="text-overflow games-desc"><?php echo html_entity_decode($description); ?></div>
                <div class="flex games-wrap">
                    <!-- <div class="grid-clayover"> -->
                    <div class="games-grid" id="ajax-append">
                        <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'paging_content' => $paging_content)) ?>
                    </div>
                    <div id="pagination">
                        <?php if ($paging_content) {
                            echo \helper\themes::get_layout('pagination', array('paging_content' => $paging_content, 'keywords' => $keywords, 'category_id' => $category_id));
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>