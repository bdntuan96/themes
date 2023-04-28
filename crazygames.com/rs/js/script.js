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

// ========================================== ===========================================
//paging vs click pagination.php + show gif loading
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

        // 1. khi nhập từ khóa vào input lấy ra được các từ khóa liên quan
        // 2. làm tương tự như trang search đi
//dau tien la sua form search the from->div
// bắt sự kiện gõ vào input
//lay giá trị từ input
//gọi ajax
//đắp dữ liệu nhận về vào

// th1: click vào thì tác động lên
$('#game-search').on('input', function(e) {
    let keywords = $(this).val();
    // tìm toàn bộ trong các đoạn match: dấu cách, -, ., ?, \, /, _, '
    // thì replace thay thế nó bằng dấu - .loại bỏ khoảng trắng ở đầu và cuối .chuyển đổi tất cả các ký tự trong chuỗi về dạng chữ thường
    var rex_rule = /[ \-\.?:\\\/\_\'\*]+/g;
    var value1 = keywords.replace(rex_rule, "\-").trim().toLowerCase();
    // console.log(value1);
    // 1: search dung hien game
    if(value1) {
        // console.log("if");
        $('.search-more').removeClass('hidden', {duration:1000});
        $('.search-more').addClass('border-top');
        $('.search-term').addClass('border-bottom');
        // 2: sai ko hien
        searchGame(value1);
    } else {
        // console.log("else");
        // 3: ko co gi ko hien
        $('.search-more').addClass('hidden', {duration:1000});
        $('.search-term').removeClass('border-bottom', {duration:1000});
    }
    e.stopPropagation();
});

// th2: click vào ko ẩn
$("#search-ajax").click(function(e){
    e.stopPropagation();
});
$(".btn-search").click(function(e){
    e.stopPropagation();
});

// th1: click lại vào nó => tiếp tục search nếu có keywords
$("#game-search").click(function(e){
    let keywords = $(this).val();
    if(keywords) {
        $('.search-more').removeClass('hidden', {duration:1000});
        $('.search-more').addClass('border-top');
        $('.search-term').addClass('border-bottom');
    }
    e.stopPropagation();
});

// th3: click vào bất cứ gì thì ẩn nó đi
$(document).click(function(){
    $('.search-more').addClass('hidden', {duration:1000});
    $('.search-term').removeClass('border-bottom', {duration:1000});
});

function searchGame(kw) {
    // $(".loading_search").removeClass("hidden");
    let url = "/page-search.ajax";
    $.ajax({
        url: url,
        type: "POST",
        data: {
            keywords: kw
        },
        success: function(response) {
            let data = JSON.parse(response);
            if (data.flag == true) {
                // console.log(data);
                $("#search-ajax").html(data.html);
            } else {
                $("#search-ajax").html(data.html);
            }
        }
    })
}

// ======================================== slick carousel ========================================
$(document).ready(function() {
    // let obj = [];
    // a = {
    //     breakpoint: 1441,
    //     settings: {
    //         slidesToShow: 12,
    //         slidesToScroll: 3,
    //     },
    // }
    // obj.push(a);
    $('.carousel').slick({
        // tắt tính width tự động đi
        variableWidth: true,
        // useTransform: boolean,
        infinite: false,
        speed: 300,
        slidesToShow: 8,
        slidesToScroll: 4,
        // responsive: [{
        //         breakpoint: 1441,
        //         settings: {
        //             slidesToShow: 12,
        //             slidesToScroll: 3,
        //         },
        // ]
        responsive: carouselReponsive()
    });

        // trang search tự show search ra
        // if(screen.availWidth < 769) {
        //     // console.log("vao day")
        //     if(location.pathname == "/search") {
        //         console.log("vao day")
        //         $('.site-search').css({
        //             display: "block",
        //         }
        //         )
        //     }
        // }

    //lấy hàm từ dưới cho chạy cùng hàm ready sd ajax full_rate + comment
    addPlugin(); 
});



function carouselReponsive() {
    //lay 20 breakpoint. Mỗi lần lặp thì +120
    let width = 264;
    // let width = 240;
    let arrayWidth = [];
    arrayWidth.push(width);

    for (let i = 1; i< 20; i++) {
        width += 184;
        arrayWidth.push(width);
    }
// console.log(arrayWidth)

    let arryyReponsive = [];
    // vong lap for...of lap lai tren chuoi (object co the lap lai) dat bien w cua mang arrayWidth
    // reverse ham dao nguoc => ko phai ghi lai nguoc so width man hinh o tren
    for (let w of arrayWidth.reverse()) {
        // dat bien kieu ob vs cac gia tri nhu phan responsive ben tren cho no tu tinh toan
        let obj = {};
        obj.breakpoint = (w);
        //dat bien settings. noi vs cac gia tri can sd 
        obj.settings = {};
        // dat bien moi luot xem: sd ham chia lay so nguyen cua chieu rong man hinh/(120=chieu rong con game +margin cua no)
        let slidePerView = Math.floor(w / 184);
        // tru di 1 cho no du len vi no tu tinh toan cho bop anh vao
        obj.settings.slidesToShow = slidePerView-1;
        obj.settings.slidesToScroll = slidePerView < 4 ? slidePerView : 4;
        arryyReponsive.push(obj);
    }
    // ket thuc function phai co kq tra ve. sd thi goi ham sau
    return arryyReponsive;
}


// btnroot: Open/Close sidebar
$(".btnroot").click(function(){
    $('body').addClass('is_show', {duration:800});
    // var value = $(this).text();
    if($('body').hasClass('action')) {
        $('body').removeClass('action', {duration:800});
        $('.btnroot-icon').html('<path xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" d="M19 4C19.5523 4 20 3.55229 20 3C20 2.44772 19.5523 2 19 2L3 2C2.44772 2 2 2.44772 2 3C2 3.55228 2.44772 4 3 4L19 4ZM20.47 7.95628L15.3568 11.152C14.7301 11.5437 14.7301 12.4564 15.3568 12.848L20.47 16.0438C21.136 16.4601 22 15.9812 22 15.1958V8.80427C22 8.01884 21.136 7.54 20.47 7.95628ZM11 13C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11L3 11C2.44771 11 2 11.4477 2 12C2 12.5523 2.44771 13 3 13L11 13ZM20 21C20 21.5523 19.5523 22 19 22L3 22C2.44771 22 2 21.5523 2 21C2 20.4477 2.44771 20 3 20L19 20C19.5523 20 20 20.4477 20 21Z"></path>');

        $('body').removeClass('is_show', {duration:800});
    } else {
        $('body').addClass('action', {duration:800});
        $('.btnroot-icon').html('<path xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" d="M21 4C21.5523 4 22 3.55229 22 3C22 2.44772 21.5523 2 21 2L5 2C4.44772 2 4 2.44772 4 3C4 3.55228 4.44772 4 5 4L21 4ZM3.53 16.0438L8.6432 12.848C9.26987 12.4563 9.26987 11.5437 8.6432 11.152L3.53 7.95625C2.86395 7.53997 2 8.01881 2 8.80425V15.1958C2 15.9812 2.86395 16.46 3.53 16.0438ZM21 13C21.5523 13 22 12.5523 22 12C22 11.4477 21.5523 11 21 11L13 11C12.4477 11 12 11.4477 12 12C12 12.5523 12.4477 13 13 13L21 13ZM22 21C22 21.5523 21.5523 22 21 22L5 22C4.44771 22 4 21.5523 4 21C4 20.4477 4.44771 20 5 20L21 20C21.5523 20 22 20.4477 22 21Z"></path>');

        $('body').removeClass('is_show', {duration:800});
        $('.site-search').hide()
    }
})


let cb = function(){
    // console.log("s")
    if($('body').hasClass('is_show')) {
        $('body').removeClass('is_show', {duration:800});
        $('.site-search').slideToggle("fast");
        
        $('body').removeClass('action', {duration:800});
    } else {
        $('body').addClass('is_show', {duration:800});
        $('.site-search').slideToggle("fast");
        
        $('body').removeClass('action', {duration:800});
        // cho no chuyen chinh sua vao focus input
        $('.search-term').focus();
    }
}
// click vào thì site-search + bóng mờ hiện ra hiện ra
// site-menu ẩn đi
$('.search-trigger').click(cb)

// infor-web
$(".show-more-title").click(function(){
    // var value = $(this).text();
    // var width = $(window).width()
    // if(width > 1025) {
    //  return;   
    // }
    if($('.infor-web').hasClass('infor-web-show')) {
        $('.infor-web').removeClass('infor-web-show');
        $('.show-more-title').html("Show More");
    } else {
        $('.infor-web').addClass('infor-web-show');
        $('.infor-web').addClass('infor-web-show');
        $('.show-more-title').html("Show Less");
    }
})

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
        fill: "#A48EFF",
    })
    $(".emojis .count").css({
        color: "#A48EFF",
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

// khi thay đổi màn hình lớn hơn: nó cũng sẽ ẩn đi(tự động) => UI/UX nâng cao trải nghiệm người dùng
// $(window).resize(function(){
//     var width = $(window).width();
//     if(width < 950) {

//     }
// })
// .resize();//trigger the resize event on page load.



    // lưu lại lượt truy cập vào trang trang game_play tối đa 10 trang
    // 1. truy cap trang game: luu lai slug, title, img(w h )
    // 2. lưu lại thông tin trên: vào localStorage tối đa 10 và xóa các trang ở cuối
        //kiểm tra Nếu đã tồn tại rồi thì phải móc lại mảng từ localStorage -> sau đó mới push
        //Nếu chưa có thì Luu obj vao 1 mang rồi push vào localStorage
    // 3. lấy thông tin từ 2 appen vào html
    // 3. lấy nó ra và cho hiện khi click my games
    // 
    // console.log(obj);