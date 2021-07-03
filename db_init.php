<?php

function DBP_tb_create(){
	global $wpdb;
	
	$DBP_tb_name = $wpdb -> prefix . "pins";
		
	$DBP_query = "CREATE TABLE $DBP_tb_name(
		id INT primary key auto_increment,
		latitude DECIMAL(10, 8),
    	longitude DECIMAL(11, 8)
	)";
	
	require_once(ABSPATH . "wp-admin/includes/upgrade.php");
	dbDelta($DBP_query);
		
}
