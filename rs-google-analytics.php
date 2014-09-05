<?php
/**
 * Plugin Name:       RS Google Analytics
 * Plugin URI:        http://www.rstandley.co.uk
 * Description:       Allows you to add your Google Analytics code to either your header of footer
 * Version:           1.0.1
 * Author:            Rory Standley
 * Author URI:        http://www.rstandley.co.uk
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once(plugin_dir_path( __FILE__ ) . "rs-google-analytics-model.php");

require_once( plugin_dir_path( __FILE__ ) . 'public/class-rs-google-analytics.php' );
add_action( 'plugins_loaded', array('RSGoogleAnalytics', 'get_instance' ) );

register_activation_hook( __FILE__, array( 'RSGoogleAnalytics', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'RSGoogleAnalytics', 'deactivate' ) );

if(is_admin()){
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-rs-google-analytics-admin.php' );
	add_action( 'plugins_loaded', array( 'RSGoogleAnalytics_Admin', 'get_instance' ) );

}

// For WP AJAX

add_action( 'wp_ajax_myCode', 'myCode' );

function myCode(){
	header('Content-type: text/json');
	$myCode = new myCode;
	switch($_POST["method"]){
		case "getCode":
			$return = $myCode->getCode();
		break;
		case "addCode":
			$return = $myCode->addCode($_POST["code"],$_POST["location"]);
		break;
	}
	echo json_encode($return);
	die(); // this is required to return a proper result
}