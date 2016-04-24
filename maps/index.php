<html>
<head>
<title>Google Maps API v3 Example : Live Traffic Layer</title>
<style>
html { 
  background: #000;
}
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAlaDSv3HXLZSltMYoLXNbYXQxF_KHWryg"></script>
<script type="text/javascript">
</script>
</head>
<body onload="initialize()">
<div id="map" style="width: 530px; height: 230px"></div> 
</body>
</html>
<script type="text/javascript">
function initialize()
{

    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var trafficLayer = new google.maps.TrafficLayer();

    var map = new google.maps.Map(document.getElementById("map"),
    {
        zoom: 12,
        center: new google.maps.LatLng(40.620728, -74.876348),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
	  directionsService.route({
		origin: "13 Chestnut Place, Lebanon, NJ",
		destination : "Clinton, NJ",
		travelMode: google.maps.TravelMode.DRIVING 
		}, function(response, status){
		 if (status === google.maps.DirectionsStatus.OK) {
     		 directionsDisplay.setDirections(response);
    		} else {
      		window.alert('Directions request failed due to ' + status);
    		}
	});
    directionsDisplay.setMap(map);
    trafficLayer.setMap(map);
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix(
	    {
	    origins: ["13 Chestunt Place, Lebanon, NJ"],
	    destinations: ["Clinton, NJ"],
	    travelMode: google.maps.TravelMode.DRIVING,
	    }, callback);
	function callback(response, status) {
	  if (status == google.maps.DistanceMatrixStatus.OK) {
	    var origins = response.originAddresses;
	    var destinations = response.destinationAddresses;

	    for (var i = 0; i < origins.length; i++) {
	      var results = response.rows[i].elements;
	      for (var j = 0; j < results.length; j++) {
		var element = results[j];
		var distance = element.distance.text;
		var duration = element.duration.text;
		var from = origins[i];
		var to = destinations[j];
	      }
	    }
	  }
	console.log("It will take you " + duration + " to get to work today");//TODO turn into a speech synthesis
	}
   
}
</script>
