<?php
/******************
This is the locations grid shortcode
**************************************/
function locations_shortcode($atts){

	$defaults = shortcode_atts(array('journey' => '', 'include'=>'all'), $atts);

	$terms = get_terms(
		array(
			'taxonomy'=>'locations',
			'hide_empty' => false,
			'include' => $defaults['include']
			)
		);	

	if ($defaults['include'] == 'all') {
		$columns = 'col-md-4';
	} else {
		$array = explode(',', $defaults['include']);
		if (count($array) <= 2) {
			$columns = 'col-md-6';
		} else {
			$columns = 'col-md-4';
		}
	}

	//Get the right query string
    if ($defaults['journey'] !== '') {
    	$servicetype = '?servicetype='.$defaults['journey'];
    } else {
    	$servicetype = '';
    } 
	
	ob_start(); ?>	
	<div class="locations-grid">
		
			<?php $i = 1; foreach ($terms as $term) { ?>				
				<div class="<?php echo $columns; ?> locations-grid-content whitetext">
				<?php $url = wp_get_attachment_image_src( get_term_thumbnail_id( $term->term_id ), 'medium' );?>
					<a href="<?php echo get_term_link($term->term_id).$servicetype ?>">
						<div class="overlay" style="background: url(<?php echo $url[0]; ?>) no-repeat center center scroll;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
				           	<h1><?php echo $term->name; ?></h1>							
						</div>
						<div class="goldtext">
							<p>
							<?php
							$content = get_field('term_short_description',$term);
							if (strlen( $content ) >= 500) {
								echo substr($content,0,500);
							}else {
								echo $content;
							}
							?>
							</p>
						</div>
					</a>
				</div>
				
			<?php $i++;} ?>
		</div>
	</div>
	<?php $content = ob_get_clean();
	return $content;
}
add_shortcode('locations_grid','locations_shortcode');


/******************
This decides which images to use for the property thubnail
***********************************************************/
function property_thumbnail($ID){

	if (get_the_post_thumbnail_url($ID)) {
		$url = get_the_post_thumbnail_url($ID);
	} elseif (!get_the_post_thumbnail_url($ID) && get_field('image_1',$ID)) {
		$url = get_template_directory_uri().'/images/property-images/'.get_field('image_1',$ID);
	} elseif (!get_the_post_thumbnail_url($ID) && !get_field('image_1',$ID)){
		$url = get_template_directory_uri().'/images/no-image'.$size.'.png';
	}
	return $url;
}

/****************************
Get the right property header image
This is for legacy properties as the old images were stored
as fixed URLs where as now they are stored as ID's
***************************************************************/
function knoppys_property_header($ID, $image){

	if (has_post_thumbnail($ID)) {
		$url = get_the_post_thumbnail_url($ID);
	} else {
		$url = get_template_directory_uri().'/images/property-images/'.str_replace(' ', '%20', $image);
	}
	return $url;
}

/*******************
Get the right details for pricing
*************************************/
function knoppys_pricing($id){

  $saleorrent = get_term('servicetype',$id);
  $price = strip_tags(get_field('price',$id));  

  if ($saleorrent == 'Rent' || $saleorrent == 'Rental') {
    echo '<div class="prices-from"><h3>Prices start from: '.$price.' a Week</h3></div>';
  } else {
    echo '<div class="prices-from"><h3>Prices start from: '.$price.'</h3></div>';
  }

} 


/*********************
Pagination for archive pages
*******************************/
function knoppys_pagination(){
	ob_start(); ?>
		<nav role="navigation" aria-label="Pagination">
			<div class="knoppys_pagination">
			  <div class="row">
			  	<div class="col-xs-6 linkleft">
				    <?php previous_posts_link(); ?>
				  </div>
				<div class="col-xs-6 linkright">
					<?php next_posts_link(); ?>
				</div>
			  </div>
			</div>
		</nav>
	<?php $content = ob_get_clean();
	return $content;
}


/**********************
This gets the location name for the property header
****************************************************/
function knoppys_location_name($ID){

	$terms = get_the_terms($ID,'locations');
	ob_start();
	foreach ($terms as $term) {		
		echo $term->name;
	}
	$content = ob_get_clean();
	return $content;

}

/*****************************
Create an array of images from both the old legacy urls and
the new ACF repeater field for use within the new image slider
***************************************************************/
function knoppys_property_slider($ID) {

	$imagesarray = array();

	$images = array(
		get_post_meta($ID,'image_1',true),
		get_post_meta($ID,'image_2',true),
		get_post_meta($ID,'image_3',true),
		get_post_meta($ID,'image_4',true),
		get_post_meta($ID,'image_5',true),
		get_post_meta($ID,'image_6',true),
		get_post_meta($ID,'image_7',true),
		get_post_meta($ID,'image_8',true)
	);	

	foreach ($images as $image) {		
		if ($image !== '' && file_exists(get_template_directory().'/images/property-images/'.$image)) {
			array_push($imagesarray, get_template_directory_uri().'/images/property-images/'.str_replace(' ', '%20', $image));
		}
	}		
		
	if (get_field('property_image_gallery',$ID)) {
    	$rows = get_field('property_image_gallery',$ID);
      	foreach ($rows as $row) {
          array_push($imagesarray,$row['property_image']['sizes']['large']);          
      	}
    }

	ob_start();	
	?>

	<div class="slider">
		<?php foreach ($imagesarray as $image){ ?>
			<div class="slider-main-cont" style="background: url(<?php echo $image; ?>) no-repeat center center scroll; 
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;">

	  		</div>
		<?php } ?>
			

	</div>
	<div class="arrows">
		<table>
			<tr>
				<td class="left">
					<span id="prevArrow"><i class="fa fa-chevron-left"></i></span>
				</td>
				<td class="right">
					<span id="nextArrow"><i class="fa fa-chevron-right"></i></span>
				</td>
			</tr>
		</table>
	</div>	

<?php 
$content = ob_get_clean();
return $content;
}


function knoppys_property_slider_navigation($ID){ ob_start();

	$imagesarray = array();

	$images = array(
		get_post_meta($ID,'image_1',true),
		get_post_meta($ID,'image_2',true),
		get_post_meta($ID,'image_3',true),
		get_post_meta($ID,'image_4',true),
		get_post_meta($ID,'image_5',true),
		get_post_meta($ID,'image_6',true),
		get_post_meta($ID,'image_7',true),
		get_post_meta($ID,'image_8',true)
	);	

	foreach ($images as $image) {		
		if ($image !== '' && file_exists(get_template_directory().'/images/property-images/'.$image)) {
			array_push($imagesarray, get_template_directory_uri().'/images/property-images/'.str_replace(' ', '%20', $image));
		}
	}			
		
	if (get_field('property_image_gallery',$ID)) {
    	$rows = get_field('property_image_gallery',$ID);
      	foreach ($rows as $row) {
          array_push($imagesarray,$row['property_image']['sizes']['medium']);
      	}
    }

	ob_start();
    ?>

	<div class="slider-for">
		<?php foreach ($imagesarray as $image){ ?>
			<div class="slider-image-cont">
				<img src="<?php echo $image; ?>">
			</div>
		<?php } ?>
	</div>

<?php $content = ob_get_clean();
return $content;
}


/*********
Return an array of Similar property ID's
*****************************************/
function knoppys_similar_properties($id){

	$properties = get_field('similar_properties',$id);
	if (count($properties) == 1) {
		$columns = 'col-md-12';
	} elseif (count($properties) == 2) {
		$columns = 'col-md-6';	
	}elseif (count($properties) == 3) {
		$columns = 'col-md-4';
	}elseif (count($properties == 4)) {
		$columns = 'col-md-3';
	}

	ob_start();

	 ?>
	<section class="content related">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="widget">
						<h3 class="widget-title">Similar Properties</h3>
						<center style="padding-bottom:20px;"><h4>More luxury properteis in <?php echo knoppys_location_name($id); ?></h4></center>		
					</div>			
				</div>
			</div>
			<div class="row">
				<?php foreach($properties as $property){ ?>
					<div class="<?php echo $columns; ?>">
				        <div class="property-grid-content <?php if(get_post_meta($id, 'on_special_offer',true) == '1'){echo 'specialoffer';} ?>">			
				            <a href="<?php echo get_permalink($id); ?>">
				            	<span class="goldtext"><h2><?php echo get_the_title($property); ?></h2></span>
				            	<?php $terms = get_the_terms($property, 'locations'); ?>
				            	<ul class="locations_list"><?php foreach($terms as $term){ ?>
				         			<li><h3 class="goldtext"><?php echo $term->name; ?></h3></li>
				            	<?php } ?></ul>
				            	<ul class="main_features">
				            		<li>Number of Bedrooms: <?php echo get_post_meta($property, 'number_of_beds', true); ?></li>
				            		<li>Number of Bathrooms: <?php echo get_post_meta($property, 'number_of_baths', true); ?></li>
				            		<?php if ( get_post_meta($property, 'number_of_beds', true ) ){ ?>
										<li>Sleeps: <?php echo get_post_meta($property, 'number_of_beds', true ); ?> </li>
									<?php } ?>										 
				            	</ul>
				            	<?php $url = knoppys_property_header($property, get_post_meta($property, 'image_1', true)); ?>
			            		<img src="<?php echo $url; ?>">
								<?php if(get_post_meta($property, 'on_special_offer',true) == '1'){ ?>
				    			<p class="offertext">On Special Offer</p>		
				    			<?php } ?>	
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	
	<?php $content = ob_get_clean();
	return $content;
}


/***********************
Search form to search all properties
****************************************/
function knoppys_property_search(){ ?>

<section class="property-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="widget-title">Property Search</h3>
				<?php echo knoppys_search_form(); ?>				
			</div>
		</div>
	</div>
</section>
<center>				
	<div id="search-open" class="search-header btn btn-primary"><i class="fa fa-search"></i>  Property Search</div>
</center>

<?php }

/*****************************************
Search properteis form
******************************************/
function knoppys_search_form() { ?>

	<form id="propertySearch" name="propertySearch" action="<?php echo get_post_type_archive_link('properties'); ?>" method="post" enctype="multipart/form-data" >
    	<div class="form-group">
    		<label>Accomodation Type</label>
			<select class="form-control" name="type"> 
				<option value="" selected disabled>All</option>
				<option value="Apartment">Apartment</option>
				<option value="Villa">Villa</option>
				<option value="Hotel">Hotel</option>
			</select>
    	</div>
		<div class="form-group">
			<label>Select Location</label>
			<select class="form-control" name="location">
				<?php $termsArgs = array( 'taxonomy' => 'locations' ); 
				$terms = get_terms($termsArgs);
				?>        
				<option></option>  
				<?php foreach ($terms as $term) { ?>
					<option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
				<?php } ?>
			</select>
		</div>
	    <div class="form-group">
	    	<label>Min Beds</label>
	      	<input class="form-control" type="number" name="bedfrom" placeholder="Bed From">
	    </div>
	    <div class="form-group">
	    	<label>Max Beds</label>
	      	<input class="form-control" type="number" name="bedto" placeholder="Bed To">
	    </div>	 	
	    <div class="form-group">
	    	<label>Property Ref</label>
	      	<input class="form-control" type="text" name="ref" placeholder="Property Ref">
	    </div>	   
    	<input type="hidden" name="issearch" value="1">    
    	<center><button class="btn btn-primary search-header" type="submit"><i class="fa fa-search"></i> Refine Search</button></center>
  </form>

<?php }


/*********
Search shortcdoe
*******************/
function searchquicktag($atts){ ob_start(); 
	session_unset ();
	$defaults = shortcode_atts(array('journey' => ''), $atts);
	?>

	
	<form id="propertySearch" name="propertySearch" action="<?php echo get_post_type_archive_link('properties'); ?>" method="post" enctype="multipart/form-data" >
    	<div class="form-group">
    		<label>Accomodation Type</label>
			<select class="form-control" name="type"> 
				<option value="" selected disabled>All</option>
				<option value="Apartment">Apartment</option>
				<option value="Villa">Villa</option>
				<option value="Hotel">Hotel</option>
			</select>
    	</div>
		<div class="form-group">
			<label>Select Location</label>
			<select class="form-control" name="location">
				<?php $termsArgs = array( 'taxonomy' => 'locations' ); 
				$terms = get_terms($termsArgs);
				?>        
				<option></option>  
				<?php foreach ($terms as $term) { ?>
					<option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
				<?php } ?>
			</select>
		</div>
	    <div class="form-group">
	    	<label>Min Beds</label>
	      	<input class="form-control" type="number" name="bedfrom" placeholder="Bed From">
	    </div>
	    <div class="form-group">
	    	<label>Max Beds</label>
	      	<input class="form-control" type="number" name="bedto" placeholder="Bed To">
	    </div>	 	
	    <div class="form-group">
	    	<label>Property Ref</label>
	      	<input class="form-control" type="text" name="ref" placeholder="Property Ref">
	    </div>	   
    	<input type="hidden" name="issearch" value="1">
    	<?php if ($defaults['journey'] !== '') { echo '<input type="hidden" name="journey" value="'.$defaults['journey'].'">'; } ?>
    	<center><button class="btn btn-primary search-header" type="submit"><i class="fa fa-search"></i> Refine Search</button></center>
  	</form>

	<?php $content = ob_get_clean();
	return $content;
}
add_shortcode('pagesearch','searchquicktag');

/********************
Single property at a a glance widget
************************************/
function knoppys_ataglance($meta, $id){ ob_start(); ?>

	
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
	<?php echo knoppys_pricing($id); ?>		
	<?php $content = ob_get_clean();
	return $content;

}

/**************************
Single property fetures and amenities widget
********************************************/
function knoppys_featuresandamenities($meta, $id){ ob_start(); ?>

	<div class="">
		<h3 class="widget-title">Features and Amenities</h3>											
		<ul class="single_property_features">
			<!-- Air Con -->
			<?php if($meta['air_con_full'][0] == 1 && $meta['air_con_partial'][0] == 0){ ?>
				<li>Full Air Con</li>
			<?php } elseif($meta['air_con_full'][0] == 0 && $meta['air_con_partial'][0] == 1){?>
				<li>Partial Air Con</li>
			<?php } ?>			
			<?php if($meta['pool'][0] == 1){ ?>
				<li>Pool</li>
			<?php } ?>
			<?php if($meta['communal_pool'][0] == 1){ ?>
				<li>Communal Pool</li>
			<?php } ?>
			<?php if($meta['sea_view'][0] == 1){ ?>
				<li>Sea View</li>
			<?php } ?>
			<?php if($meta['panoramic_sea_view'][0] == 1){ ?>
				<li>Panoramic Sea View</li>
			<?php } ?>
			<?php if($meta['air_con_full'][0] == 1){ ?>
				<li>Air Con Full</li>
			<?php } ?>			
			<?php if($meta['gym'][0] == 1){ ?>
				<li>Gym</li>
			<?php } ?>
			<?php if($meta['spa'][0] == 1){ ?>
				<li>Spa</li>
			<?php } ?>
			<?php if($meta['staff'][0] == 1){ ?>
				<li>Staff</li>
			<?php } ?>
			<?php if($meta['wifi'][0] == 1){ ?>
				<li>Wifi</li>
			<?php } ?>
			<?php if($meta['parking'][0] == 1){ ?>
				<li>Parking</li>
			<?php } ?>
			<?php if($meta['sky_tv'][0] == 1){ ?>
				<li>Satallite TV</li>
			<?php } ?>
			<?php if($meta['cook_chef'][0] == 1){ ?>
				<li>Cook / Chef</li>
			<?php } ?>
			<?php if($meta['on_the_beach'][0] == 1){ ?>
				<li>On the Beach</li>
			<?php } ?>
			<?php if($meta['walk_to_shop'][0] == 1){ ?>
				<li>Walk to Shop</li>
			<?php } ?>
			<?php if($meta['beach_club_access'][0] == 1){ ?>
				<li>Beach Club Access</li>
			<?php } ?>
			<?php if($meta['social_membership'][0] == 1){ ?>
				<li>Social Membership</li>
			<?php } ?>
			<?php if($meta['gated_community'][0] == 1){ ?>
				<li>Gated Community</li>
			<?php } ?>
			<?php if($meta['tennis'][0] == 1){ ?>
				<li>Tennis Nearby</li>
			<?php } ?>
			<?php if($meta['golf_nearby'][0] == 1){ ?>
				<li>Golf Nearby</li>
			<?php } ?>
			<?php if($meta['shuttle'][0] == 1){ ?>
				<li>Complimentary Shuttle</li>
			<?php } ?>
			<?php if($meta['guardian'][0] == 1){ ?>
				<li>Guardian</li>
			<?php } ?>
			<?php if($meta['walk_to_beach'][0] == 1){ ?>
				<li>Walk to Beach</li>
			<?php } ?>	
		</ul>												
	</div>

	<?php $content = ob_get_clean();
	return $content;

}

/***********
Brochure Download Widget
***************************/
function knoppys_brochure_download($id){ ob_start(); ?>
		
	<form id="brochureform" action="<?php echo get_site_url(); ?>/wp-admin/admin-post.php" method="POST">
		<input type="hidden" name="ID" value="<?php echo $id; ?>">
		<input type="hidden" name="action" value="knoppys_brochure_download">			
		<input id="brochuresubmit" type="submit" name="submit" class="btn" value="Download the brochure">							
	</form>	
	
	<?php $content = ob_get_clean();
	return $content;

}

