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
//============================== end ~fullscreen.php </script>  =========================================

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

// ========================================== console mobile-menu header ================================================
$(".menu__icon").on('click', function() {
    // console.log('here')
    $(".offcanvans--menu-wrap").css({
        transform: "translate(0)"
    });
    $(".offcanvas-menu-overlay").css({
        display: "block"
    });
})

$(".offcanvas-menu-overlay").on('click', function() {
    $(".offcanvas-menu-overlay").css({
        display: "none"
    });
    $(".offcanvans--menu-wrap").css({
        transform: "translate(270px)"
    });
})

$(".offcanvas__close").click(function() {
    $(".offcanvans--menu-wrap").css({
        transform: "translate(270px)"
    });
    $(".offcanvas-menu-overlay").css({
        display: "none"
    });
})

//click light-on => save light-on
//click light-off => save light-off vs (localStorage);
$("span.light-on").on('click', function(){
    $("body").addClass("lightmode");
    $(this).hide();
    $(".light-off").attr('style',"display:flex!important");
    setLocalStorage("theme_mode", "lightmode");
})

$(".light-off").on('click',function(){
    $("body").removeClass("lightmode")
    $(this).attr('style',"display:none!important");
    $(".light-on").show();
    setLocalStorage("theme_mode", "darkmode");
})


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
            limit: limit
        },
        success: function(response) {
            $(".loading_mask").addClass("hidden");
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
            }
        }
    })
}
$(document).ready(function() {
    addPlugin();
})

// 