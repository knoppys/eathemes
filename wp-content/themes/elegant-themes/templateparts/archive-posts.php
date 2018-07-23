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

