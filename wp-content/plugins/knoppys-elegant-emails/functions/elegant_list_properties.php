<?php
/******************
The post list and datatable layout
******************/
//Get the correct arguments
function properties_arguments($id){

	$emailsQuery = $id;
	parse_str($emailsQuery, $query_array);
	if (array_key_exists('id', $query_array)) {
		//Create an array for the properties to exclude. 
		$properties = explode(',', get_post_meta($query_array['id'], 'property_data',true));
		$args = array(
			'post_type' => 'properties',
			'posts_per_page' => -1,
			'exclude' => $properties,
			'post_status' => array('publish', 'draft', 'private')
		);
	} else {
		$args = array(
			'post_type' => 'properties',
			'posts_per_page' => -1,
			'post_status' => array('publish', 'draft', 'private')
		);
	}	
	return $args;
}


function elegant_list_properties(){

	$args = properties_arguments($_SERVER["QUERY_STRING"]);

	$properties = get_posts($args);

	echo saved_property_table();
	
	ob_start(); 

	
	
	?>
	
	<div class="propertiesTable">		
		<div class="tableSearch">
			<h2>Search Properties</h2>
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		</div>
		<table id="elegant_list_properties" class="elegant_list_properties" cellspacing="0">	
				<thead>				
					<tr class="headerrow"><?php echo variations_table_header(get_host()); ?></tr>
				</thead>
				<tfoot>
					<tr><?php echo variations_table_header(get_host()); ?></tr>
				</tfoot>
				
				<?php			
				
				//This returns all the properties for a new email and the remaining properties form an existing one.
				foreach ($properties as $property) { 
					$meta = get_post_meta($property->ID);?>				
					<tr id="<?php echo $property->ID; ?>" class="propertyrow 
					<?php echo strtolower(meta_class($property->ID)); ?> 
					<?php echo property_locations_classes($property->ID); ?> 
					<?php echo variations_agent_classes(get_host(), $property->ID); ?>
					<?php echo variations_tenure_classes(get_host(), $property->ID); ?>">
						<td class=""><img src="<?php echo variations_thumbnail($property->ID,'thumbnail', get_host()); ?>" width="75"></td>
						<td class="titlerow">
							<a class="edit-property" target="_blank" href="<?php echo admin_url(); ?>/post.php?post=<?php echo $property->ID; ?>&action=edit" title="Edit"><span class="dashicons dashicons-welcome-write-blog"></span></a><a href="<?php echo $property->guid;?>" target="_blank"><?php echo $property->post_title; ?></a>
							<div class="message-container">
								<textarea class="message" placeholder="Your Messgae"></textarea>
								<input type="text" name="price" class="price" placeholder="Price">
							</div>
						</td>
						<td class="hide">
							<?php echo $meta['reference_code'][0]; ?>
						</td>
						<td class=""><?php echo property_locations($property->ID); ?></td>
						<td class=""><?php if(isset($meta['type_name'][0])){echo $meta['type_name'][0];} ?></td>
						<td class=""><?php variations_tenure_table(get_host(),$property->ID); ?></td>
						<td class=""><?php variations_agents_table(get_host(),$property->ID); ?></td>
						<td class=""><?php if(isset($meta['number_of_beds'][0])){echo $meta['number_of_beds'][0];} ?></td>
						<?php echo variations_table_features(get_host(), $meta); ?>	
					</tr>
				<?php } ?>
			</tr>
		</table>
	</div>
	<script>
	function myFunction() {
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  console.log(filter);
	  table = document.getElementById("elegant_list_properties");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[2];
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }       
	  }
	}
	</script>
	
	<?php $content = ob_get_clean();
	return $content;
}
//Check if the cell needs a tick or a cross
function meta_check($value){

	if (isset($value) && $value == 1) {
		echo '<span class="green">&#10004;</span>';
	} elseif (isset($value) && $value == 0) {
		echo '<span class="red">&#215;</span>';
	} 

}

//Get the location name for the property
function property_locations($id){

	$terms = get_the_terms( $id, 'locations' );
	if ($terms) {
		foreach ($terms as $term) {
			echo $term->name.'<br>';
		}
	}	
}

function property_locations_classes($id) {
	$terms = get_the_terms( $id, 'locations' );
	if ($terms) {
		foreach ($terms as $term) {
			echo 'term_'.$term->term_id.' ';
		}
	}	
}

//Get the class list for the property
function meta_class($id){

	$meta = get_post_meta($id);
	$metaArray = array();	

	//Meta classes that are the name of the meta
	if(isset($meta['panoramic_sea_view'][0]) && $meta['panoramic_sea_view'][0] == 1){array_push($metaArray, 'panoramic_sea_view');}
	if(isset($meta['sea_view'][0]) && $meta['sea_view'][0] == 1){array_push($metaArray, 'sea_view');}
	if(isset($meta['walk_to_beach'][0]) && $meta['walk_to_beach'][0] == 1){array_push($metaArray, 'walk_to_beach');}
	if(isset($meta['walk_to_shop'][0]) && $meta['walk_to_shop'][0] == 1){array_push($metaArray, 'walk_to_shop');}
	if(isset($meta['aircon_full'][0]) && $meta['aircon_full'][0] == 1){array_push($metaArray, 'aircon_full');}
	if(isset($meta['heated_pool'][0]) && $meta['heated_pool'][0] == 1){array_push($metaArray, 'heated_pool');}
	if(isset($meta['Guardian'][0]) && $meta['Guardian'][0] == 1){array_push($metaArray, 'Guardian');}
	if(isset($meta['spa'][0]) && $meta['spa'][0] == 1){array_push($metaArray, 'spa');}
	if(isset($meta['gym'][0]) && $meta['gym'][0] == 1){array_push($metaArray, 'gym');}
	if(isset($meta['beach_access'][0]) && $meta['beach_access'][0] == 1){array_push($metaArray, 'beach_access');}
	if(isset($meta['heli_pad'][0]) && $meta['heli_pad'][0] == 1){array_push($metaArray, 'heli_pad');}
	if(isset($meta['golf'][0]) && $meta['golf'][0] == 1){array_push($metaArray, 'golf');}
	if(isset($meta['water_front'][0]) && $meta['water_front'][0] == 1){array_push($metaArray, 'water_front');}
	if(isset($meta['skytv'][0]) && $meta['skytv'][0] == 1){array_push($metaArray, 'skytv');}
	if(isset($meta['wifi'][0]) && $meta['wifi'][0] == 1){array_push($metaArray, 'wifi');}
	if(isset($meta['Parking'][0]) && $meta['Parking'][0] == 1){array_push($metaArray, 'Parking');}
	if(isset($meta['small_sea_view'][0]) && $meta['small_sea_view'][0] == 1){array_push($metaArray, 'small_sea_view');}
	if(isset($meta['indoor_pool'][0]) && $meta['indoor_pool'][0] == 1){array_push($metaArray, 'indoor_pool');}
	
	//Meta classes that are variable names
	if(isset($meta['type_name'][0])){array_push($metaArray, str_replace(' ', '', $meta['type_name'][0]));}
	if(isset($meta['sale_or_rent'][0])){array_push($metaArray, str_replace(' ', '', $meta['sale_or_rent'][0]));}
	if(isset($meta['number_of_beds'][0])){array_push($metaArray, str_replace(' ', '', $meta['number_of_beds'][0].'beds'));}
	if(isset($meta['agent_name'][0])){array_push($metaArray, str_replace(array(" ", "'"), '', $meta['agent_name'][0]));}
	
	return implode(' ', $metaArray);

	
	
}



//Get the existing properties
function existing_properties($id){

	$emailsQuery = $id;
	parse_str($emailsQuery, $query_array);
	if (array_key_exists('id', $query_array)) {
		
		$properties = explode(',', get_post_meta($query_array['id'], 'property_data',true));
		$args = array(
			'post_type' => 'properties',
			'post_status' => array('publish', 'draft', 'private'),
			'posts_per_page' => -1,
			'orderby' => 'post__in',
			'post__in' => $properties
		);
		$posts = get_posts($args);
		if ($posts) {
			foreach ($posts as $property) {
			$meta = get_post_meta($property->ID); ?>
				<tr id="<?php echo $property->ID; ?>" class="propertyrow <?php echo strtolower(meta_class($property->ID)); ?> <?php echo property_locations_classes($property->ID); ?> rowselected savedrow">
					<td class=""><img src="<?php echo get_the_post_thumbnail_url($property->ID, array(75,75));?>"></td>
					<td class="">
					<a href="<?php echo $property->guid;?>" target="_blank"><?php echo $property->post_title; ?></a>
						<div class="message-container">
							<?php $notes = nl2br(rawurldecode(get_post_meta($query_array['id'], 'propnotes_'.$property->ID, true))); ?>
							<?php $price = get_post_meta($query_array['id'], 'propprice_'.$property->ID, true); ?>
							<textarea class="message"><?php echo str_replace('<br />', '', $notes); ?></textarea>
							<input type="text" name="price" class="price" placeholder="" value="<?php echo $price; ?>">
						</div>
					</td>
					<td class="hide">
						<?php echo $meta['reference_code'][0]; ?>
					</td>
					<td class=""><?php echo property_locations($property->ID); ?></td>
					<td class=""><?php if(isset($meta['type_name'][0])){echo $meta['type_name'][0];} ?></td>
					<td class=""><?php variations_tenure_table(get_host(),$property->ID); ?></td>
					<td class=""><?php variations_agents_table(get_host(),$property->ID); ?></td>
					<td class=""><?php if(isset($meta['number_of_beds'][0])){echo $meta['number_of_beds'][0];} ?></td>
					<?php echo variations_table_features(get_host(), $meta); ?>	
				</tr>
			<?php }		
		} 
	} else {
		return false;
	}
}

function saved_property_table() {

	ob_start(); ?>

	<div class="saved-container" <?php if (!existing_properties($_SERVER["QUERY_STRING"] == false)){echo 'style="display:block !important"';} ?>>
	<h2>Saved properties</h2>
	<p>Properties marked in green will be sent in your email. You can reorder these properties using a drag and drop facility.</p>
	<table class="saved" cellspacing="0" cellpadding="0" class="" width="600" border-collapse="collapse">	
		<tbody>
			<tr class="headerrow"><?php echo variations_table_header(get_host()); ?></tr>
				<?php //This gets and displays all the existing properties if its an existing email. str_replace(array(" ", "'"), '', $meta_value)
				existing_properties($_SERVER["QUERY_STRING"]); ?>
		</tbody>
	</table>
	</div>

	<?php $content = ob_get_clean();
	return $content;
}