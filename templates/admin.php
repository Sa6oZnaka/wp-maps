<?php
	echo 'PHP is working!';
	

?>

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

		  const map = new google.maps.Map(document.getElementById("map"), {
			zoom: 4,
			center: cords[0],
		  });
		  // The marker, positioned at Uluru
		  for(let i = 0; i < cords.length; i ++){
			  new google.maps.Marker({
				position: cords[i],
				map: map,
			  });
		  }		  
		  
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
