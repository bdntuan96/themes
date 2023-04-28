<style>
    .my_fade {
        animation-name: fade;
        animation-duration: 2s;
    }

    @keyframes fade {
        from {
            opacity: 1;
        }
        to {
            opacity: 1;
        }
    }
    img.lozad{
        width: 100%;
        min-height: auto;
        background-color: #efefef !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        lozad('.lozad', {
            load: function (el) {
                el.src = el.dataset.src;
                el.onload = function () {
                    el.classList.add('my_fade');
                }
            }
        }).observe();
    });
</script>