<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script language="JavaScript" src="//js.maxmind.com/js/geoip.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function(){
		var lat = jQuery('#lat_hidden').val();
		var lng = jQuery('#lng_hidden').val();
		var theme_url = jQuery('#theme_url').val();
		var marker_image = theme_url+"/images/marker.png?v=1.1";

		var myOptions = {
			zoom: 18,
			center: new google.maps.LatLng(lat, lng),
			mapTypeControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
		}
		var map = new google.maps.Map(document.getElementById("map"),
			myOptions);

	  var marker = new google.maps.Marker({
	  	position: new google.maps.LatLng(lat, lng), 
	  	map: map,
	  	icon: marker_image
	  });

	  gformInitSpinner(1, 'http://google.com');

	  jQuery('#gform_ajax_frame_1').load( function(){
	  	var form_content = jQuery(this).contents().find('#gform_wrapper_1');
	  	form_content.find('.gfield_error').removeClass('gfield_error');

	  	form_content.find('.validation_message').each(function(){
	  		jQuery(this).parent().find('.ginput_container').find('input').css('border', '1px solid red');
	  	});
	  });

	  jQuery('#submit_button').click(function(){
	  	jQuery('#gform_1').submit();
	  });
	});
</script>

<div class="contact_page site_content">
	<?php 
		gf_google_doc_submit(1);
		$lat = get_field('contact_lat');
		$lng = get_field('contact_lng');
	 ?>
	<input type="hidden" id="lat_hidden" value="<?php echo $lat; ?>">
	<input type="hidden" id="lng_hidden" value="<?php echo $lng; ?>">
	<input type="hidden" id="theme_url" value="<?php echo get_template_directory_uri(); ?>">
	<div class="right">
		<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]' ); ?>
		<div class="contact_info">
			<?php 
				$contact_text_1 = get_field('contact_text_1');
				$contact_text_2 = get_field('contact_text_2');
			 ?>

			 <input type="submit" id="submit_button" value="Submit">
			 <div class="clearfix submit_button_divider"></div>

			<div class="top">
				<p>
					<?php echo html_entity_decode($contact_text_1); ?>
				</p>
			</div>

			<div class="bottom">
				<p>
					<?php echo html_entity_decode($contact_text_2); ?>
				</p>
			</div>
		</div>
        <ul class="icons">
     <li><a href="http://www.mywedding.com/"><img src="http://static.mwsrc.net/main/images/mw-static/common/gold.png" style="border-style:none;" height="150" width="150"></a></li>
<li><a href="http://www.theknot.com/marketplace/senate-garage-kingston-ny-950417#reviewAdd?utm_source=vendor_website&utm_medium=banner&utm_term=8159b967-ee06-4790-8546-a52101080bb0&utm_campaign=vendor_badge_assets"><img src="//www.xoedge.com/myaccount/2012/grab-a-badge/reviews/shadowed/RUO_TK_Vert.png" width="75" height="114" alt="Review us on The Knot" border="0"></a></li>
</ul>
	</div>
	<div class="left">
		<div id="map"></div>
	</div>
    
</div>
<?php get_footer(); ?>