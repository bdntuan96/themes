<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="external" content="true">
    <meta name="distribution" content="Global">
    <meta http-equiv="audience" content="General">
    <?php echo $custom; ?>
    <!-- fonts.google.com -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Condensed:wght@400;500;600&family=Jost:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="<?php echo '/' . DIR_THEME; ?>rs/css/index.css">

    <!-- paging+ (rate+comment) -->
    <?php echo \helper\themes::get_layout('header/analytics'); ?>
    <script>
        var domain_url = '';
        let id_game = '';
        let url_game = '';
        let keywords = '';
        let tags_id = '';
        let category_id = '';
        let order_by = '';
        let order_type = '';
        let is_hot = '';
        let is_new = '';
        let slug_home = "";
        let limit = '',
            id_post,
            url_post,
            max_page;
    </script>
</head>

<body>