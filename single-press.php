<?php get_header('home'); 
if ( have_posts() ) while ( have_posts() ) : the_post();
?>
<div class="press_page site_content">
	<?php 
		$thumbnail = get_field('thumbnail');
	?>
		<div class="element">
			<div class="left" style="background-image: url(<?php echo $thumbnail; ?>)">
			</div>
			<div class="right">
				<span class="title"><?php echo get_the_title(); ?></span>
				<div class="clearfix"></div>
				<span><?php echo the_content(); ?></span>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php
	endwhile;	
	 ?>
     
</div>

<?php get_footer('home'); ?>