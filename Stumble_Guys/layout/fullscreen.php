<script>
    $("#expand").on('click', function() {
        $("#iframehtml5").addClass("force_full_screen");
        $("#_exit_full_screen").removeClass('hidden');
        requestFullScreen(document.body);
    });

    $("#_exit_full_screen").on('click', cancelFullScreen);


    function requestFullScreen(element) {
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
</script>