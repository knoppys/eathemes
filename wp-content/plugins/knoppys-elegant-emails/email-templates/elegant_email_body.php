<?php
/******************************************
Create an email body and output each property from the $propertites array
*******************************************/

function elegant_email_body($messagtext,$properties){ 

  ob_start(); ?>


<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
  <title></title><!--[if !mso]><!== -->
  <meta content="IE=edge" http-equiv="X-UA-Compatible"><!--<![endif]-->
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <style type="text/css">
   #outlook a { padding: 0; }  .ReadMsgBody { width: 100%; }  .ExternalClass { width: 100%; }  .ExternalClass * { line-height:100%; }  body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }  table, td { border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }  img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }  p { display: block; margin: 13px 0; }
  </style><!--[if !mso]><!-->
  <style type="text/css">
   @media only screen and (max-width:480px) {    @-ms-viewport { width:320px; }    @viewport { width:320px; }  }
  </style><!--<![endif]--><!--[if mso]><xml>  <o:OfficeDocumentSettings>    <o:AllowPNG/>    <o:PixelsPerInch>96</o:PixelsPerInch>  </o:OfficeDocumentSettings></xml><![endif]--><!--[if lte mso 11]><style type="text/css">  .outlook-group-fix {    width:100% !important;  }</style><![endif]--><!--[if !mso]><!-->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
  <style type="text/css">
         @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);    
  </style><!--<![endif]-->
  <style type="text/css">
  ul {margin:0px;padding: 0px;}
   @media only screen and (min-width:480px) {    .mj-column-per-100 { width:100%!important; }.mj-column-per-50 { width:50%!important; }  }
  }
  </style>
</head>
<body style="background: #FFFFFF;">
  <div class="mj-container" style="background-color:#FFFFFF;">
    <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
    <div style="margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size:0px;width:100%;">
        <tbody>
          <tr>
            <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
              <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
              <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                  <tbody>
                    <tr>
                      <td align="center" style="word-wrap:break-word;font-size:0px;padding:18px 18px 18px 18px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                          <tbody>
                            <tr>
                              <td style="width:384px;"><img alt="" height="auto" src="<?php /*Knoppys Elegant Variations Plugin*/ echo variations_email_logo(get_host()); ?>" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;" title="" width="384"></td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!--[if mso | IE]>      </td></tr></table>      <![endif]-->
            </td>
          </tr>
        </tbody>
      </table>
    </div><!--[if mso | IE]>      </td></tr></table>      <![endif]--><!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
    <div style="margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size:0px;width:100%;">
        <tbody>
          <tr>
            <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
              <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
              <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">                
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                  <tbody>
                    <tr>
                      <tr align="center">
                        <td align="left" style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;">
                          <?php 
                          //The code for this function is located in the plugin Knoppys Elegant Variations
                          echo variations_contact_details(get_host()); 
                          ?>
                        </td>
                      </tr>
                    </tr>
                  </tbody>
                </table>
              </div><!--[if mso | IE]>      </td></tr></table>      <![endif]-->
            </td>
          </tr>
        </tbody>
      </table>
    </div><!--[if mso | IE]>      </td></tr></table>      <![endif]--><!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size:0px;width:100%;">
      <tbody>
        <tr>
          <td>
            <div style="margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size:0px;width:100%;">
                <tbody>
                  <tr>
                    <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:14px 0px 14px 0px;">
                      <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
                      <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;">
                                <div style="cursor:auto;color:#000000;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:left;">
                                  <p><?php echo $messagtext; ?></p>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div><!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
      </tbody>
    </table><!--[if mso | IE]>      </td></tr></table>      <![endif]-->


<?php foreach ($properties as $property) { ?>
    <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
    <div style="margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size:0px;width:100%;">
        <tbody>
          <tr>
            <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
              <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
              <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                  <tbody>
                    <tr>
                      <td align="left" style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;">
                        <div style="cursor:auto;color:#000000;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:left;">
                          <p><a href="<?php echo get_the_permalink($property[0]); ?>" target="_blank" style="color:#bc8536;"><span style="color:#bc8536; font-size: 18px; line-height: 27px; font-weight: bold;margin-top:10px;"><?php echo get_the_title($property[0]); ?></span></a></p>
                        </div>        
                        <div style="cursor:auto;color:#bc8536;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:left;">
                          <p><span style="color:#bc8536; font-size: 16px; line-height: 27px; font-weight: bold;margin-top:10px;">Location: <?php echo location($property[0]); ?></span></p>
                        </div>   
                      </td>
                    </tr>                    
                    <tr>
                      <td align="center" style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                          <tbody>
                            <tr>
                            <?php
                            $imageurl = knoppys_property_header($property[0],get_post_meta($property[0],'image_1', true)); ?>
                            ?>
                              <td style="width:600px;padding:10px;"><img alt="" width="100%" height="auto" src="<?php echo $imageurl; ?>" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;"></td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!--[if mso | IE]>      </td></tr></table>      <![endif]-->
            </td>
          </tr>
        </tbody>
      </table>
    </div><!--[if mso | IE]>      </td></tr></table>      <![endif]--><!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
    <div style="margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size:0px;width:100%;">
        <tbody>
          <tr>
            <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
              <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:300px;">      <![endif]-->
              <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:50%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                  <tbody>
                    <tr>
                      <td align="left" style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;">
                        <div style="cursor:auto;color:#000000;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:left;">
                          <?php echo variations_email_ataglance(get_host(),$property[0]); ?>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!--[if mso | IE]>      </td><td style="vertical-align:top;width:300px;">      <![endif]-->
              <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:50%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                  <tbody>
                    <tr>
                      <td align="left" style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;">
                        <div style="cursor:auto;color:#000000;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:left;">
                            <p>Reference: <?php echo get_post_meta($property[0],'reference_code', true); ?><br>
                          	Property Type: <?php echo get_post_meta($property[0],'type_name', true); ?><br>
                            Location: <?php echo location($property[0]); ?><br>                             
                            <span style="font-weight:bold;">Price: <?php echo $property[2]; ?></span></p>                            
                            <?php echo variations_brochurelink(get_host(),$property[0]); ?> 
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!--[if mso | IE]>      </td></tr></table>      <![endif]-->
            </td>
          </tr>
        </tbody>
      </table>
    </div><!--[if mso | IE]>      </td></tr></table>      <![endif]--><!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
    <div style="margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size:0px;width:100%;">
        <tbody>
          <tr>
            <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
              <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
              <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                  <tbody>
                    <tr>
                      <td align="left" style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;">
                        <div style="cursor:auto;color:#000000;font-family:Arial,Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;text-align:left;">
                          <p><?php echo nl2br(rawurldecode(stripslashes($property[1]))); ?></p>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!--[if mso | IE]>      </td></tr></table>      <![endif]-->
            </td>
          </tr>
        </tbody>
      </table>
    </div><!--[if mso | IE]>      </td></tr></table>      <![endif]-->
    <?php } ?>

  </div>
</body>
</html>

<?php $content = ob_get_clean();
return $content;
};


//Get the properties location term / terms from the location taxonomy
function location($id){

  $terms = get_the_terms($id,'locations');
  foreach ($terms as $term) {
    echo $term->name;
    if (count($terms) > 1){
      echo ', ';
    }
  }

}