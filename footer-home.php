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



<div class="footer_wrapper">
	<div class="footer">
		<?php echo get_field('footer_text', 'options'); ?>		
	</div>
</div>
</div><!-- .site -->



<?php wp_footer(); ?>

<div id="footer-sidebar" class="secondary">
<div id="footer-sidebar1">
<?php
if(is_active_sidebar('sidebar-1')){
// dynamic_sidebar('sidebar-1');
}
?>
</div>

</body>
</html>

<!--<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>-->