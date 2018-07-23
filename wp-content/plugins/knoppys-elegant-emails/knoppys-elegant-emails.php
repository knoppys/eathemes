<?php
/*
Plugin Name:       Knoppys Elegant Emails
Plugin URI:        https://github.com/knoppys/knoppys-elegant-emails.git
Description:       This plugin allows the user to curate property recommendation emails, save and send them. For help and support, please contact coda@knoppys.co.uk
Version:           14
Author:            Knoppys Digital Limited
License:           GNU General Public License v2
License URI:       http://www.gnu.org/licenses/gpl-2.0.html
GitHub Plugin URI: https://github.com/knoppys/knoppys-elegant-emails.git
GitHub Branch:     master
*/

/***************************
*Load Native & Custom wordpress functionality plugin files. 
****************************/
foreach ( glob( dirname( __FILE__ ) . '*.php' ) as $root ) {
    require $root;
}

foreach ( glob( dirname( __FILE__ ) . '/functions/*.php' ) as $root ) {
    require $root;
}

foreach ( glob( dirname( __FILE__ ) . '/email-templates/*.php' ) as $root ) {
    require $root;
}


/***************************
* Load SCP Scripts
****************************/
function elegant_scripts() {    

	//wp_register_style( 'datatablessCss', plugin_dir_url( __FILE__ ) . 'css/datatables.min.css', false, '1.0.0' );
	//wp_enqueue_style( 'datatablessCss' );  

	wp_register_style( 'cssCore', plugin_dir_url( __FILE__ ) . 'css/core.css', false, '1.0.0' );
	wp_enqueue_style( 'cssCore' );  
    
    //wp_enqueue_script( 'datatables', plugin_dir_url( __FILE__ ) . 'js/datatables.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery-ui-sortable' );   
    wp_enqueue_script( 'jsCore', plugin_dir_url( __FILE__ ) . 'js/core.js', array(), '1.0.0', true );
    wp_localize_script( 'jsCore', 'siteUrlobject', array('siteUrl' => get_bloginfo('url')));   
}
add_action( 'admin_enqueue_scripts', 'elegant_scripts' );