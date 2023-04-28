<!-- $keywords; + $title in product.php -->
<div class="game_item">
    <div class="container">
        <div class="row">
            <style>
                .not_found {
                    margin-top: 20px;
                    margin-bottom: 20px;
                    width: 100%;
                    font-size: 16px;
                    box-sizing: border-box;
                    padding: 16px;
                    border: 2px solid #fff;
                    border-radius: 5px;
                    color: #4a4a4a;
                }

                .search_found li {
                    list-style: disc !important;
                    list-style-position: inside !important;
                }

                .suggestion {
                    margin: 10px 0;
                }

                .not_found li,
                .not_found p,
                .not_found span {
                    font-size: 16px;
                }
            </style>
            <div class="w-full bz not_found">
                <div class="overwrite search_found">
                    <p style="margin-bottom:0"> Your search -<span class="font-bold"> <?php echo $keywords; ?> </span> - did not match any documents.</p>
                    <p class="suggestion"> Suggestions:</p>
                    <ul style="padding-left: 15px">
                        <li>Make sure all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</li>
                        <li>Try fewer keywords.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="title-and-description-site">
                <h2 class="home-title"><?php echo $title; ?></h2>
                <div class="description__site">Search results with keywords: <b><?php echo $keywords; ?></b> </div>
            </div>
        </div>
    </div>
</div>