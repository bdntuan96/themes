//===================================== ~fullscreen.php <script> ===========================================

$("#expand").on('click', function() {
    $("#iframehtml5").addClass("force_full_screen");
    $("#_exit_full_screen").removeClass('hidden');
    requestFullScreen(document.body);
});

$("#_exit_full_screen").on('click', cancelFullScreen);


function requestFullScreen(element) {
    $(".header-game").removeClass("header_game_enable_half_full_screen");
    $("#iframehtml5").removeClass("force_half_full_screen");
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;
    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

function cancelFullScreen() {
    $("#_exit_full_screen").addClass('hidden');
    $("#iframehtml5").removeClass("force_full_screen");
    $(".header-game").removeClass("force_full_screen header_game_enable_half_full_screen");
    $("#iframehtml5").removeClass("force_half_full_screen");
    var requestMethod = document.cancelFullScreen || document.webkitCancelFullScreen || document.mozCancelFullScreen || document.exitFullScreenBtn;
    if (requestMethod) { // cancel full screen.
        requestMethod.call(document);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

if (document.addEventListener) {
    document.addEventListener('webkitfullscreenchange', exitHandler, false);
    document.addEventListener('mozfullscreenchange', exitHandler, false);
    document.addEventListener('fullscreenchange', exitHandler, false);
    document.addEventListener('MSFullscreenChange', exitHandler, false);
}

function exitHandler() {
    if (document.webkitIsFullScreen === false ||
        document.mozFullScreen === false ||
        document.msFullscreenElement === false) {
        cancelFullScreen();
    }
}

//============================== theater Mode  =========================================
function theaterMode() {
    let iframe = document.querySelector("#iframehtml5");
    if (iframe.classList.contains("force_half_full_screen")) {
        iframe.classList.remove("force_half_full_screen")
        document.querySelector(".header-game").classList.remove("header_game_enable_half_full_screen")
        return;
    }
    let above = 0;
    let left = 0;
    let below = $(".header-game").outerHeight();
    let right = 0;
    // let width = window.innerWidth;
    // let height = window.innerHeight;
    if (!document.querySelector("#style-append")) {
        let styleElement = document.createElement("style");
        styleElement.type = "text/css";
        styleElement.setAttribute('id', "style-append");
        let cssCode = `
    .force_half_full_screen{
    position: fixed!important;
    top: 0!important;
    left: 0!important;
    z-index: 887!important;
    top:${above}px!important;
    left:${left}px!important;
    width:calc(100% - ${left}px)!important;
    height:calc(100% - ${above+below}px)!important;
    background-color:#000;
    }
    .header_game_enable_half_full_screen{
        position:fixed;
        left:${left}px!important;
        bottom:0!important;
        right:0!important;
        z-index:887!important;
        width:calc(100% - ${left}px)!important;
        padding-left:10px;
        padding-right:10px;
        border-radius:0!important;
    }
    @media (max-width: 1364px){
        .force_half_full_screen{
            left:0!important;
            width:100%!important;
        }
        .header_game_enable_half_full_screen{
            width:100%!important;
            left:0!important;
        }
    }`
        styleElement.innerHTML = cssCode;
        document.querySelector('head').appendChild(styleElement);
    }
    iframe.classList.add("force_half_full_screen")
    document.querySelector(".header-game").classList.add("header_game_enable_half_full_screen")
}

// ========================================== nav-menu ===========================================
// 1. click vào nút có id nào thì hiện phần con của nó ra 
// 2. click lại vào chính nó thì ẩn phần con của nó đi
// 3. click sang nút khác hoặc bên ngoài thì ẩn phần con của nó đi 
$('.nav-child').click(function(e){
    // lấy ra data id của thẻ cha
    let id = $(this).attr('data-id');
    // for các thẻ div có class là .nav-child-list
    for (let div of $(".nav-child-list")) {
        // lấy ra id của thẻ
        let divid = [];
        divid = div.id;
        // nếu divid mà ko trùng với data id thì ẩn nó ko cho hiện. chạy tiếp xuống dưới
        if(divid != id) {
            $(div).hide(); 
        }
    }
    // cho nó thằng có đúng id trượt ra
    $(`.nav-child-list[id="${id}"]`).slideToggle("fast"); 
    // dừng các hoạt động ngoài click vào đây
    e.stopPropagation();
})

// ====================== nav-category =======================
$('.category-btn').click(function(e){
    if($(this).hasClass('btn-focus')) {
        $(this).removeClass('btn-focus');
    } else {
        $(this).addClass('btn-focus');
    }
    if($('.category-more-wrap').hasClass('show-cate')) {
        $('.category-more-wrap').removeClass('show-cate');
    } else {
        $('.category-more-wrap').addClass('show-cate');
    }
    e.stopPropagation();
})
// th2: click vào ko ẩn
// $(".category-more-item").click(function(e){
//     e.stopPropagation();
// });

// th3: click vào bất cứ gì thì ẩn nó đi
$(document).click(function(){
    $('.nav-child-list').hide(); //ở phần nav-menu
    $('.category-btn').removeClass('btn-focus');
    $('.category-more-wrap').removeClass('show-cate');
});

// ============================ category-wrap ================================= 
$(document).ready(function(){
    // tinh ra tổng chiều rộng của thẻ chứa các category và trừ đi nút bấm cần hiện
    // Phương thức outsideWidth() trả về chiều rộng bên ngoài của phần tử khớp ĐẦU TIÊN.(ko tính margin, còn đâu lấy tất: border+padding)
    let widthNav = $('.category-wrap').width() - $(".category-btn").outerWidth();
    console.log(widthNav)
    sumWidth();
    
    function sumWidth(){
        let i = 0;
        let sum = 0;
        // lấy ra các thẻ a thuộc class category-item
        for(let a of $('.category-item')){
            // tính chiều rộng của a: cho về số nguyên + lấy cả chiều rộng bên ngoài của nó
            let widthCate = parseInt($(a).outerWidth());
            // console.log(widthCate);
            // tính tổng các thẻ a trên
            sum += widthCate;
            // check = tổng của cả thẻ chứa + thêm nút bấm
            let check = sum +$(".category-btn").outerWidth();
            // kiểm tra nếu check lớn hơn tổng chiều dài thẻ chứa thì chuyển nó vào ô chứa ở nút btn
            if(check > widthNav){
                $(a).appendTo($(".category-more-wrap"));
                // cách 1 :đặt biến i=0 ở ngoài vòng for. sau mỗi lần nó appenTo vào đây thì cho i tăng lên 1đv.
                i++;
            }
        }
        // cách 2: lấy tổng số thẻ con của class .category-more-wrap
        //  let sumAll= $('.category-more-wrap > a').length;

        // lấy ra attribute của <button class="category-btn" count="0"
        // => gán lại cho nó giá trị: i/sumAll => gọi lại ở css vs:  content: attr(count);
        // let countCurrent = $('.category-btn').attr('count');
        // $('.category-btn').attr('count', countCurrent);
        // console.log(countCurrent);
        if(i == 0) {
            $('.category-btn').hide();
        }else{
            $('.category-btn').attr('count', i);
        }
    }

    addPlugin(); // ajax full_rate + comment
})

// ====================== nav-menu-mobile =======================
// click vào thì hiện nav-collapses
$('.menu-icon').click(function(){
    $('.nav-collapses').animate({width: 'toggle'}, "fast");
})

// ====================== paging vs click pagination.php + show gif loading =======================
function paging(p) {
    $(".loading_mask").removeClass("hidden-load");
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
            field_order: field_order,
            order_type: order_type,
            category_id: category_id,
            is_hot: is_hot,
            is_new: is_new,
            tags_id: tags_id,
            limit: limit
        },
        success: function(response) {
            $(".loading_mask").addClass("hidden-load");
            if (response) {
                //  parse nó ra mảng html
                let data = JSON.parse(response);
                // console.log(typeof(data))
                // console.log(data)
                // Hàm $("#ajax-append"): tham chiếu đến phần tử có id="ajax-append" từ DOM
                // hàm .html(data.html): gán .html (bằng mảng data['html/pagination'])  vào DOM: 
                $("#ajax-append").html(data.html);
                $("#pagination").html(data.pagination);
            }
        }
    })
}

// ajax full_rate + comment
function addPlugin() {
    if (!id_game && !url_game) {
        return
    }
    let url = "/add-plugin.ajax";
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id_game: id_game,
            url_game: url_game,
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

// ========================================= total-like ============================
// 1. nhap vao nut like thì nó like game id 
//- tang 1 dơn vi: update trong database
//- nhap vào nut like: luot like tang 1 
//- nhan lai ket qua luot like moi va cap nhat tren man hinh
//- lấy lại giá trị cũ
//- cộng cho nó 1 đơn vị
//- thay thế vào
$(".total-like").one("click", function() {
    let id = $(this).attr("id-game")
    let value = $(this).text();
    let number = parseInt(value) +1;
    // $(this).attr("disabled", true);
    // console.log(number)
    $(".emojis-img").css({
        fill: "#1abc9c",
    })
    $(".emojis .count").css({
        color: "#1abc9c",
    })
    
    $.ajax({
        url: "/like-game.ajax",
        type: "POST",
        data: {
            id_game: id,
        },
        success: function() {
                // $(this+".count").attr("disabled");
                $(".total-like .count").html(number);
                // $(this).attr("disabled", false);
        }
    })
})

// ================================= back-to-top ============================
// khi đang tải trong sự kiện cuộn 
window.onload = function() {
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('#back-to-top').fadeIn();

        } else {
            $('#back-to-top').fadeOut();
        }
    });
    $("#back-to-top").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 300);
    });
}

// ========== Thay đổi màn hình: cái nào đang mở sẽ tự ẩn/tắt đi => UI/UX ======
$(window).resize(function(){
    $('.nav-collapses').hide();
    $('.nav-child-list').hide();
    $('.category-btn').removeClass('btn-focus');
    $('.category-more-wrap').removeClass('show-cate');
})
.resize();//trigger the resize event on page load.