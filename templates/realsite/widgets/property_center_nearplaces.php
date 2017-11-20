<h2 id="hNearProperties" class="page-header">{lang_Propertylocation}</h2>
<div class="places_select" style="display: none;">
    <a class="btn btn-large" type="button" rel="hospital,health"><img src="assets/img/places_icons/hospital.png" /> {lang_Health}</a>
    <a class="btn btn-large" type="button" rel="park"><img src="assets/img/places_icons/park.png" /> {lang_Park}</a>
    <a class="btn btn-large" type="button" rel="atm,bank"><img src="assets/img/places_icons/atm.png" /> {lang_ATMBank}</a>
    <a class="btn btn-large" type="button" rel="gas_station"><img src="assets/img/places_icons/petrol.png" /> {lang_PetrolPump}</a>
    <a class="btn btn-large" type="button" rel="food,bar,cafe,restourant"><img src="assets/img/places_icons/restourant.png" /> {lang_Restourant}</a>
    <a class="btn btn-large" type="button" rel="store"><img src="assets/img/places_icons/store.png" /> {lang_Store}</a>
</div>
<div class="map-property">
    <div id="propertyLocation" style="height: 300px;"></div><!-- /#map-property -->
</div><!-- /.map-property -->
    <script language="javascript">
 
 (function(){
    var IMG_FOLDER = "assets/js/dpejes";
    var map;
    $(document).ready(function(){

var map;
        map = $('#propertyLocation').gmap3({
            get: { name:"map" },
         map:{
            options:{
             center: [{estate_data_gps}],
             zoom: {settings_zoom}+6,
             scrollwheel: false
            }
         },
         marker:{
              latLng:[{estate_data_gps}], 
                data:"{estate_data_address}<br />{lang_GPS}: {estate_data_gps}",
         events:{
          mouseover: function(marker, event, context){
            var map = $(this).gmap3("get"),
              infowindow = $(this).gmap3({get:{name:"infowindow"}});
            if (infowindow){
              infowindow.open(map, marker);
              infowindow.setContent('<div style="width:400px;display:inline;">'+context.data+'</div>');
            } else {
              $(this).gmap3({
                infowindow:{
                  anchor:marker,
                  options:{disableAutoPan: mapDisableAutoPan, content: '<div style="width:400px;display:inline;">'+context.data+'</div>'}
                }
              });
            }
          }
        }
         }});
        
        init_gmap_searchbox();
        
        if (typeof init_directions == 'function')
        {
            $(".places_select a").click(function(){
                init_places($(this).attr('rel'), $(this).find('img').attr('src'));
            });
            
            var selected_place_type = 4;
            
            init_directions();
            directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});

            map_propertyLoc = $("#propertyLocation").gmap3({
                  get: { name:"map" }
              });   

            directionsDisplay.setMap(map_propertyLoc);
            init_places($(".places_select a:eq("+selected_place_type+")").attr('rel'), $(".places_select a:eq("+selected_place_type+") img").attr('src'));
        
        }
    }); 
    
    var map_propertyLoc;
    var markers = [];
    var generic_icon;
    
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var placesService;

    function init_places(places_types, icon) {
        var pyrmont = new google.maps.LatLng({estate_data_gps});

        setAllMap(null);
        
        generic_icon = icon;

        map_propertyLoc = $("#propertyLocation").gmap3({
            get: { name:"map" }
        });    
        
        var places_type_array = places_types.split(','); 
        
        var request = {
            location: pyrmont,
            radius: 2000,
            types: places_type_array
        };
        
        infowindow = new google.maps.InfoWindow();
        placesService = new google.maps.places.PlacesService(map_propertyLoc);
        placesService.nearbySearch(request, callback);

    }

    function callback(results, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          createMarker(results[i]);
        }
      }
    }
    
    function setAllMap(map) {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
      }
    }

    function calcRoute(source_place, dest_place) {
      var selectedMode = 'WALKING';
      var request = {
          origin: source_place,
          destination: dest_place,
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode[selectedMode]
      };
      
      directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          directionsDisplay.setDirections(response);
          //console.log(response.routes[0].legs[0].distance.value);
        }
      });
    }
    
    function createMarker(place) {
      var placeLoc = place.geometry.location;
      var propertyLocation = new google.maps.LatLng({estate_data_gps});
      
        if(place.icon.indexOf("generic") > -1)
        {
            place.icon = generic_icon;
        }
      
        var image = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

      var marker = new google.maps.Marker({
        map: map_propertyLoc,
        icon: image,
        position: place.geometry.location
      });
      
      markers.push(marker);
      
      var distanceKm = (calcDistance(propertyLocation, placeLoc)*1.2).toFixed(2);
      var walkingTime = parseInt((distanceKm/5)*60+0.5);

      google.maps.event.addListener(marker, 'click', function() {
        
            //drawing route
            calcRoute(propertyLocation, placeLoc);
        
        // Fetch place details
        placesService.getDetails({ placeId: place.place_id }, function(placeDetails, statusDetails){
            

            
            //open popup infowindow
            infowindow.setContent(place.name+'<br />{lang_Distance}: '+distanceKm+'{lang_Km}'+
                                  '<br />{lang_WalkingTime}: '+walkingTime+'{lang_Min}'+
                                  '<br /><a target="_blank" href="'+placeDetails.url+'">{lang_Details}</a>');
            infowindow.open(map_propertyLoc, marker);
        });

      });
    }
    
    //calculates distance between two points
    function calcDistance(p1, p2){
      return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
    }
 })()  
       
    </script>