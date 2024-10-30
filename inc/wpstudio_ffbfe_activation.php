<?php

add_action('plugins_loaded','wpstudio_ffbfe_check_formidable_exists', 10);	


 function wpstudio_ffbfe_check_formidable_exists() {

    if (!class_exists('\FrmHooksController')) {
        add_action('admin_notices', function () {
            $class   = 'notice notice-error';
            $message = __('The Formidable Forms plugin must be installed and activated for the Formidable Form - Blacklist Unwanted Email plugin to work. <a href="'.admin_url('plugin-install.php?tab=plugin-information&plugin=formidable&TB_iframe=true&width=600&height=550').'" class="thickbox" title="Formadiable Form">Install Now.</a>');
            
            printf('<div class="%1$s"><p>%2$s</p></div>', $class, $message);
        });
        return;
    }else{
		add_filter('frm_validate_field_entry', 'wpstudio_ffbfe_custom_validation', 10, 3);
		require_once(FFBFE_PATH.'/inc/wpstudio_ffbfe_settings.php');
		require_once(FFBFE_PATH.'/inc/wpstudio_ffbfe_link_settings.php');		
		require_once(FFBFE_PATH.'/inc/wpstudio_ffbfe_block-filter-email.php');
		require_once(FFBFE_PATH.'/inc/wpstudio_ffbfe_formidable-block-css-enqueue.php');
		
		
		if(function_exists('activate_wpstudio_ffbfe_formidable_add_action_links'))
		activate_wpstudio_ffbfe_formidable_add_action_links();
		add_action( 'admin_enqueue_scripts', 'wpstudio_ffbfe_formidable_block_email_css_enqueue' );
	}

}
