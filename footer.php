<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Senate_Garage
 * @since Senate Garage 1.0
 */
?>




</div><!-- .site -->
</div>



<?php wp_footer(); ?>

<div id="footer-sidebar" class="secondary">
<div id="footer-sidebar1">
<?php
if(is_active_sidebar('sidebar-1')){
// dynamic_sidebar('sidebar-1');
}
?>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/js/plugins/meanMenu-master/meanmenu.css" />
	<script src="<?php echo get_template_directory_uri();?>/js/plugins/meanMenu-master/jquery.meanmenu.js"></script>
	<script>
	jQuery(document).ready(function(){
		jQuery(window).resize(function(){
			// set_page_size();
		});
// alert('ok');
		jQuery('.main-navigation').meanmenu({
			meanScreenWidth: "768",
			meanMenuContainer: '.main_nav_wrapper'
		});
	});
	</script>
</body>
</html>

<!--<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>-->