<table border="1">
<tr>
<th>ID</th>
<th>Latitude</th>
<th>Longitude</th>
</tr>
<?php
global $wpdb;
$result = $wpdb->get_results ( "SELECT * FROM wp_pins" );
foreach ( $result as $print ) {
?>
<tr>
<td><?php echo $print->id;?></td>
<td><?php echo $print->latitude;?></td>
<td><?php echo $print->longitude;?></td>
</tr>
<?php
}
?>
</table>



<h1> Google maps </h1>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>

    <style>
	  #map {
		  height: 400px;
		  /* The height is 400 pixels */
		  width: 100%;
		  /* The width is the width of the web page */
		}
	</style>
    
    <script>
    	// Initialize and add the map
		const cords = [ { lat: -25.344, lng: 131.036 }, { lat: -20.344, lng: 131.036 } ]
		
		function initMap() {

		  	var lat;
		    var lng;
		    var myLatLng;
		    var bounds = new google.maps.LatLngBounds();
		    var map = new google.maps.Map(document.getElementById('map'), {
		        zoom: 15,
		        center: myLatLng
		    });
		
		
			<?php
		    foreach ( $result as $pin ) {   //Creates a loop to loop through results
		   		$lat = $pin->latitude;
		       	$lng = $pin->longitude;
		       	
		       	//$lat = 14;
		       	//$lng = 11.035;
		       	
		        echo "
		       		lat = $lng;
		            lng = $lat;
		            myLatLng = {lat,lng};
		            var position = new google.maps.LatLng( lat, lng );
		            bounds.extend( position );
		            var marker = new google.maps.Marker({
		                position: position,
		                map: map
		            });";
		    }
		    ?>
		    map.fitBounds(bounds);
		    
		}
		
		
		
    </script>
    
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTe22xnL6uMAujuHn86a04WDcj2lISKCk&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    
    
  </body>
</html>
