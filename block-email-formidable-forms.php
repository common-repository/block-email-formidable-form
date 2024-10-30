<?php
/*
Plugin Name: Blacklist Unwanted Email - Formidable Forms 
Description: This is a free add-on plugin for Formidable Forms , which validates the email field and restrict unwanted email submission as well as allowed only business email submission.
Tags: Blacklist email domain for formidable forms, Block email domain for formidable forms, validate email domain for formidable forms, restrict email domain submission for formidable forms, free domain block in formidable forms, formidable forms, FF, email validation in formidable forms, contact form addon, formidable forms addon, block competitor email domain, formidable forms plugin, formidable forms plugins, restrict spam submission in formidable forms, spam email block in formidable forms, allowe only business email,  allowe only company email in formidable forms, allowe only business email,  allowe only company email in formidable forms
Version:     1.0
Author:      Aniket Bahalkar
Plugin URI: http://wpstudio.org/
License:     GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/



// Make sure we don't expose any info if called directly, this code help to protect access plugin from hackers
	if ( !function_exists( 'add_action' ) ) {
		echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
		exit;
	}

// Some constant define
//constant for file path
 define('FFBFE_PATH',plugin_dir_path(__FILE__));
 define('FFBFE_URL',__FILE__);
 

 require_once(FFBFE_PATH.'/inc/wpstudio_ffbfe_activation.php');
 register_deactivation_hook(__FILE__, 'wpstudio_ffbfe_deactivation');
 require_once(FFBFE_PATH.'/inc/wpstudio_ffbfe_deactivation.php');


//below hook take two parameter file name and function name to call
//below function call only when plugin is fully activated and this plugin is call from the activation.php
//this is because if formidable plugin not activated and this filter call getting error hence only call when formidable plugin is activated

function activate_wpstudio_ffbfe_formidable_add_action_links(){
	add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpstudio_ffbfe_formidable_add_action_links' );
}
 