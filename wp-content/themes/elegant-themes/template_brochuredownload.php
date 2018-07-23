  <?php
  /*
  Template name: Brochure Download
  */
  get_header();
  //Post details
  $ID = $_GET['brochure_id']; 
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
                <ul style="padding:20px 0;margin:0;">
                <?php echo knoppys_pricing($ID); ?> 
                <li>Bedrooms: <?php echo $meta['bedrooms'][0]; ?></li>
                <li>Bathrooms: <?php echo $meta['number_of_baths'][0]; ?></li>
                  <?php if($meta['air_con_full'][0] == 1 && $meta['air_con_partial'][0] == 0){ ?>
                      <li>Full Air Con</li>
                  <?php } elseif($meta['air_con_full'][0] == 0 && $meta['air_con_partial'][0] == 1){?>
                      <li>Partial Air Con</li>
                  <?php } ?>
                  <!-- Beach Access -->
                    <?php if($meta['beach_access'][0] == 1){ ?>
                        <li>Beach Access</li>
                    <?php } ?>
                    <!-- Guardian -->
                    <?php if($meta['guardian'][0] == 1){ ?>
                        <li>Guardian</li>
                    <?php } ?>
                    <!-- Gym -->
                    <?php if($meta['gym'][0] == 1){ ?>
                        <li>Gym</li>
                    <?php } ?>
                    <!-- Heated Pool -->
                    <?php if($meta['gym'][0] == 1){ ?>
                        <li>Heated Pool</li>
                    <?php } ?>
                    <!-- Heli Pad -->
                    <?php if($meta['helipad'][0] == 1){ ?>
                        <li>Heli Pad</li>
                    <?php } ?>
                    <!-- Indoor Pool -->
                    <?php if($meta['indoor_pool'][0] == 1){ ?>
                        <li>Indoor Pool</li>
                    <?php } ?>
                    <!-- Sea View -->
                    <?php if($meta['sea_view'][0] == 1){ ?>
                        <li>Sea View</li>
                    <?php } ?>
                    <!-- Panoramic Sea View -->
                    <?php if($meta['panoramic_sea_view'][0] == 1){ ?>
                        <li>Panoramic Sea View</li>
                    <?php } ?>
                    <!-- Parking -->
                    <?php if($meta['parking'][0] == 1){ ?>
                        <li>Parking</li>
                    <?php } ?>
                    <!-- Sky TV -->
                    <?php if($meta['sky_tv'][0] == 1){ ?>
                        <li>Sky TV</li>
                    <?php } ?>
                    <!-- Spa -->
                    <?php if($meta['spa'][0] == 1){ ?>
                        <li>Spa</li>
                    <?php } ?>
                    <!-- Tennis -->
                    <?php if($meta['tennis'][0] == 1){ ?>
                        <li>Tennis</li>
                    <?php } ?>
                    <!-- Tennis -->
                    <?php if($meta['tennis'][0] == 1){ ?>
                        <li>Tennis</li>
                    <?php } ?>
                    <!-- Walk to Beach -->
                    <?php if($meta['walk_to_beach'][0] == 1){ ?>
                        <li>Walk to Beach</li>
                    <?php } ?>
                    <!-- Walk to Shop -->
                    <?php if($meta['walk_to_shop'][0] == 1){ ?>
                        <li>Walk to Shop</li>
                    <?php } ?>
                    <!-- WiFi -->
                    <?php if($meta['wifi'][0] == 1){ ?>
                        <li>WiFi</li>
                    <?php } ?>                      
                </ul>
            </div>
        <?php } ?>
        <div class="page_break"></div>
        <h2>Description</h2>
        <div style="font-size: 12px !important;color:#6a6a6a;">
            <?php $content = apply_filters('the_content', get_post_field('post_content', $ID)); 
            echo $content; ?>
        </div>


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
    <?php get_footer();