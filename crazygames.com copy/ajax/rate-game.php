<?php
$game_id = load_request()->post_value('game_id');
$score = load_request()->post_value('score');
$data = \helper\game::rate($game_id, $score);
echo json_encode($data);
?>