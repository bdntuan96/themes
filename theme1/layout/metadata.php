<?php
$url = \helper\options::options_by_key_type('base_url');
$favicon = $favicon == '' ? $url.\helper\image::get_thumbnail(\helper\options::options_by_key_type('favicon'), 20, 20) : $favicon;
$favicon57 = $favicon57 == '' ? $url. \helper\image::get_thumbnail(\helper\options::options_by_key_type('favicon'), 20, 20) : $favicon57;
$favicon72 = $favicon72 == '' ? $url.\helper\image::get_thumbnail(\helper\options::options_by_key_type('favicon'), 20, 20) : $favicon72;
$favicon114 = $favicon114 == '' ? $url. \helper\image::get_thumbnail(\helper\options::options_by_key_type('favicon'), 20, 20) : $favicon114;
$urlfacebook = $urlfacebook == '' ? \helper\options::options_by_key_type('base_url') . load_url()->uri() : $urlfacebook;
?>
<title><?php echo $title ?></title>
<meta name="title" content="<?php echo $title ?>">
<meta name="description" content="<?php echo $description ?>">
<meta name="external" content="true">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta http-equiv="content-language" content="en" />
<meta name="news_keywords" content="<?php echo $keywords ?>">
<?php if (\helper\options::options_by_key_type('facebook_appid', 'general') != ''): ?>
    <meta property="fb:app_id" content="<?php echo \helper\options::options_by_key_type('facebook_appid', 'general'); ?>">
<?php endif; ?>
<meta name="distribution" content="Global" />
<meta http-equiv="audience" content="General" />
<meta name="author" content="<?php echo $title ?>" />
<meta property="og:url" content="<?php echo $urlfacebook ?>" />
<meta property="og:description" content="<?php echo $description ?>" />
<meta name="resource-type" content="Document" />
<meta property="og:image" content="<?php echo $thumbfacebook ?>" />
<meta property="og:title" content="<?php echo $titlefacebook ?>">
<meta property="og:site_name" content="<?php echo \helper\options::options_by_key_type('site_name', 'general'); ?>">
<link rel="image_src" href="<?php echo $thumbfacebook ?>" />
<meta property="og:type" content="article" />
<?php if (\helper\options::options_by_key_type('facebook_fanpage', 'general') != ''): ?>
    <meta property="article:author" content="<?php echo \helper\options::options_by_key_type('facebook_fanpage', 'general'); ?>" />
    <meta property="article:publisher" content="<?php echo \helper\options::options_by_key_type('facebook_fanpage', 'general'); ?>" />
<?php endif; ?>
<link rel="apple-touch-icon" href="<?php echo $thumbfacebook ?>"/>
<link rel="canonical" href="<?php echo \helper\files::get_canonical($urlfacebook); ?>" />
<link rel="icon" href="<?php echo $favicon ?>"/>
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $favicon57 ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $favicon72 ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $favicon114 ?>">
<?php echo $link ?>