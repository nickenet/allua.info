
<script>
$(document).ready(function(){

    var mapProp = {
        center: new google.maps.LatLng({estate_data_gps}),
        zoom: {settings_zoom},
    };
    
    var map_router = new google.maps.Map($('#map-route-company')[0], mapProp);

    var mMarker = new google.maps.Marker({
            position: new google.maps.LatLng({estate_data_gps})//,
            //icon: options.markerUrl
            //animation: google.maps.Animation.BOUNCE
        });

    mMarker.setMap(map_router);

    var mCenter = new google.maps.Marker({
            position: new google.maps.LatLng({settings_gps}),
            icon: {
              path: google.maps.SymbolPath.CIRCLE,
              scale: 10
            }
            //icon: options.markerUrl
            //animation: google.maps.Animation.BOUNCE
        });

    mCenter.setMap(map_router);
    
    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
    directionsDisplay.setMap(map_router);
    
    // [Draw route]
    
    var source_place = new google.maps.LatLng({settings_gps});
    var dest_place = new google.maps.LatLng({estate_data_gps});
    
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
          
          //map_router.setCenter(new google.maps.LatLng({estate_data_gps}));
          
        }
    });
    
    // [/Draw route]
    
    // [Show infowindow]
    
    infowindow = new google.maps.InfoWindow();
    
    var distanceKm = (calcDistance(source_place, dest_place)*1.2).toFixed(2);
    var walkingTime = parseInt((distanceKm/5)*60+0.5);
    
    if('<?php _l('Km'); ?>' != 'km')
    {
        // convert to miles
        distanceKm = (distanceKm*0.62137).toFixed(2);
    }
    
    //open popup infowindow
    infowindow.setContent('<?php _jse($page_title); ?><br /><?php _l('Distance'); ?>: '+distanceKm+'<?php _l('Km'); ?>'+
                          '<br /><?php _l('WalkingTime'); ?>: '+walkingTime+'<?php _l('Min'); ?>'+
                          '<br /><?php _l('Address'); ?>: <?php _che($estate_data_address); ?>');
    
    
    infowindow.open(map_router, mMarker);
    
    // [/Show infowindow]
    
    var delay=2000; //1 seconds
    setTimeout(function(){
        map_router.setCenter(new google.maps.LatLng({estate_data_gps}));
    }, delay); 
    
    var myMarker;
    /* My Location */
    $('#routemap-mylocation').click(function(e){
        e.preventDefault();
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position_location) {
            var pos = {
              lat: position_location.coords.latitude,
              lng: position_location.coords.longitude
            };
            map_router.setCenter(pos);

            myMarker = new google.maps.Marker({
                position: pos
            });
            //infowindow.close();
            myMarker.setMap(map_router);
            
            // [Draw route]
            /*var*/ source_place = new google.maps.LatLng(pos);
            var dest_place = new google.maps.LatLng({estate_data_gps});
            
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
                }
            });
            
            var distanceKm = (calcDistance(source_place, dest_place)*1.2).toFixed(2);
            var walkingTime = parseInt((distanceKm/5)*60+0.5);

            if('<?php _l('Km'); ?>' != 'km')
            {
                // convert to miles
                distanceKm = (distanceKm*0.62137).toFixed(2);
            }
            
            infowindow.setContent('<?php _jse($page_title); ?><br /><?php _l('Distance'); ?>: '+distanceKm+'<?php _l('Km'); ?>'+
                          '<br /><?php _l('WalkingTime'); ?>: '+walkingTime+'<?php _l('Min'); ?>'+
                          '<br /><?php _l('Address'); ?>: <?php _che($estate_data_address); ?>');

            infowindow.open(map_router, mMarker);
            
            $('.direction-guid #travelMode li').removeClass('active');
            $('.direction-guid #travelMode li.WALKING').addClass('active');
            getAddress(source_place, '#addressMapGuid')                     
            checkTraveMode(directionsDisplay, source_place, dest_place)
            
          }, function() {
          });
          
        } else {
        }
    })
    /* End My Location */
    
    $('#routemap-direction-guid').click(function(e){
    
        e.preventDefault();
        $('#direction-guid').toggle('slow');
        getAddress(source_place, '#addressMapGuid')
        
        checkTraveMode(directionsDisplay, source_place, dest_place)
        guidDistance(directionsDisplay, source_place, dest_place)
    
    })
    
    $('#addressMapGuid').change(function(){
        guidDistance(directionsDisplay, $(this).val(), dest_place)
    })
    
    $('.direction-guid #travelMode li').click(function(){
        if(!$(this).hasClass('disabled')){
            
            var address = $('.direction-guid #addressMapGuid').val() || source_place;

            $('.direction-guid #travelMode li').removeClass('active');
            $(this).addClass('active');

            checkTraveMode(directionsDisplay, address, dest_place)
            guidDistance(directionsDisplay, address, dest_place, $(this).attr('data-mode'))
        }
    })
    
    
    var autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('addressMapGuid')),
                                         {types: ['geocode']});
    
});
//calculates distance between two points
function calcDistance(p1, p2){
  return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
}

function guidDistance (directionsDisplay, source_place, dest_place, mode) {
    if(typeof  mode === 'undefined') mode = 'DRIVING';
        
        directionsDisplay.setPanel(document.getElementById('direction-guid-box'))
        
            directionsService.route({
            origin: source_place,
            destination: dest_place,
            travelMode: google.maps.TravelMode[$.trim(mode)],
            transitOptions: {
                routingPreference: google.maps.TransitRoutePreference.FEWER_TRANSFERS
              },
          }, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
              directionsDisplay.setDirections(response);
              
            } else {
                $('#direction-guid-box').html('<?php echo _l("Please try other mode");?>')
            }
          });
}


function getAddress (coord, selector) {
    var geocoder = new google.maps.Geocoder();  
       geocoder.geocode({
            latLng: coord
          }, function(responses) {
            if (responses && responses.length > 0) {
             jQuery(selector).attr('placeholder',responses[0].formatted_address);
            } else {
            }
          });
 }
 
 /*
 *  check status mode BICYCLING and TRANSIT
  */
 function checkTraveMode(directionsDisplay, source_place, dest_place) {
     
    directionsService.route({
    origin: source_place,
    destination: dest_place,
    travelMode: google.maps.TravelMode.BICYCLING,
    }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
        $('.direction-guid #travelMode li.BICYCLING').css('opacity', '1')
                                                    .removeClass('disabled');
        
    } else {
        $('.direction-guid #travelMode li.BICYCLING').css('opacity', '.2')
                                            .addClass('disabled');
    }
  });
  
    directionsService.route({
    origin: source_place,
    destination: dest_place,
    travelMode: google.maps.TravelMode.TRANSIT,
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
        $('.direction-guid #travelMode li.TRANSIT').css('opacity', '1')
                                                    .removeClass('disabled');
    } else {
        $('.direction-guid #travelMode li.TRANSIT').css('opacity', '.2')
                                            .addClass('disabled');
    }
  }); 
  
 }

</script>

<style>

.map-route-company-wrapper {
    background-color: #FFF;
    border: 1px solid #F5F5F5;
    margin-bottom: 10px;
    padding: 16px;
}

#map-route-company {
    height: 300px;
}

#routemap-direction-guid {
    margin-bottom: 10px;
}

.direction-guid {
    padding: 5px 16px;
    max-height: 500px;
    overflow-y: scroll;
    -webkit-box-shadow: 0px 2px 4px rgba(0,0,0,0.08);
    -moz-box-shadow: 0px 2px 4px rgba(0,0,0,0.08);
    box-shadow: 0px 2px 4px rgba(0,0,0,0.08);
}

.map-direction_box ul {
    padding: 0;
    margin: 0;
    border-bottom: 1px solid #d9d9d9;
    line-height: 0;
}

.map-direction_box ul li {
    padding: 0;
    margin: 0;
    cursor: pointer;
    display: inline-block;
    margin-right: 5px;
    padding: 14px 14px 11px 13px;
    border-bottom: 3px solid rgba(0,0,0,0);
    box-sizing: padding-box;
}

.map-direction_box .mode-icon {
    background-image: url('//maps.gstatic.com/tactile/directions/travel_mode/sprite-1x-20130906.png');
    background-size: 20px 276px;
    width: 20px;
    height: 20px;
    display: block;
}

.map-direction_box ul li:not(.disabled):hover, .map-direction_box ul li.active {
    border-bottom: 3px solid #3a84df;
}

.DRIVING i {
    background-position:0 -40px;
}
.TRANSIT i {
    background-position:0 -80px;
}
.WALKING i {
    background-position:0 -120px;
}
.BICYCLING i {
    background-position:0 -160px;
}

.DRIVING.active i {
    background-position:0 -60px;
}
.TRANSIT.active i {
    background-position:0 -100px;
}
.WALKING.active i {
    background-position:0 -140px;
}
.BICYCLING.active i {
    background-position:0 -180px;
}
</style>

<h2 class="page-header"><?php _l('Route to location'); ?></h2>
<a href="#" class="btn btn-primary" id='routemap-mylocation'><?php _l('Show distance from My Location');?></a>
<div class="map-route-company-wrapper">
    <div id="map-route-company"></div><!-- /#map-route-company -->
</div><!-- /.map-route-company-wrapper -->
<a href="#" class="btn btn-primary" id='routemap-direction-guid'><?php _l('Directions guide');?></a>
<div class="direction-guid map-route-company-wrapper" id="direction-guid" style="display: none;">
    <div class="control-group ">
        <input class="form-control" id="addressMapGuid" name="addressMapGuid" type="text" placeholder="address" value="">
    </div>
        
    <div class="map-direction_box" id="travelMode">
        <ul>
            <li class="DRIVING active" data-mode="DRIVING"><i class="mode-icon" s></i></li>
            <li class="TRANSIT" data-mode="TRANSIT " style="opacity: 0.2;"><i class="mode-icon"></i></li>
            <li class="WALKING" data-mode="WALKING"><i class="mode-icon" ></i></li>
            <li class="BICYCLING" data-mode="BICYCLING " style="opacity: 0.2;"><i class="mode-icon"></i></li>
        </ul>
    </div>
    <div class="map-direction-directions" id="direction-guid-box"></div>
</div>