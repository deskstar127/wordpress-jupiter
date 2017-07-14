<?php get_header('events'); ?>
<div id="content" class="clear single_event">
	<a href='/events' title='Go to events' class='back'><strong>←</strong> back to events</a>
	
	<?php
		global $post;
		$EM_Event = em_get_event($post->ID, 'post_id');
	?>
	<div class="event clear">
		<?php echo the_content(); ?>
		
		<div class="event-images">
			<?php echo $EM_Event->output("#_EVENTIMAGE"); ?>
		</div>
		
		<div class="clear"></div>
	
		<?php if(function_exists('kc_add_social_share')) kc_add_social_share(); ?>
		
		<?php if($single) { ?>
			<div class="next-prev clear">
				<span class="prev"><?php previous_post('%','<strong>&larr;</strong> previous event', 'no'); ?></span>
				<span class="next"><?php next_post('%','next event <strong>&rarr;</strong>', 'no'); ?></span>
			</div>
		<?php } ?>
			
	</div><!--end event-->	
	
</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>