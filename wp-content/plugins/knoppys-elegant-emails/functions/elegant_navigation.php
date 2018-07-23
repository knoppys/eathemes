<?php
/******************
The admin navigation
******************/
function elegant_navigation(){
	
	ob_start(); ?>

	<table class="elegant_navigation">
		<tr>
			<td><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=elegant-emails">New EMail</a></td>
			<td><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=existing-elegant-emails">Existing EMails</a></td>
		</tr>
	</table>

	<?php $content = ob_get_clean();
	return $content;
}