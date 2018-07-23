<?php
/******************
The post meta 
and taxonomy filters
******************/
function elegant_filters(){
	
	ob_start(); ?>	
	<table class="elegant_filters">
		<tr>
			<td valign="top" colspan="6">
				<h4>Property Filters</h4>
				<p>Select items to filter the list of properties.</p>			
			</td>
		</tr>
		<tr>
			<td valign="top">
				<h4>Locations</h4>
				<?php $termsArgs = array( 'taxonomy' => 'locations' ); 
				$terms = get_terms($termsArgs);
				?>
				<ul class="location" multiple>					
					<?php foreach ($terms as $term) { ?>
						<li data-id="<?php echo 'term_'.$term->term_id; ?>"><?php echo $term->name; ?></li>
					<?php } ?>
				</ul>
			</td>			
			<td valign="top">
				<h4>Property Type</h4>
				<ul class="propertytype others" multiple>
					<?php variations_propertytype_filters(get_host()); ?>
				</ul>
			</td>									
			<td valign="top">
				<h4>Agent Name</h4>
				<ul class="agentname others" multiple>
					<?php 
					//Function located in Knoppys Elegant Variations Plugin
					variations_agents_filters(get_host()); 
					?>
				</ul>
			</td>			
			<td valign="top">	
				<h4>Number Of Beds</h4>
				<ul class="bedrooms others" multiple>
					<?php $meta_values = get_meta_values( 'number_of_beds', 'properties' ); ?>				
					<?php foreach ($meta_values as $meta_value) { ?>
						<li data-id="<?php echo strtolower(str_replace(array(" ", "'"), '', $meta_value.'beds')); ?>"><?php echo $meta_value; ?> Beds</li>
					<?php } ?>
				</ul>		
			</td>	
			<td valign="top">	
				<h4>Tenure</h4>			
				<ul class="saleorrent others" multiple>
					<?php 
					//Function located in Knoppys Elegant Variations Plugin
					variations_tenure_filters(get_host()); 
					?>
				</ul>	
			</td>		
			<td valign="top" class="features_toggle">
				<h4>Property Features</h4>
				<ul class="features others">
					<?php 
					//Function located in Knoppys Elegant Variations Plugin
					variations_features_filters(get_host()); 
					?>
				</ul>
			</td>
		</tr>
	</table>

	<?php $content = ob_get_clean();
	return $content;
}

//This function gets all the meta values for a specific key. 
// In this case were using it to get the values for the Agent Name
function get_meta_values( $meta_key,  $post_type ) {

    $posts = get_posts(
        array(
            'post_type' => $post_type,
            'meta_key' => $meta_key,
            'posts_per_page' => -1,
        )
    );

    //Get the meta values
    $meta_values = array();
    foreach( $posts as $post ) {
    	if (!get_post_meta( $post->ID, $meta_key, true )) {} 
    	else {
    		$meta_values[] = get_post_meta( $post->ID, $meta_key, true );
    	}        
    }
    sort($meta_values);
    $newarray = array_unique($meta_values);
    return $newarray;

}