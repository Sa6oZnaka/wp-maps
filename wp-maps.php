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


	public $plugin;

	function __construct(){
		add_action('init' , array( $this, 'custom_post_type'));
		
		$this->plugin = plugin_basename( __FILE__ );
	}
	
	function register(){
		// admin_enqueue_scripts => backend, wp_enqueue_scripts -> frontend
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
		
		add_action( 'admin_menu' , array( $this, 'add_admin_pages' ));
		
	}
	
	function settings_link( $links ){
		// add custom settings link
	
	}
	
	function add_admin_pages(){
		add_menu_page( 'Map plugin' , 'Map' , 'manage_options', 'wp_map_plugin', array( $this , 'admin_index' ), 'dashicons-store' , 110 );
	}
	
	function admin_index(){
		// require template
		
		require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
		
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
	
	function enqueue () {
		// enque all our scrips
		wp_enqueue_style( 'mypluginstyle', plugins_url('/assets/styles.css', __FILE__));
		wp_enqueue_script( 'mypluginscript', plugins_url('/assets/script.js', __FILE__));
	}

}

if(class_exists('MapPlugin')){
	$mapPlugin = new MapPlugin();
	$mapPlugin -> register();
}

// activation
register_activation_hook( __FILE__, array($mapPlugin, 'activate'));

// deactivation
register_deactivation_hook( __FILE__, array($mapPlugin, 'deactivate'));

// uninstall


// db include
include_once("db_init.php");
register_activation_hook( __FILE__, 'DBP_tb_create');





