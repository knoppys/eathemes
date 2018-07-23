<?php
/*
Plugin Name:       Knoppys Logged In Redirect
Plugin URI:        https://www.knoppys.co.uk
Description:       This plugin will redirect all subscribers to the desired page when the login. 
Version:           5
Author:            Knoppys Digital Limited
License:           GNU General Public License v2
License URI:       http://www.gnu.org/licenses/gpl-2.0.html
*/

function my_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    if (isset($user->roles) && is_array($user->roles)) {
        //check for subscribers
        if (in_array('subscriber', $user->roles)) {
            // redirect them to another URL, in this case, the homepage 
            $redirect_to = get_site_url().'/the-igloo-chill-zone2/';
        }
    }
    return $redirect_to;
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );