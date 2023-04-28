<?php
$url = ($url != null) ? $url : load_url()->current_url();
$domain_url = \helper\options::options_by_key_type('base_url');
$theme_url = '/' . get_config('root_theme') . "/" . \helper\options::options_by_key_type('index_theme');
$keywords = '';
$parent_id = 0;
$related_id = '';
$page = ($page != null && (int) $page > 0) ? $page : 1;
$limit = ($limit != null && (int) $limit > 0) ? $limit : 5;
$order_type = 'desc';
$order_by = 'date';
if ($sort != null) {
    switch ($sort) {
        case "newest":
            $order_type = 'desc';
            $order_by = 'date';
            break;
        case "oldest":
            $order_type = 'asc';
            $order_by = 'date';
            break;
        case "popular":
            $order_type = 'desc';
            $order_by = 'scores';
            break;
    }
}
$comment_data = \helper\comment::paging($url, $related_id, $parent_id, $page, $limit, $order_by, $order_type, $keywords);
$comment_pagelink = \helper\comment::paginglink($url, $related_id, $parent_id, $keywords, $page, $limit);
?>
<?php if ($comment_data != null && count($comment_data) > 0): ?>
    <?php foreach ($comment_data as $comment): ?>
        <div id="comment_<?php echo $comment->id ?>" class="replyWrap clearAfter">
            <div class="listProfile">
                <span class="img">
                    <img class="img img-thumbnail" alt="" src="<?php echo $theme_url . '/rs/imgs/comments/profile-default.png' ?>" width="64" height="64"/>
                </span>
                <a href="javascript:;" rel="nofollow" class="user"><?php echo $comment->author; ?></a> 
            </div>
            <div class="listContent">
                <p><?php echo $comment->get_content(); ?></p>  
                <div class="clearAfter">
                    <div class="left">
                        <span>Votes:</span>
                        <b class="voteUp" id="comment_voteup_<?php echo $comment->id; ?>">+<?php echo $comment->like; ?> </b> 
                        <span>/</span>
                        <b class="voteDown" id="comment_votedown_<?php echo $comment->id; ?>">-<?php echo $comment->dislike; ?> </b>
                    </div>
                    <div class="right">
                        <a class="icon comment" href="javascript:;" onclick="reply_to(<?php echo $comment->id; ?>);
                                return false;" title="Add a comment to this comment" rel="nofollow">Comment</a>		
                        <a class="icon vote comment_vote_row_<?php echo $comment->id ?> voteUp" href="javascript:;" onclick="comment_vote(<?php echo $comment->id; ?>, 'up');
                                return false;" title="Vote this comment up (helpful)" rel="nofollow">Vote up</a>
                        <a class="icon vote comment_vote_row_<?php echo $comment->id ?> voteDown" href="javascript:;" onclick="comment_vote(<?php echo $comment->id; ?>, 'down');
                                return false;" title="Vote this comment down (not helpful)" rel="nofollow">Vote down</a>
                        <a class="icon report hidden" id="report_comment_<?php echo $comment->id; ?>" href="javascript:;" onclick="report_comment(<?php echo $comment->id; ?>);
                                return false;" title="Report this comment as spam/abuse/inappropriate" rel="nofollow">Report</a>
                    </div>
                </div>
                <span class="pull-right">
                    <?php if (\helper\datetime::sqldate_to_format($comment->date, "Y-m-d") == date('Y-m-d')): ?>
                        <?php echo \helper\datetime::time_ago($comment->date); ?>
                    <?php else: ?>
                        <?php echo \helper\datetime::sqldate_to_format($comment->date, "M d, Y") . " at " . \helper\datetime::sqldate_to_format($comment->date, "H:i") ?>
                    <?php endif; ?>
                </span>
            </div>
        </div> 
        <?php
        $comment_comment_data = \helper\comment::paging('', $related_id, $comment->id, 1, 20, 'date', 'desc', '');
        ?>
        <?php if ($comment_comment_data != null && count($comment_comment_data) > 0): ?>
            <?php foreach ($comment_comment_data as $com_index => $comment): ?> 
                <div id='comment_<?php echo $comment->id ?>' class='commentBlock <?php echo ($com_index % 2) ? "alternate" : ""; ?> clearAfter'>
                    <div class='listProfile'>
                        <span class='img'><img class='img img-cirle' alt='' src='<?php echo $theme_url . '/rs/imgs/comments/profile-default.png' ?>' width='16' height='16'></span>
                        <a class='user' href='javascript:;'><?php echo $comment->author ?></a>
                    </div>
                    <div class='listContent'>
                        <?php echo $comment->get_content(); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?> 
    <?php 
        $comment_next_page_data = \helper\comment::paging($url, $related_id, $parent_id, ($page+1), $limit, $order_by, $order_type, $keywords);
        $count_more = (count($comment_next_page_data)<$limit)?count($comment_next_page_data):$limit;
    ?>
    <?php if ($comment_next_page_data != null && count($comment_next_page_data) > 0): ?>  
        <a href="<?php echo $url,'?page='.($page+1).'&limit='.$limit.'&sort='.$sort; ?>" class="btn btn-primary form-control" data-url="<?php echo $url; ?>" id="load_more_comment" data-page="<?php echo $page + 1; ?>" data-limit="<?php echo $limit; ?>" data-sort="<?php echo $sort; ?>" >Load more <?php echo $count_more; ?> comments</a>
    <?php endif; ?> 
<?php endif; ?> 