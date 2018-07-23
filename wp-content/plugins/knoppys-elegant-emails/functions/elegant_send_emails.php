<?php
/************************
This sends the client presentation out
Posted array for ref:
[datastring] => Array(
    [newEmailForm] => Array(
        [0] => Array(
                [0] => email
                [1] => title
                [2] => Youe message here
            )
        )

        [properties] => Array(
            [0] => Array(
                [0] => the property ID
                [1] => The property notes entered into the notes textarea
                [2] => The property price enetered into the price input
            )              
        )
)
************************/

/************************
Add the ajax function in that 
powers the email and send functions
************************/
add_action( 'wp_ajax_elegantSendEmail', 'elegantSendEmail' );
function elegantSendEmail() {

	//Get the array sent
	$to = $_POST['datastring']['newEmailForm'][0][0];
	$title = $_POST['datastring']['newEmailForm'][0][1];
    $messagetext = nl2br(rawurldecode($_POST['datastring']['newEmailForm'][0][2]));        
	$properties = $_POST['datastring']['properties'];

    //Send the email and get a report back
	$sent = elegeantSend($to,$messagetext,$properties);
    
	//Save the email as a post and get a report back
	$saved = elegantSave($title,$to,$messagetext,$properties);

    //echo 'Email Status:'.$sent.'<br>Save Status:'.$saved;
	
	//Terminate and provide a response. 
	wp_die(); 
}

/*******************************************
Send the email out and generate a response
*******************************************/
function elegeantSend($to,$messagetext,$properties){
	
    $message = elegant_email_body($messagetext,$properties);
    $fromAddress = variations_from_address(get_host());
    $subject = variations_email_subject(get_host());

    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = $fromAddress;
    

    $mailClient = wp_mail($to, $subject, $message, $headers );

    if ($mailClient) {
        echo 'Your email has been sent';
    } else {
        echo 'Your email was not sent, there was an error. Please check the recipient details and try again.';
    }
    

}

/*******************************************
Create a post using parts of the email and the 
list of apartments and their notes as meta array
*******************************************/
function  elegantSave($title,$to,$messagetext,$properties){

    //Create the new post
    $postbasics = array(
        'post_type' => 'property_emails',
        'post_title' => $title,
        'post_content' => $messagetext,
        'post_status' => 'publish'      

    );
    $newProperyEmail = wp_insert_post($postbasics);   

    //Add the email meta
    $to = update_post_meta($newProperyEmail, 'property_sent_to_emails', $to);

    //Create an array of property IDs and add then as a single meta string
    $idArray = array();
    foreach ($properties as $property) {
        $idArray[] = $property[0];
    }
    $propertyString = implode(',', $idArray);
    $update = update_post_meta($newProperyEmail, 'property_data', $propertyString);

    //Add the property list meta
    $i = 0;
    foreach ($properties as $property) {

        //Add the property notes
        update_post_meta($newProperyEmail, 'propnotes_'.$property[0], $property[1]);

        //Add the property price
        update_post_meta($newProperyEmail, 'propprice_'.$property[0], $property[2]);

        //Add the item index to order the posts in the same order when reloaded in the saved table
        update_post_meta($newProperyEmail, 'savedorder_'.$property[0], $i);     
        $i++; 
    } 
}
