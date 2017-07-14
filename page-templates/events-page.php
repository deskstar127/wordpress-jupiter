<?php
/**
 * Template Name: Events page
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
	 		foreach ($gallery_slider_images as $slide) { ?>
	 			<a id="first_image" class="example-image-link" href="<?php echo $slide['image']['sizes']['slide']; ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="<?php echo $slide['image']['sizes']['slide']; ?>" alt=""/></a>
	 		<?php } ?>
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
	jQuery(window).load(function(){
		jQuery('#first_image').trigger('click');

		fit_lightbox();

		jQuery(window).resize(function(){
			fit_lightbox();
		});
	});
</script>
<div class="page-template-tm-events1-php">
<div class="calendar_year_select_wrapper">
		<select name="" id="calendar_year_select">
			<option value="2016">2016</option>
			<option value="2017">2017</option>
		</select>
	</div>
	<div class="" id="other-events">
    
		<?php 
		if (class_exists('EM_Events')) {
			if ($events_cat == 'member')
				echo EM_Calendar::output(array('full'=>1, 'long_events'=>1, 'category'=>'member-program,patron-member,patrons-event,patron-member-event'));
			else if ($events_cat == "public")
				echo EM_Calendar::output(array('full'=>1, 'long_events'=>1, 'category'=>'-member-program,-patron-member,-patrons-event,-patron-member-event'));
			else{
				echo EM_Calendar::output(array('full'=>1, 'long_events'=>1));
					// echo WP_FullCalendar::calendar(array());
			}
		}


		// echo do_shortcode('[fullcalendar]');
		?>
	</div>


</div>
<?php 
	include dirname(__FILE__).'/bragging.php';
 ?>
 <script>
 	jQuery(document).ready(function(){
 		jQuery('#calendar_year_select').change(function(){
 			// e.preventDefault();
 			// $(this).closest('.em-calendar-wrapper').prepend('<div class="loading" id="em-loading"></div>');

 			var url = '/events/?full=1&long_events=1&ajaxCalendar=1&mo=1&yr='+jQuery(this).val();
 			var url = em_ajaxify(url);
 			
 			$('.em-calnav-next').closest('.em-calendar-wrapper').load(url, function(){$('.em-calnav-next').trigger('em_calendar_load');});
 		});
 	});
 </script>
<?php get_footer(); ?>