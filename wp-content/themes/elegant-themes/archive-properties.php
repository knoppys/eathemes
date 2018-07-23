<?php get_header(); ?>
<header>
	<section class="page-header" style=" background: url(<?php echo get_site_url(); ?>/wp-content/uploads/2018/07/Blog_header_elegant_address_barbados.jpg ) no-repeat center center scroll; 
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
				</div>
			</div>				
		</div>
	</section>
</header>	


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
			            		<img src="<?php echo $url; ?>">
								<?php if(get_post_meta($post->ID, 'on_special_offer',true) == '1'){ ?>
				    			<p class="offertext">On Special Offer</p>		
				    			<?php } ?>			 
			            	</ul>
						</a>
					</div>
				</div>
				<?php if($i % 2==0){echo '</div><div class="row">';} $i++; ?>
				<?php endwhile; else : ?>
				<div class="col-md-12">
					<center>
						<h3>Nothing found.</h3>
						<p>It looks like your search didn't return any results.</p>
						<p>Please try again or use the content form below for further assistance.</p>
					</center>
				</div>
				<?php endif; ?>
			</div>
		<?php echo knoppys_pagination(); ?>	
	</div>
</section>




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

<?php get_footer();