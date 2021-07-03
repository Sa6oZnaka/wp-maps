<?php


function save_to_database(){
	
	global $wpdb;
		
	$jsonData = file_get_contents('http://192.168.1.3:3000/api/points');
	$jsonDecode = json_decode($jsonData, true);
	
	$table_name = $wpdb -> prefix . "pins";

	foreach($jsonDecode as $key => $value){
		$wpdb->insert($table_name, array(
			'latitude' => $value['latitude'],
			'longitude' => $value['longitude']
		));
	}
	
}

