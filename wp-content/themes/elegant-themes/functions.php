<?php
//Register dashboard widgets
include 'inc/dashboard-widgets.php';

//Register content types
include 'inc/posttypes.php';

//Just some tweaks for performance
include 'inc/tweaks.php';

//Just some tweaks for performance
//include 'inc/htmlminify.php';

//Some content functions and shortcodes
include 'inc/content-tags.php';

//Include the brochure download function
//include 'inc/brochure-download.php';

//Include the DOMPDF FIles
include 'inc/dompdf/autoload.inc.php';

//Include the Livechat Script
include 'inc/livechat.php';

add_action('init', 'myStartSession');
function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

/***************************
* Load Styles and Scripts
****************************/
function scp_front_styles() {   

    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Halant"', false ); 
    wp_enqueue_style( 'wpb-google-fonts-open', 'https://fonts.googleapis.com/css?family=Open+Sans"', false ); 
    wp_register_style( 'style', get_stylesheet_uri().'?v='.time() );    
    wp_enqueue_style( 'style' ); 
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/core.js', array('jquery'), '?v='.time(), true );
    wp_localize_script( 'scripts', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
 
}
add_action( 'wp_enqueue_scripts', 'scp_front_styles' );
function load_custom_wp_admin_style() {
        wp_register_style( 'admin-styles', get_template_directory_uri() . '/inc/admin-styles.css', false, '1.0.0' );
        wp_enqueue_style( 'admin-styles' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/***************************
* Add jQuery to the wp_head()
****************************/
function insert_jquery(){
   wp_enqueue_script('jquery');
}
add_filter('wp_head','insert_jquery');

/***************************
* Enable Post Thumbnails
****************************/
add_theme_support( 'post-thumbnails' );

/***************************
* Load Menus
****************************/
register_nav_menus( array(
	'primary' => __( 'Primary' ),
) );

/***************************
* Register Sidebars
****************************/
$args1 = array(
	'name'          => __( 'Blog Sidebar' ),
	'id'            => 'sidebar-blog',
	'description'   => '',
    'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
); 
register_sidebar( $args1 );

/***************************
* Register Sidebars
****************************/
$args2 = array(
  'name'          => __( 'Footer Sidebar' ),
  'id'            => 'sidebar-footer',
  'description'   => '',
  'class'         => '',
  'before_widget' => '<div id="%1$s" class="widget %2$s col-md-12">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="footer-widgettitle">',
  'after_title'   => '</h4>' 
); 
register_sidebar( $args2 );



/*************************************
Customsise the wp menu
Add and remove links in the wp menu to give you
a cleaner back end interface without a plugin.
*************************************
function remove_menus(){
  
  remove_menu_page( 'index.php' );                  
  remove_menu_page( 'edit-comments.php' );
  remove_menu_page( 'themes.php' );
  remove_menu_page( 'plugins.php' );
  remove_menu_page( 'tools.php' );
  remove_menu_page( 'options-general.php' );
  remove_menu_page( 'edit.php?post_type=acf' );
  
  
}
add_action( 'admin_menu', 'remove_menus' );
*/

/***************************
* Version 5 now uses get_nav_menu_items() insstead of wp_nav_menu()
* so technically we dont need this.
* It was used up to V4 with the bootstrap walker.
* It still has benefiots if you chose to use wp_nav_menu() anywhere else so Ill leave it in.
* **************************
* Ive used the following to remove all the
* junk classes wordpress adds to the tree
****************************/
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}

add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args) {
    return array();
}


function dynamic_select_list($tag, $unused){ 
    $options = (array)$tag['options'];

    foreach ($options as $option) 
        if (preg_match('%^term:([-0-9a-zA-Z_]+)$%', $option, $matches)) 
            $term = $matches[1];

    //check if post_type is set
    if(!isset($term))
        return $tag;

    $taxonomy = get_terms(array('taxonomy' => $term, 'hide_empty' => false));

    if (!$taxonomy)  
        return $tag;

    foreach ($taxonomy as $cat) {  
        $tag['raw_values'][] = $cat->name;  
        $tag['values'][] = $cat->name;  
        $tag['labels'][] = $cat->name;
    }


    return $tag; 
}
add_filter( 'wpcf7_form_tag', 'dynamic_select_list', 10, 2);

/************************
Order property archive pages by level
**************************************/
function knoppys_archive_order($query){

  if( is_admin() || !$query->is_main_query() )
    return;

  if (is_tax('locations')) {
    $query->set('meta_key', 'level');
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'order', 'ASC' );
  }
}
add_action('pre_get_posts','knoppys_archive_order');

/************************
Reset session vars when opening the search
*******************************************/
function knoppys_session_reset(){

  session_destroy();

}
add_action("wp_ajax_knoppys_session_reset", "knoppys_session_reset");
add_action("wp_ajax_nopriv_knoppys_session_reset", "knoppys_session_reset");

/*************************************
Customsise the wp menu
Add and remove links in the wp menu to give you
a cleaner back end interface without a plugin.
************************************
function remove_menus(){
  
  remove_menu_page( 'index.php' );                  
  remove_menu_page( 'edit-comments.php' );
  //remove_menu_page( 'themes.php' );
  remove_menu_page( 'plugins.php' );
  remove_menu_page( 'tools.php' );
  remove_menu_page( 'options-general.php' ); 
  
}
function remove_custom_items() {
  remove_menu_page( 'edit.php?post_type=acf-field-group' );
  remove_menu_page( 'admin.php?page=wpinked-widgets' );  
  remove_menu_page( 'admin.php?page=manage-properties' ); 
  remove_menu_page( 'cptui_main_menu' ); 
  //remove_menu_page( 'wpcf7' );
}
add_action( 'admin_menu', 'remove_menus' );
add_action( 'admin_init', 'remove_custom_items',999 );
*/

/************************
This will filter posts for the  search
************************/
function knoppys_pre_get_filter($query){ 
 
  if (!is_admin() && $query->is_post_type_archive('properties')) { 

   

    /**************
    The meta array is quite large so we need to build it
    *****************************************************/
    $meta_query = array('relation' => 'BETWEEN');
    $tax_query = array();

              /*****************
              Setup the location filter
              *****************************/
              if (!$_POST['location'] == '') {       
                $location = $_POST['location']; 
                $tax_query[] = array(
                  array(
                    'taxonomy'  =>  'locations',
                    'field'     =>  'id',
                    'terms'     =>  array($location)
                  )
                );                 
                $_SESSION['location'] = $location;

              } elseif(isset($_SESSION['location'])) { 

                $location = $_SESSION['location']; 
                $tax_query[] = array(
                  array(
                    'taxonomy'  =>  'locations',
                    'field'     =>  'id',
                    'terms'     =>  array($location)
                  )
                );                 
              }

              /*****************
              Setup the journey tax query if its stipulated in the shortcode
              *****************************/
              if (isset($_POST['journey'])) {       
                $servicetype = $_POST['journey']; 
                $tax_query[] = array(
                  array(
                    'taxonomy'  =>  'servicetype',
                    'field'     =>  'slug',
                    'terms'     =>  array($servicetype)
                  )
                );                
                $_SESSION['servicetype'] = $servicetype;

              } elseif(isset($_SESSION['servicetype'])) { 

                $servicetype = $_SESSION['servicetype']; 
                $tax_query[] = array(
                  array(
                    'taxonomy'  =>  'servicetype',
                    'field'     =>  'slug',
                    'terms'     =>  array($servicetype)
                  )
                );                
              }

              /*****************
              Setup the type filter
              *****************************/
              if (!$_POST['type'] == '') { 

                $type = $_POST['type']; 
                $type_query = array(       
                  'meta_key'  =>  'type_name',
                  'value'     =>  array($type)              
                );
                array_push($meta_query, $type_query);        
                $_SESSION['type'] = $type;

              } elseif(isset($_SESSION['type'])) { 

                $type = $_SESSION['type']; 
                $type_query = array(       
                  'meta_key'  =>  'type_name',
                  'value'     =>  array($type)           
                );
                array_push($meta_query, $type_query);
              }          






              /*****************
              Setup the number of bedrooms filter
              *************************************/
              if (!$_POST['bedfrom'] == '') { 

                $bedfrom = $_POST['bedfrom'];  
                $bedfrom_query = array(
                  'meta_key'  =>  'number_of_beds',
                  'value'     =>  $bedfrom,
                  'type'    => 'numeric',
                 
                );
                array_push($meta_query, $bedfrom_query); 
                $_SESSION['bedfrom'] = $bedfrom;

              } elseif(isset($_SESSION['bedfrom'])) { 

                $bedfrom = $_SESSION['bedfrom']; 
                $bedfrom_query = array(
                  'meta_key'  =>  'number_of_beds',
                  'value'     =>  $bedfrom,
                  'type'    => 'numeric',
                  
                );
                array_push($meta_query, $bedfrom_query);     
              }    

              /*****************
              Setup the number of bedrooms filter
              *************************************/
              if (!$_POST['bedto'] == '') { 

                $bedto = $_POST['bedto'];  
                $bedto_query = array(
                  'meta_key'  =>  'number_of_beds',
                  'value'     =>  $bedto,
                  'type'    => 'numeric',
                  
                );
                array_push($meta_query,$bedto_query);
                $_SESSION['bedto'] = $bedto;

              } elseif(isset($_SESSION['bedto'])) { 

                $bedto = $_SESSION['bedto']; 
                $bedto_query = array(
                  'meta_key'  =>  'number_of_beds',
                  'value'     =>  $bedto,
                  'type'    => 'numeric',
                  
                );
                array_push($meta_query, $bedto_query );
              }   








              /*****************
              Setup the reference filter. This is actually the title
              ***************************************************************/
              if (!$_POST['ref'] == '') { 

                $ref = $_POST['ref'];  
                $query->set( 's', $ref );
                $_SESSION['ref'] = $ref;

              } elseif(isset($_SESSION['ref'])) { 

                $ref = $_SESSION['ref']; 
                $query->set( 's', $ref );
              }   

    
    //Setup the main meta query    
    $query->set( 'meta_query', $meta_query); 
    
    //Setup the main tax query    
    $query->set( 'tax_query', $tax_query); 
   
    //Only get Published (Not private) posts
    $query->set('post_status', 'publish');

  } elseif (!is_admin() && $query->is_archive('properties') && !isset($_POST['issearch'])) {

    //Only get Published (Not private) posts
    $query->set('post_status', 'publish');
    
  }  
  
}
add_action('pre_get_posts', 'knoppys_pre_get_filter');




/*****************
Download the brochure PDF
****************************/

function download_callback(){
    //Post details
    $ID = $_POST['ID'];
    $meta = get_post_meta($ID);
    $title = get_the_title($ID);
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
			array_push($imagesarray, get_template_directory().'/images/property-images/'.$image);
		}
	}		
		
	if (get_field('property_image_gallery',$ID)) {
    	$rows = get_field('property_image_gallery',$ID);
      	foreach ($rows as $row) {
          array_push($imagesarray, get_attached_file($row['property_image']['id']));          
      	}
    }

    ob_start(); ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8"/>
        <title><?php echo $title; ?></title>
        <style>
            @page { margin: 150px 50px 150px 50px; }
            header { position: fixed; top: -140px; left: 0px; right: 0px;text-align:center;}
            footer { position: fixed; bottom: 25px; left: 0px; right: 0px; text-align:center;}
            footer p {color#806203;}
            ul li {color#806203;}
            ul {
            list-style: none;            
            columns: 2;
            text-align: center;
            padding: 0;
           }
           h1,h2,h3,h4,h5{
            color: #BC8536 !important;
           }
            .page_break { page-break-before: always; }
            body {
              font-family:Verdana;
            }
      </style>
    </head>
        <body>
        <header>
            <div style="text-align:center;">
                <img style="margin:0 0 10px 0;" src="<?php echo get_template_directory(); ?>/images/logo.png"/>
                <h3 style="font-family: arial; color: #BC8536;margin: 0px 0 0px 0;"><?php echo $title; ?></h3>
            </div>
        </header>
        <footer>            
            <div style="text-align:center;">
                <a href="http://www.elegant-address.com" target="_blank" style="color:#7da9c1;">http://www.elegant-address.com</a>
                <p style="color:#bbb;">Part of the Elegant Address Luxury Property Group Ltd. Details are for reference only and non contractual. <br> 0044 (0)1244 62 99 63 or 0044 (0)2037 57 66 09 </p>
            </div>
        </footer>
        <?php foreach ($imagesarray as $image) { ?>
            <div style="width:640px;overflow:hidden;margin: 0 auto;text-align:center;">               
                <img style="width:100%;height:450px;margin: 0px 0 0px 0;" src="<?php echo $image; ?>" />
                <?php echo knoppys_ataglance($meta, $ID); ?>
            </div>
        <?php } ?>
        <div class="page_break"></div>
        <div style="font-size: 12px !important;color:#6a6a6a;">
            <?php $content = apply_filters('the_content', get_post_field('post_content', $ID)); 
            echo $content; ?>
            <?php echo knoppys_featuresandamenities($meta, $ID); ?>
        </div>


        </body>
    </html>

    <?php
    $content = ob_get_clean();
    

    $options = new  Dompdf\Options();
    $options->set('defaultFont', 'Courier');
    $options->set('default_paper_size', 'A4');
    $options->setIsRemoteEnabled(true);


    $filename = preg_replace("/[^a-zA-Z]+/", "", $title);
    
    $dompdf = new Dompdf\Dompdf();
    $dompdf->set_option('isHtml5ParserEnabled', true);
    $dompdf->load_html($content);
    $dompdf->render();
    $dompdf->stream($filename.  '.pdf');

    
    exit;
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
           window.top.close(); 
        });
    </script>
    
<?php }

add_action('admin_post_knoppys_brochure_download', 'download_callback');
add_action('admin_post_nopriv_knoppys_brochure_download', 'download_callback');


/**************
Set the number of admin columns
**********************************/
function jmo_screen_layout_columns($columns) {
  $columns['dashboard'] = 2;
  
  return $columns;
}

add_filter('screen_layout_columns', 'jmo_screen_layout_columns');

function jmo_screen_layout_dashboard() { 
  return 2; 
}

add_filter('get_user_option_screen_layout_dashboard', 'jmo_screen_layout_dashboard');

//Remove 3 dots from excerpt
function new_excerpt_more( $more ) {
  return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


