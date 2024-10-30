<?php

function wpstudio_ffbfe_custom_validation($errors, $posted_field, $posted_value){
	$list_of_email_fields=esc_attr(get_option('formadiable_form_email_fields'));
	$split_email_field=array_map('trim',explode(",",$list_of_email_fields));
	
	$fieldArray = $split_email_field; //Add e-mail fields. Seperate field IDs by comma.
	
	$block_domain_list=esc_attr(get_option('formadiable_list_of_block_domains'));
	$spit_domains=array_map('trim',explode(",",$block_domain_list));
	$blockArray = $spit_domains;
	if(in_array($posted_field->id, $fieldArray)){ //Check whether fields are equal to blocklist above.

		//Check of Microsoft domains.
		foreach ($blockArray as $blockedValue) { // Check values blocklist
			if (stripos($posted_value, $blockedValue))
			{
				$error_message=esc_attr(get_option('formadiable_display_error_message'));	
				//Dynamic error: shows value with is entered by user.
				if(!empty($error_message)){
					$errors['field'. $posted_field->id] = 'E-mail address with @'. explode('@', $posted_value, 2)[1] .' is not allowed!'. ' '.$error_message;
				}else{
					$errors['field'. $posted_field->id] = 'E-mail address with @'. explode('@', $posted_value, 2)[1] .' is not allowed!';				
				}
					
			}
		}
	}
return $errors;
}

