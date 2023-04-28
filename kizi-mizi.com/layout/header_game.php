<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=61974c956dd1de0019015128&product=inline-share-buttons" async="async"></script>
<div class="header-game">
    <div class="box-header">
        <div class="game-full-rate">
            <?php //echo \helper\themes::get_layout('full_rate_mini', array('id' => $game->id));
            ?>
            <div id="append-rate"></div>
        </div>
        <div class="header-game-extend">

            <span class="share-btn" id="share-focus" onclick='showSharingBox()'>
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M512,253.001L295.204,36.204v144.388C132.168,180.592,0,312.76,0,475.796c59.893-109.171,178.724-165.462,295.204-151.033 v145.034L512,253.001z"></path>
                        </g>
                    </g>
                </svg>
            </span>
            <span class="comment-btn" id="comment-focus" onclick='scrollToDiv(".comment-company")'>
                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14,1 C15.1046,1 16,1.89543 16,3 L16,11 C16,12.1046 15.1046,13 14,13 L4.71094,13 L1.50039,14.8555 C0.833719,15.2408 0,14.7597 0,13.9897 L0,3 C0,1.89543 0.895431,1 2,1 L14,1 Z M14,3 L2,3 L2,12.2568 L4.17456,11 L14,11 L14,3 Z M5,6 C5.55228,6 6,6.44772 6,7 C6,7.55228 5.55228,8 5,8 C4.44772,8 4,7.55228 4,7 C4,6.44772 4.44772,6 5,6 Z M8,6 C8.55228,6 9,6.44772 9,7 C9,7.55228 8.55228,8 8,8 C7.44772,8 7,7.55228 7,7 C7,6.44772 7.44772,6 8,6 Z M11,6 C11.5523,6 12,6.44772 12,7 C12,7.55228 11.5523,8 11,8 C10.4477,8 10,7.55228 10,7 C10,6.44772 10.4477,6 11,6 Z" />
                </svg>
            </span>
            <span class="theatemode" onclick="theaterMode()">
                <svg width="8px" height="8px" viewBox="0 0 8 8" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0v4l1.5-1.5 1.5 1.5 1-1-1.5-1.5 1.5-1.5h-4zm5 4l-1 1 1.5 1.5-1.5 1.5h4v-4l-1.5 1.5-1.5-1.5z"></path>
                </svg>
            </span>
            <span class="expand-btn" id="expand">
                <svg version="1.1" id="svg2" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" sodipodi:docname="fullscreen.svg" inkscape:version="0.48.4 r9939" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1200px" height="1200px" viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve">
                    <path id="path9678" inkscape:connector-curvature="0" d="M0,0v413.818l144.141-145.386L475.708,600L143.555,932.153L0,789.844V1200 h413.818l-145.386-144.141L600,724.292l332.153,332.153L789.844,1200H1200V786.182l-144.141,145.386L724.292,600l332.153-332.153 L1200,410.156V0H786.182l145.386,144.141L600,475.708L267.847,143.555L410.156,0H0z"></path>
                </svg>
            </span>
        </div>
    </div>
</div>
<span class="exit-fullscreen hidden" id="_exit_full_screen">
    <svg fill="#fff" width="24" height="24" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;">
        <g>
            <g>
                <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717 L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859 c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287 l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285 L284.286,256.002z" />
            </g>
        </g>
    </svg>
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
            $('html,body').animate({
                scrollTop: $(element).offset().top - 100
            }, 'slow');
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