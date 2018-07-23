<?php
/***************
Get the selected ID's and post them over to wp_mail();
***************/

function new_email_form($id){

	//If we are editing an existing email, get the email content for the form
	$emailsQuery = $id;
	parse_str($emailsQuery, $query_array);
	if (array_key_exists('id', $query_array)) {
		
		$emails = get_post_meta($query_array['id'], 'property_sent_to_emails', true);
		$title = get_the_title($query_array['id']);
		$content = get_post_field( 'post_content', $query_array['id']);

	} else {

		$emails = '';
		$title = '';
		$content = 'Your message here';

	}
	

	ob_start(); ?>

		<table class="new_email_form" width="100%">
			<tbody>
				<tr>
					<td valign="top">
						<table width="100%">
							<tbody>
								<tr>
									<td colspan="2">
										<h3>Email Form</h3>							
									</td>
								</tr>
								<tr>
									<form class="new_email_form" name="new_email_form">
									<td>						
										<p><label>Email recipient/s</label></p>
										<input type="email" name="email" multiple class="email" value="<?php if($emails){echo $emails;} ?>">
										<p><label>Title of the email when saved</label></p>
										<input type="text" name="title" class="title" value="<?php if($title){echo $title;} ?>">							
										<p><label>Email Body</label></p>
										<?php wp_editor($content, 'emailMessage', array('textarea_name'=>'emailMessage','teeny'=>true))		; ?>

										<!-- Hidden sections -->
										<input type="hidden" name="ids" class="ids">
										<p><label>Ready? Click to save and send your email.</label></p>
										<span class="button" id="emailSubmit">Save and Send</span>	

									</td>					
									</form>
								</tr>
							</tbody>
						</table>
					</td>					
				</tr>
			</tbody>
		</table>
		

	<?php $content = ob_get_clean();
	return $content;

}
