<?php
session_start();
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
if (navigator.geolocation) {
	// Get the user's current position
	var optn = {
			enableHighAccuracy : true,
			timeout : 5000,
			maximumAge : 0
		};
	navigator.geolocation.getCurrentPosition(showPosition, showError, optn);
	
} else {
	alert('Geolocation is not supported in your browser');
	//remove the readonly attributes and let user enter his location
	$("lat").removeAttr("readonly");
	$("lat").attr("required","required");
        $("lng").removeAttr("readonly");
		$("lng").attr("required","required");
}

});
</script>
<script>
function showPosition(position) {
//replace values of readonly input fields of latitudes and longitudes.
 $("#lat").val(position.coords.latitude);
 $("#lng").val(position.coords.longitude);
}
function showError(error) {
	switch(error.code) {
		case error.PERMISSION_DENIED:
		
			alert("User denied the request for Geolocation.");
			break;
		case error.POSITION_UNAVAILABLE:
			alert("Location information is unavailable."); 
			break;
		case error.TIMEOUT:
			alert("The request to get user location timed out.");
			break;
		case error.UNKNOWN_ERROR:
			alert("An unknown error occurred.");
			break;
	}
	$("#lat").removeAttr("readonly");
	$("#lat").attr("required","required");
        $("#lng").removeAttr("readonly");
		$("#lng").attr("required","required");
}
</script>
<script>
$(document).ready(function(){
	$("button").click(function(){
		window.location="analytics.php";
	});

});
</script>
</head>
<body >
<button>Shop owner</button>
<form action=" medical.php" method ="post">
	<input type="text" placeholder="Enter your medicine here" name="medicine" required>
	<br>
	Latitude<input type ="number" step="0.000001" readonly min="-90.000000" max ="90.000000" id="lat" name="lat" value="">
	<br>
	Longitude<input type="number" step="0.000001" readonly min="-180.000000" max="180.000000" id="lng" name="lng" value="">		
	<br>
	Distance<input type="number" step="1" min="0" name="distance" id="distance">
	<br>
	<input type ="submit" value ="search">
</form>
</body>
</html>