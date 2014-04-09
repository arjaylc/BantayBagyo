<div id = "mapWrapper">
	   
	<div id="map_canvas"></div>
	<script src='http://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places'></script>
	<script>
		function initialize() {
			var map_canvas = document.getElementById('map_canvas');
			var map_options = {
			  center: new google.maps.LatLng(12.405084, 122.510585),
			  zoom: 6,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			var map = new google.maps.Map(map_canvas, map_options);
			
			var ctaLayer = new google.maps.KmlLayer({
			  url: 'http://sites.google.com/site/bantaybagyo/home/kmlfiles/Provinces.kmz'
			});
			ctaLayer.setMap(map);
			
			var input = (document.getElementById('pac_input'));
		  
			var searchBox = new google.maps.places.SearchBox(input);
		  
		    // Listen for the event fired when the user selects an item from the
		    // pick list. Retrieve the matching places for that item.
		    google.maps.event.addListener(searchBox, 'places_changed', function() {
		      var places = searchBox.getPlaces();
		  
		
		      // For each place, get the icon, place name, and location.

		      var bounds = new google.maps.LatLngBounds();
		      for (var i = 0, place; place = places[i]; i++) {
				bounds.extend(place.geometry.location);
		      }
		  
		      map.fitBounds(bounds);
		      map.setZoom(8);
		    });
		  
		    // Bias the SearchBox results towards places that are within the bounds of the
		    // current map's viewport.

		    google.maps.event.addListener(map, 'bounds_changed', function() {
		      var bounds = map.getBounds();
		      searchBox.setBounds(bounds);
		    });
		    
			
		}
		google.maps.event.addDomListener(window, 'load', initialize);

	</script>

    </div>