<?php
$url = ($url != null) ? $url : load_url()->current_url();
$domain_url = \helper\options::options_by_key_type('base_url');
$theme_url = '/' . get_config('root_theme') . "/" . \helper\options::options_by_key_type('index_theme');
$keywords = '';
$parent_id = 0;
$related_id = '';
$page = ($_GET['page'] != null && (int) $_GET['page'] > 0) ? $_GET['page'] : 1;
$limit = ($_GET['limit'] != null && (int) $_GET['limit'] > 0) ? $_GET['limit'] : 5;
$sort = ($_GET['sort'] != null) ? $_GET['sort'] : 'newest';
$comment_data = \helper\comment::paging($url, $related_id, $parent_id, $page, $limit, $order_by, $order_type, $keywords);
$comment_pagelink = \helper\comment::paginglink($url, $related_id, $parent_id, $keywords, $page, $limit);
$count_comment = \helper\comment::count($url, $related_id, $parent_id, $keywords);
$google_captcha_api = (\helper\options::options_by_key_type('google_captcha')) ? \helper\options::options_by_key_type('google_captcha') : "6Le_z6IZAAAAAFpVi9_AGboY38LdDjp4F1UoS7dn";
?>
<script src="/<?php echo DIR_THEME ?>rs/js/cookie.js" ></script>
<script src="/<?php echo DIR_THEME ?>rs/js/jquery.validate.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="comment-company">
    <div id="comments_area">
        <div class="comment_loading"></div>
        <?php if ($count_comment != null && $count_comment > 0): ?>
            <label class="pull-left"><span id="comment_count"><?php echo $count_comment ?></span> comments</label>
            <label class="pull-right"> Sort by 
                <select id="sort_by" class="input-sm ">
                    <option value="newest">Newest</option>
                    <option value="oldest">Oldest</option>
                    <option value="popular">Popular</option>
                </select>    
            </label>
        <?php endif; ?>
        <div id="list_comment">

        </div>
        <div class="comment-load-more"></div>
        <div class="make-comment">
            <form id="comment_form" class="form-group"> 
                <div class="col-md-12 comment-notes">
                    <span id="email-notes">Your email address will not be published.</span> 
                    Required fields are marked <span class="required">*</span>
                </div>
                <div class="col-md-12" id="comment_errors"></div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Name <span class="required">*</span></label> 
                            <input id="comment_author" name="comment_author" class="form-control" type="text" value="" size="30" maxlength="245">
                        </div>
                        <div class="col-md-4">
                            <label>Email <span class="required">*</span></label> 
                            <input id="comment_email" name="comment_email" type="input" value="" size="30" class="form-control" maxlength="100">
                        </div>
                        <div class="col-md-4">
                            <label>Website</label> 
                            <input id="comment_website" type="comment_website" name="website" type="input" value="" size="200" class="form-control" maxlength="200">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label>Content <span class="required">*</span></label></label> 
                    <textarea id="comment_content" name="comment_content" class="form-control" cols="45" rows="3" maxlength="65525"></textarea>
                </div>  
                <div class="col-md-12" style="padding-top:10px;padding-bottom:10px"> 
                    <div class="g-recaptcha" data-sitekey="<?php echo $google_captcha_api; ?>"></div>  
                    <input type="hidden" class="hiddenRecaptcha required" name="comment_hiddenRecaptcha" id="comment_hiddenRecaptcha"> 
                </div>
                <div class="col-md-12 pull-center" style="padding-bottom: 10px;">

                    <input name="submit" type="submit"  class="submit btn btn-primary" value="Comment"/>
                    <input type="hidden" name="parent_id" id="parent_id" value="0"/> 
                    <input type="button" onclick="reply_all();
                        return false;" id="btn_cancel" class="submit btn btn-primary pull-right hidden" value="Cancel"/>
                    <p id="msg"> Thank you for commenting. Please leave constructive comments, respect other people’s opinions, and stay on topic.</p>
                </div> 
            </form>
        </div>
        <script>
            window.addEventListener("DOMContentLoaded", function () {

                jQuery("#go_to_comment").click(function () {
                    jQuery("html, body").animate({scrollTop: jQuery("#comment_form").offset().top}, 1000);
                });
                jQuery("#comment_form").validate(
                        {
                            //set this to false if you don't what to set focus on the first invalid input
                            focusInvalid: false,
                            //by default validation will run on input keyup and focusout
                            //set this to false to validate on submit only                                             onkeyup: false,
                            onfocusout: false,
                            //by default the error elements is a <label>
                            errorElement: "div",
                            //place all errors in a <div id="errors"> element
                            errorPlacement: function (error, element) {
                                error.appendTo("div#comment_errors");
                            },
                            ignore: ".ignore",
                            rules: {
                                "comment_content": {
                                    required: true,
                                    maxlength: 65525
                                },
                                "comment_author": {
                                    required: true,
                                    maxlength: 200
                                },
                                "comment_email": {
                                    required: true,
                                    email: true,
                                    maxlength: 100
                                },
                                comment_hiddenRecaptcha: {
                                    required: function () {
                                        if (grecaptcha.getResponse() == '') {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                }
                            },
                            messages: {
                                "comment_content": {
                                    required: "Please type your comment!",
                                    maxlength: ""},
                                "comment_author": {
                                    required: "Please type your name!",
                                    maxlength: ""
                                },
                                "comment_email": {
                                    required: "Type your Email",
                                    email: "Check your email is not exactly!",
                                    maxlength: ""
                                },
                                "comment_hiddenRecaptcha": {
                                    required: "- Please verify you are human"
                                }
                            },
                            submitHandler: function () {
                                jQuery(".comment_loading").show();
                                var question_ajax = "<?php echo get_format_uri('ajax', 'make-comment'); ?>";
                                var content = jQuery("#comment_content").val();
                                var author = jQuery("#comment_author").val();
                                var email = jQuery("#comment_email").val();
                                var website = jQuery("#comment_website").val();
                                var parent_id = jQuery("#parent_id").val();
                                var metadataload = {};
                                metadataload.content = content;
                                metadataload.author = author;
                                metadataload.email = email;
                                metadataload.website = website;
                                metadataload.parent_id = parent_id;
                                metadataload.related_id = parseInt("0");
                                metadataload.related_url = "<?php echo $url; ?>";
                                jQuery.ajax({
                                    url: question_ajax,
                                    data: metadataload,
                                    type: 'POST',
                                    success: function (data) {
                                        jQuery(".comment_loading").hide();
                                        if (data != '')
                                        {
                                            var result = jQuery.parseJSON(data);
                                            if (result.result === true)
                                            {
                                                var comment_data = result.comment;
                                                var str_comment = "";
                                                if (comment_data.parent_id == 0)
                                                {

                                                    str_comment = "<div id='comment_" + comment_data.id + "' class='replyWrap your_comment clearAfter'><div class='listProfile'><span class='img'><img class='img img-thumbnail' alt='' src='<?php echo $theme_url ?>/rs/imgs/comments/profile-default.png' width='64' height='64'></span><span class='user'>" + comment_data.author + "</span></div><div class='listContent'>" + comment_data.content + "<div class='clearAfter'><div class='left rating'><span>Votes:</span><b class='voteUp' id='comment_voteup_" + comment_data.id + "'>+" + comment_data.like + " </b><span>/</span><b class='voteDown' id='comment_votedown_" + comment_data.id + "'>-" + comment_data.dislike + " </b></div><div class='right'><a class='icon comment' href='javascript:;' onclick='reply_to(" + comment_data.id + "); return false;' title='Add a comment to this comment' rel='nofollow'>Comment</a><a class='icon vote comment_vote_row_" + comment_data.id + " voteUp' href='javascript:;' onclick='comment_vote(" + comment_data.id + ",\"up\"); return false;' title='Vote this comment up (helpful)' rel='nofollow'>Vote up</a><a class='icon vote comment_vote_row_" + comment_data.id + " voteDown' href='javascript:;' onclick='comment_vote(" + comment_data.id + ",\"down\"); return false;' title='Vote this comment down (not helpful)' rel='nofollow'>Vote down</a><a class='icon report hidden' href='javascript:;' onclick='report_comment(" + comment_data.id + "); return false;' title='Report this comment as spam/abuse/inappropriate' rel='nofollow'>Report</a></div></div></div></div>";
                                                    if (comment_data.status == 'trash')
                                                    {
                                                        str_comment += "<p class='text-center'><i>Your comment is awaiting moderation</i></p>";
                                                    }
                                                    jQuery("#list_comment").prepend(str_comment);
                                                } else
                                                {
                                                    str_comment = "<div id='comment_" + comment_data.id + "' class='commentBlock your_comment clearAfter'> <div class='listProfile'> <span class='img'><img class='img img-cirle' alt='' src='<?php echo $theme_url ?>/rs/imgs/comments/profile-default.png' width='16' height='16'></span> <a class='user' href='javascript:;'>" + comment_data.author + "</a> </div> <div class='listContent'> " + comment_data.content + " </div> </div>";
                                                    if (comment_data.status == 'trash')
                                                    {
                                                        str_comment += "<p class='text-center'><i>Your comment is awaiting moderation</i></p>";
                                                    }
                                                    jQuery("#comment_" + comment_data.parent_id).append(str_comment);
                                                    jQuery("#comment_form").appendTo(".make-comment");
                                                    jQuery("#comment_form").removeClass("commentBlock");
                                                    reply_all();
                                                }

                                                jQuery("#comment_count").html(parseInt(("<?php echo $count_comment ?>")));
                                                jQuery("html, body").animate({scrollTop: jQuery("#list_comment").offset().top}, 1000);
                                                jQuery("#comment_form").trigger("reset");

                                            }
                                        }
                                    }
                                });
                            }
                        });
            });
        </script>
        <script>
            function reply_to(comment_id)
            {
                jQuery("#comment_form").addClass("commentBlock");
                jQuery("#btn_cancel").removeClass("hidden");
                jQuery("#comment_form").trigger("reset");
                jQuery("#parent_id").val(comment_id);
                jQuery("#comment_form").appendTo("#comment_" + comment_id);
            }
            function reply_all()
            {
                jQuery("#comment_form").trigger("reset");
                jQuery("#parent_id").val("0");
                jQuery("#comment_form").appendTo(".make-comment");
                jQuery("#btn_cancel").addClass("hidden");
                jQuery("#comment_form").removeClass("commentBlock");
            }
            function comment_vote(comment_id, vote)
            {
                jQuery(".comment_vote_row_" + comment_id).css("fontSize", 0);
                jQuery(".comment_vote_row_" + comment_id).prop('onclick', null).off('click');

                var comment_comment_voteajax = "<?php echo get_format_uri('ajax', 'comment-vote'); ?>";
                var metadataload = {};
                metadataload.comment_id = comment_id;
                metadataload.vote = vote;
                jQuery.ajax({
                    url: comment_comment_voteajax,
                    data: metadataload,
                    type: 'POST',
                    success: function (data) {
                        if (data != '')
                        {
                            var result = jQuery.parseJSON(data);
                            if (result.result === true)
                            {
                                var comment_obj = result.comment;
                                switch (vote) {
                                    case "up":
                                        jQuery("#comment_voteup_" + comment_id).html("+" + comment_obj.like);
                                        break;
                                    case "down":
                                        jQuery("#comment_votedown_" + comment_id).html("-" + comment_obj.dislike);
                                        break;
                                }

                            }
                        }
                    }
                });
            }
            function report_comment(comment_id)
            {
                jQuery("#report_comment_" + comment_id).css("fontSize", 0);
                jQuery("#report_comment_" + comment_id).prop('onclick', null).off('click');
            }

        </script>
        <script>
            window.addEventListener("DOMContentLoaded", function () {
                jQuery("#btn_comments_area").click(function () {
                    jQuery("html, body").animate({scrollTop: jQuery("#comment_form").offset().top}, 1000);
                });
                //
                jQuery('#load_more_comment').click(function (event) {
                    event.preventDefault();
                    var page = jQuery(this).data("page");
                    var limit = jQuery(this).data("limit");
                    var sort = jQuery(this).data("sort");
                    var url = jQuery(this).data("url");
                    load_comment(page, limit, sort, url, '#list_comment', '');
                });
                function load_comment(page, limit, sort, url, main_contain_id, refresh) {
                    jQuery("#load_more_comment").remove();
                    jQuery(".comment-load-more").show();
                    var mainposturl = "<?php echo get_format_uri('ajax', 'comment-paging') ?>";
                    var metadataload = {};
                    metadataload.page = page;
                    metadataload.limit = limit;
                    metadataload.sort = sort;
                    metadataload.url = url;
                    jQuery.ajax({
                        url: mainposturl,
                        data: metadataload,
                        type: 'GET',
                        success: function (data) {
                            jQuery(".comment-load-more").hide();
                            if (refresh === 'f5')
                            {
                                jQuery(main_contain_id).html(data);
                            } else
                            {
                                jQuery(main_contain_id).append(data);
                            }
                            jQuery('#load_more_comment').click(function (event) {
                                event.preventDefault();
                                var page = jQuery(this).data("page");
                                var limit = jQuery(this).data("limit");
                                var sort = jQuery(this).data("sort");
                                var url = jQuery(this).data("url");
                                load_comment(page, limit, sort, url, '#list_comment', '');
                            });
                        }
                    });
                }
                load_comment(<?php echo $page; ?>,<?php echo $limit; ?>, "<?php echo $sort ?>", "<?php echo $url; ?>", "#list_comment", "");
                //
                jQuery('#sort_by').on('change', function () {
                    load_comment(<?php echo $page; ?>,<?php echo $limit; ?>, "" + this.value + "", "<?php echo $url; ?>", "#list_comment", "f5");
                });
            });

        </script>
    </div>	
</div>
<style>
    #list_comment{color:#b1b8c8}#comments_area .row{display:flex;margin:0 -15px;flex-wrap:wrap;width:unset}#comments_area .col-md-12{box-sizing:border-box;width:100%}#comments_area .col-md-4{box-sizing:border-box;padding:0 15px;width:33.33%}.comment-load-more,.comment_loading{background:url('<?php echo$theme_url; ?>/rs/imgs/comments/icon_loader.gif') 0 0/100% auto no-repeat;width:70px;height:50px;margin:0 auto;display:none}.col-all{display:flex;flex-basis:auto}.replyWrap{position:relative;background:url('<?php echo$theme_url; ?>/rs/imgs/comments/quote.png') right top no-repeat;border-top:1px solid #e8e8e8;background-color:#f9f9f9}.clearAfter{display:block;clear:both;padding:10px;min-height:60px}.listProfile{float:left;width:90px;padding:3px;text-align:center}.listProfile a.user{display:block;font-size:12px}.listContent{position:relative;padding:3px;overflow:hidden}.replyWrap .left{float:left;padding:0}.replyWrap b.voteUp{color:#490}.replyWrap .rating b{font-weight:400}.replyWrap b.voteDown{color:#d62}.replyWrap .right{float:right;padding:0}.replyWrap a.icon{float:left;display:block;padding-left:20px;line-height:20px;letter-spacing:-1px;font-size:12px}.icon{padding-left:20px;background-position:left center;background-repeat:no-repeat}a.icon{border:0!important}.commentBlock{background: #f5f5f5;clear:both;margin-left:110px;padding:5px 0 0;border-top:1px solid #eee;line-height:1.4!important;min-height:60px}.commentBlock .listProfile{width:100px;margin-left:0;padding-left:6px;text-align:center}.your_comment{background:#d1f4a8}.comment{background-image:url('<?php echo$theme_url; ?>/rs/imgs/comments/comment.png')}.replyWrap a.voteUp{background-image:url('<?php echo$theme_url; ?>/rs/imgs/comments/thumbs_up.png')}.replyWrap a.voteDown{background-image:url('<?php echo$theme_url; ?>/rs/imgs/comments/thumbs_down.png')}.replyWrap a.report{background-position:0 2px}.replyWrap a.icon{margin-left:15px}a.fav{background-image:url('<?php echo$theme_url; ?>/rs/imgs/comments/heart.png')}.report{background-image:url('<?php echo$theme_url; ?>/rs/imgs/comments/report.png')}.commentLink{float:left;padding-left:35px;background:url('<?php echo$theme_url; ?>/rs/imgs/comments/comment_comment.png') left center no-repeat;border:0;line-height:26px}#rc-imageselect{transform:scale(.77);-webkit-transform:scale(.77);transform-origin:0 0;-webkit-transform-origin:0 0}@media screen and (max-height:575px){#rc-imageselect,.g-recaptcha{transform:scale(.77);-webkit-transform:scale(.77);transform-origin:0 0;-webkit-transform-origin:0 0}}.required{color:red}input.error,textarea.error{border:1px solid red!important}div.error,label.error{font-weight:400;color:red!important;display:block}.text-normal{font-weight:400!important}.make-comment label{display:block;margin-right:12px;padding:10px 0}#respond textarea{background-color:#fff;border:1px solid #ddd;color:#333;font-size:18px;font-size:1.8rem;font-weight:400;padding:16px;width:100%}.btn,.form-control{font-size:14px;line-height:1.42857143;background-image:none}#comments_area{text-align:left;color:inherit;line-height:1.5}.form-control{display:block;width:100%;height:34px;color:#555;background-color:#fff;border:1px solid #ccc;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;box-sizing:border-box;padding:6px 12px}textarea.form-control{height:auto}.btn{display:inline-block;padding:6px 12px;margin-bottom:0;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border:1px solid transparent;border-radius:4px}.btn-primary{background-color:#024f7b;border-color:#024f7b;color:#fff}.btn-primary:hover{font-weight:700}.hidden{display:none}.pull-right{float:right!important}select.input-sm{height:30px;line-height:30px;margin:10px}#list_comment a{color:inherit}#load_more_comment{color:#fff!important;padding:7px 0 0 0}#comment_form{padding-top:20px}#msg{padding:10px 0;text-align:center;font-style:italic}.comment-notes{padding-bottom:10px;font-style:italic}#comment_form{clear:both}.question-title{padding-left:15px}#sort_by{color:#000}#comments_area .img-thumbnail{width:auto!important;display:inline-block;max-width:100%;height:auto;padding:4px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out}.listProfile img{width:auto;height:auto}.img-cirle{width:24px!important;height:24px!important}@media (max-width:991px){#comments_area .col-md-4{width:100%}}
</style>
