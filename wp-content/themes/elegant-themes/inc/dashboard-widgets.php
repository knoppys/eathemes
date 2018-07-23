<?php
//Add some handy dashboard widgets.

// Function used in the action hook
function add_dashboard_widgets() {
  wp_add_dashboard_widget('latest-properties', 'Latest Properties', 'latest_properties_function');
  wp_add_dashboard_widget('latest-offers', 'Latest Offers', 'latest_offers_function');
  wp_add_dashboard_widget('shortcode-descriptions', 'Shortcodes', 'shortcode_description_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );

/**********************
Latest Properties Widget
*************************/
function latest_properties_function( $post, $callback_args ) {
  $properties = array(
  	'post_type' => 'properties',
  	'posts_per_page' => 10
  );
  $posts = get_posts($properties);
  echo '<table class="dashwidget">';
  echo '<thead><th>Edit</th><th>Name</th><th>Detail</th><th>Added By</th></thead>';
  foreach ($posts as $post) {   
  	?>  	
  		<tr>
  			<td>
  				<a class="edit-property" target="_blank" href="<?php echo admin_url(); ?>/post.php?post=<?php echo $post->ID; ?>&action=edit" title="Edit"><span class="dashicons dashicons-welcome-write-blog"></span></a>
  			</td>
  			<td>
  				<a href="<?php echo $post->guid;?>" target="_blank"><?php echo $post->post_title; ?></a>
  			</td>
  			<td>
  				<?php echo get_post_meta($post->ID,'number_of_beds',true); ?> Bed Property in <?php echo property_locations($post->ID); ?>
  			</td>
  			<td>
  				<?php echo get_the_author_meta('first_name',$post->post_author); ?>
  			</td>
  		</tr>  
  <?php }
  echo '</table>';
}

/********************
Latest special offers widget
******************************/
function latest_offers_function( $post, $callback_args ) {
  $properties = array(
  	'post_type' => 'properties',
  	'posts_per_page' => 10,
  	'meta_key' => 'on_special_offer',
  	'meta_value' => '1'
  );
  $posts = get_posts($properties);
  echo '<table class="dashwidget">';
  echo '<thead><th>Edit</th><th>Name</th><th>Detail</th><th>Added By</th></thead>';
  foreach ($posts as $post) {   
  	?>  	
  		<tr>
  			<td>
  				<a class="edit-property" target="_blank" href="<?php echo admin_url(); ?>/post.php?post=<?php echo $post->ID; ?>&action=edit" title="Edit"><span class="dashicons dashicons-welcome-write-blog"></span></a>
  			</td>
  			<td>
  				<a href="<?php echo $post->guid;?>" target="_blank"><?php echo $post->post_title; ?></a>
  			</td>
  			<td>
  				<?php echo get_post_meta($post->ID,'number_of_beds',true); ?> Bed Property in <?php echo property_locations($post->ID); ?>
  			</td>
  			<td>
  				<?php echo get_the_author_meta('first_name',$post->post_author); ?>
  			</td>
  		</tr>  
  <?php }
  echo '</table>';
}

/******************************
Shortcodes Description Widget
********************************/
function shortcode_description_function($post,$callback_args){ ?>

  <table class="dashwidget shortcodedesc">
    <tr>
      <td colspan="3">
        <h3>Content Shortcodes</h3>
        <p>Your theme comes with some handy shortcodes that you can place into your content areas to display different features.</p>
        <p>Below is a description of each shortcode and the options it uses.</p>
      </td>
    </tr>
    <tr class="head">
      <td>
        <strong>Shortcode</strong>            
      </td>
      <td>
        <strong>Description</strong>
      </td>
      <td>
        <strong>Attributes</strong>
      </td>
    </tr>
    <tr class="body">
      <td>
        <p>[pagesearch]</p>
      </td>
      <td>
        Show the property search form.
      </td>
      <td>
        <strong>journey=" "</strong><p>Enter the Property Type slug to filter the types of property (rent, sale etc) that the user sees in the results.</p>  
        <p>Example: [pagesearch journey="rent"]</p>      
      </td>
    </tr>
    <tr class="body">
      <td>
        <p>[locations_grid]</p>
      </td>
      <td>
        <p>Show the locations grid.</p>
      </td>
      <td>
        <strong>journey=" "</strong><p>Enter the Property Type slug to filter the types of property (rent, sale etc) that the user sees in the results.</p>  
        <p>Example: [locations_grid journey="rent"]</p>
        <strong>include=" "</strong><p>Enter a comma seperated list of Location ID's to include. Defautls to All.</p>  
        <p>Example: [locations_grid include="41,42,43,44"]</p>
      </td>
    </tr>
   
  </table>

<?php }