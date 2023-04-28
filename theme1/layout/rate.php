<?php
/* RATE */
$rate_data = \helper\game::get_rate($game_id);
$rate = array();
$rate['rate_count'] = 0;
$rate['rate_score'] = 0;
if ($rate_data[0] != null) {
    $rate['rate_count'] = $rate_data[0]->rate_count;
    $rate['rate_score'] = $rate_data[0]->rate_score;
}
$rate['rate_average'] = round($rate['rate_score'] / $rate['rate_count'], 2);
/* END RATE */
?>
<div>
    <span class = "rating" id = "default-demo" data-id = "<?php echo $game_id ?>" style = "cursor: pointer; width: 100px;" data-score = "<?php echo $rate['rate_average'] ?>" data-readonly = "" ></span>

    <div class="rating-result" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
        <span>
            <span   class = "rate-title" title = "<?php echo $name; ?>"><?php echo $name; ?></span>
        </span>
        <span id="countrate"><?php echo $rate['rate_count'] ?> </span> votes :  
        <span rel="v:rating"> 
            <span >
                <span itemprop="ratingValue" id="averagerate"> <?php echo $rate['rate_average'] ?></span> / 
                <span itemprop="bestRating">5</span> 
				<span style="display:none" itemprop="worstRating">1</span>
            </span> 
        </span>  
    </div> 
</div>
<div class="sharethis">
    <div class="PlusShareButton"> 
        <g:plusone size="tall" href="<?php echo load_url()->current_url(); ?>"></g:plusone>
    </div>
    <div class="FacebookShareButton">
        <div class="ButtonWrap"> 
            <fb:like href="<?php echo \helper\options::options_by_key_type('facebook_fanpage', 'company'); ?>" layout="box_count" font="tahoma"></fb:like>
        </div>
    </div>
    <div class="YoutubeSubcribe">
        <div class="g-ytsubscribe" data-channelid="UC-kEBzq0OY1WHrw5Y4oKVFA" data-layout="default" data-count="default"></div> 
    </div> 
</div> 

<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=665291260274920&ev=PageView&noscript=1"/></noscript>
