<?php
$theme_url = '/' . DIR_THEME;
// echo $theme_url;
// in($theme_url);die; /themes/ziggynow.com/
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="en">
    <meta name="external" content="true">
    <meta name="distribution" content="Global">
    <meta http-equiv="audience" content="General">
    <?php echo $custom; ?>
    <link rel='stylesheet' href="<?php echo $theme_url ?>rs/css/normalize.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href="<?php echo $theme_url ?>rs/css/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="/<?php echo DIR_THEME ?>rs/js/jquery-3.4.1.min.js"></script>
</head>

<body>