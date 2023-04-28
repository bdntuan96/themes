<style>
    .header-game{
        background-color: #252833;
        min-height: 45px;
        height: auto;
        overflow: hidden;
        color: #fff;
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        text-align: left;
        max-height: 50px;
    }

    .box-header{
        display: flex;
        width: 100%;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: center;
    }
    .box-header h1{
        font-size: 20px;
        white-space: nowrap;
        text-transform: uppercase;
    }
    .header-game-extend{
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }
    .header-game-extend > span{
        padding: 6px;
        box-sizing: border-box;
        width: 32px;
        height: 32px;
        cursor: pointer;
        margin-left: 5px;
        border-radius: 5px;
    }
    .expand-btn{
        margin-right: -5px;
    }
    .header-game-extend > span > svg{
        width: 20px;
        height: 20px;
        fill: #fff;
    }
    .header-game-extend > span:hover{
        background-color: rgba(0,0,0,0.8);
    }
    .exit-fullscreen{
        width: 36px;
        height: 36px;
        position: fixed;
        top: 5px;
        right: 5px;
        z-index: 100000;
        padding: 6px;
        background-color: rgba(0,0,0,0.65);
        box-sizing: border-box;
        cursor: pointer;
    }
    .clipboard-share{
        position: fixed;
        z-index: 100;
        background-color: #fff;
        padding: 16px;
        border-radius: 8px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        min-width: 300px;
        min-height: 45px;
    }
    .hide-zindex{
        z-index: -20;
        visibility: hidden;
    }
    .close-sharing-box{
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 99;
        background-color: rgba(0,0,0,0.65);
        display: none;
    }
    .inline-sharing-box h3{
        margin-bottom: 10px;
    }
    @media (max-width: 576px){
        .header-game{
            max-height: unset;
        }
    }
</style>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=61974c956dd1de0019015128&product=inline-share-buttons" async="async"></script>
<div class="header-game">
    <div class="box-header">
        <h1><?php echo $game->name; ?></h1>
        <div class="header-game-extend">
            <div class="game-full-rate">
                <?php echo \helper\themes::get_layout('full_rate_mini', array('id' => $game->id)); ?>
            </div>
            <span class="share-btn" id="share-focus" onclick='showSharingBox()'>
                <svg focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"></path></svg>
            </span>
            <span class="comment-btn" id="comment-focus" onclick='scrollToDiv(".comment-company")'>
                <svg viewBox="-21 -47 682.66669 682" xmlns="http://www.w3.org/2000/svg"><path d="m552.011719-1.332031h-464.023438c-48.515625 0-87.988281 39.464843-87.988281 87.988281v283.972656c0 48.414063 39.300781 87.816406 87.675781 87.988282v128.863281l185.191407-128.863281h279.144531c48.515625 0 87.988281-39.472657 87.988281-87.988282v-283.972656c0-48.523438-39.472656-87.988281-87.988281-87.988281zm50.488281 371.960937c0 27.835938-22.648438 50.488282-50.488281 50.488282h-290.910157l-135.925781 94.585937v-94.585937h-37.1875c-27.839843 0-50.488281-22.652344-50.488281-50.488282v-283.972656c0-27.84375 22.648438-50.488281 50.488281-50.488281h464.023438c27.839843 0 50.488281 22.644531 50.488281 50.488281zm0 0"/><path d="m171.292969 131.171875h297.414062v37.5h-297.414062zm0 0"/><path d="m171.292969 211.171875h297.414062v37.5h-297.414062zm0 0"/><path d="m171.292969 291.171875h297.414062v37.5h-297.414062zm0 0"/></svg>
            </span>
            <span class="expand-btn" id="expand">
                <svg version="1.1" x="0px" y="0px" viewBox="0 0 384.97 384.97" style="enable-background:new 0 0 384.97 384.97;" xml:space="preserve"><g><g id="Fullscreen"><path d="M384.97,12.03c0-6.713-5.317-12.03-12.03-12.03H264.847c-6.833,0-11.922,5.39-11.934,12.223 c0,6.821,5.101,11.838,11.934,11.838h96.062l-0.193,96.519c0,6.833,5.197,12.03,12.03,12.03c6.833-0.012,12.03-5.197,12.03-12.03 l0.193-108.369c0-0.036-0.012-0.06-0.012-0.084C384.958,12.09,384.97,12.066,384.97,12.03z" /><path d="M120.496,0H12.403c-0.036,0-0.06,0.012-0.096,0.012C12.283,0.012,12.247,0,12.223,0C5.51,0,0.192,5.317,0.192,12.03                  L0,120.399c0,6.833,5.39,11.934,12.223,11.934c6.821,0,11.838-5.101,11.838-11.934l0.192-96.339h96.242                  c6.833,0,12.03-5.197,12.03-12.03C132.514,5.197,127.317,0,120.496,0z" />            <path d="M120.123,360.909H24.061v-96.242c0-6.833-5.197-12.03-12.03-12.03S0,257.833,0,264.667v108.092                  c0,0.036,0.012,0.06,0.012,0.084c0,0.036-0.012,0.06-0.012,0.096c0,6.713,5.317,12.03,12.03,12.03h108.092                  c6.833,0,11.922-5.39,11.934-12.223C132.057,365.926,126.956,360.909,120.123,360.909z" />            <path d="M372.747,252.913c-6.833,0-11.85,5.101-11.838,11.934v96.062h-96.242c-6.833,0-12.03,5.197-12.03,12.03                  s5.197,12.03,12.03,12.03h108.092c0.036,0,0.06-0.012,0.084-0.012c0.036-0.012,0.06,0.012,0.096,0.012 c6.713,0,12.03-5.317,12.03-12.03V264.847C384.97,258.014,379.58,252.913,372.747,252.913z" /></g></g></svg>
            </span>
        </div>
    </div>
</div>
<span class="exit-fullscreen hidden" id="_exit_full_screen">
    <svg fill="#fff" width="24" height="24" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;"><g>	<g><path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717 L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859 c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287 l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285 L284.286,256.002z"/></g></g></svg>
</span>

<div class="clipboard-share hide-zindex">
    <div class="inline-sharing-box">
        <h3>Share <b><?php echo $game->name; ?></b></h3>
        <div class="sharethis-inline-share-buttons"></div>
    </div>
</div>
<div class="close-sharing-box" onclick='closeBox()'></div>
<script>
    function scrollToDiv(element) {
        if ($(element).length) {
            $('html,body').animate({scrollTop: $(element).offset().top - 100}, 'slow');
        }
    }
    function closeBox() {
        $(".close-sharing-box").hide();
        $(".clipboard-share").addClass("hide-zindex");
    }

    function showSharingBox() {
        $(".close-sharing-box").show();
        $(".clipboard-share").removeClass("hide-zindex");
    }
</script>