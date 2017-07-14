<?php
/**
 * Template Name: Vendors Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header('about'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
<div class="about_page site_content vendors_page">
	<div class="wrapper">
		

		<?php 
			$args = array(
					'post_type' => 'vendor',
					'posts_per_page' => -1,
					'orderby'		=> 'date',
					'order'			=> ASC
					);
				$query = new WP_Query( $args );
				$vendors = array();
				while($query->have_posts()) : $query->the_post();
					$category = get_field('category');
					$vendors[$category][] = get_the_ID();
				endwhile;

		?>
			<div class="bottom">
		<?php
				$count = 0;
				if(!empty($vendors)){
					foreach ($vendors as $key => $value) {
						$count++;
						if($count == 1 || $count == 3 || $count == 4){
		?>
							<div class="item">
		<?php
						}
		?>
					<div class="element">
					<h1><?php echo $key; ?></h1>
					<div>
		<?php
						if(!empty($value)){
							foreach ($value as $key_1 => $value_1) {
								$post = get_post($value_1);
								$street_address = get_field('street_address', $value_1);
								$phone_number = get_field('phone_number', $value_1);
								$website_link = get_field('website_link', $value_1);
		?>
								<h2><?php echo $post->post_title; ?></h2>
								<span><?php echo $street_address; ?></span>
								<span><?php echo $phone_number; ?></span>
								<a href="<?php echo $website_link; ?>" target="_blink"><span><?php echo $website_link; ?></span></a>
		<?php
							}
						}
		?>
					</div>
					</div>
		<?php
					if($count == 2 || $count == 3 || $count == 7){
		?>
					</div>
		<?php
					}
					}
				}
		 ?>
		 	</div>
	</div>
</div>
<?php endwhile ?>


<?php 
	include dirname(__FILE__).'/bragging.php';
 ?>
<?php get_footer(); ?>