<?php $theme_url = '/' . DIR_THEME; ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="external" content="true">
    <meta name="distribution" content="Global">
    <meta http-equiv="audience" content="General">
    <?php echo $custom; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="<?php echo $theme_url; ?>rs/css/index.css">
    
    <!-- Google Analytics -->
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
        let limit = ''
    </script>
</head>

<body>