<div class="flex-center flex-wrap">
    <?php foreach ($games as $item) : ?>
        <div class="throw-game">
            <a class="flex card-game flex-cloumn" href="/<?php echo $item->slug ?>">
                <figure class="image-card-game">
                    <img class="img-game" width="230" height="230" src="<?php echo \helper\image::get_thumbnail($item->image, 230, 230, 'm') ?>" title="<?php echo $item->name; ?>" alt="<?php echo $item->name; ?>">
                    <div class="like">
                        <span class="icon_like">
                            <svg class="svg_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4">
                                <path fill="none" d="M0 0H24V24H0z"></path>
                                <path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"></path>
                            </svg>
                        </span>
                        <span class="count"><?php echo \helper\number::convert_vn($item->views); ?></span>
                    </div>
                </figure>
                <figcaption class="title-card-game">
                    <div class="title-name">
                        <span class="text-overflow"><?php echo $item->name; ?></span>
                    </div>
                </figcaption>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<?php if ($paging_content) {
    echo \helper\themes::get_layout('pagination', array('paging_content' => $paging_content, 'keywords' => $keywords, 'category_id' => $category_id));
}
?>