<?php

 /* Add a Seeting option page */
function wpstudio_ffbfe_add_admin_page(){
	add_menu_page('Fomidable Block & Filter Email','Blacklist Email Formadiable Form','manage_options','setting_ffbfe','wpstudio_ffbfe_formidable_block_filter_email_settings',plugins_url( 'block-email-formidable-forms/img/block-email-ff-icon.png' ),58);
	
	add_action('admin_init','wpstudio_ffbfe_block_email_formadiable_register_setting');
}
add_action('admin_menu','wpstudio_ffbfe_add_admin_page');

//callback function of setting function of add_menu_page()
function wpstudio_ffbfe_formidable_block_filter_email_settings(){
	
	// Code for create admin page
	 echo '<h1>Blacklist Unwanted Email - Formidable Forms</h1>';
	
	settings_errors(); 
?>
	<div class="ffbfe-admin-form">
		<form action="options.php" method="post" class="ffbfe-admin-form" id="ffbfe-admin-form-id">	
			<?php settings_fields('ffbfe-group') ;?>
			<?php do_settings_sections('setting_ffbfe'); ?>
			
			<?php submit_button('Save Changes','primary','pro-pic-submit-btn'); ?>		
			
		</form>

	</div>
<?php
}

//callback function of setting function of add_action inside add_menu_page()
function wpstudio_ffbfe_block_email_formadiable_register_setting(){
	register_setting('ffbfe-group','formadiable_form_email_fields','sanitize_wpstudio_ffbfe_formadiable_form_email_fields');	
	register_setting('ffbfe-group','formadiable_display_error_message','sanitize_wpstudio_ffbfe_formadiable_display_error_message');
	register_setting('ffbfe-group','formadiable_list_of_block_domains', 'sanitize_wpstudio_ffbfe_formadiable_list_of_block_domains');
	
	add_settings_section('ffbfe-options','Please fill the below setting options','wpstudio_ffbfe_block_email_formidable_options','setting_ffbfe');
	
	add_settings_field('formidable_email_fields','Email field ID list to be validate','wpstudio_ffbfe_form_list_callback','setting_ffbfe','ffbfe-options');
	add_settings_field('formidable_error_message','Error message text','wpstudio_ffbfe_error_message_callback','setting_ffbfe','ffbfe-options');
	add_settings_field('formidable_list_block_domains','Domains list to be blacklist','wpstudio_ffbfe_list_block_domains_callback','setting_ffbfe','ffbfe-options');
	

}

//callback function of add_settings_section()
function wpstudio_ffbfe_block_email_formidable_options(){
	// For testing 
	//echo "here is setting of sections";
	//echo '<b>Watch a demo and setting video <a href="http://wpstudio.org/blog/contact-form-7-blacklist-unwanted-email-plugin-setting-demo/">here</a> </b>';
	//echo '<br>';
	echo 'Please click here for <a href="http://rebrand.ly/wpbueffsl" target="_blank">List of 4750+ free and spam domains</a> ';

}

function wpstudio_ffbfe_form_list_callback(){
	$list_of_email_fields=esc_attr(get_option('formadiable_form_email_fields'));	
	echo '<input type="text" class="ffbfe-form-field" name="formadiable_form_email_fields" value="'.$list_of_email_fields.'" placeholder="Email field ID list to be validate">
	<p class="becf-field-instructions">Please add email field ID\'s that you wish to validate, separated by a comma. E.g. 32, 26 </p>' ;		  		
}
function wpstudio_ffbfe_error_message_callback(){
	$error_message=esc_attr(get_option('formadiable_display_error_message'));		
	echo '<input type="text" class="ffbfe-form-field" name="formadiable_display_error_message" value="'.$error_message.'" placeholder="Error message to be display">
	<p class="becf-field-instructions">Error message to be displayed on conflicts.</p>' ;		  		
}
function wpstudio_ffbfe_list_block_domains_callback(){
	$block_domain_list=esc_attr(get_option('formadiable_list_of_block_domains'));
	$spit_domains=explode(",",$block_domain_list);
	echo '<textarea class="ffbfe-form-field" name="formadiable_list_of_block_domains" placeholder="List of domains wish to blacklist">'.$block_domain_list.'</textarea>
	<p class="becf-field-instructions">Add list of domains you wish to blacklist/block, separated by a comma. E.g. gmail.com, yahoo.com, hotmail.com</p>' ;

}

//sanitize functions
function sanitize_wpstudio_ffbfe_formadiable_form_email_fields($input){
	$output=sanitize_text_field($input)	;
	return $output;
}

function sanitize_wpstudio_ffbfe_formadiable_display_error_message($input){
	$output=sanitize_text_field($input)	;
	return $output;
}

function sanitize_wpstudio_ffbfe_formadiable_list_of_block_domains($input){
	$output=sanitize_textarea_field($input);
	return $output;
}