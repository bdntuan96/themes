<?php $theme_url = '/' . DIR_THEME; ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="en">
    <meta name="external" content="true">
    <meta name="distribution" content="Global">
    <meta http-equiv="audience" content="General">
    <!-- more -->
    <meta name="theme-color" content="#fff">
    <meta name="resource-type" content="Game" />

    <?php echo $custom; ?>
    <link rel="stylesheet" href="<?php echo $theme_url; ?>rs/css/all.css" />
    <!-- paging -->
    <?php echo \helper\themes::get_layout('header/analytics'); ?>
    <script>
        var domain_url = '';
        let id_game = '';
        let url_game = '';
        let keywords = '';
        let tags_id = '';
        let category_id = '';
        let field_order = '';
        let order_type = '';
        let is_hot = '';
        let is_new = '';
        let slug_home = "";
        let limit = '';
    </script>

    <script src="<?php echo $theme_url; ?>rs/js/jquery-3.4.1.min.js"></script>
    <!-- <script>
        $(".scroll").on('click', function() {
            $('<a name="top"/>').insertBefore($('body').children().eq(0));
            window.location.hash = 'top';
        })
    </script> -->
</head>

<body>