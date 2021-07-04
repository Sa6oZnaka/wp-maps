<?php


function save_to_database(){
	
	global $wpdb;
		
	$jsonData = file_get_contents('http://api.openweathermap.org/data/2.5/weather&appid=6d96731f08d3514a13ac8dd5c5a3f3d3');
	$jsonDecode = json_decode($jsonData, true);
	
	$table_name = $wpdb -> prefix . "pins";

	foreach($jsonDecode as $key => $value){
		$coords = $value['coord'];
		$wpdb->insert($table_name, array(
			'latitude' => $coords['lat'],
			'longitude' => $coords['lon']
		));
	}
	
}

