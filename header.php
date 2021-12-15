<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <?php if (is_front_page()) : ?>
        <title><?php echo bloginfo('name'); ?></title>
    <?php else: ?>
        <title><?php echo wp_title('&raquo;', true, 'right'); ?></title>
    <?php endif; ?>

	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<!-- <link rel="manifest" href="/manifest.json"> -->
	<meta name="msapplication-TileColor" content="#b91d47">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" id="theme-style-css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom.css?ver=5.1.32" type="text/css" media="all">
<!-- 	<link href='https://fonts.googleapis.com/css?family=Lora:400,400italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Dancing+Script|Atma' rel='stylesheet' type='text/css'> -->
	<meta name="google-site-verification" content="XT6CQ6BVIpdGLvG3NLJ1ADpL-YXSoWUtPjL9kaZc2Lg" />
</head>

<body <?php body_class(); ?>>

    <!-- START Wrapper -->
	<div class="wpo-wrapper">
		<?php 
		if (is_woocommerce() || is_cart()) : get_template_part('templates/nav/shop'); 
		else 		   					   : get_template_part('templates/nav/main'); 
		endif;

		?>