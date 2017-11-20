<style type="text/css">
    
    #mylocation {
        margin-top: 90px !important;
    }
    
    div .gmnoprint:last-child {
        margin-top: 100px !important;
    }
    
    @media (max-width: 768px) {
        div .gmnoprint:last-child {
            margin-top: 10px !important;
        }

        #mylocation {
            margin-top: 0 !important;
        }
    }
</style>

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
                content:"<?php _l('Get my location');?>",
                position: google.maps.ControlPosition.RIGHT_TOP,
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
                    
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: true,
            mapTypeControlOptions: {
                position: google.maps.ControlPosition.LEFT_TOP
            },
            markers: markers,
            transparentClusterImage: map.data('transparent-marker-image'),
            styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"labels.text.fill","stylers":[{"color":"#b43b3b"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"lightness":"8"},{"color":"#bcbec0"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#5b5b5b"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7cb3c9"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#abb9c0"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#fff1f1"},{"visibility":"off"}]}]
        },'removeMarkers');
    }
 }) 
 
 /*
 $(document).ready(function(){
  $("#map").on("touchstart keydown mousedown", function(){
     
        var scroll = $(window).scrollTop();
        //console.log('start: '+scroll);
        $(document).on("scroll wheel DOMMouseScroll touchmove mousemove", function(){
           $(window).scrollTop(scroll);
        });
   
       $(document).on("touchend touchcancel mouseup", function(){
           $(window).scrollTop(scroll);
           $(document).unbind("touchend touchcancel mouseup scroll wheel DOMMouseScroll touchmove mousemove")
       });
   });

    
var addTouchSupport = function(id) {
    var mapCanvas = document.getElementById(id);
    var uiElement = document.getElementById(id);

    var needsTouchMap = uiElement.style.cursor;
    if (!needsTouchMap) {
      return;
    }

    var ongoingTouches = [];
    var triggeredMultitouch = false;

    function signalMouseEvent(type, point) {
      uiElement.dispatchEvent(new MouseEvent(type, {
        bubbles: true,
        cancelable: true,
        screenX: point.screenX,
        screenY: point.screenY,
        clientX: point.clientX,
        clientY: point.clientY
      }));
    }

    function getOngoingTouchEventIndex(touch) {
      for (var i = 0; i < ongoingTouches.length; i++) {
        if (touch.identifier === ongoingTouches[i].identifier)
          return i;
      }
      return -1;
    }

    function removeOngoingTouchEvent(touch) {
      var index = getOngoingTouchEventIndex(touch);
      if (index == -1)
        return false;
      ongoingTouches.splice(index, 1);
      return true;
    }

    function updateOngoingTouchEvent(touch) {
      var index = getOngoingTouchEventIndex(touch);
      if (index == -1)
        return false;
      ongoingTouches[index] = touch;
      return true;
    }

    function getOngoingTouchEvent(touch) {
      var index = getOngoingTouchEventIndex(touch);
      return (index == -1 ? null : ongoingTouches[index]);
    }

    var cursorPoint = null;
    var previousMultitouchDistance = null;

    function touchHandler(event) {
      switch (event.type) {
        case 'touchstart':
          for (var i = 0; i < event.changedTouches.length; i++) {
            event.changedTouches[i].lastEvent = event;
            ongoingTouches.push(event.changedTouches[i]);
          }

          if (ongoingTouches.length == 1) {
            cursorPoint = {
              screenX: event.changedTouches[0].screenX,
              screenY: event.changedTouches[0].screenY,
              clientX: event.changedTouches[0].clientX,
              clientY: event.changedTouches[0].clientY
            }
            signalMouseEvent('mousedown', cursorPoint);
          }

          if (ongoingTouches.length == 2) {
            previousMultitouchDistance = Math.sqrt(Math.pow(ongoingTouches[0].screenX - ongoingTouches[1].screenX, 2) + Math.pow(ongoingTouches[0].screenY - ongoingTouches[1].screenY, 2)) || 0;
          }

          break;
        case 'touchend':
          if (!triggeredMultitouch) {
            var previousTouch = getOngoingTouchEvent(event.changedTouches[0])
            if (previousTouch.lastEvent.type == 'touchstart')
              signalMouseEvent('click', cursorPoint);
          }

          for (var i = 0; i < event.changedTouches.length; i++)
            removeOngoingTouchEvent(event.changedTouches[i]);

          if (ongoingTouches.length == 0)
            signalMouseEvent('mouseup', cursorPoint);

          if (ongoingTouches.length == 1) {
            previousMultitouchDistance = null;
          }

          break;
        case 'touchmove':

          var deltaX = 0;
          var deltaY = 0;

          for (var i = 0; i < event.changedTouches.length; i++) {
            var touch = event.changedTouches[i];
            touch.lastEvent = event;

            var lastTouch = getOngoingTouchEvent(touch)
            updateOngoingTouchEvent(touch);
            if (!lastTouch)
              continue;

            var x = touch.screenX - lastTouch.screenX;
            var y = touch.screenY - lastTouch.screenY;
            if (Math.abs(x) > Math.abs(deltaX))
              deltaX = x;
            if (Math.abs(y) > Math.abs(deltaY))
              deltaY = y;
          }

          if (deltaX || deltaY) {
            cursorPoint.screenX += deltaX;
            cursorPoint.screenY += deltaY;
            cursorPoint.clientX += deltaX;
            cursorPoint.clientY += deltaY;
            signalMouseEvent('mousemove', cursorPoint);


            if (event.touches.length == 2) {
              var currentMultitouchDistance = Math.sqrt(Math.pow(event.touches[0].screenX - event.touches[1].screenX, 2) + Math.pow(event.touches[0].screenY - event.touches[1].screenY, 2)) || 0;
              previousMultitouchDistance = previousMultitouchDistance || currentMultitouchDistance;
              var deltaDistance = previousMultitouchDistance - currentMultitouchDistance;
              var newDistance = deltaDistance * 0.10;
              if (Math.abs(newDistance) > 0.25) {
                uiElement.dispatchEvent(new WheelEvent('mousewheel', {
                  bubbles: true,
                  cancelable: true,
                  screenX: cursorPoint.screenX,
                  screenY: cursorPoint.screenY,
                  clientX: cursorPoint.clientX,
                  clientY: cursorPoint.clientY,
                  "deltaY": newDistance,
                  "deltaMode": 0
                }));
              }
              previousMultitouchDistance = currentMultitouchDistance;
            }
          }

          break;
      }
      if (ongoingTouches.length > 1 && !triggeredMultitouch)
        triggeredMultitouch = true;
      else if (ongoingTouches.length == 0 && triggeredMultitouch)
        triggeredMultitouch = false;
      event.preventDefault();
    }
    uiElement.addEventListener("touchstart", touchHandler, true);
    uiElement.addEventListener("touchmove", touchHandler, true);
    uiElement.addEventListener("touchend", touchHandler, true);
    uiElement.addEventListener("touchcancel", touchHandler, true);
  }
addTouchSupport('map');

 })
*/
</script>


<div class="map-wrapper">
    
    <?php if(config_item('tree_field_enabled') === TRUE && config_item('multiple_enabled') !== FALSE):?>
    <script language="javascript">

        /* [START] TreeField */

        $(function() {
            $(".search-form .TREE-GENERATOR select").change(function(){
                var s_value = $(this).val();
                var s_name_splited = $(this).attr('name').split("_"); 
                var s_level = parseInt(s_name_splited[3]);
                var s_lang_id = s_name_splited[1];
                var s_field_id = s_name_splited[0].substr(6);
                // console.log(s_value); console.log(s_level); console.log(s_field_id);

                load_by_field($(this));

                // Reset child selection and value generator
                var generated_val = '';
                $(this).parent().parent()
                .find('select').each(function(index){
                    // console.log($(this).attr('name'));
                    if(index > s_level)
                    {
                        //$(this).html('<option value=""><?php echo lang_check('No values found'); ?></option>');

                        $(this).find("option:gt(0)").remove();
                        $(this).val('');
                        $(this).selectpicker('refresh');
                    }
                    else
                        generated_val+=$(this).find("option:selected").text()+" - ";
                });
                //console.log(generated_val);
                $("#sinputOption_"+s_lang_id+"_"+s_field_id).val(generated_val);

            });

        });

        function load_by_field(field_element, autoselect_next, s_values_splited)
        {
            if (typeof autoselect_next === 'undefined') autoselect_next = false;
            if (typeof s_values_splited === 'undefined') s_values_splited = [];

            var s_value = field_element.val();
            var s_name_splited = field_element.attr('name').split("_"); 
            var s_level = parseInt(s_name_splited[3]);
            var s_lang_id = s_name_splited[1];
            var s_field_id = s_name_splited[0].substr(6);
            // console.log(s_value); console.log(s_level); console.log(s_field_id);

            // Load values for next select
            var ajax_indicator = field_element.parent().parent().parent().find('.ajax_loading');
            var select_element = $("select[name=option"+s_field_id+"_"+s_lang_id+"_level_"+parseInt(s_level+1)+"]");
            if(select_element.length > 0 && s_value != '')
            {
                ajax_indicator.css('display', 'block');
                $.getJSON( "<?php echo site_url('api/get_level_values_select'); ?>/"+s_lang_id+"/"+s_field_id+"/"+s_value+"/"+parseInt(s_level+1), function( data ) {
                    //console.log(data.generate_select);
                    //console.log("select[name=option"+s_field_id+"_"+s_lang_id+"_level_"+parseInt(s_level+1)+"]");
                    ajax_indicator.css('display', 'none');

                    select_element.html(data.generate_select);
                    select_element.selectpicker('refresh');

                    if(autoselect_next)
                    {
                        if(s_values_splited[s_level+1] != '')
                        {
                            select_element.find('option').filter(function () { return $(this).html() == s_values_splited[s_level+1]; }).attr('selected', 'selected');
                            load_by_field(select_element, true, s_values_splited);


                        }
                    }
                });
            }
        }

        /* [END] TreeField */

    </script>

    <div class="map-filter-horizontal search-select" style="top: 0;bottom: initial;z-index: 5;padding: 10px 0 0px 0;">
            <div class="container search-form">
                <form class="form-inline form-real">
                    <div class="row">

                    <!-- [START] TreeSearch -->
                    <?php if(config_item('tree_field_enabled') === TRUE):?>
                    <?php

                        $CI =& get_instance();
                        $CI->load->model('treefield_m');
                        $field_id = 64;
                        $drop_options = $CI->treefield_m->get_level_values($lang_id, $field_id);
                        $drop_selected = array();
                        echo '<div class="tree TREE-GENERATOR">';
                        echo '<div class="field-tree form-group col-sm-3">';
                        echo form_dropdown('option'.$field_id.'_'.$lang_id.'_level_0', $drop_options, $drop_selected, 'class="form-control selectpicker tree-input" id="sinputOption_'.$lang_id.'_'.$field_id.'_level_0'.'"');
                        echo '</div>';

                        $levels_num = $CI->treefield_m->get_max_level($field_id);

                        if($levels_num>0)
                        for($ti=1;$ti<=$levels_num;$ti++)
                        {
                            $lang_empty = lang('treefield_'.$field_id.'_'.$ti);
                            if(empty($lang_empty))
                                $lang_empty = lang_check('Please select parent');

                            echo '<div class="field-tree form-group col-sm-3">';
                            echo form_dropdown('option'.$field_id.'_'.$lang_id.'_level_'.$ti, array(''=>$lang_empty), array(), 'class="form-control selectpicker tree-input" id="sinputOption_'.$lang_id.'_'.$field_id.'_level_'.$ti.'"');
                            echo '</div>';
                        }
                        echo '</div>';

                    ?>
                    <?php endif; ?>
                    <!-- [END] TreeSearch -->
                    </div>

                    <br style="clear:both;" />
                    <div style="display:none;"><div id="tags-filters"> </div>

                    </div>
                    <div class="form-group" id='addit-search-start' style="display:none;">

                    <img id="ajax-indicator-1" src="assets/img/ajax-loader.gif" />
                    </div>

                </form>
            </div><!-- /.container -->
        </div>
    <?php endif; ?>   

    <div id="map" class="map cityguide-map" data-transparent-marker-image="assets/img/transparent-marker-image.png"></div>
    {template_search-filter-cityguide}<!-- /.map-filter-horizontal --> 
</div><!-- /.map-wrapper -->

<script type="text/javascript">

$(document).ready(function(){
    
    if(!$('#search-start').length){
        $('#addit-search-start').append('<button id="search-start" type="submit" class="btn hidden">&nbsp;&nbsp;{lang_Search}&nbsp;&nbsp;</button>')
        $('#search-start').click(function () { 
          manualSearch(0);
          return false;
        });
    }
    
    <?php if(config_item('auto_map_search')==TRUE):?>
    $(".search-form .TREE-GENERATOR select").change(function(){
        //$('#search-start').trigger('click');
        manualSearch(0, false);
    })
    <?php endif;?>
})

</script>
