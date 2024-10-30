<?php 

function wpstudio_ffbfe_formidable_block_email_css_enqueue(){

wp_enqueue_style( 'ffbfe-setting', plugins_url('block-email-formidable-forms/css/style.css', 'FFBFE_PATH'));

}