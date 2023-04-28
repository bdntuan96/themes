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

// ========================================== console mobile-menu header ===========================================
$(".nav-icon").click(function(){
//điều chỉnh lại z-index của tất cả các thanh trượt ra ngoài (panel); +ẩn nó đi rồi cho cái vừa ấn hiện ra ngoài
//Cái thằng cần được trượt ra ngoài được điều chỉnh z-index cao hơn.

//lấy ra data-id khi click vào class trên và cho nó hiện ra
    var id = $(this).attr("data-id");

    //khi click thi body lam mo tat ca, 
    // $("body").addClass(".overlay2");
    // $("body").addClass(".overlay3");

//khi click vào class trên và cho nó hiện ra
    $(".category, .search-wrap").css({
        zIndex: 108,
        transform: "translate(-100%)",
        left: 0, 
    })
    
    // khi click vao class kia thi xoa class bg
    //khi click vao chinh no thi them class bg va click vao cai khac no lai mat di va hien o cai moi
    //khi thoat ra thi no phai mat di bg
    $(".nav-icon").removeClass("bg-select");
    $(this).addClass("bg-select");

    $("#"+id).css({
        left: 48,
        transform: "translate(0)",
        zIndex: 110,
    });
    
    $(".overlay").css({
        display: "block"
     })
});

$(".overlay, .closebtn").on('click', function() {
    $(".category, .search-wrap").css({
        transform: "translate(-100%)",
        left: 0,
    });
    $(".overlay").css({
        display: "none"
    });
    $(".nav-icon").removeClass("bg-select");
    $(".fix").addClass("bg-select");
})


// ---them game khi cuon xuong
// cu cuon la them game
//moi lan cuon page tang len 1
// khi tăng lên tra ve du lieu html nối vào trang
//het so page thi dung lại

//paging vs click pagination.php + show gif loading
function paging(p) {
    //cho loading hien ra ELement 
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
            max_page: max_page
        },
        //thanh cong trả ra ham ket qua tra ve tu ben ajax chon cho no html/append(thay the/them vao)
        success: function(response) {
            //cho loading an di
            $(".loading_mask").addClass("hidden");
            
            // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
            //neu co kq tra ve thi ==> noi Them kq vao và chạy tiếp xuống
            if (response) {
                $("#ajax-append").append(response);
            }
            //khi chạy đến cuối hàm gán nó bằng false để nó ko bận lại chạy tiếp xuống dưới
            is_busy = false;
        }
    })
}

// Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm
var is_busy = false;
// Biến lưu trữ trang hiện tại
var page = 1;
 
$(document).ready(function()
{    
    addPlugin(); //lấy hàm từ dưới cho chạy cùng hàm ready sd ajax full_rate + comment
    if(max_page){
    // Khi kéo scroll thì xử lý
        $(window).scroll(function() 
        {
            //(nếu chiều dài đạt yêu cầu VÀ is_busy = false) => thì nó mới chạy hàm này
            if ($(window).scrollTop() + $(window).height() > $(document).height() - $(document).height() / 2 && is_busy==false) 
            {
                //gán lại nó bằng true để nó dừng lại ở đây ko ghi nhận cuộn nữa và xử lí tiếp bên dưới
                is_busy=true
                // Tăng số trang lên 1
                page++
                //nếu page tăng lên mà > lớn hơn thằng maxpage(mà mình có) thì dừng ko cộng page nữa và chạy tiếp xuống hàm dưới
                if(page>max_page) {
                    return false;
                }
                paging(page)
            }
        });
    }
});


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

//dau tien la sua form search the from->div
// bắt sự kiện gõ vào input
//lay giá trị từ input
//gọi ajax
//đắp dữ liệu nhận về vào

$('#game-search').on('input', function() {
    let keywords = $('#game-search').val();
    searchGame(keywords)
});

function searchGame(kw) {
    $(".loading_search").removeClass("hidden");
    let url = "/page-search.ajax";
    $.ajax({
        url: url,
        type: "POST",
        data: {
            keywords: kw
        },
        success: function(response) {
            $(".loading_search").addClass("hidden");
            if (response) {
                $("#search-ajax").html(response);
            }
        }
    })
}

