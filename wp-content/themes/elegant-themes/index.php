<?php
//get the header
get_header(); 

?>
<header>
<?php $ID = $wp_query->queried_object->ID; 
if (has_post_thumbnail($wp_query->queried_object->ID)) {
	$url = get_the_post_thumbnail_url($ID);
} else {
	$url = get_site_url().'/wp-content/uploads/2018/05/STANFORD-HOUSE-CHAPEL-AT-SUNSET_Elegant-Address-Barbados-1500x963.jpg';
}

?>
	<section class="page-header" style=" background: url(<?php echo $url; ?>) no-repeat center center scroll; 
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="header-title">
						<?php echo get_the_title($ID); ?> 					
					</h1>						
				</div>
			</div>				
		</div>
	</section>
</header>
<section class="content">
	<div class="container">
		<div class="row">
			<?php $i = 1; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div class="col-md-6">
					<a class="postlink" href="<?php the_permalink(); ?>">
						<div class="row">
							<div class="col-md-12 postthumb">
								<?php the_post_thumbnail(); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2><?php the_title(); ?></h2>
								<div class="excerpt"><?php the_excerpt(); ?></div>
							</div>
						</div>
					</a>
				</div>
				<?php if($i % 2==0){echo '</div><div class="row">';} ?>
				<?php $i++; ?>

			<?php endwhile; else : ?>

			<section class="indexform">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<center>
								<h3 class="widget-title">We're sorry.</h2>
								<p>But it looks like this page has been moved, is private or doesn't exist.</p>
								<p>If you need further assistance, please get in touch.</p>
							</center>
						</div>
					</div>
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