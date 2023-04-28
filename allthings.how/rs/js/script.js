// 
let cb = function(){
    // console.log("s")
    if($('body').hasClass('is_show')) {
        $('body').removeClass('is_show');
        // hàm này nó có 2 chức năng là vừa ẩn vừa có thể hiện ra 
        $('.site-search').slideToggle("fast");
    } else {
        $('body').addClass('is_show');
        $('.site-search').slideToggle("fast");
        $('.site-menu').hide();
        // cho no chuyen chinh sua vao focus input
        $('.search-term').focus();
        $('body').removeClass('menu_show');
    }
}
// click vào thì site-search + bóng mờ hiện ra hiện ra
// site-menu ẩn đi
$('.search-trigger').click(cb)

// click vào thì site-menu + bóng mờ hiện ra hiện ra
// site-search ẩn đi
$('.menu-trigger').click(function(){
    if($('body').hasClass('menu_show')) {
        $('body').removeClass('menu_show');
        $('.site-menu').slideToggle("fast");
    } else {
        $('body').addClass('menu_show');
        $('.site-menu').slideToggle("fast");
        $('.site-search').hide();
        $('body').removeClass('is_show');
    }
})

// khi click vào thì nếu có is_show và menu_show thì ẩn nó đi
// ẩn site-menu + site-search
$('.site-actions-backdrop').click(function(){
    $('body').removeClass('is_show');
    $('body').removeClass('menu_show');
    $('.site-menu').hide();
    $('.site-search').hide();
})

// khi thay đổi màn hình: nó cũng sẽ ẩn đi(tự động) => UI/UX nâng cao trải nghiệm người dùng
$(window).resize(function(){
        $('body').removeClass('is_show');
        $('body').removeClass('menu_show');
        $('.site-menu').hide();
        $('.site-search').hide();
})
.resize();//trigger the resize event on page load.

//paging vs click pagination.php + show gif loading
function paging(p) {
    $(".loading_mask").removeClass("hidden");
    if (!p) {
        p = 1;
    }
    let url = "/paging.ajax";
    $.ajax({
        url: url,
        type: "POST",
        data: {
            p: p,
            keywords: keywords,
            order_by: order_by,
            order_type: order_type,
            category_id: category_id,
            is_hot: is_hot,
            is_new: is_new,
            tags_id: tags_id,
            limit: limit,
        },
        success: function(response) {
            $(".loading_mask").addClass("hidden");
            if (response) {
                $("#ajax-append").append(response);
            }
        }
    })
}
var p = 1;
$(document).ready(function() { 
    
    addPlugin(); //get down ajax full_rate + comment

    $('.load-more').click(function(){
        p++
        // nếu số p lớn hơn max_page thì dừng luôn
        // nếu số p == max_page thì cho ẩn button load-more đi
        if(p>max_page){
            return false;
        }
        if(p==max_page){
            $('.load-more').hide()
        }
        paging(p)
    })
})


// ajax full_rate + comment
function addPlugin() {
    if (!id_post && !url_post) {
        return
    }
console.log()
    let url = "/add-plugin.ajax";
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id_post: id_post,
            url_post: url_post,
        },
        success: function(response) {
            if (response) {
                let data = JSON.parse(response);
                $("#append-rate").html(data.rate);
                $("#append-comment").html(data.comment);
            }
        }
    })
}


