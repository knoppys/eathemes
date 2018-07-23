<?php
/******************
The post list and datatable layout
******************/
function elegant_list_properties_existing(){

	$args = array(
		'post_type' => 'property_emails',
		'posts_per_page' => -1
	);
	$emails = get_posts($args);
	
	ob_start(); ?>

	<div class="propertiesTable">		
	<div class="tableSearch">
		<h2>Search Properties</h2>
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
	</div>
	<table class="elegant_list_properties existing">
		
			<thead>
				<tr>
					<th>
						Title
					</th>
					<th class="name">
						Date
					</th>
					<th style="text-align:right;">
						Send again
					</th>									
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>
						Title
					</th>
					<th class="name">
						Date
					</th>
					<th>
						Send again
					</th>									
				</tr>
			</tfoot>
			<?php
			foreach ($emails as $email) { ?>
				<tr>
					<td class="link">
						<p><a href="<?php echo get_admin_url().'admin.php?page=elegant-emails&id='.$email->ID; ?>"><?php echo get_the_title($email->ID); ?></a></p>
					</td>					
					<td style="text-align:center">
						<p><?php echo get_the_date('Y/m/d',$email->ID); ?></p>
					</td>
					<td style="text-align:right">
						<form class="resend" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data">
							<?php /*main fields*/ ?>
							<input type="email" name="email">					
							<?php /* hidden fields for processing */ ?>
							<input type="hidden" name="action" value="resendemail">
							<input type="hidden" name="emailID" value="<?php echo $email->ID; ?>">
							<input class="button" type="submit" value="Send and Save">
						</form>
					</td>
				</tr>								
			<?php } ?>
		</tr>
	</table>
	</div>
	<script>
	function myFunction() {
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("elegant_list_properties");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }       
	  }
	}
	</script>

	<?php $content = ob_get_clean();
	return $content;
}

	
add_action( 'admin_post_resendemail', 'saveAndSend' );
function saveAndSend(){

	//Generate the email string for the elegantSend Function
	$to = $_POST['email'];
	$title = get_the_title($_POST['emailID']).' Copy';
	$messagetext = get_the_content($_POST['emailID']);
	$id = $_POST['emailID'];

    $noofprop = explode(',',get_post_meta($_POST['emailID'],'property_data', true));
    $properties = array();
    foreach ($noofprop as $item) {
    	
    	$notes = get_post_meta($id, 'propnotes_'.$item, true);
    	$price = get_post_meta($id, 'propprice_'.$item, true);

    	$array1 = array($item,$notes,$price);
    	$properties[] = $array1;

    }

    //Send the email and get a report back
	elegeantSend($to,$messagetext,$properties);
    
	//Save the email as a post and get a report back
	elegantSave($title,$to,$messagetext,$properties);   

	//redirect to the list emails screen. 
	wp_redirect(get_admin_url().'/admin.php?page=existing-elegant-emails');
	exit;

}