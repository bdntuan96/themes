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
    console.log(below)
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
    border-radius: 0;
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
        background: #fff;
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

// ========================================== console mobile-menu header ===========================================
$(".menu-mobile").on('click', function() {
    // console.log('here')
    $(".mobile-show").css({
        translate: 0,
    });
})

$(".close").click(function() {
    $(".mobile-show").css({
        translate: "0 -100%"
    });
})

// ======================================== slick carousel ========================================
    $(document).ready(function() {
        // return;
        //khi co nguoi dung vao. lay duoc chieu rong man hinh cua nguoi dung
        //sau do tinh ra so 
        // let obj = [];
        // a = {
        //     breakpoint: 1441,
        //     settings: {
        //         slidesToShow: 12,
        //         slidesToScroll: 3,
        //     },
        // }
        // obj.push(a);
        let widthWindow = $(window).width();
        $('.carousel').slick({
            infinite: false,
            speed: 300,
            slidesToShow: 13,
            slidesToScroll: 3,
            // responsive: [{
            //         breakpoint: 1441,
            //         settings: {
            //             slidesToShow: 12,
            //             slidesToScroll: 3,
            //         },
            // ]
            responsive: carouselReponsive()
        });
    });

    function carouselReponsive() {
        //lay 20 breakpoint. Mỗi lần lặp thì +120
        let width = 240;
        let arrayWidth = [];
        arrayWidth.push(width);

        for (let i = 1; i< 20; i++) {
            width += 120;
            arrayWidth.push(width);
        }
// console.log(arrayWidth)

        let arryyReponsive = [];
        // vong lap for...of lap lai tren chuoi (object co the lap lai) dat bien w cua mang arrayWidth
        // reverse ham dao nguoc => ko phai ghi lai nguoc so width man hinh o tren
        for (let w of arrayWidth.reverse()) {
            // dat bien dang ob vs cac gia tri nhu phan responsive ben tren cho no tu tinh toan
            let obj = {};
            obj.breakpoint = (w);
            //dat bien settings. noi vs cac gia tri can sd 
            obj.settings = {};
            // dat bien moi luot xem: sd ham chia lay so nguyen cua chieu rong man hinh/(120=chieu rong con game +margin cua no)
            let slidePerView = Math.floor(w / 120);
            // tru di 1 cho no du len vi no tu tinh toan cho bop anh vao
            obj.settings.slidesToShow = slidePerView-1;
            obj.settings.slidesToScroll = slidePerView < 5 ? slidePerView : 5;
            arryyReponsive.push(obj);
        }
        // ket thuc function phai co kq tra ve. sd thi goi ham sau
        return arryyReponsive;
    }
    
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
            field_order: field_order,
            order_type: order_type,
            category_id: category_id,
            is_hot: is_hot,
            is_new: is_new,
            tags_id: tags_id,
            limit: limit,
        },
        success: function(response) {
            $(".loading_mask").addClass("hidden");
            $('html, body').animate({
                scrollTop: $(".games-title").offset().top
            }, 1000);
            if (response) {
                $("#ajax-append").html(response);

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
                // $("#append-like").html(data.like);
            }
        }
    })
}
$(document).ready(function() {
    addPlugin();
})

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
    $(".total-like .count").css({
    backgroundColor: "var(--pink)",
    border: "2px solid var(--primary)",
    borderBottomRightRadius: "25px",
    borderTopRightRadius: "25px",
    lineHeight: 0.8
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

