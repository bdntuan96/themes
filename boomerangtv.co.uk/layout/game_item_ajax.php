<div class="games-list">
<?php foreach ($games as $k => $item) :
    // lay tat ca thong tin co lien quan den game theo id
    $list_cate = \helper\game::find_related_category($item->id);
    if ($list_cate) {
        $name = $list_cate[0]->name;
    }
?>
    <div class="games-item">
        <a class="item-wrap <?php echo ($k % 2 == 0) ? "" : "bg-blue" ?>" href="/<?php echo $item->slug; ?>" title="<?php echo $item->name; ?>">
            <img class="item-img" src="<?php echo \helper\image::get_thumbnail($item->image, 365, 179, "m") ?>" width="365" height="179" title="<?php echo $item->name; ?>" alt="<?php echo $item->name; ?>">
            <span class="item-content flex-sb">
                <!-- <img src="" alt="" class="item-content-img"> -->
                <div class="item-content-desc text">
                        <h3 class="item-content-cate"><?php echo ($name) ? $name : 'Game' ?></h3>
                    <p class="item-content-title"><?php echo $item->name; ?></p>
                </div>
                <svg class="item-content-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 63 63" style="enable-background:new 0 0 63 63;" xml:space="preserve">
                    <g id="games">
                        <g id="games_1_">
                            <path style="fill:#FFFFFF;" d="M58.992,19.129C55.953,9.868,48.863,9,48.863,9H47.55c-1.285,0-3.09,0.534-3.966,1.474
			l-2.824,3.389c-1.1,1.32-2.729,2.083-4.446,2.083H31.5h-4.813c-1.718,0-3.347-0.763-4.446-2.083l-2.824-3.389
			C18.541,9.534,16.735,9,15.45,9h-1.314c0,0-7.09,0.868-10.129,10.129c-2.853,8.695-3.473,16.64-3.473,22.862
			C0.535,52.987,7.047,54,7.047,54s1.013,0,3.183,0s4.341-3.039,6.656-7.958c2.315-4.92,3.617-5.643,6.511-5.643s8.103,0,8.103,0
			s5.209,0,8.103,0s4.196,0.723,6.511,5.643C48.429,50.961,50.6,54,52.77,54s3.183,0,3.183,0s6.511-1.013,6.511-12.01
			C62.465,35.768,61.845,27.824,58.992,19.129z M15.873,32.151c-3.836,0-6.945-3.11-6.945-6.945c0-3.836,3.109-6.945,6.945-6.945
			s6.945,3.11,6.945,6.945C22.818,29.042,19.709,32.151,15.873,32.151z M47.127,17.682c1.279,0,2.315,1.037,2.315,2.315
			c0,1.279-1.037,2.315-2.315,2.315c-1.279,0-2.315-1.036-2.315-2.315C44.812,18.718,45.848,17.682,47.127,17.682z M42.207,27.521
			c-1.279,0-2.315-1.036-2.315-2.315c0-1.279,1.036-2.315,2.315-2.315c1.279,0,2.315,1.036,2.315,2.315
			C44.523,26.484,43.486,27.521,42.207,27.521z M47.127,32.73c-1.279,0-2.315-1.037-2.315-2.315c0-1.279,1.036-2.315,2.315-2.315
			c1.279,0,2.315,1.036,2.315,2.315C49.442,31.693,48.406,32.73,47.127,32.73z M51.757,27.521c-1.279,0-2.315-1.036-2.315-2.315
			c0-1.279,1.036-2.315,2.315-2.315c1.279,0,2.315,1.036,2.315,2.315C54.072,26.484,53.036,27.521,51.757,27.521z" />
                        </g>
                    </g>
                    <g id="Layer_1">
                    </g>
                </svg>
            </span>
        </a>
    </div>
<?php endforeach; ?>
</div>
<?php if ($paging_content) {
    echo \helper\themes::get_layout('pagination', array('paging_content' => $paging_content));
} ?>