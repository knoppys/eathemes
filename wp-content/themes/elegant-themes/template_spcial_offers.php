<?php
/*
Template Name: Special Offers
*/
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
$sliderfield = get_field('slides'); ?>

<section>
	<div class="headerSlide">
		<?php foreach ($sliderfield as $slide) { ?>
			<div class="slidecontent" style=" background: url(<?php echo $slide['header_background_image']['sizes']['large']; ?>) no-repeat center center scroll; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="header-title">
								<?php if ($slide['header_title_text']) { echo $slide['header_title_text']; } else { echo the_title(); } ?>					
							</h1>
							<?php if ($slide['header_slogan_text']) { echo '<h2 class="header-slogan">'; echo $slide['header_slogan_text']; echo '</h2>'; } ?>	
						</div>
					</div>
					<?php
					if (get_field('slider_buttons')) { ?>
						<div class="row">
							<div class="col-md-12">
								<nav class="home-slider-nav">
									<?php $buttonarray = get_field('slider_buttons');
										foreach ($buttonarray as $button) { echo '<a class="btn btn-primary"href="'.$button['button_link'].'">'.$button['button_text'].'</a>'; }
									?>
								</nav>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
</section>

<section class="">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>
	
</section>

<section class="content">
	<div class="container-fluid">		
		<div class="row">
			<?php $args = array(
				'post_type' => 'properties',
				'meta_key' => 'on_special_offer',
				'meta_value' => '1',
				'posts_per_page' => -1
			);
			$offers = get_posts($args); ?>
			<?php $i = 1; foreach ($offers as $offer) { ?>				
				<div class="col-md-6">
			            <div class="property-grid-content <?php if(get_post_meta($offer->ID, 'on_special_offer',true) == '1'){echo 'specialoffer';} ?>">					
				            <a href="<?php echo get_permalink($offer->ID); ?>">
				            	<span class="goldtext"><h2><?php echo get_the_title($offer->ID); ?></h2></span>
				            	<?php $terms = get_the_terms($offer->ID, 'locations'); ?>
				            	<ul class="locations_list"><?php foreach($terms as $term){ ?>
				         			<li><h3 class="goldtext"><?php echo $term->name; ?></h3></li>
				            	<?php } ?></ul>
				            	<ul class="main_features">
				            		<li>Number of Bedrooms: <?php echo get_post_meta($offer->ID,'number_of_beds',true); ?></li>
				            		<li>Number of Bathrooms: <?php echo get_post_meta($offer->ID,'number_of_baths',true); ?></li>
				            		<?php if(get_post_meta($offer->ID,'sleeps',true)){ ?>
										<li>Sleeps: <?php echo get_post_meta($offer->ID,'sleeps',true); ?> </li>
									<?php } ?>
									<?php $url = knoppys_property_header($offer->ID,get_post_meta($offer->ID,'image_1',true)); ?>
				            		<img src="<?php echo $url; ?>">
									<?php if(get_post_meta($offer->ID, 'on_special_offer',true) == '1'){ ?>
					    			<p class="offertext">On Special Offer</p>		
					    			<?php } ?>			 
				            	</ul>

							</a>
						</div>
					</div>
				<?php if($i % 2==0){echo '</div><div class="row">';} ?>
			<?php $i++;} ?>
		</div>
	</div>
</section>

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();