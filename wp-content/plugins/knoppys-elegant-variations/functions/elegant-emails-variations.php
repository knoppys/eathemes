<?php

function get_host(){

	$siteurl = get_site_url();
	$parse = parse_url($siteurl);
	$domain = $parse['host'];

	return $domain;

}

//This function sipulates hte path for the header logo in the presentation email
function variations_email_logo($domain){

	switch ($domain) {
		case 'elegant-address.com':
			echo get_site_url().'/wp-content/uploads/logo.png';
			break;

		case 'elegant-ski.com':
			echo get_site_url().'/wp-content/uploads/logo.png';
			break;

		case 'www.elegant-barbados.com':
			echo get_site_url().'/wp-content/uploads/logo.png';
			break;
		
		default:
			//For local development purposes
			echo 'http://www.elegant-address.com/wp-content/uploads/logo.png';
			break;
	}

}
function variations_contact_details($domain){

	switch ($domain) {
		case 'elegant-address.com': ?>

		<div style="cursor:auto;color:#000000;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:center;">
			<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="http://www.elegant-address.com" style="color: #bc8536" target="_blank"><span style="color: #bc8536">www.elegant-address.com</span></a></span></p>
			<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="mailto:enquiries@elegant-address.com" style="color: #bc8536" target="_blank"><span style="color: #bc8536">enquiries@elegant-address.com</span></a></span></p>
			<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="tel:441244629963" style="color: #bc8536" target="_blank"><span style="color: #bc8536">+44 (0) 1244 629 963</span></a></span></p>
		</div>
			
		<?php break;

		case 'elegant-ski.com': ?>

			<div style="cursor:auto;color:#000000;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:center;">
				<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="http://www.elegant-ski.com" style="color: #bc8536" target="_blank"><span style="color: #bc8536">www.elegant-ski.com</span></a></span></p>
				<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="mailto:ski@elegant-address.com " style="color: #bc8536" target="_blank"><span style="color: #bc8536">ski@elegant-address.com </span></a></span></p>
				<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="tel:441244629963 " style="color: #bc8536" target="_blank"><span style="color: #bc8536">+44 (0) 1244 629963 </span></a></span></p>
			</div>

		<?php break;

		case 'www.elegant-barbados.com': ?>

			<div style="cursor:auto;color:#000000;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:center;">
				<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="http://www.www.elegant-barbados.com" style="color: #bc8536" target="_blank"><span style="color: #bc8536">www.elegant-barbados.com</span></a></span></p>
				<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="mailto:enquiries@www.elegant-barbados.com" style="color: #bc8536" target="_blank"><span style="color: #bc8536">enquiries@elegant-barbados.com</span></a></span></p>
				<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="tel:441244629963 " style="color: #bc8536" target="_blank"><span style="color: #bc8536">+44 (0) 1244 629963 </span></a></span></p>
			</div>

		<?php break;
		
		default:
		//For local development purposes
		?>

			<div style="cursor:auto;color:#000000;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:center;">
				<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="http://www.elegant-ski.com" style="color: #bc8536" target="_blank"><span style="color: #bc8536">Local Dev</span></a></span></p>
				<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="mailto:ski@elegant-address.com " style="color: #bc8536" target="_blank"><span style="color: #bc8536">localdev@elegant-address.com </span></a></span></p>
				<p><span style="font-size: 16px;line-height: 1.5;font-weight: bold"><a href="tel:441244629963 " style="color: #bc8536" target="_blank"><span style="color: #bc8536">+44 (0) 1244 629963 </span></a></span></p>
			</div>

		<?php break;
	}

}

function variations_features_filters($domain){

	switch ($domain) {
		case 'elegant-address.com': ?>
				
				<li data-id="panoramic_sea_view">Panoramic Sea View</li>
				<li data-id="sea_view">Sea View</li>
				<li data-id="walk_to_beach">Walk To Beach</li>
				<li data-id="walk_to_shop">Walk To Shop</li>
				<li data-id="aircon_full">Aircon Full</li>
				<li data-id="heated_pool">Heated Pool</li>
				<li data-id="Guardian">Guardian</li>
				<li data-id="spa">Spa</li>
				<li data-id="gym">Gym</li>
				<li data-id="beach_access">Beach Access</li>
				<li data-id="heli_pad">Heli Pad</li>
				<li data-id="golf">Golf</li>
				<li data-id="water_front">Water Front</li>
				<li data-id="skytv">Sky TV</li>
				<li data-id="wifi">WiFi</li>
				<li data-id="Parking">Parking</li>
				<li data-id="small_sea_view">Small Sea View</li>
				<li data-id="indoor_pool">Indoor Pool</li>

			<?php break;

		case 'elegant-ski.com': ?>

				<li data-id="ski_in_ski_out">Ski in ski out</li>
				<li data-id="close_to_slopes">Close to slopes</li>
				<li data-id="close_to_centre">Close to centre</li>
				<li data-id="hot_tub">Mountain views</li>
				<li data-id="pool">Pool</li>
				<li data-id="parking">Parking</li>
				<li data-id="Guardian">Guardian</li>
				<li data-id="gym">Gym</li>			

			<?php break;

		case 'www.elegant-barbados.com': ?>

				<li data-id="pool">Pool</li>
				<li data-id="communal_pool">Communal Pool</li>   
				<li data-id="sea_view">Sea View</li>   
				<li data-id="panoramic_sea_view">Panoramic Sea View</li>   
				<li data-id="air_con_full">Air Con Full</li>   
				<li data-id="air_con_partial">Air Con Partial</li>   
				<li data-id="gym">Gym</li>   
				<li data-id="spa">Spa</li>   
				<li data-id="staff">Staff</li>   
				<li data-id="wifi">Wifi</li>   
				<li data-id="parking">Parking</li>   
				<li data-id="sky_tv">Satallite TV</li>   
				<li data-id="cook_chef">Cook / Chef</li>   
				<li data-id="on_the_beach">On the Beach</li>   
				<li data-id="walk_to_shop">Walk to shop</li>   
				<li data-id="beach_club_access">Beach Club Access</li>   
				<li data-id="social_membership">Social Membership</li>   
				<li data-id="gated_community">Gated Community</li>   
				<li data-id="tennis">Tennis Nearby</li>   
				<li data-id="golf_nearby">Golf Nearby</li>   
				<li data-id="shuttle">Complimentary Shuttle</li>   
				<li data-id="guardian">Guardian</li>   
				<li data-id="walk_to_beach">Walk to beach</li>   

		

			<?php break;
		
		default: ?>
			
				<li data-id="pool">Pool</li>
				<li data-id="communal_pool">Communal Pool</li>   
				<li data-id="sea_view">Sea View</li>   
				<li data-id="panoramic_sea_view">Panoramic Sea View</li>   
				<li data-id="air_con_full">Air Con Full</li>   
				<li data-id="air_con_partial">Air Con Partial</li>   
				<li data-id="gym">Gym</li>   
				<li data-id="spa">Spa</li>   
				<li data-id="staff">Staff</li>   
				<li data-id="wifi">Wifi</li>   
				<li data-id="parking">Parking</li>   
				<li data-id="sky_tv">Satallite TV</li>   
				<li data-id="cook_chef">Cook / Chef</li>   
				<li data-id="on_the_beach">On the Beach</li>   
				<li data-id="walk_to_shop">Walk to shop</li>   
				<li data-id="beach_club_access">Beach Club Access</li>   
				<li data-id="social_membership">Social Membership</li>   
				<li data-id="gated_community">Gated Community</li>   
				<li data-id="tennis">Tennis Nearby</li>   
				<li data-id="golf_nearby">Golf Nearby</li>   
				<li data-id="shuttle">Complimentary Shuttle</li>   
				<li data-id="guardian">Guardian</li>   
				<li data-id="walk_to_beach">Walk to beach</li>   


			<?php break;
	}

}

//This variation controlls the header and footer row of the email table
function variations_table_header($domain){ 
	
		switch ($domain) {
			case 'elegant-address.com': ?>
				<th>Image</th>
				<th class="name titlerow">Name</th>
				<th class="hide">Ref</th>
				<th>Location</th>
				<th>Type</th>
				<th>Sale or Rent</th>
				<th>Agent Name</th>
				<th>Number of Beds</th>
				<th>Spa</th>					
				<th>Heated Pool</th>
				<th>Beach Access</th>
				<th>Air Con Full</th>
				<th>Heli Pad</th>	
			<?php break;
			case 'elegant-ski.com': ?>
				<th>Image</th>
				<th class="name titlerow">Name</th>
				<th class="hide">Ref</th>
				<th>Location</th>
				<th>Type</th>
				<th>Sale or Rent</th>
				<th>Agent Name</th>
				<th>Number of Beds</th>
				<th>Spa</th>					
				<th>Heated Pool</th>
				<th>Beach Access</th>
				<th>Air Con Full</th>
				<th>Heli Pad</th>	
			<?php break;
			case 'www.elegant-barbados.com': ?>
				<th>Image</th>
				<th class="name titlerow">Name</th>
				<th class="hide">Ref</th>
				<th>Location</th>
				<th>Type</th>
				<th>Sale or Rent</th>
				<th>Agent Name</th>
				<th>Number of Beds</th>
				<th>Spa</th>					
				<th>Pool</th>
				<th>On the Beach</th>
				<th>Air Con Full</th>				
			<?php break;
			
			default:?>
				<th>Image</th>
				<th class="name titlerow">Name</th>
				<th class="hide">Ref</th>
				<th>Location</th>
				<th>Type</th>
				<th>Sale or Rent</th>
				<th>Agent Name</th>
				<th>Number of Beds</th>
				<th>Spa</th>					
				<th>Pool</th>
				<th>On the Beach</th>
				<th>Air Con Full</th>		
			<?php break;
		}

	
}

//THe correct property features for the property listings in the email table
function variations_table_features($domain, $meta){
	switch ($domain) {
		case 'elegant-address.com': ?>
			<td class=""><?php if(isset($meta['spa'][0])){echo meta_check($meta['spa'][0]);} ?></td>
			<td class=""><?php if(isset($meta['heated_pool'][0])){echo meta_check($meta['heated_pool'][0]);} ?></td>
			<td class=""><?php if(isset($meta['beach_access'][0])){echo meta_check($meta['beach_access'][0]);} ?></td>	
			<td class=""><?php if(isset($meta['aircon_full'][0])){echo meta_check($meta['aircon_full'][0]);} ?></td>
			<td class=""><?php if(isset($meta['heli_pad'][0])){echo meta_check($meta['heli_pad'][0]);} ?></td>	
			<?php break; 

		case 'elegant-ski.com': ?>
			<td class=""><?php if(isset($meta['spa'][0])){echo meta_check($meta['spa'][0]);} ?></td>
			<td class=""><?php if(isset($meta['heated_pool'][0])){echo meta_check($meta['heated_pool'][0]);} ?></td>
			<td class=""><?php if(isset($meta['beach_access'][0])){echo meta_check($meta['beach_access'][0]);} ?></td>	
			<td class=""><?php if(isset($meta['aircon_full'][0])){echo meta_check($meta['aircon_full'][0]);} ?></td>
			<td class=""><?php if(isset($meta['heli_pad'][0])){echo meta_check($meta['heli_pad'][0]);} ?></td>	
			<?php break; 
		
		case 'www.elegant-barbados.com': ?>
			<td class=""><?php if(isset($meta['spa'][0])){echo meta_check($meta['spa'][0]);} ?></td>
			<td class=""><?php if(isset($meta['pool'][0])){echo meta_check($meta['pool'][0]);} ?></td>
			<td class=""><?php if(isset($meta['on_the_beach'][0])){echo meta_check($meta['on_the_beach'][0]);} ?></td>	
			<td class=""><?php if(isset($meta['air_con_full'][0])){echo meta_check($meta['aircon_full'][0]);} ?></td>
			<?php break; 
		
		default:?>
			<td class=""><?php if(isset($meta['spa'][0])){echo meta_check($meta['spa'][0]);} ?></td>
			<td class=""><?php if(isset($meta['heated_pool'][0])){echo meta_check($meta['heated_pool'][0]);} ?></td>
			<td class=""><?php if(isset($meta['on_the_beach'][0])){echo meta_check($meta['on_the_beach'][0]);} ?></td>	
			<td class=""><?php if(isset($meta['air_con_full'][0])){echo meta_check($meta['aircon_full'][0]);} ?></td>
			<?php break; 
	}
}

//This function stipulates the from address for the headers in the emails
function variations_from_address($domain){

	switch ($domain) {
		case 'elegant-address.com':
			$from = 'From: Elegant Address <enquiries@elegant-address.com>';
			break;

		case 'elegant-ski.com':
			$from = 'From: Elegant Address <ski@elegant-address.com>';
			break;

		case 'www.elegant-barbados.com':
			$from = 'From: Elegant Barbados <enquiries@www.elegant-barbados.com>';
			break;
		
		default:
			//For local development purposes
			$from = 'From: Elegant Address <enquiries@www.elegant-barbados.com>';
			break;
	}

	return $from;

}

//This function returns the correct subject line for the email
function variations_email_subject($domain){

	switch ($domain) {
		case 'elegant-address.com':
			$subject = 'Elegant Address Property Presentation';
			break;

		case 'elegant-ski.com':
			$subject = 'Elegant Address Ski Property Presentation';
			break;

		case 'www.elegant-barbados.com':
			$subject = 'Elegant Address Property Presentation';
			break;
		
		default:
			$subject = 'Elegant Barbados Property Presentation';
			break;
	}

	return $subject;

}

//This function get the agent name from the post meta in SKI and SOF, 
//remaining sites are taken from the agent taxonomy
function variations_agents_filters($domain){

	switch ($domain) {
		case 'elegant-address.com':
			$meta_values = get_meta_values( 'agent_name', 'properties' ); 
			foreach ($meta_values as $meta_value) { ?>
				<li data-id="<?php echo strtolower(str_replace(array(" ", "'"), '', $meta_value)); ?>"><?php echo $meta_value; ?></li>
			<?php }
			break;

		case 'elegant-ski.com':
			$meta_values = get_meta_values( 'agent_name', 'properties' ); 
			foreach ($meta_values as $meta_value) { ?>
				<li data-id="<?php echo strtolower(str_replace(array(" ", "'"), '', $meta_value)); ?>"><?php echo $meta_value; ?></li>
			<?php }
			break;

		case 'www.elegant-barbados.com':
			$termsArgs = array( 'taxonomy' => 'propertyagent' ); 
			$terms = get_terms($termsArgs);
			foreach ($terms as $term) { ?>
				<li data-id="<?php echo 'term_'.$term->term_id; ?>"><?php echo $term->name; ?></li>
			<?php }
			break;
			
		default:
			$termsArgs = array( 'taxonomy' => 'propertyagent' ); 
			$terms = get_terms($termsArgs);
			foreach ($terms as $term) { ?>
				<li data-id="<?php echo 'term_'.$term->term_id; ?>"><?php echo $term->name; ?></li>
			<?php }
			break;
	}

}
function variations_agents_table($domain, $id){

	switch ($domain) {
		case 'elegant-address.com':
			echo get_post_meta($id,'agent_name', true);
			break;

		case 'elegant-ski.com':
			echo get_post_meta($id,'agent_name', true);
			break;

		case 'www.elegant-barbados.com':			
			$terms = get_the_terms($id, 'propertyagent');
			if ($terms) {
				foreach ($terms as $term) { ?>
					<?php echo $term->name; ?>
				<?php }
			}
			break;
			
		default:
			$terms = get_the_terms($id, 'propertyagent');
			if ($terms) {
				foreach ($terms as $term) { ?>
					<?php echo $term->name; ?>
				<?php }
			}
			break;
	}

}

//This function get the right tenure type from the post meta in SKI and SOF,
//The barbados site is made up from service_type not sale_or_rent
function variations_tenure_filters($domain){

	switch ($domain) {
		case 'elegant-address.com':
			$meta_values = get_meta_values( 'sale_or_rent', 'properties' ); 
			foreach ($meta_values as $meta_value) { ?>
				<li data-id="<?php echo strtolower(str_replace(array(" ", "'"), '', $meta_value)); ?>"><?php echo $meta_value; ?></li>
			<?php }
			break;

		case 'elegant-ski.com':
			$meta_values = get_meta_values( 'sale_or_rent', 'properties' ); 
			foreach ($meta_values as $meta_value) { ?>
				<li data-id="<?php echo strtolower(str_replace(array(" ", "'"), '', $meta_value)); ?>"><?php echo $meta_value; ?></li>
			<?php }
			break;

		case 'www.elegant-barbados.com':
			$termsArgs = array( 'taxonomy' => 'servicetype' ); 
			$terms = get_terms($termsArgs);
			foreach ($terms as $term) { ?>
				<li data-id="<?php echo 'term_'.$term->term_id; ?>"><?php echo $term->name; ?></li>
			<?php }
			break;
		
		default:
			$termsArgs = array( 'taxonomy' => 'servicetype' ); 
			$terms = get_terms($termsArgs);
			foreach ($terms as $term) { ?>
				<li data-id="<?php echo 'term_'.$term->term_id; ?>"><?php echo $term->name; ?></li>
			<?php }
			break;
	}

}
function variations_tenure_table($domain, $id){

	switch ($domain) {
		case 'elegant-address.com':
			echo get_post_meta($id,'sale_or_rent', true);
			break;

		case 'elegant-ski.com':
			echo get_post_meta($id,'sale_or_rent', true);
			break;

		case 'www.elegant-barbados.com':
			$terms = get_the_terms($id, 'servicetype');
			if ($terms) {
				foreach ($terms as $term) { ?>
					<p><?php echo $term->name; ?></p>
				<?php }
			}
			break;
		
		default:
			$terms = get_the_terms($id, 'servicetype');
			if ($terms) {
				foreach ($terms as $term) { ?>
					<p><?php echo $term->name; ?></p>
				<?php }
			}
			break;
	}

}


function variations_propertytype_filters($domain){

	switch ($domain) {
		case 'elegant-address.com':
			$meta_values = get_meta_values( 'type_name', 'properties' ); 
			foreach ($meta_values as $meta_value) { ?>
				<li data-id="<?php echo strtolower(str_replace(array(" ", "'"), '', $meta_value)); ?>"><?php echo $meta_value; ?></li>
			<?php }
			break;

		case 'elegant-ski.com':
			$meta_values = get_meta_values( 'type_name', 'properties' ); 
			foreach ($meta_values as $meta_value) { ?>
				<li data-id="<?php echo strtolower(str_replace(array(" ", "'"), '', $meta_value)); ?>"><?php echo $meta_value; ?></li>
			<?php }
			break;

		case 'www.elegant-barbados.com':
			$termsArgs = array( 'taxonomy' => 'servicetype' ); 
			$terms = get_terms($termsArgs);
			foreach ($terms as $term) { ?>
				<li data-id="<?php echo 'term_'.$term->term_id; ?>"><?php echo $term->name; ?></li>
			<?php }
			break;
			
		default:
			$termsArgs = array( 'taxonomy' => 'servicetype' ); 
			$terms = get_terms($termsArgs);
			foreach ($terms as $term) { ?>
				<li data-id="<?php echo 'term_'.$term->term_id; ?>"><?php echo $term->name; ?></li>
			<?php }
			break;
	}

}


/******************
This idecides which images to use for the property thubnail
***********************************************************/
function variations_thumbnail($ID, $size, $domain){

	switch ($domain) {
		case 'elegant-address.com':
			$url = get_the_post_thumbnail_url($ID, $size);
			return $url;
			break;

		case 'elegant-ski.com':
			$url = get_the_post_thumbnail_url($ID, $size);
			return $url;
			break;

		case 'www.elegant-barbados.com':
			if (get_the_post_thumbnail_url($ID)) {
				$url = get_the_post_thumbnail_url($ID, $size);
			} elseif (!get_the_post_thumbnail_url($ID) && get_field('image_1',$ID)) {
				$url = get_template_directory_uri().'/images/property-images/'.get_field('image_1',$ID);
			} elseif (!get_the_post_thumbnail_url($ID) && !get_field('image_1',$ID)){
				$url = get_template_directory_uri().'/images/no-image'.$size.'.png';
			}
			return $url;
			break;
		
		default:
			if (get_the_post_thumbnail_url($ID)) {
				$url = get_the_post_thumbnail_url($ID, $size);
			} elseif (!get_the_post_thumbnail_url($ID) && get_field('image_1',$ID)) {
				$url = get_template_directory_uri().'/images/property-images/'.get_field('image_1',$ID);
			} elseif (!get_the_post_thumbnail_url($ID) && !get_field('image_1',$ID)){
				$url = get_template_directory_uri().'/images/no-image'.$size.'.png';
			}
			return $url;
			break;
	}
}

function variations_brochurelink($domain, $aptid) {
	switch ($domain) {
		case 'elegant-address.com':
			$url = '<p><a style="color:#bc8536;" target="_blank" href="'.$domain.'/download-brochure/?brochure_id='.$aptid.'"><span style="color:#bc8536;padding:5px;color:font-size: 16px; line-height: 1.5; font-weight: bold;">Download Our Brochure</span></a></p>';
			return $url;
			break;

		case 'elegant-ski.com':
			$url = '<p><a style="color:#bc8536;" target="_blank" href="'.$domain.'/download-brochure/?brochure_id='.$aptid.'"><span style="color:#bc8536;padding:5px;color:font-size: 16px; line-height: 1.5; font-weight: bold;">Download Our Brochure</span></a></p>';
			return $url;
			break;

		case 'www.elegant-barbados.com':
			$url = $url = '<p><a style="color:#bc8536;" target="_blank" href="'.get_the_permalink($aptid).'?request=brochure"><span style="color:#bc8536;padding:5px;color:font-size: 16px; line-height: 1.5; font-weight: bold;">Download Our Brochure</span></a></p>';
			return $url;
			break;
		
		default:
			$url = $url = '<p><a style="color:#bc8536;" target="_blank" href="'.get_the_permalink($aptid).'?request=brochure"><span style="color:#bc8536;padding:5px;color:font-size: 16px; line-height: 1.5; font-weight: bold;">Download Our Brochure</span></a></p>';
			return $url;
			break;
	}
}

function variations_agent_classes($domain, $id) {
	switch ($domain) {
		case 'elegant-address.com':

			return '';
			break;

		case 'elegant-ski.com':
			return '';
			break;

		case 'www.elegant-barbados.com':
			$terms = get_the_terms( $id, 'propertyagent' );
			if ($terms) {
				foreach ($terms as $term) {
					echo 'term_'.$term->term_id.' ';
				}
			}
			return $url;
			break;
		
		default:
			return '';
			break;
	}
}

function variations_tenure_classes($domain, $id) {
	switch ($domain) {
		case 'elegant-address.com':

			return '';
			break;

		case 'elegant-ski.com':
			return '';
			break;

		case 'www.elegant-barbados.com':
			$terms = get_the_terms( $id, 'servicetype' );
			if ($terms) {
				foreach ($terms as $term) {
					echo 'term_'.$term->term_id.' ';
				}
			}
			return $url;
			break;
		
		default:
			return '';
			break;
	}
}

function variations_email_ataglance($domain,$id){
	switch ($domain) {
		case 'elegant-address.com':
			$content = get_post_meta($id,'BriefDescription', true);
			return $content;
			break;

		case 'elegant-ski.com':
			$content = get_post_meta($id,'BriefDescription', true);
			return $content;
			break;

		case 'www.elegant-barbados.com': 
		$meta = get_post_meta($id);
		ob_start(); ?>
			
			<h3 class="widget-title">At a Glance</h3>		
			<ul class="single_property main_features">
				<!-- Number of Bathrooms -->	
				<li>Bedrooms: <?php echo $meta['number_of_beds'][0]; ?></li>																		
				<li>Bathrooms: <?php echo $meta['number_of_baths'][0]; ?></li>
				<!-- Sleeps -->
				<?php if($meta['sleeps'][0]){ ?>
					<li>Sleeps: <?php echo $meta['sleeps'][0]; ?> </li>
				<?php } ?>	
				<?php if($meta['size'][0]){ ?>
					<li>Size: <?php echo $meta['size'][0]; ?> </li>
				<?php } ?>		

			</ul>
			<?php 
			$content = ob_get_clean();
			return $content;
			break;
		
		default:
			return '';
			break;
	}
}