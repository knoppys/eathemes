<?php
/*
Plugin Name:       Knoppys Elegant Emails Variations
Plugin URI:        https://www.knoppys.co.uk
Description:       This plugins defines the variations betwee the websites which are called into the Knoppys Elegant Email Plugin
Version:           10
Author:            Knoppys Digital Limited
License:           GNU General Public License v2
License URI:       http://www.gnu.org/licenses/gpl-2.0.html
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