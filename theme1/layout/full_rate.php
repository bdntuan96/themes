<?php
$rate = (array) \helper\game::get_rate($id);

if ($custom != null) {
    echo '<link href="' . $custom . '" rel="stylesheet" />';
}
$theme_url = '/' . DIR_THEME;
?>
<script>
 var domain_url = '<?php echo \helper\options::options_by_key_type('base_url'); ?>';
</script>
<style> 
    #rating{
        color: #222; 
        padding: 15px ;
        background-color: #000000;
    }
	
	#rating div{
        padding: 0;
        margin: 0;
    }
	
	 #rating span{
        color: #fff;
    }

    #rating img{
        width: auto !important;
        height:auto !important;
    }
	
	.inner-rating{
		width: 100%;
		overflow: auto; 
	}

    .my_progress-bar span{
        font-family: monospace;
        font-size: 90%;
        color: #616161;
    }

    .full_rate{
        width: 50%;
        float:left
    }


    .text-center{
        text-align: center;
    }
    .rating_hover{
        position:relative;
    }
    .rating{
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .full_rate_star{
        width: 10%;
        float:left;
        position: relative;
    }

    .full_rate_my_progress{
        width: 90%;
        float:left;
        padding-top:5px;
    }

    .full_rate_my_progress span{
        color: #fff;
    }

    .full_rate_row {
        clear: both;
    }

    .full_rate_star span.gly-phicon {
		position: absolute;
		left: 6px;
		top: 50%;
		transform: translateY(-50%);
		font-size: 14px;
		font-weight: 600;
    }

    .my_progress-bar{

        height: 20px;
        border-radius: 5px;
    }

    .my_progress{
        border: 1px solid #efefef;
        border-radius: 5px;
    }

    @media only screen and (max-width: 600px) {
        .full_rate {
            width: 100%;
        }
        .rating-desc{
            padding-top: 30px !important;
        }

        .full_rate_star{
            width: 20%;
            float:left;
            position: relative;
        }
        .full_rate_my_progress{
            width: 80%;
            float:left;
            padding-top:5px;
        }
    }


</style>
<div id="rating" >       
	<div class="inner-rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
		<div id="full_rate_1" class="full_rate">
			<div class="rate-info text-center"   >
				<span id="rate-avg" rel="v:rating"> 
					<span  >
						<span itemprop="ratingValue" class="rating-num <?php echo $rate['class'] ?>"   id="averagerate"><?php echo $rate['rate_average'] ?></span><span class="rating-num <?php echo $rate['class'] ?>">/</span>
						<span itemprop="bestRating" class="rating-num <?php echo $rate['class'] ?>"  >5</span>
					</span>
				</span>
				<span >
					<span itemprop="reviewAspect" class = "rate-title <?php echo $rate['class'] ?>" title = "<?php echo $rate['name']; ?>"><?php echo $rate['name']; ?></span>
				</span>
				<div class="rating_hover">
					<div class="rating" id = "default-demo" data-id = "<?php echo $id ?>" style = "cursor: pointer;margin: 10px;" data-score = "<?php echo $rate['rate_average'] ?>" data-readonly = "" >
					</div>
				</div>
				<span   id="countrate"><?php echo $rate['rate_count'] ?></span><i class="gly-phicon gly-phicon-user"></i>  

			</div>
		</div>
		<div id="full_rate_2" class="full_rate">
			<div class=" rating-desc">
				<div class="full_rate_row">
					<div class="full_rate_star">
						<img src="<?php echo $theme_url ?>rs/plugins/raty/images/star-on-big.png">
						<span class="gly-phicon gly-phicon-star">5</span>
					</div>
					<div class="full_rate_my_progress">
						<div class="my_progress my_progress-striped">
							<div id="gorgeous-bar" class="my_progress-bar my_progress-bar-success" role="my_progressbar" aria-valuenow="20"
								 aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate['gorgeous']; ?>%">
								<span id="gorgeous-bar-value" class="sr-only"><?php echo $rate['gorgeous'] . '%'; ?></span>
							</div>
						</div>
					</div>

				</div>
				<!-- end 5 -->
				<div class="full_rate_row">
					<div class="full_rate_star">
						<img src="<?php echo $theme_url ?>rs/plugins/raty/images/star-on-big.png">
						<span class="gly-phicon gly-phicon-star">4</span>
					</div>
					<div class="full_rate_my_progress">
						<div class="my_progress">
							<div id="good-bar" class="my_progress-bar my_progress-bar-good" role="my_progressbar" aria-valuenow="20"
								 aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate['good']; ?>%">
								<span id="good-bar-value" class="sr-only"><?php echo $rate['good'] . '%'; ?></span>
							</div>
						</div>
					</div>
				</div>
				<!-- end 4 -->
				<div class="full_rate_row">
					<div class="full_rate_star">
						<img src="<?php echo $theme_url ?>/rs/plugins/raty/images/star-on-big.png">
						<span class="gly-phicon gly-phicon-star">3</span>
					</div>
					<div class="full_rate_my_progress">
						<div class="my_progress">
							<div id="regular-bar" class="my_progress-bar my_progress-bar-info" role="my_progressbar" aria-valuenow="20"
								 aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate['regular']; ?>%">
								<span id="regular-bar-value" class="sr-only"><?php echo $rate['regular'] . '%'; ?> </span>
							</div>
						</div>
					</div>
				</div>
				<!-- end 3 -->
				<div class="full_rate_row">
					<div class="full_rate_star">
						<img src="<?php echo $theme_url ?>rs/plugins/raty/images/star-on-big.png">
						<span class="gly-phicon gly-phicon-star">2</span>
					</div>
					<div class="full_rate_my_progress">
						<div class="my_progress">
							<div id="poor-bar" class="my_progress-bar my_progress-bar-warning" role="my_progressbar" aria-valuenow="20"
								 aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate['poor']; ?>%">
								<span id="poor-bar-value" class="sr-only"><?php
									echo $rate['poor'] . '%';
									?></span>
							</div>
						</div>
					</div>
				</div>
				<!-- end 2 -->
				<div class="full_rate_row">
					<div class="full_rate_star">
						<img src="<?php echo $theme_url ?>rs/plugins/raty/images/star-on-big.png">
						<span itemprop="worstRating"  class="gly-phicon gly-phicon-star">1</span>
					</div>
					<div class="full_rate_my_progress">
						<div class="my_progress">
							<div id="bad-bar" class="my_progress-bar my_progress-bar-danger" role="my_progressbar" aria-valuenow="80"
								 aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate['bad']; ?>%">
								<span id="bad-bar-value" class="sr-only"><?php echo $rate['bad'] . '%'; ?></span>
							</div>
						</div>
					</div>
				</div>
				<!-- end 1 -->
			</div>
			<!-- end row -->
		</div> 
	</div>
</div>





<script type="text/javascript" src="<?php echo $theme_url; ?>rs/plugins/raty/jquery.raty.js"></script>
<script>
    var readdddonly;
    var style = "<?php echo $style == '' ? '-big' : '-' . $style ?>";
    readdddonly = $('#default-demo').attr('data-readonly');
    $('#default-demo').raty({
        readOnly: readdddonly,
        cancelOff: '<?php echo $theme_url ?>rs/plugins/raty/images/cancel-off.png',
        cancelOn: '<?php echo $theme_url ?>rs/plugins/raty/images/cancel-on.png',
        starHalf: '<?php echo $theme_url ?>rs/plugins/raty/images/star-half' + style + '.png',
        starOff: '<?php echo $theme_url ?>rs/plugins/raty/images/star-off' + style + '.png',
        starOn: '<?php echo $theme_url ?>rs/plugins/raty/images/star-on' + style + '.png',
        half: true,
        number: 5,
        numberMax: 5,
        score: function () {
            return $(this).attr('data-score');
        },
        click: function (score, evt) {
            var game_id = $(this).attr('data-id');
            var rate = $(this).attr('data-score');
            var url = domain_url + '/rate-game.ajax';
            var data = {'game_id': game_id, 'score': score};
            $.ajax({
                type: "GET",
                url: url,
                data: data,
                cache: false,
                success: function (html) {

                    var data = $.parseJSON(html);

                    $('#countrate').text(data.rate_count);
                    $('#averagerate').text(data.rate_average);

                    $('#gorgeous-bar').css("width", data.gorgeous + "%");
                    $('#gorgeous-bar-value').html(data.gorgeous + "%");
                    $('#good-bar').css("width", data.good + "%");
                    $('#good-bar-value').html(data.good + "%");
                    $('#regular-bar').css("width", data.regular + "%");
                    $('#regular-bar-value').html(data.regular + "%");
                    $('#poor-bar').css("width", data.poor + "%");
                    $('#poor-bar-value').html(data.poor + "%");
                    $('#bad-bar').css("width", data.bad + "%");
                    $('#bad-bar-value').html(data.bad + "%");

                    $(".rating-num").addClass(data.class);


                    $(".rate-title").addClass(data.class);
                    $(".rate-title").html(data.name);

                    $('#default-demo').raty({
                        readOnly: true,
                        cancelOff: '<?php echo $theme_url ?>rs/plugins/raty/images/cancel-off.png',
                        cancelOn: '<?php echo $theme_url ?>rs/plugins/raty/images/cancel-on.png',
                        starHalf: '<?php echo $theme_url ?>rs/plugins/raty/images/star-half' + style + '.png',
                        starOff: '<?php echo $theme_url ?>rs/plugins/raty/images/star-off' + style + '.png',
                        starOn: '<?php echo $theme_url ?>rs/plugins/raty/images/star-on' + style + '.png',
                        half: true,
                        number: 5,
                        numberMax: 5,
                        score: score
                    });
                    $("#default-demo").css("cursor: pointer;");
                },
                error: function () {
                    $('#default-demo').raty({
                        readOnly: true,
                        cancelOff: '<?php echo $theme_url ?>rs/plugins/raty/images/cancel-off.png',
                        cancelOn: '<?php echo $theme_url ?>rs/plugins/raty/images/cancel-on.png',
                        starHalf: '<?php echo $theme_url ?>rs/plugins/raty/images/star-half' + style + '.png',
                        starOff: '<?php echo $theme_url ?>rs/plugins/raty/images/star-off' + style + '.png',
                        starOn: '<?php echo $theme_url ?>rs/plugins/raty/images/star-on' + style + '.png',
                        half: true,
                        number: 5,
                        numberMax: 5,
                        score: rate,
                    });
                }
            });
        }
    });
</script>  
<style type="text/css">
    .gorgeous{color:#449d44}
    .my_progress-bar-success{
        background-color:#449d44
    }
    .good{color:#449d44}
    .my_progress-bar-good{
        background-color:#00BCD4
    }
    .my_progress-bar-info{
        background-color:#B2EBF2
    }
    .regular{color:#31b0d5}
    .my_progress-bar-warning{
        background-color:#ec971f
    }
    .poor{color:#ec971f}
    .bad{color:#c9302c}
    .my_progress-bar-danger{
        background-color:#c9302c
    }
    .rate-title{display: block;font-size: 25px;text-align: center; line-height: 25px;}
    .gly-phicon { margin-right:5px;}
    .rating .gly-phicon {font-size: 22px;}
    .rating-num { margin-top:0px;font-size: 40px; line-height: 40px;}
    .my_progress { margin-bottom: 5px;}
    .my_progress-bar { text-align: left; }
    .rating-desc .col-md-3 {padding-right: 0px;}
    .sr-only { margin-left: 5px;overflow: visible;clip: auto; }
    i{margin-left: 5px;margin-right: 5px; }

</style>