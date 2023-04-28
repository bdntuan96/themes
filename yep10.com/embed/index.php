<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$site_name = \helper\options::options_by_key_type('site_name');
$theme_url = '/' . DIR_THEME;
$game = \helper\game::find_by_slug($slug);

?>
<?php if ($game->type == 'UNITY') : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title><?php echo $game->name; ?> Game Frame</title>
        <meta charset="utf-8" />
        <meta name="robots" content="noindex, nofollow, noodp, noydir" />
        <link rel="canonical" href="<?php echo $domain_url . '/' . $slug; ?>" />
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="requiresActiveX=true,IE=Edge,chrome=1" />
        <meta http-equiv="Content-Language" content="en-US" />
        <link rel="stylesheet" href="<?php echo $theme_url; ?>/rs/plugins/unity/unity_load.min.css" />
        <script src="<?php echo $theme_url; ?>/rs/plugins/unity/unity_load.min.js"></script>
        <style>
            .preloader-bg {
                background: url(<?php echo \helper\image::get_thumbnail($game->image, 200, 200, 'm'); ?>);
                background-size: cover;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                -webkit-filter: blur(0.8em);
                filter: blur(0.8em);
                opacity: .25;
                z-index: -1;
            }

            .hidden {
                display: none
            }
        </style>
    </head>

    <body>
        <div id="gameContainer">
        </div>
        <div id="preloader" class="preloader">
            <div class="preloader-bg"></div>
            <div class="author hidden">
                <span>A Game by</span>
                <span class="author-name"><?php echo $site_name; ?></span>
            </div>
            <div class="preloader-logo">
                <div class="smallsite-logo"></div>
            </div>
            <div class="preloader-gamename">
                <div><?php echo $game->name; ?></div>
                <div>is loading...</div>
            </div>
            <div class="preloader-thumbnail">
                <img src="<?php echo \helper\image::get_thumbnail($game->image, 200, 200, 'm'); ?>" title="<?php echo $game->name; ?>" alt="<?php echo $game->name; ?>" />
            </div>
            <div id="myProgress">
                <div id="ProgressText"></div>
                <div id="myBar"></div>
            </div>
        </div>


        <script src="<?php echo str_replace(end(explode("/", $game->source_file)), "", $game->source_file); ?>unityloader.js"></script>>
        <script>
            var gameInstance = UnityLoader.instantiate("gameContainer", "<?php echo $game->source_file; ?>", {
                onProgress: UnityProgress56,
                Module: {
                    onRuntimeInitialized: function() {
                        UnityProgress56(gameInstance, "complete")
                    }
                }
            });
        </script>
        <img src="/count.ajax?id=<?php echo $game->id ?>" style="display:none" />
    </body>

    </html>
<?php elseif ($game->type == 'RETRO') : ?>
    <?php $retro_game = json_decode($game->metadata); ?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <title>Play <?php echo $game->name; ?> Game Online !</title>
        <meta charset="utf-8" />
        <meta name="robots" content="noindex, nofollow, noodp, noydir" />
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="requiresActiveX=true,IE=Edge,chrome=1" />
        <meta http-equiv="Content-Language" content="en-US" />
        <script src="<?php echo $theme_url ?>rs/js/jquery-3.4.1.min.js"></script>
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            body {
                position: relative;
                width: 100vh;
                height: 100vh;
            }

            .frame-game {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>
    </head>

    <body>
        <div class="frame-game">
            <?php if ($game->type == 'RETRO') : ?>
                <!-- Retro game container -->
                <div id="retroGame"></div>
                <!-- Retro game thumb image -->
                <div id="retroGameThumbImg">
                    <img width="480" height="320" src="<?php echo \helper\image::get_thumbnail($game->image, 480, 320, "m") ?>" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>">
                </div>
                <script>
                    EJS_player = '#retroGame';
                    EJS_biosUrl = '<?php echo $retro_game->retro_bios_file; ?>';
                    EJS_gameUrl = '<?php echo $retro_game->retro_rom_file; ?>';
                    EJS_core = '<?php echo $retro_game->retro_core; ?>';
                    // Settings only for Super Nintendo games
                    <?php if ($retro_game->retro_core == 'snes') : ?>
                        EJS_mouse = false;
                        EJS_multitap = false;
                    <?php endif; ?>
                    EJS_pathtodata = '<?php echo $theme_url ?>rs/plugins/emulatorjs/'; //path to all of the wasm and js files. MUST all be in the same directory!!
                </script>
                <script src="<?php echo $theme_url ?>rs/plugins/emulatorjs/loader.js"></script>
                <script>
                    // Hide thumb image when user started playing game.
                    EJS_onGameStart = function() {
                        $('#retroGameThumbImg').hide();
                    };
                </script>
            <?php else : ?>
                <?php $embed_source = $base_url . '/' . $game->slug . '.embed'; ?>
                <iframe id="iframehtml5" class="d-block" width="100%" height="100%" src="/<?= $game->slug ?>.embed" frameborder="0" border="0" scrolling="no" class="iframe-default" allowfullscreen></iframe>
            <?php endif; ?>
        </div>
        <img src="/count.ajax?id=<?php echo $game->id ?>" style="display:none" />
    </body>

    </html>
<?php else : ?>
    <html lang="en">

    <head>
        <title>Play <?php echo $game->name; ?> Game Online !</title>
        <meta charset="utf-8" />
        <meta name="robots" content="noindex, nofollow, noodp, noydir" />
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="requiresActiveX=true,IE=Edge,chrome=1" />
        <meta http-equiv="Content-Language" content="en-US" />
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Helvetica Neue", "Calibri Light", Roboto, sans-serif;
            }

            #missing-flash {
                display: none;
                text-align: center
            }

            .fl-wrap {
                margin: 0 auto;
                background-color: #FFF;
                padding: 20px;
                position: absolute;
                height: 100%;
                width: 100%;
                z-index: 9999;
            }

            .fl-content {
                color: #fff
            }

            .fl-game {
                display: flex;
                height: 95%;
                justify-content: center;
                align-items: center;
            }

            .fl-game a {
                position: absolute;
                z-index: 9999;
                text-decoration: none
            }

            .fl-game span {
                color: #FFF;
                background-color: #3281ff;
                padding: 10px 15px;
                border-radius: 5px;
                cursor: pointer;
                font-weight: bold;
                text-transform: uppercase;
            }

            .fl-game span:hover {
                background-color: #009cff
            }

            .missing-flash-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                -webkit-filter: blur(0.8em);
                filter: blur(0.8em);
                opacity: 0.25;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html,
            body {
                background-color: rgba(0, 0, 0, 0.4);
            }

            .a0 {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                z-index: 1;
            }

            .a1 {
                display: table;
                width: 100%;
                height: 100%;
                text-align: center;
            }

            .a2 {
                display: table-cell;
                vertical-align: middle;
            }

            .a3 {
                height: 30px;
                position: fixed;
                bottom: 0;
                left: 0;
                transition: all .3s;
            }

            .o1 {
                background-color: #002b50;
                width: 100%;
                z-index: 2;
            }

            .o2 {
                background-color: #009cff;
                width: 0%;
                z-index: 3;
            }

            .enable_flash {
                color: #FFF;
                background-color: #3281ff;
                padding: 10px 15px;
                border-radius: 5px;
                cursor: pointer;
                font-weight: bold;
                text-transform: uppercase;
                position: absolute;
                top: 200px;
                left: 50%;
                transform: translateX(-50%);
                color: #fff900 !important;
            }

            .bt {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                bottom: -50px;
            }

            .adobetext {
                top: 250px;
                width: 100%;
            }
        </style>

    </head>

    <body id="run_IFRAME_HTML">
        <?php if ($game) : ?>
            <?php if ($game->type == 'IFRAME_HTML') : ?>
                <?php
                $domain_url = \helper\options::options_by_key_type('base_url');
                $domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
                if ($game->source_html != '') {
                    if (strpos($game->source_html, 'gamedistribution')) {
                        if (strpos($game->source_html, 'gd_sdk_referrer_url')) {
                            $array_source = explode("gd_sdk_referrer_url", "$game->source_html");
                            if (count($array_source) > 1) {
                                $array_source[1] = 'gd_sdk_referrer_url=' . $domain_url . '/' . $game->slug;
                                $game->source_html = $array_source[0] . $array_source[1];
                            }
                        } else {

                            $game->source_html = $game->source_html . '?gd_sdk_referrer_url=' . $domain_url . '/' . $game->slug;
                        }
                    }
                }
                $source_html = $game->source_html;
                ?>
                <?php if (strpos($game->source_html, 'y8') !== false) : ?>
                    <div class="text-center" style="padding:10px">
                        <center>

                            <br /><br />
                            <a href="<?php echo $source_html; ?>" target="_blank">
                                <h3>CLICK TO PLAY</h3><br />
                                <img src="<?php echo \helper\image::get_thumbnail($game->image, 200, 200, 'm'); ?>" />
                            </a>
                        </center>
                    </div>
                <?php else : ?>
                    <style>
                        .before-playing {
                            position: fixed;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background-color: #16181e;
                        }

                        .blur-background {
                            background-image: url('<?php echo $game->image; ?>');
                            background-repeat: no-repeat;
                            position: absolute;
                            background-size: cover;
                            background-position: 50%;
                            filter: blur(12px);
                            opacity: .7;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            width: 100%;
                            height: 100%;
                            z-index: -1;
                        }

                        .preload-before-playing {
                            padding: 20px 30px;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            flex-wrap: wrap;
                            width: 100%;
                            height: 100%;
                            box-sizing: border-box;
                            max-width: 800px;
                            margin: 0 auto;
                        }

                        .image-thumbnail-playing {
                            width: 140px;
                            height: 140px;
                            cursor: pointer;
                        }

                        .image-thumbnail-playing img {
                            border-radius: 10px;
                            box-shadow: 0 0 5px 2px rgb(0 0 0 / 20%);
                        }

                        .title-game-playing {
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                        }

                        .title-game-playing span {
                            border-radius: 20px;
                            background-color: #000;
                            text-transform: uppercase;
                            padding: 8px 16px;
                            margin-top: 16px;
                            cursor: pointer;
                            color: #ffffff;
                            animation: crunch 500ms infinite ease;
                            box-shadow: 0 2px 4px rgb(0 0 0 / 30%);
                            background: #638331;
                            color: #fff;
                            border: 2px solid #fff;
                            border-radius: 10px;
                            font-size: 24px;
                            font-weight: 600;
                            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                        }

                        @keyframes crunch {
                            0% {
                                transform: rotate(-2deg) scale(0.98);
                            }

                            50% {
                                transform: rotate(2deg) scale(1.02);
                            }

                            100% {
                                transform: rotate(-2deg) scale(1);
                                ;
                            }
                        }
                    </style>
                    <div class="before-playing" id="preloading-game">
                        <div class="blur-background"></div>
                        <div class="preload-before-playing">
                            <div class="image-thumbnail-playing" onclick="start_game_frame()">
                                <img width="140" height="140" src="<?php echo $game->image; ?>" />
                            </div>
                            <div class="title-game-playing">
                                <!-- <div class="game-title-playing"><?php echo $game->name; ?></div> -->
                                <span onclick="start_game_frame()">PLAY NOW</span>
                            </div>
                        </div>
                    </div>
                    <script>
                        async function start_game_frame() {
                            //let frame_game = '<iframe id="iframehtml5" width="100%" height="100%" src="<?php echo $source_html ?>" frameborder="0" border="0" scrolling="no" class="iframe-default" allowfullscreen></iframe>';
                            let frame_game = document.createElement('iframe');
                            frame_game.setAttribute('id', 'iframehtml5');
                            frame_game.setAttribute('width', '100%');
                            frame_game.setAttribute('height', '100%');
                            frame_game.setAttribute('frameborder', '0');
                            frame_game.setAttribute('border', '0');
                            frame_game.setAttribute('scrolling', 'no');
                            frame_game.setAttribute('class', 'iframe-default');
                            frame_game.setAttribute('allowfullscreen', 'true');
                            frame_game.setAttribute('src', '<?php echo $source_html ?>');
                            if (document.getElementById("preloading-game")) {
                                await document.getElementById("preloading-game").remove();
                            }
                            document.body.append(frame_game);
                        }
                    </script>

                <?php endif; ?>
            <?php else : ?>
                <?php
                $source = $game->source_file;
                if ($game->type == 'EMBED_SWF') {
                    $source = $game->source_html;
                }
                ?>
                <?php if ($game->type == 'SCRATCH') : ?>

                    <script type="text/javascript" src="<?php echo $theme_url ?>/rs/plugins/scratch/src/swfobject.js"></script>
                    <script type="text/javascript">
                        var flashvars = {
                            project: "<?php echo $game->source_file ?>",
                            autostart: "true"
                        };
                        var params = {
                            bgcolor: "#FFFFFF",
                            allowScriptAccess: "always",
                            allowFullScreen: "true",
                            wmode: "direct",
                            menu: "false"
                        };
                        var attributes = {};
                        swfobject.embedSWF("<?php echo $theme_url ?>rs/plugins/scratch/src/swfobject.js", "flashContent", "100%", "100%", "10.2.0", "src/expressInstall.swf", flashvars, params, attributes);
                    </script>
                    <div id="ax" style="display: none">
                        <object id="GameEmbedSWF" type="application/x-shockwave-flash" data="<?php echo $theme_url ?>/rs/plugins/scratch/src/scratch.swf" width="100%" height="100%" id="flashContent" style="visibility: visible;">
                            <param name="bgcolor" value="#FFFFFF">
                            <param name="allowScriptAccess" value="always">
                            <param name="allowFullScreen" value="true">
                            <param name="wmode" value="direct">
                            <param name="menu" value="false">
                            <param name="flashvars" value="project=<?php echo $game->source_file ?>&autostart=false">
                        </object>
                    </div>
                    <div id="ay" style="display: none">
                        <div class="a0">
                            <div class="a1">
                                <div class="a2">
                                    <img src="<?php echo \helper\image::get_thumbnail($game->image, 200, 200, 'm'); ?>" style="max-width: 60%">
                                    <h1 style="color: #fff">Game loading...</h1>
                                    <h2 style="color: #fff">0%</h2>
                                </div>
                            </div>
                        </div>
                        <div class="a3 o1"></div>
                        <div class="a3 o2"></div>
                    </div>
                <?php else : ?>
                    <div id="ax" style="display: none">
                        <object id="GameEmbedSWF" width="100%" height="100%" data="<?php echo $source; ?>" type="application/x-shockwave-flash">
                            <param name="base" value="">
                            <param name="wmode" value="direct">
                            <param name="movie" value="<?php echo $game->source_file; ?>">
                            <param name="menu" value="false">
                            <param name="allowNetworking" value="internal">
                            <param name="allowScriptAccess" value="never">
                            <embed src="<?php echo $source; ?>" menu="false" allownetworking="internal" allowscriptaccess="never" width="100%" height="100%" type="application/x-shockwave-flash">
                        </object>
                    </div>
                    <div id="ay" style="display: none">
                        <div class="a0">
                            <div class="a1">
                                <div class="a2">
                                    <img src="<?php echo \helper\image::get_thumbnail($game->image, 200, 200, 'm'); ?>" style="max-width: 60%">
                                    <h1 style="color: #fff">Game loading...</h1>
                                    <h2 style="color: #fff">0%</h2>
                                </div>
                            </div>
                        </div>
                        <div class="a3 o1"></div>
                        <div class="a3 o2"></div>
                    </div>
                <?php endif; ?>

                <script>
                    var PRELOAD = (function(doc) {
                        var TIMER, COUNTER, TOTAL_STEP, AMOUNT;
                        COUNTER = 0;
                        AMOUNT = 0;
                        TOTAL_STEP = 0;
                        var config = {
                            time: 2,
                            stepPerSecond: 20,
                            bgCorver: "#002b50",
                            bgMain: "#009cff",
                            done: function() {
                                //console.log("Preload completed.")
                            }
                        };

                        function findOne(str) {
                            return doc.querySelector(str);
                        }

                        function setBackgroundProcess() {
                            var cover, main;
                            cover = findOne(".o1");
                            main = findOne(".o2");
                            if (cover)
                                cover.style.backgroundColor = config.bgCorver;
                            if (main)
                                main.style.backgroundColor = config.bgMain;
                        }

                        function updatePreload(percent) {
                            var main, h1;
                            main = findOne(".o2");
                            h1 = findOne("h2");
                            if (main) {
                                main.style.width = percent + "%";
                                h1.innerHTML = parseInt(percent) + "%";
                            }
                        }

                        function init(option) {
                            config = Object.assign(config, option);
                            setBackgroundProcess();
                            TOTAL_STEP = config.time * config.stepPerSecond;
                            AMOUNT = 100 / TOTAL_STEP;
                        }

                        function loop() {
                            if (++COUNTER > TOTAL_STEP) {
                                clearTimeout(TIMER);
                                config.done();
                                return;
                            }
                            updatePreload(COUNTER * AMOUNT);
                            TIMER = setTimeout(loop, 1e3 / config.stepPerSecond);
                        }

                        return {
                            init: function(option) {
                                init(option);
                            },
                            run: function() {
                                loop();
                            }
                        };
                    })(document);
                </script>
                <div id="missing-flash"></div>
                <script type="text/javascript">
                    function startGame() {
                        var isAllowSWF = false;
                        if (isAllowSWF)
                            document.querySelector('#GameEmbedSWF').startGame();
                    }

                    function preload_complete() {
                        setTimeout(startGame, 1e3);
                    }
                </script>
                <script>
                    var MissingFlashBroswer = function() {
                        var dataRenderFlashObjectMissing, str = "";
                        dataRenderFlashObjectMissing = {
                            wrapBefore: '<div class="fl-wrap">',
                            wrapAfter: '<div>',
                            imgGame: '<div class="fl-content fl-game">\n\  <img  width="238" height="140" class="missing-flash-bg" src="<?php echo \helper\image::get_thumbnail($game->image, 200, 200, "m"); ?>"/>\n\<a rel="nofollow" class="enable_flash" href="https://howtoenableflash.com/" title="View Details" target="_blank" >How To Enable Flash In Chrome</a> <a href="https://get.adobe.com/flashplayer/" class="adobetext" target="_blank">\n\ <p><img style="    max-width: 100%;" width="auto" height="auto" src="<?php echo "/" . DIR_THEME . "/rs/imgs/active-flash-2.png"; ?>" alt="<?php echo $game->name; ?>"/></p><span class="bt">PLAY NOW » </span></a></div>',
                        };
                        for (var key in dataRenderFlashObjectMissing)
                            str += dataRenderFlashObjectMissing[key];
                        document.getElementById("missing-flash").innerHTML = str;
                        document.getElementById("missing-flash").style.display = "block";
                    };
                </script>
                <script src="<?php echo $theme_url ?>/rs/js/flash_detect.min.js" type="text/javascript"></script>
                <script>
                    window.onload = function() {
                        if (FlashDetect.installed === false) {
                            document.getElementById("GameEmbedSWF").style.display = 'none';
                            MissingFlashBroswer();
                        } else {
                            document.getElementById("missing-flash").remove();
                            document.getElementById("ay").style.display = "block";
                            PRELOAD.init({
                                time: 2,
                                stepPerSecond: 20,
                                done: function() {
                                    var ax, ay;
                                    ax = document.querySelector("#ax");
                                    ay = document.querySelector("#ay");
                                    ay.parentNode.removeChild(ay);
                                    ax.style.display = "block";
                                }
                            });
                            PRELOAD.run();
                        }

                        function open_function() {

                        }
                    }
                </script>
            <?php endif; ?>
        <?php endif; ?>
        <!-- <img src="/count.ajax?id=<?php echo $game->id ?>" style="display:none" /> -->
    </body>

    </html>
<?php endif; ?>