<script>
 $(document).ready(function(){
     /**
     * Map
     */
    var map = $('#map');
    var markers = new Array();
    var colors = ['orange', 'blue', 'cyan', 'pink', 'deep-purple', 'teal', 'indigo', 'green', 'light-green', 'amber', 'yellow', 'deep-orange', 'brown', 'grey'];
        <?php foreach($all_estates as $estate): if(!empty($estate['gps'])): ?>
        var color = colors[Math.floor(Math.random()*colors.length)];
        markers.push({
            latLng: [<?php _che($estate['gps']); ?>],
                marker_content: '<div class="marker  <?php _che($estate['option_6']); ?>-mark-color"><img  src="<?php _che($estate['icon']);?>" alt=""></div>',
            /*  marker_content: '<div class="marker ' + color + '"><img  src="assets/img/house.png" alt=""></div>',*/
            content: '<?php echo _generate_popup($estate, true); ?>'
        });
        <?php endif; endforeach; ?>
  
    if (map.length) {
        map.google_map({
            infowindow: {
                borderBottomSpacing: 0,
                height: 120,
                width: 424,
                offsetX: 30,
                offsetY: -80
            },
            addMyLocation: {
                status: true,
                content:"<?php _l('My location');?>",
                icon: new google.maps.MarkerImage('//maps.gstatic.com/mapfiles/mobile/mobileimgs2.png',
                            new google.maps.Size(22,22),
                            new google.maps.Point(0,18),
                            new google.maps.Point(11,11)),
            },
            zoom: {settings_zoom},
            center:   {
               <?php if(config_item('custom_map_center') === FALSE): ?>
               latLng: [{all_estates_center}],
               <?php else: ?>
               latLng: [<?php echo config_item('custom_map_center'); ?>],
               <?php endif; ?>
           },
            mapTypeControl: true,
            markers: markers,
            transparentClusterImage: map.data('transparent-marker-image'),
            styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"labels.text.fill","stylers":[{"color":"#b43b3b"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"lightness":"8"},{"color":"#bcbec0"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#5b5b5b"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7cb3c9"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#abb9c0"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#fff1f1"},{"visibility":"off"}]}]
        },'removeMarkers');
        
    }
 })  

</script>




<div class="map-wrapper">
    <div id="map" class="map" data-transparent-marker-image="assets/img/transparent-marker-image.png" style=""></div>
    {template_search-filter}<!-- /.map-filter-horizontal --> 

</div><!-- /.map-wrapper -->