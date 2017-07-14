<?php
/**
 * Template Name: Press Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
<div class="testimonials_page site_content">
	<?php 
	$args = array(
		'post_type' => 'press',
		'posts_per_page' => -1,
		'orderby'		=> 'date',
		'order'			=> DESC
		);
	$query = new WP_Query( $args );
	$vendors = array();
	while($query->have_posts()) : $query->the_post();
		$pdf = get_field('download_pdf');
		$externallink = get_field('link_to_external_url');
		$thumbnail = get_field('thumbnail');
		$tribute = get_field('posted_in');
		$choice = get_field('read_more_link_choice');
		$url = get_the_permalink();
		$open_new_window = false;
		switch($choice){
			case 'pdf':
				if($pdf != ''){
					$url = $pdf;
					$open_new_window = true;
				}
				break;
			case 'external':
				if($externallink != ''){
					$url = $externallink;
					$open_new_window = true;
				}
				break;
		}
	?>
		<div class="element press_item">
			<div class="left" style="background-image: url(<?php echo $thumbnail; ?>)">
			</div>
			<div class="right">
				<span class="title"><?php echo get_the_title(); ?></span>
				<div class="clearfix"></div>
                <span class="tribute"><?php echo $tribute; ?></span>
				<div class="clearfix"></div>
				<span class="press_text"><?php echo get_field('excerpt'); ?></span>
				<div class="clearfix"></div>
				<a href="<?php echo $url ?>" <?php if($open_new_window) echo 'target="_blank"';?> >Read more...</a>
			</div>
		</div>
	<?php
	endwhile;
	 ?>
     
</div>

<?php get_footer(); ?>