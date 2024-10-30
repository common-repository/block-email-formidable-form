<?php

if(!defined('WP_UNINSTALL_PLUGIN')){
	exit();
}
global $wpdb;
$tab_prefix=$wpdb->prefix; 
$dbanme=$wpdb->dbname;
//DELETE FROM .$wpdb->prefix.'_options'. WHERE option_name = 'form_email_fields' AND option_name ='display_error_message' AND option_name ='list_of_block_domains'
//$wpdb->query('DELETE FROM '.$dbanme.'.'.$tab_prefix.'_options WHERE option_name = "form_email_fields" AND option_name ="display_error_message" AND option_name ="list_of_block_domains"');
$wpdb->query('DELETE FROM '.$dbanme.'.'.$tab_prefix.'options WHERE option_name IN ("formadiable_form_email_fields" , "formadiable_display_error_message" ,"formadiable_list_of_block_domains")');

