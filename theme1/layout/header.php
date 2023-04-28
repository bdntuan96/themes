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
    <?php
    echo $custom;
    ?>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo $theme_url ?>rs/css/index.php"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url ?>rs/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url ?>rs/css/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&amp;display=swap" rel="stylesheet">
    <script src="<?php echo $theme_url ?>rs/js/jquery-3.4.1.min.js"></script>
    <script>
        var domain_url = '<?php echo \helper\options::options_by_key_type('base_url'); ?>';
    </script>
    <?php
    echo \helper\themes::get_layout('header/analytics');
    $banner = \helper\options::options_by_key_type('banner');
    if ($banner) {
        $image_banner = $banner;
    } else {
        $image_banner = $theme_url . 'rs/imgs/bg-full.jpg';
    }
    ?>
    <style>
        .big-title {
            background: url('<?php echo $image_banner; ?>');
            height: 612px;
            width: 100%;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="p-r papers">