<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Senate_Garage
 * @since Senate Garage 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/js/plugins/meanMenu-master/meanmenu.css" />
	<script src="<?php echo get_template_directory_uri();?>/js/plugins/meanMenu-master/jquery.meanmenu.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/responsive.css" />

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70108368-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<script type="text/javascript">
	function set_page_size(){
		jQuery('.home_page_wrapper').css('display', 'block');
		var window_width = jQuery(window).width();
		var window_height = jQuery(window).height();

		jQuery('body').css('min-width', window_width);
		jQuery('body').css('min-height', window_height);

		jQuery('#page').css('min-height', window_height);
	}

	jQuery(window).load(function(){
		set_page_size();
	});

	jQuery(document).ready(function(){
		jQuery(window).resize(function(){
			set_page_size();
		});

		jQuery('.main-navigation').meanmenu({
			meanScreenWidth: "768",
			meanMenuContainer: '.main_nav_wrapper'
		});
	});
</script>

<script type="text/javascript" src="http://fast.fonts.net/jsapi/b0bcab9d-6f6b-444e-90e0-8b2fd74c89fe.js"></script>

<body <?php body_class(); ?>>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PZ6JPJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PZ6JPJ');</script>
<!-- End Google Tag Manager -->

<?php 
	$background = get_field('background', 5);
 ?>

<div id="page" class="home_page_wrapper hfeed site" style="background-image: url(<?php echo $background; ?>); background-color: #000;">
	<div class="main_nav_wrapper">
		<?php get_sidebar(); ?>
	</div>