var map;
var mapCenter;
//var mapCenter = new google.maps.LatLng(-18.8877292,47.5126075); //Google map Coordinates
function CreatePropertyMarker(basePath) {
    var locations = new Array(
        [34.01312,-118.496808]
    );
    mapCenter = new google.maps.LatLng(-18.8877292,47.5126075);
    var markers = new Array();
    var mapOptions = {
        center: mapCenter,
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };
    
    var googleMapOptions = { 
		center: mapCenter,
		zoom: 14,
		maxZoom: 18,
		minZoom: 10,
//		zoomControlOptions: {
//			style: google.maps.ZoomControlStyle.SMALL //zoom control size
//		},
		scaleControl: true, // enable scale control
		mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
	};

    map = new google.maps.Map(document.getElementById('property-map'), googleMapOptions);
    
    google.maps.event.addListener(map, 'rightclick', function(event) {    
    	$('input[name="is_marker"]').val(1);
    	var content = $('<div class="marker-info-win">'+
			'<div class="marker-inner-win">'+
				'<span class="info-content">'+				
					'<div class="title">' +
			    		'<h4>Create new marker</h4>' +
			    	'</div>' +
					'<div class="content">' +
		        		'<button class="btn btn-danger btn-small remove-marker pull-left" type="button">'+
							'<i class="icon-remove bigger-110"></i>'+
							'Remove'+
						'</button>'+
						'<button class="btn btn-info btn-small save-marker pull-right" type="button">'+
							'<i class="icon-ok bigger-110"></i>'+
							'Save'+
						'</button>'+
			    	'</div>' +
		    	'</span>'+
			'</div></div>');	
    	
    	var marker = new google.maps.Marker({
            position: event.latLng,
            map: map,
            draggable:true,
			animation: google.maps.Animation.DROP,
            icon: basePath + '/img/marker.png'
        }); 
    			
		//Create an infoWindow
		var infowindow = new google.maps.InfoWindow();
		//set the content of infoWindow
		infowindow.setContent(content[0]);
		
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker); // click on marker opens info window 
		});
		
		//Find remove button in infoWindow
		var removeBtn 	= content.find('button.remove-marker')[0];
		var saveBtn 	= content.find('button.save-marker')[0];

		//add click listener to remove marker button
		google.maps.event.addDomListener(removeBtn, "click", function(event) {
			marker.setMap(null);
			$('input[name="lat_lng"]').val("");
			$('input[name="is_marker"]').val("");
		});
		
		// add click listener to add marker button
		google.maps.event.addDomListener(saveBtn, "click", function(event) {
			$('input[name="lat_lng"]').val(marker.getPosition().toUrlValue());
			infowindow.close(map,marker);
			$(this).remove();
		});
    });
    
    

}

function LoadMapProperty(basePath, detail) {
    
    var markers = new Array();
    var latitude = detail.coords.latitude;
    var longitude = detail.coords.longitude;
    var locations = new Array(
        [latitude,longitude]
    );
    var mapOptions = {
        center: new google.maps.LatLng(latitude, longitude),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };

    var map = new google.maps.Map(document.getElementById('property-map'), mapOptions);

    $.each(locations, function(index, location) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(location[0], location[1]),
            map: map,
            icon: basePath + '/img/marker-transparent.png'
        });
        
        var content = '<div class="infobox">'+
	        '<div class="image">'+
	        	'<img src="'+detail.src+'" alt="" width="100" height="64">'+
	        '</div>'+
	        '<div class="title">'+
	        	'<a href="'+detail.url+'">'+detail.location+'</a>'+
	        '</div>'+
	        '<div class="area">'+
	        	'<span class="key">Area: </span>'+
	        	'<span class="value">'+detail.area+'m<sup>2</sup></span>'+
	        '</div>'+
	        '<div class="price">'+detail.price+' Ar</div>'+
	        '<div class="link"><a href="'+detail.url+'">View more</a></div>'+
        '</div>';

        var myOptions = {
            content: content,
            disableAutoPan: false,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(-146, -190),
            zIndex: null,
            closeBoxURL: "",
            infoBoxClearance: new google.maps.Size(1, 1),
            position: new google.maps.LatLng(location[0], location[1]),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false
        };
        marker.infobox = new InfoBox(myOptions);
        marker.infobox.isOpen = false;

        var myOptions = {
            draggable: true,
            content: '<div class="marker"><div class="marker-inner"></div></div>',
            disableAutoPan: true,
            pixelOffset: new google.maps.Size(-21, -58),
            position: new google.maps.LatLng(location[0], location[1]),
            closeBoxURL: "",
            isHidden: false,
            // pane: "mapPane",
            enableEventPropagation: true
        };
        marker.marker = new InfoBox(myOptions);
        marker.marker.open(map, marker);
        markers.push(marker);

        google.maps.event.addListener(marker, "click", function (e) {
            var curMarker = this;

            $.each(markers, function (index, marker) {
                // if marker is not the clicked marker, close the marker
                if (marker !== curMarker) {
                    marker.infobox.close();
                    marker.infobox.isOpen = false;
                }
            });


            if(curMarker.infobox.isOpen === false) {
                curMarker.infobox.open(map, this);
                curMarker.infobox.isOpen = true;
                map.panTo(curMarker.getPosition());
            } else {
                curMarker.infobox.close();
                curMarker.infobox.isOpen = false;
            }

        });
    });
}

function LoadMap(basePath, properties) {
	var markers = new Array();
	var latitude = properties[0].coords.latitude;
    var longitude = properties[0].coords.longitude;
    var mapOptions = {
        center: new google.maps.LatLng(latitude, longitude),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };

    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    $.each(properties, function(index, property) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(property.coords.latitude, property.coords.longitude),
            map: map,
            icon: basePath + '/img/marker-transparent.png'
        });
        
        var content = '<div class="infobox">'+
	        '<div class="image">'+
	        	'<img src="'+property.src+'" alt="" width="100" height="64">'+
	        '</div>'+
	        '<div class="title">'+
	        	'<a href="'+property.url+'">'+property.location+'</a>'+
	        '</div>'+
	        '<div class="area">'+
	        	'<span class="key">Area: </span>'+
	        	'<span class="value">'+property.area+'m<sup>2</sup></span>'+
	        '</div>'+
	        '<div class="price">'+property.price+' Ar</div>'+
	        '<div class="link"><a href="'+property.url+'">View more</a></div>'+
        '</div>';

        var myOptions = {
            content: content,
            disableAutoPan: false,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(-146, -190),
            zIndex: null,
            closeBoxURL: "",
            infoBoxClearance: new google.maps.Size(1, 1),
            position: new google.maps.LatLng(property.latitude, property.longitude),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false
        };
        marker.infobox = new InfoBox(myOptions);
        marker.infobox.isOpen = false;

        var myOptions = {
            draggable: true,
            content: '<div class="marker"><div class="marker-inner"></div></div>',
            disableAutoPan: true,
            pixelOffset: new google.maps.Size(-21, -58),
            position: new google.maps.LatLng(property.latitude, property.longitude),
            closeBoxURL: "",
            isHidden: false,
            // pane: "mapPane",
            enableEventPropagation: true
        };
        marker.marker = new InfoBox(myOptions);
        marker.marker.open(map, marker);
        markers.push(marker);

        google.maps.event.addListener(marker, "click", function (e) {
            var curMarker = this;

            $.each(markers, function (index, marker) {
                // if marker is not the clicked marker, close the marker
                if (marker !== curMarker) {
                    marker.infobox.close();
                    marker.infobox.isOpen = false;
                }
            });

            if (curMarker.infobox.isOpen === false) {
                curMarker.infobox.open(map, this);
                curMarker.infobox.isOpen = true;
                map.panTo(curMarker.getPosition());
            } else {
                curMarker.infobox.close();
                curMarker.infobox.isOpen = false;
            }
        });
    });
}

function InitMap(basePath) {
    google.maps.event.addDomListener(window, 'load', CreatePropertyMarker(basePath));
}

function displayMap(basePath, detail) {
    google.maps.event.addDomListener(window, 'load', LoadMapProperty(basePath, detail));
}

function displayAllMaps(basePath, properties) {
    google.maps.event.addDomListener(window, 'load', LoadMap(basePath, properties));
}