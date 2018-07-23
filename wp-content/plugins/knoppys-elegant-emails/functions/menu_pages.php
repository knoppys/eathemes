<?php
/**********************
Add the main menu pages
**********************/
function add_menu(){
	add_menu_page( 'Elegant EMails', 'Elegant EMails', 'manage_options', 'elegant-emails', 'elegant_emails_new', 'dashicons-email-alt', 1 );
	add_submenu_page( 'elegant-emails', 'Existing EMails', 'Existing EMails', 'manage_options', 'existing-elegant-emails', 'elegant_emails_existing');
}
add_action('admin_menu', 'add_menu'); 

//Build the New Email Page
function elegant_emails_new() { ?>
	<div class="wrap">
		<h2>Elegant Emails</h2>		
		<?php echo new_email_form($_SERVER["QUERY_STRING"]); ?>
	 	<?php echo elegant_filters(); ?>
	 	<?php echo elegant_list_properties(); ?>
	</div>
	<div class="backtotop">Back to top</div>

<?php }

//Build the Existing Email page
function elegant_emails_existing() { ?>
	<div class="wrap">
		<h2>Existing Emails</h2>		
		<?php //echo new_email_form(); ?>
	 	<?php //echo elegant_filters(); ?>
	 	<?php echo elegant_list_properties_existing(); ?>	 	
	</div>
	<div class="backtotop">Back to top</div>

<?php }



