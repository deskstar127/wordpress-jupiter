<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header('home'); ?>

<div class="home_page site_content">
	<?php 
		$logo = get_field('logo', 'options');
		$text_1 = get_field('home_text_1');
		$text_2 = get_field('home_text_2');
	 ?>
	 <img style="height:280px;width:280px;" id="logo" src="<?php echo $logo ?>">
	 <div class="clearfix"></div>
	 <div class="text_wrapper">
	 	<span id="text_1"><?php echo $text_1; ?></span>
	 	<div class="clearfix"></div>
	 	<span id="text_2"><?php echo $text_2; ?></span>	 	
	 </div>
     
</div>

<?php get_footer('home'); ?>