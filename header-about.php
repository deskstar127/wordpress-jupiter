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
	

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/responsive.css" />
</head>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70108368-1', 'auto');
  ga('send', 'pageview');

</script>

<script>
	function _uGC(l,n,s){if(!l||l==""||!n||n==""||!s||s=="")return"-";
	var i,i2,i3,c="-";i=l.indexOf(n);i3=n.indexOf("=")+1;
	if(i>-1){i2=l.indexOf(s,i);
		if(i2<0){i2=l.length;}
		c=l.substring((i+i3),i2);}
		return c;
	}

	
</script>

<script type="text/javascript">
	function set_page_size(){
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

		// jQuery('.main-navigation').meanmenu({
		// 	meanScreenWidth: "768",
		// 	meanMenuContainer: '.main_nav_wrapper'
		// });
	});
</script>

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
	$background = get_field('background');
 ?>

<div class="page_wrapper" style="background-image: url(<?php echo $background; ?>)">
		<div class="main_nav_wrapper">
			<?php get_sidebar(); ?>
		</div>
<div id="page" class="hfeed site about">
	<div class="header">
		<a href="/"><?php 
			$logo = get_field('logo', 'options');
		 ?></a>
		<div class="main_nav_wrapper">
			<?php get_sidebar(); ?>
		</div>
		<!-- <a href="/"><img id="logo" src="<?php echo $logo ?>"></a> -->
	</div>