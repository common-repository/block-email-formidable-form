<?php
//setting link to plugin page

function wpstudio_ffbfe_formidable_add_action_links ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( '/admin.php?page=setting_ffbfe' ) . '">Settings</a>',
 );
return array_merge($mylinks, $links );
}