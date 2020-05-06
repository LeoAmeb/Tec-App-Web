<?php
    include 'validate_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubicación</title>

    <style>
      #map {height: 400px;  
            width: 100%;  
      }
    </style>

</head>
<body>


<script type="text/javascript">
	// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 23.747400, lng: -99.136645};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 19, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>
<div class="container">
  <h3>Ubicación</h3>
	<p style="color:gray;">
		Revoluxion gaming center en Ciudad Victoria con internet de alta velocidad y punto de reunión de gamers donde puedes rentar consolas como xbox, nintendo switch y arcades retro y jugar competitivamente entre tus cuates u otros gamers.
	</p>

	<div id="map"></div>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSHc8OOdvQpd78FtHEp729vS_T1Au6jP0&callback=initMap">
	</script>
</div>


<script src="assets/js/sweetalert2.all.min.js"></script>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>