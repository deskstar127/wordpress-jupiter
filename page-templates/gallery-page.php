<?php
/**
 * Template Name: Gallery Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/js/plugins/flexslider/flexslider.css" />
<script src="<?php echo get_template_directory_uri();?>/js/plugins/flexslider/jquery.flexslider.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/js/plugins/lightbox/dist/css/lightbox.css" />


<div class="gallery_page site_content">
	<?php 
		$gallery_slider_images = get_field('gallery_slider_images');

	 ?>

	 <!-- <div class="flexslider">
	 	<ul class="slides">
	 		<?php 
	 		foreach ($gallery_slider_images as $slide) { ?>
	 			<li>
	 				<!-- <div style="background-image: url(<?php echo $slide['image']['sizes']['slide']; ?>) "></div> 
	 				<!-- <div style="background-image: url(<?php echo $slide['image']; ?>) "></div>
	 				<img src="<?php echo $slide['image']; ?>">
	 			</li>
	 		<?php } ?>
	 	</ul>
	 </div> -->

	 <div>
	 	<div class="nav_image_wrapper">
	 		<?php 
	 		foreach ($gallery_slider_images as $slide) { 
	 				if(!empty($slide['image']['url'])){
	 			?>
	 			<a id="first_image" class="example-image-link" href="<?php echo $slide['image']['url']; ?>" data-lightbox="example-set" data-title="Click Image to Enlarge"><img class="example-image" src="<?php echo $slide['image']['url']; ?>" alt=""/></a>

	 			 <a id="second_image" class="example-image-link" href="<?php echo $slide['image']['url']; ?>" data-lightbox="example-set-1" data-title="Click Image to Enlarge"><img class="example-image" src="<?php echo $slide['image']['url']; ?>" alt=""/></a>
	 		<?php }} ?>
	 		<!-- <a id="first_image" class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt=""/></a>
	 		<a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-4.jpg" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" /></a>
	 		<a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-5.jpg" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-5.jpg" alt="" /></a>
	 		<a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-6.jpg" data-lightbox="example-set" data-title="Click anywhere outside the image or the X to the right to close."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-6.jpg" alt="" /></a> -->
	 	</div>   
	 	
	 </div>

</div>
<?php 
	$image_count = sizeof($gallery_slider_images);
 ?>
 <input type="hidden" id="image_count" value="<?php echo $image_count; ?>">	
<script src="<?php echo get_template_directory_uri();?>/js/plugins/lightbox/dist/js/lightbox-plus-jquery.js"></script>

<script type="text/javascript">
	function fit_lightbox(){
		var window_width = jQuery(window).width();
		var window_height = jQuery(window).height();
		var header_height = jQuery('.header').height();
		var max_height = window_height - header_height;
		var max_width = window_width - 60;
		max_height = max_height - 20;
		if(window_height < 500){
			max_height = 200;
		}

		if(window_width < 900){
			lightbox.option({
				maxWidth: max_width,
				maxHeight: max_height
			});

			jQuery('#lightbox').css('top', '250px');
		}
		else{
			lightbox.option({
				maxWidth: 800
			});

			jQuery('#lightbox').css('top', '150px');
		}
	}
	function show_popup(){
		jQuery('.lightboxOverlay')[0].style.setProperty('display', 'inline-block', 'important');
		jQuery('.lightbox_close').css('display', 'block');
		jQuery('.lb-data .lb-details').css('display', 'none');

		var window_width = jQuery(window).width();
		var window_height = jQuery(window).height();
		var header_height = jQuery('.header').height();
		var max_height = window_height - 100;
		var max_width = window_width;
		lightbox.option({
				maxWidth: max_width,
				maxHeight: max_height
			});


		jQuery('#first_image').trigger('click');
			jQuery('#lightbox').css('top', '60px');

			jQuery('.lightboxOverlay').unbind('click');
			jQuery('.lightboxOverlay').click(function(){
				hide_popup();
			});
			jQuery('#lightbox').unbind('click');
			jQuery('#lightbox').click(function(){
				hide_popup();
			});
	}
	function hide_popup(){
		jQuery('.lightboxOverlay')[0].style.setProperty('display', 'none', 'important');
		jQuery('.lightbox_close').css('display', 'none');
		jQuery('.lb-data .lb-details').css('display', 'block');

		fit_lightbox();


		jQuery('#second_image').trigger('click');
		// lightbox.eq(6);
			// jQuery('#lightbox').css('top', '60px');
	}
	jQuery(window).load(function(){
		jQuery('#second_image').trigger('click');

		fit_lightbox();

		jQuery(window).resize(function(){
			fit_lightbox();
		});

		jQuery('.lb-container').click(function(){
			show_popup();
		});

		jQuery('.lightbox_close').click(function(){
			hide_popup();
		});
	});
</script>

<?php get_footer(); ?>