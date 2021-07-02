<?php
/**
 * Plugin Name: WP Custom Google Maps
 * Version: 1.0
 * Description: Simple google maps plugin 
*/

if( ! defined( 'ABSPATH' ) ){
	die;
}

class MapPlugin {

	function __construct(){
		add_action('init' , array( $this, 'custom_post_type'));
	}
	
	function activate(){
		// generate a CPT
		$this -> custom_post_type();
		// flush rewrite rules
		flush_rewrite_rules();
	}
	
	function deactivate(){
		// flush rewrite rules
		flush_rewrite_rules();
	}
	
	function addPoint(){
	
	}
	
	
	function custom_post_type(){
		register_post_type('location', ['public' => true, 'label' => 'Locations']);
	}


}

if(class_exists('MapPlugin')){
	$mapPlugin = new MapPlugin();
}

// activation
register_activation_hook( __FILE__, array($mapPlugin, 'activate'));

// deactivation
register_deactivation_hook( __FILE__, array($mapPlugin, 'deactivate'));

// uninstall


