<? php

/**
 * Trigger on uninstall
 *
 */

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ){
	die;
}

// Clear database data
/*$locations = get_posts( array( 'post_type' => 'location', 'number_posts' => -1 ) );

foreach( $locations as $location){
	wp_delete_post($location -> id, true);
}

*/


global $wpdb;
$wpdb -> query( "DELETE FROM wp_posts WHERE post_type = 'location' " );
$wpdb -> query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id from wp_posts)" );
$wpdb -> query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id from wp_posts)" );
