<?php
$fromAddress = "13 Chestnut Place, Lebanon, NJ";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
 Copyright 2008 Google Inc. 
 Licensed under the Apache License, Version 2.0: 
 http://www.apache.org/licenses/LICENSE-2.0 
 -->
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps JavaScript API Example</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyAlaDSv3HXLZSltMYoLXNbYXQxF_KHWryg"
      type="text/javascript"></script>
    <!--<script src=" http://maps.google.com/?file=api&amp;v=2&amp;key=ABQIAAAAfAb2RNhzPaf0-W1mtifapBTZdFmpiU8vv3PBIA-hr88t-5BzzxR5q8w92SniiejAgqQXD97Dit5puA"
      type="text/javascript"></script>  -->

    <style type="text/css">
      v\:* {
        behavior:url(#default#VML);
      }
      body {
        font-family: Verdana, Arial, sans serif;
        font-size: 11px;
        margin: 2px;
      }
      table.directions th {
	background-color:#EEEEEE;
      }
	  
      img {
        color: #000000;
      }
    </style>

    <script type="text/javascript">
    //<![CDATA[

    var map;
    var gdir;
    var geocoder = null;
    var addressMarker;

    function load() {
      if (GBrowserIsCompatible()) {      
        map = new GMap2(document.getElementById("map"));

        gdir = new GDirections(map, document.getElementById("directions"));
        GEvent.addListener(gdir, "load", onGDirectionsLoad);
        GEvent.addListener(gdir, "error", handleErrors);

        setDirections("Clinton, NJ", "Lebanon, NJ", "en_US");
      }
    }
    
    function setDirections(fromAddress, toAddress, locale) {
      gdir.load("from: " + fromAddress + " to: " + toAddress,
                { "locale": locale });
    }

    function handleErrors(){
	   if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
	     alert("No corresponding geographic location could be found for one of the specified addresses. This may be due to the fact that the address is relatively new, or it may be incorrect.\nError code: " + gdir.getStatus().code);
	   else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
	     alert("A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is not known.\n Error code: " + gdir.getStatus().code);
	   
	   else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
	     alert("The HTTP q parameter was either missing or had no value. For geocoder requests, this means that an empty address was specified as input. For directions requests, this means that no query was specified in the input.\n Error code: " + gdir.getStatus().code);

	//   else if (gdir.getStatus().code == G_UNAVAILABLE_ADDRESS)  <--- Doc bug... this is either not defined, or Doc is wrong
	//     alert("The geocode for the given address or the route for the given directions query cannot be returned due to legal or contractual reasons.\n Error code: " + gdir.getStatus().code);
	     
	   else if (gdir.getStatus().code == G_GEO_BAD_KEY)
	     alert("The given key is either invalid or does not match the domain for which it was given. \n Error code: " + gdir.getStatus().code);

	   else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
	     alert("A directions request could not be successfully parsed.\n Error code: " + gdir.getStatus().code);
	    
	   else alert("An unknown error occurred.");
	   
	}

	function onGDirectionsLoad(){ 
          // Use this function to access information about the latest load()
          // results.

          // e.g.
	  // document.getElementById("getStatus").innerHTML = gdir.getStatus().code;
	  // and yada yada yada...
	}


    //]]>
    </script>

  </head>
  <body onload="load()" onunload="GUnload()">
  
  <form name = "submit" action="#" onsubmit="setDirections('<?php echo "13 Chestnut Place, Lebanon NJ";?>', '<?php echo "9 Kalan Farm Road, Hampton, NJ";?>', 'en'); return false">

  <table>

    <br/>
<div id="map" style="width: 310px; height: 400px"></div>
    
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
	$("#submit").submit();//submit on page laod
</script>
