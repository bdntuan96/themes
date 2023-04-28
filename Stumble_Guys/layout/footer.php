
<?php $theme_url = '/' . DIR_THEME; ?>
<?php $base_url = \helper\options::options_by_key_type('base_url'); ?>

<script>
    url_game = "https://stumble-guys.net/stumble-guys";
    id_game = "1";
</script>
<script type="application/ld+json">
    [{
        "@context": "https:\/\/schema.org",
        "@type": "SoftwareApplication",
        "name": "Stumble Guys",
        "url": "https:\/\/stumble-guys.net\/",
        "author": {
            "@type": "Organization",
            "name": "Stumble Guys"
        },
        "description": "Stumble Guys is a multiplayer knockout game where you compete against other players and pass through escalating chaos to become the last survivor.\u00a0Get ready for a series of challenges and do whatever it takes to become the champion.",
        "applicationCategory": "GameApplication",
        "operatingSystem": "any",
        "aggregateRating": {
            "@type": "AggregateRating",
            "worstRating": 1,
            "bestRating": 5,
            "ratingValue": "4.2",
            "ratingCount": "22"
        },
        "image": "https:\/\/stumble-guys.net\/\/data\/image\/game\/stumble-guys.jpg",
        "offers": {
            "@type": "Offer",
            "category": "free",
            "price": 0,
            "priceCurrency": "USD"
        }
    }, {
        "@context": "https:\/\/schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Stumble Guys",
            "item": "https:\/\/stumble-guys.net\/"
        }]
    }]
</script>
<style>
    footer {
        padding: 25px 0;
        background-color: #19abe6;
        margin: 20px 0;
        max-width: 1680px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
    }

    .inner-row-footer {
        text-align: center;
    }

    .link {
        color: #fff;
        position: relative;
        font-weight: bold;
        display: inline-block;
        padding: 8px 16px;
        font-size: 16px;
    }

    .link:before {
        content: "";
        position: absolute;
        width: 5px;
        height: 5px;
        background-color: #0a0a0a;
        border-radius: 50%;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }
</style>
<footer>
    <div class="container">
        <div class="row">
            <div class="foot-row">
                <div class="inner-row-footer">
                    <a class="link" href="/about-us">About
                        Us</a>
                    <a class="link" href="/copyright-infringement-notice-procedure">Copyright</a>
                    <a class="link" href="/contact-us" title="Contact Us">Contact Us</a>
                    <a class="link" href="/privacy-policy">Privacy Policy</a>
                    <a class="link" href="/term-of-use">Term Of Use</a>
                </div>
                <p class="font-bold text-center" style="color:#4a4a4a;">Copyright - <?php echo $base_url; ?></p>
            </div>
        </div>
    </div>
</footer><a class="scroll" href="#top" id="back-to-top" title="Back to top">↑</a>

<?php echo \helper\themes::get_layout('fullscreen'); ?>

<!-- <script src="rs/js/jquery-3.4.1.min.js"></script> -->
<script src="<?php echo $theme_url; ?>rs/js/jquery.validate.min.js"></script>
<script src="<?php echo $theme_url; ?>rs/js/cookie.js"></script>
<script src="<?php echo $theme_url; ?>rs/js/footer.js"></script>

<script>
    //phân trang khi click pagination.php
    function paging(p) {
        if (!p) {
            p = 1;
        }
        let url = "/paging.ajax";
        $.ajax({
            //duong dan gui yeu cau
            url: url,
            //phuong thuc
            type: "POST", //"GET"
            //gui cai gi sang
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
            //ket qua tra ve
            success: function(response) {
                if (response) {
                    $("#ajax-append").html(response);
                }
            }
        })
    }
</script>

</body>

</html>