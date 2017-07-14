<?php 
/*
 * This file contains the HTML generated for full calendars. You can copy this file to yourthemefolder/plugins/events-manager/templates and modify it in an upgrade-safe manner.
 * 
 * There are two variables made available to you: 
 * 
 * 	$calendar - contains an array of information regarding the calendar and is used to generate the content
 *  $args - the arguments passed to EM_Calendar::output()
 * 
 * Note that leaving the class names for the previous/next links will keep the AJAX navigation working.
 */
$cal_count = count($calendar['cells']); //to prevent an extra tr
$col_count = $tot_count = 1; //this counts collumns in the $calendar_array['cells'] array
$col_max = count($calendar['row_headers']); //each time this collumn number is reached, we create a new collumn, the number of cells should divide evenly by the number of row_headers




$show_text_brand = false;
if($calendar['year_next'] == 2016){
	if($calendar['month_next'] >= 3 && $calendar['month_next'] <= 9){
		$show_text_brand = true;
	}
}
?>
<table class="em-calendar fullcalendar">
	<thead>
		<tr>
			<td class="month_name" colspan="7">
				<a class="em-calnav full-link em-calnav-prev" href="<?php echo $calendar['links']['previous_url']; ?>">&lt;</a>
				<?php echo ucfirst(date_i18n(get_option('dbem_full_calendar_month_format'), $calendar['month_start'])); ?>
				<a class="em-calnav full-link em-calnav-next" href="<?php echo $calendar['links']['next_url']; ?>">&gt;</a>
				<?php 
					if($show_text_brand){
				 ?>
				 <div class="brand_text">As a brand new venue, we still have availability in <br />Spring and Summer 2016!</div>
				<?php 
					}
				 ?>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr class="days-names">
			<td><?php echo implode('</td><td>',$calendar['row_headers']); ?></td>
		</tr>
		<tr>
			<?php
			foreach($calendar['cells'] as $date => $cell_data ){
				$class = ( !empty($cell_data['events']) && count($cell_data['events']) > 0 ) ? 'eventful':'eventless';
				if(!empty($cell_data['type'])){
					$class .= "-".$cell_data['type']; 
				}
				//In some cases (particularly when long events are set to show here) long events and all day events are not shown in the right order. In these cases, 
				//if you want to sort events cronologically on each day, including all day events at top and long events within the right times, add define('EM_CALENDAR_SORTTIME', true); to your wp-config.php file 
				if( defined('EM_CALENDAR_SORTTIME') && EM_CALENDAR_SORTTIME ) ksort($cell_data['events']); //indexes are timestamps
				?>
				<td class="<?php echo esc_attr($class); ?>">
					<?php if( !empty($cell_data['events']) && count($cell_data['events']) > 0 ): ?>
					<?php echo date('j',$cell_data['date']); ?>
					<?php 
						$output_text = EM_Events::output($cell_data['events'],array('format'=>get_option('dbem_full_calendar_event_format')));
						$is_holiday = false;
						if(!empty($cell_data['events'][0]->categories)){
							foreach ($cell_data['events'][0]->categories as $key => $value) {
								if($value->name == 'Holiday'){
									$is_holiday = true;
								}
							}
						}
						echo $output;
					 ?>
					<ul class="day-events <?php if($output_text == 'Wedding'){echo 'is_wedding';} ?>">
						<?php 
						echo $output_text; ?>
						<?php if( $args['limit'] && $cell_data['events_count'] > $args['limit'] && get_option('dbem_display_calendar_events_limit_msg') != '' ): ?>
						<li><a href="<?php echo esc_url($cell_data['link']); ?>"><?php echo get_option('dbem_display_calendar_events_limit_msg'); ?></a></li>
						<?php endif; ?>
					</ul>
					<?php else:?>
					<?php echo date('j',$cell_data['date']); ?>
					<?php endif; ?>
				</td>
				<?php
				//create a new row once we reach the end of a table collumn
				$col_count= ($col_count == $col_max ) ? 1 : $col_count+1;
				echo ($col_count == 1 && $tot_count < $cal_count) ? '</tr><tr>':'';
				$tot_count ++; 
			}
			?>
		</tr>
	</tbody>
</table>