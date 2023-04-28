<?php
//kiểm tra mảng kết hợp để truyền vào vs value=page trong pagination.php
if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}

$game_home_limit = \helper\options::options_by_key_type('game_home_limit', 'display');

if ($game_home_limit) {
    $limit = $game_home_limit;
} else {
    $limit = 24;
}

//phần này nó được lặp đi lặp lại nhiều lần nên khéo léo truyền vào các tham số và if else nó để dùng 
// Gom những phần giống nhau của games + search + tag vào dùng chung
$order_type = "DESC";
$display = 'yes';

//kiểm tra field_order nếu tồn tại thì gán nó = "publish_date"; ngày xuất bản
if (!$field_order) {
    $field_order = "publish_date";
}

//biến thuộc $paging_content phân số trang pagination là 3 
$num_links = 3;

//truyền các tham số cần dùng của từng phần vào từng phần
//kiểm tra nếu tồn tại $tags_id của index.php\tag thì hiển thị
//nếu ko thì lại hiển thị bth

// Gom những phần giống nhau của games + search + tag vào dùng chung
//Lọc danh sách game và phân trang theo các điều kiện hoặc tham số ( $tags_id....)
//nếu ko có $tag_id thì lấy trang theo tất cả phần còn lại va $category_id
if ($tags_id) {
    $games = \helper\game::paging_by_tag($tags_id, $page, $limit, $order_by, $order_type, $not_equal);
    //gọi hàm đếm theo thẻ count_by_tag
    $count = \helper\game::count_by_tag($tags_id);
    //nd phân trang: từ product.php truyền sang product_item => truyền sang pagination
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
} else {
    $games = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
    $count = \helper\game::get_count($keywords, $type, $display, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
}

//khai bao mang $arr_bread if else... để truyền vào breadcrumb.php và cho hiện ra ở dưới
if ($category) {
    $arr_bread = array(
        array(
            //name của mảng sẽ nhận tên của $category
            'name' => $category->name
        )
    );
}

if ($tag) {
    $arr_bread = array(
        array(
            'name' => $tag->name
        )
    );
}

if ($keywords) {
    $arr_bread = array(
        array(
            'name' => "Search"
        )
    );
}
?>

<!-- main__product -->
<?php
//kiểm tra biến $games lọc game khi search nếu ko đúng thì hiện ra file error.php vs biến $keywords
//ngược lại sẽ hiển thị ra game 
if (!count($games)) : ?>
    <?php echo \helper\themes::get_layout('error', array('error' => $keywords)); ?>

<?php else : ?>
    <!-- 
    - bread_crumb.php -based: $arr_bread
    - product_item.php -based: games' => $games, 'category_id' => $category_id, 
    'paging_content' => $paging_content, 'keywords' => $keywords :=> pagination.php*
 -->
    <section class="product <?php echo $is_home; ?>">
        <div class="container">
            <?php echo \helper\themes::get_layout('breadcrumb', array('arr_bread' => $arr_bread)); ?>
            <!-- nếu ko tồn tại/có is_title của index.php\tag thì hiện ra phần này -->
            <?php if (!$is_title) : ?>
                <div class="row">
                    <div class="product__title">
                        <h2>NEW GAMES</h2>
                    </div>
                </div>
            <?php endif; ?>
            <!-- cho hiển thị ra danh sách gameproduct và truyền các giá trị cần sang -->
            <?php echo \helper\themes::get_layout('product_item', array('games' => $games, 'category_id' => $category_id, 'paging_content' => $paging_content, 'keywords' => $keywords)); ?>
    </section>
<?php endif; ?>