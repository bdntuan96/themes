<div class="row ">
    <div class="row--wrap">
        <?php foreach ($games as $item) : ?>
            <?php $game_rate = \helper\game::get_rate($item->id); ?>
            <div class="product--wrap">
                <div class="product__item">
                    <a class="product__item_pic set-bg" href="/<?php echo $item->slug; ?>" style="background-image: url('<?php echo $item->image; ?>');">
                        <div class="ol-01"></div>
                        <div class="product__label_new">New</div>

                        <div class="product__item_text">
                            <h3 class="text-1"><?php echo $item->name; ?></h3>
                            <!--
                                    hiện 5 sao. Nếu điểm vote chỉ là 3/5 thì là 3 ngôi sao vàng, 2 ngôi sao xám.
                                    $game_rate['rate_average']=3;

                                    
                                    lặp từ 1 -> 5 (5 ngôi sao)
                                    Kiểm tra vòng lặp > rate_average => echo ngôi sao xám
                                    Nếu mà vòng lặp < rate_average => echo ngôi sao vàng
                                -->
                            <div class="product__rating">
                                <?php for ($i = 1; $i <= 5; $i++) {
                                    if ($i > $game_rate['rate_average']) {
                                        echo '<i class="fa fa-star grey" style="color:grey"></i>';
                                    } else {
                                        echo '<i class="fa fa-star"></i>';
                                    }
                                }
                                // in($game_rate);die; ?>
                            </div>
                            <div class="btn text-btn" href="/<?php echo $item->slug; ?>">Play Now</div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php echo \helper\themes::get_layout('pagination', array('paging_content' => $paging_content, 'keywords' => $keywords, 'category_id' => $category_id)); ?>