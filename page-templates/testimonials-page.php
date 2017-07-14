<?php
/**
 * Template Name: Testimonials Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="testimonials_page site_content">
		<?php 
			$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
					'orderby'		=> 'date',
					'order'			=> DESC
					);
				$query = new WP_Query( $args );
				$vendors = array();
				while($query->have_posts()) : $query->the_post();
					$name = get_field('name');
					$company_text = get_field('company_text');
					$address = get_field('address');
		?>
					<div class="element">
						<div class="infomation">
							<span><?php echo $name; ?></span>
							<div class="clearfix"></div>
							<span><?php echo $company_text; ?></span>
							<div class="clearfix"></div>
							<span><?php echo $address; ?></span>
						</div>

						<div class="clearfix"></div>
						<div class="description">
							<p>"<?php echo get_the_content(); ?>"</p>
						</div>
					</div>
					<div class="clearfix"></div>
					<hr>
		<?php
				endwhile;
		 ?>
</div>


<?php 
	include dirname(__FILE__).'/bragging.php';
 ?>
<?php get_footer(); ?>