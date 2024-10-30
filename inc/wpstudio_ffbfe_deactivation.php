<?php

function wpstudio_ffbfe_deactivation(){
	//deactivation code
	//dequeue style
	wp_dequeue_style( 'ffbfe-setting-css' );
}