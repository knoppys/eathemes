<?php
//get the header
get_header(); 
$id = get_the_id();
$meta = get_post_meta($id);
$header_image = knoppys_property_header($id,$meta['image_1'][0]);

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="page-header" style="background: url(<?php echo $header_image; ?>) no-repeat center center scroll; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
  	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="header-title post-title">
					<?php the_title(); ?>					
				</h1>
				<h2 class="header-slogan">
					Luxury <?php echo $meta['type_name'][0]; ?> in <?php echo knoppys_location_name($post->ID); ?>					
				</h2>	
			</div>
		</div>		
	</div>	
</section>	

<section class="content-single single-properties">
	<article class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="col-container">
					<div class="col-left">
						<?php echo knoppys_property_slider($id); ?>	
						<?php echo knoppys_property_slider_navigation($id); ?>				
					</div>
					<div class="col-right">
						
							<div class="widget hide">
								<h2 class="widget-title"><?php the_title(); ?></h2>
							</div>
							
							<?php if(get_post_meta($id, 'on_special_offer',true) == '1'){ ?>
								<div class="col-container">
									<div class="widget col-left">
										<?php echo knoppys_ataglance($meta, $id); ?>
									</div>
									<div class="widget col-right">
										<h3>Special Offer</h3>
										<p><?php echo $meta['special_offer_description'][0]; ?></p>
										<div class="prices-from"><?php echo $meta['special_offer_price'][0]; ?></div>
									</div>
								</div>
							<?php } else { ?>								
								<div class="widget">								
									<?php echo knoppys_ataglance($meta, $id); ?>	
								</div>
							<?php } ?>

							<div class="widget talkto">
								<h3>Talk to our luxury <?php echo $meta['type_name'][0]; ?> experts<br>
								<a href="tel:+441244629963">+44 (0) 1244 629 963</a></h3>
							</div>
								<div class="widget featureswidget">					
								<?php echo knoppys_featuresandamenities($meta, $id); ?>
								<?php echo knoppys_brochure_download($id); ?>
								<?php
								if ($_GET['request'] == 'brochure') { 							

									?>
									<script type="text/javascript">										
										jQuery(document).ready(function(){
											jQuery('#brochuresubmit').trigger('click');
										})								
									</script>
								<?php } ?>
							</div>		
						
						
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 content">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="quote-form">
					<h3 class="widget-title">Request a Quote</h3>
					<?php echo do_shortcode('[contact-form-7 id="1697" title="Request A Quote"]'); ?>
				</div>
			</div>
		</div>
	</article>
</section>


<?php if (get_field('similar_properties')) { echo knoppys_similar_properties($id); } ?>

<?php endwhile; else : ?>

<section class="">
	<div class="container">
		<div class="row">
			<div class="col-md-12 inlineform">
				<h3 class="widget-title">Get in Touch</h3>
				<?php echo do_shortcode('[contact-form-7 id="450" title="General Enq."]'); ?>
			</div>
		</div>
	</div>
</section>

<?php endif;
//get the footer
get_footer();
