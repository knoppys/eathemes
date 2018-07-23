<?php get_header(); ?>
<?php 
//Variables for page header and term object.
$term = get_queried_object(); 
?>
<header>
	<section class="page-header" style=" background: url(<?php echo wp_get_attachment_url( get_term_thumbnail_id( $term->term_id ) ); ?>) no-repeat center center scroll; 
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="header-title">
						<?php single_term_title(); ?> 					
					</h1>
					<?php if (get_field('slogan',$term)) { echo '<h2 class="header-slogan">'; echo get_field('slogan',$term); echo '</h2>'; 
					} ?>	
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
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php 
/* Get the correct archive layout */
if ($term->taxonomy == 'locations') {	
	get_template_part('templateparts/tax-locations'); 
} else { 
	get_template_part('templateparts/archive-posts'); 
} 
get_footer();