<?php
/**
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header('about'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
<div class="about_page site_content">
	<div class="wrapper">
		<?php the_content(); ?>
		<div class="clearfix"></div>
		<div class="bottom">
			<div class="left">
				<span>Our amenities include:</span>
				<ul>
					<?php 
						$our_amenities_include = get_field('our_amenities_include');
						if(!empty($our_amenities_include)){
							foreach ($our_amenities_include as $key => $value) {
					?>
								<li><?php echo $value['item']; ?></li>
					<?php
							}
						}
					 ?>
				</ul>

				<span class="span_bottom">Outdoor grounds:</span>
				<ul>
					<?php 
						$outdoor_grounds = get_field('outdoor_grounds');
						if(!empty($outdoor_grounds)){
							foreach ($outdoor_grounds as $key => $value) {
					?>
								<li><?php echo $value['item']; ?></li>
					<?php
							}
						}
					 ?>
				</ul>
			</div>
			<div class="right">
				<?php 
					$image_1 = get_field('image_1');
					$image_2 = get_field('image_2');
				 ?>			
				 <img src="<?php echo $image_1['url'] ?>" alt="">
				 <img src="<?php echo $image_2['url'] ?>" alt="">
			</div>
		</div>
	</div>
</div>
<?php endwhile ?>
<?php 
	include dirname(__FILE__).'/bragging.php';
 ?>
<?php get_footer(); ?>