<?php get_header(); ?>
<header>
	<?php $url = wp_get_attachment_image_src( get_term_thumbnail_id( $wp_query->queried_object->term_id ), 'large' );?>
	<section class="page-header" style=" background: url(<?php echo $url[0]; ?>) no-repeat center center scroll; 
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="header-title">
						Luxury Properties in Barbados
					</h1>	
					<?php if (get_field('slogan', $wp_query->queried_object)) { ?>
						<h2 class="header-slogan"><?php echo get_field('slogan', $wp_query->queried_object); ?></h2>	
					<?php } ?>							
				</div>
			</div>				
		</div>
	</section>
</header>	

<section class="quote-form">
	<div class="container">
		<div class="row">
			<div class="">
				<h3 class="widget-title">Request a Quote</h3> <div class="textwidget"><p style="text-align: center;">Only a small selection of properties are features on our website. We have an extensive portfolio of luxury properties you won’t find elsewhere, allowing us to present you with the most exclusive villas and apartments. Contact our experienced Barbados Consultants today.</p><h3 class="goldtext" style="text-align: center;"><a href="tel:01244629963">+44 (0) 1244 629 963</a></h3>
				<?php echo do_shortcode('[contact-form-7 id="1697" title="Request A Quote"]'); ?>
			</div>
		</div>
	</div>
</section>

<?php if (get_field('term_cta', $wp_query->queried_object)) { ?>
	
	<section class="cotent goldtext" style="padding-top:5%">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<center>
						<?php echo get_field('term_cta', $wp_query->queried_object); ?>		
					</center>
				</div>
			</div>				
		</div>
	</section>

<?php } ?>

<section class="content">
	<div class="container-fluid">		
			<div class="row">				
				<?php $i = 1; if ( have_posts() ) : while ( have_posts() ) : the_post(); $meta = get_post_meta($post->ID)?>
				<div class="col-md-6">
			        <div class="property-grid-content <?php if(get_post_meta($post->ID, 'on_special_offer',true) == '1'){echo 'specialoffer';} ?>">				
			            <a href="<?php echo get_permalink($post->ID); ?>">
			            	<span class="goldtext"><h2><?php the_title(); ?></h2></span>
			            	<?php $terms = get_the_terms($post->ID, 'locations'); ?>
			            	<ul class="locations_list"><?php foreach($terms as $term){ ?>
			         			<li><h3 class="goldtext"><?php echo $term->name; ?></h3></li>
			            	<?php } ?></ul>
			            	<ul class="main_features">
			            		<li>Number of Bedrooms: <?php echo $meta['number_of_beds'][0]; ?></li>
			            		<li>Number of Bathrooms: <?php echo $meta['number_of_baths'][0]; ?></li>
			            		<?php if($meta['sleeps'][0]){ ?>
									<li>Sleeps: <?php echo $meta['sleeps'][0]; ?> </li>
								<?php } ?>
								<?php $url = knoppys_property_header($post->ID,$meta['image_1'][0]); ?>
			            		<div class="imageoverlay" style=" background: url(<?php echo $url; ?>) no-repeat center center scroll; 
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;">
			            			
			            		</div>
								<?php if(get_post_meta($post->ID, 'on_special_offer',true) == '1'){ ?>
				    			<p class="offertext">On Special Offer</p>		
				    			<?php } ?>			 
			            	</ul>
						</a>
					</div>
				</div>
				<?php if($i % 2==0){echo '</div><div class="row">';} $i++; ?>
				<?php endwhile; else : 
				//if there isnt any content, show this.	
				echo '<p> Sorry, no posts matched your criteria. </p>';
				//end the loop
				endif; ?>
			</div>
		<?php echo knoppys_pagination(); ?>	
	</div>
</section>

<?php if (get_field('term_long_description', $wp_query->queried_object)) { ?>
	
	<section class="content" style="padding-top:0;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php echo get_field('term_long_description', $wp_query->queried_object); ?>		
				</div>
			</div>				
		</div>
	</section>




<?php } ?>

<?php get_footer();