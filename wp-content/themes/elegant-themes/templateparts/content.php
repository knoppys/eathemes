<?php /*This is the content part*/ ?>
<header>
	<?php the_title('<h1 class="page-title">','<h1>'); ?>
</header>
<?php the_content(); ?>
<footer class="post-footer">
	<?php $date = the_date(); ?>
	<time datetime="<?php echo $date; ?>">Posted On: <?php echo $date; ?></time>
	<p class="byline author">Posted By: <?php echo get_the_author_link(); ?></p>	
</footer>

