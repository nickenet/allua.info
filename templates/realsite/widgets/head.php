<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title>{page_title}</title>
<meta name="description" content="{page_description}" />
<meta name="keywords" content="{page_keywords}" />
<meta name="author" content="" />
<link rel="shortcut icon" href="<?php echo $website_favicon_url;?>" type="image/png" />

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700&amp;subset=latin,latin-ext">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
<link rel="stylesheet" type="text/css" href="assets/libraries/Font-Awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-fileinput/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/nvd3/nv.d3.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/OwlCarousel/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assets/css/realsite.css">
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fileupload-ui.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fileupload-ui-noscript.css">
<link rel="stylesheet" type="text/css" href="assets/css/helpers/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/blueimp-gallery.min.css">

{has_color}
<link href="assets/css/styles_{color}.css" rel="stylesheet">
{/has_color}

<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/libraries/jquery-transit/jquery.transit.js"></script>
<script type="text/javascript" src="assets/js/realsite.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap/assets_test/javascripts/bootstrap/dropdown.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap/assets_test/javascripts/bootstrap/collapse.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap/assets_test/javascripts/bootstrap/carousel.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/vendor/ssex/javascripts/bootstrap/transition.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/vendor/ssex/javascripts/bootstrap/collapse.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/vendor/ssex/javascripts/bootstrap/dropdown.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/vendor/ssex/javascripts/bootstrap/tab.js"></script>
<script type="text/javascript" src="assets/libraries/autosize/jquery.autosize.js"></script>
<script type="text/javascript" src="assets/libraries/isotope/dist/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="assets/libraries/OwlCarousel/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/libraries/jquery.scrollTo/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap3-typeahead.js"></script>

<!-- [START] Google maps -->
<?php 
$config_base_url = config_item('base_url');
$url_protocol='http://';
if(!empty($config_base_url)&& strpos( $config_base_url,'https')!== false){
    $url_protocol='https://';
}

$maps_api_key = config_db_item('maps_api_key');
$maps_api_key_prepare='';
if(!empty($maps_api_key)){
    $maps_api_key_prepare='&amp;key='.$maps_api_key;
}

?>
<script type="text/javascript" src="<?php echo $url_protocol;?>maps.google.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing<?php echo $maps_api_key_prepare; ?>&amp;language={lang_code}"></script>
    
<script type="text/javascript" src="assets/libraries/jquery-google-map/infobox.js"></script>
<script type="text/javascript" src="assets/libraries/jquery-google-map/markerclusterer.js"></script>
<script type="text/javascript" src="assets/libraries/jquery-google-map/jquery-google-map.js"></script>
<!-- [END] Google maps -->

<script type="text/javascript" src="assets/libraries/nvd3/lib/d3.v3.js"></script>
<script type="text/javascript" src="assets/libraries/nvd3/nv.d3.min.js"></script>
<script src="assets/js/holder.min.js"></script>  
<script type="text/javascript" src="assets/js/charts.js"></script>
<script type="text/javascript" src="assets/js/map.js"></script>
  

{is_rtl}
<link href="assets/css/styles_rtl.css" rel="stylesheet">
{/is_rtl}

<!-- jquery.cookiebar -->
<!-- url -- http://www.primebox.co.uk/projects/jquery-cookiebar/ -->
<script src="assets/js/jquery.cookiebar.js"></script>
<link href="assets/css/jquery.cookiebar.css" rel="stylesheet">
<!--end jquery.cookiebar -->

<!-- magnific-popup -->
<!-- url -- https://plugins.jquery.com/magnific-popup/ -->
<?php if(config_item('report_property_enabled') == TRUE): ?>
    <link rel="stylesheet" href="assets/libraries/magnific-popup/magnific-popup.css" />
    <script type="text/javascript" src="assets/libraries/magnific-popup/jquery.magnific-popup.js"></script>
<?php endif;?>
<!--end magnific-popup -->


<script type="text/javascript">
    $(window).load(function() {
    'use strict';
    /**
     * Isotope
     */
    var isotope_properties = $('.properties-isotope');
    isotope_properties.isotope({
        'itemSelector': '.item'
    });
    $('.properties-filter a').click(function() {
        $(this).parent().parent().find('li').removeClass('selected');
        $(this).parent().addClass('selected');

        var selector = $(this).attr('data-filter');
        isotope_properties.isotope({ filter: selector });
        return false;
    });
});

$(function(){
    var ink, d, x, y;
    $(".btn, .btn-secondary, .header-action").click(function(e){
        if($(this).find(".ink").length === 0){
            $(this).prepend("<span class='ink'></span>");
        }
             
        ink = $(this).find(".ink");
        ink.removeClass("animate");
         
        if(!ink.height() && !ink.width()){
            d = Math.max($(this).outerWidth(), $(this).outerHeight());
            ink.css({height: d, width: d});
        }
         
        x = e.pageX - $(this).offset().left - ink.width()/2;
        y = e.pageY - $(this).offset().top - ink.height()/2;
         
        ink.css({top: y+'px', left: x+'px'}).addClass("animate");
    });
});

/*
 * 
 * Resize arrow slider
 * 
 */

function resizeArrow () {
        var arrow_height = 
                parseInt($('#carousel-example-generic').height()-
                $('#carousel-example-generic .map-filter-horizontal').outerHeight())
       /* if(map_height > 300)*/
            $("#carousel-example-generic .carousel-control").height(arrow_height);
}

$(window).load(function(){
        resizeArrow();
        $(window).on('resize', function(){
              resizeArrow();
        });
})

/*
 * END Resize arrow slider
 */


$(document).ready(function() {
    'use strict';

    /**
     * Input file
     */
    $('#input-file').fileinput({
        initialPreview: [
            "<img src='assets/img/tmp/medium/1.jpg' class='file-preview-image' alt='The Moon' title='Property 1'>",
            "<img src='assets/img/tmp/medium/2.jpg' class='file-preview-image' alt='The Earth' title='Property 2'>",
        ],
        overwriteInitial: true,
        initialCaption: "Your Uploaded Properties"
    });

    /**
     * Input Group
     */
     $('.input-group .form-control').on('focus', function() {
         $(this).closest('.input-group').find('.input-group-addon').addClass('active');
     }).on('blur', function() {
         $(this).closest('.input-group').find('.input-group-addon').removeClass('active');
     });

    /**
     * Scroll top
     */
    var scroll_top = $('.scroll-top');
    if(scroll_top.length != 0) {
        scroll_top.on('click', function() {
            $.scrollTo('.header', 800);
        });
    }

    /**
     * Property gallery
     */
    if ($('.property-gallery-list').length != 0) {
        $('.property-gallery-list').owlCarousel({
            items: 6,
            itemsDesktop : [1199, 5],
            itemsDesktopSmall : [979, 5],
            itemsTablet : [768, 3],
            itemsTabletSmall : [1, 3],
            itemsMobile : false,
            navigation: true,
            navigationText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        });
        
        /* every time navigation show */
        $('.property-gallery-list .owl-controls').show();
    }

    /**
    * Property carousel
    */
    if ($('.property-carousel').length != 0) {
        $('.property-carousel').owlCarousel({
            items: 4,
            itemsDesktop : [1199, 5],
            itemsDesktopSmall : [979, 3],
            itemsTablet : [768, 2],
            itemsTabletSmall : [400, 1],
            itemsMobile : false,
            navigation: true,
            responsiveClass:true,
            navigationText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
        });
        
        /* every time navigation show */
        $('.property-carousel .owl-controls').show()
    }

    $('.property-gallery-list-item a').on('click', function(e) {
        e.preventDefault();

        $('.property-gallery-list-item').each(function() {
            $(this).removeClass('active');
        });

        $(this).closest('li').addClass('active');

        var link = $(this).attr('href');
        var link_full = $(this).attr('data-link');
        $('.property-gallery-preview img').attr('src', link);
        $('.property-gallery-preview a').attr('href', link_full);
    });

    /**
     * Autosize textarea
     */
    $('textarea').autosize();

    /**
     * Bootstrap select
     */
    $('.search-select select, .properties-sort select').selectpicker({
        size: 10
    });

    /**
     * Background image
     */
    $('*[data-background-image]').each(function() {
        $(this).css({
            'background-image': 'url(' + $(this).data('background-image') + ')'
        });
    });

    /**
     * Dropdown
     */
    $('div.dropdown-menu').on('focusin', function() {
        $(this).transition({
            height: 'auto',
            duration: 150,
            width: 'auto'
        });
    });

    $('div.dropdown-menu').on('focusout', function() {
        $(this).transition({
            height: 0,
            duration: 250,
            width: 0
        });
    });

    /**
     * Header animation
     */
     /**
      * Header animation
      */
      
    if ($(window).outerWidth() < 768) {
        $('#nav-main > li.has-children').on({'click': function(e) {
            e.preventDefault();
            if($(this).hasClass('op')) {
                var el = $('> div', this);
                el.transition({
                    height: 0,
                    duration: 150,
                    width: 0
                });
                $('#nav-main > li.has-children').removeClass('op');
            } else {
                $('#nav-main > li.has-children > div').transition({
                    height: 0,
                    duration: 150,
                    width: 0
                });
                $('#nav-main > li.has-children').removeClass('op');
                $(this).addClass('op');
                var el = $('> div', this);
                el.transition({
                    height: 'auto',
                    duration: 250,
                    width: 'auto'
                });
            }
         }, 
     });
    } else {
        $('#nav-main > li.has-children').hover(function() {
             var el = $('> div', this);

             el.transition({
                 height: 'auto',
                 duration: 250,
                 width: 'auto'
             });
         }, function() {
             var el = $('> div', this);

             el.transition({
                 height: 0,
                 duration: 150,
                 width: 0
             });
         });
    }
     // Second level
     $('#nav-main > li.has-children > div > ul > li.has-children').hover(function() {
         var el = $('> div', this);

         $(this).closest('div').css('overflow', 'visible');

         el.transition({
             height: 'auto',
             duration: 250,
             width: 'auto'
         });
     }, function() {
         var el = $('> div', this);

         $(this).closest('div').css('overflow', 'hidden');

         el.transition({
             height: 0,
             duration: 150,
             width: 0
         });
     });

    $('.navbar-toggle').on('click', function() {
        $('.nav-main-wrapper').toggleClass('open');
    });

    $('.nav-main-wrapper').on('click', function(e) {
        if (e.offsetX > 240) {
            $('.nav-main-wrapper').removeClass('open');
        }
    })
});
</script>

<!-- request -->
<script src="assets/js/gmap3.js"></script>
<!-- no request -->
<script src="assets/js/bootstrap-datetimepicker.min.js"></script> 
<script src="assets/js/jquery.helpers.js"></script>
<script type="text/javascript" src="assets/js/jquery.number.js"></script>
<script type="text/javascript" src="assets/js/jquery.h5validate.js"></script>

{has_extra_js}
<script src="assets/js/jquery.cleditor.min.js"></script>
<script src="assets/js/load-image.js"></script>
<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script> <!-- jQuery UI -->
<link href="assets/css/jquery.cleditor.css" rel="stylesheet">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="assets/css/jquery.fileupload-ui.css" />
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="assets/css/jquery.fileupload-ui-noscript.css" /></noscript>    
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="assets/js/fileupload/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="assets/js/fileupload/jquery.fileupload.js"></script>
<!-- The File Upload file processing plugin -->
<script src="assets/js/fileupload/jquery.fileupload-fp.js"></script>
<!-- The File Upload user interface plugin -->
<script src="assets/js/fileupload/jquery.fileupload-ui.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="assets/js/cors/jquery.xdr-transport.js')?>"></script><![endif]-->
<script src="assets/js/gmap3.js"></script>
{/has_extra_js}
<script type="text/javascript" src="assets/js/gmap3.infobox.js"></script>
<script type="text/javascript" src="assets/js/gmap3.clusterer.js"></script>
<script type="text/javascript" src="assets/js/map_custom.js"></script>
<script type="text/javascript" src="assets/js/blueimp-gallery.min.js"></script>
    
<script language="javascript">
        
        var timerMap;
        var ad_galleries;
        var firstSet = false;
        var mapRefresh = true;
        var loadOnTab = true;
        var zoomOnMapSearch = 9;
        var clusterConfig = null;
        var markerOptions = null;
        var mapDisableAutoPan = false;
        var mapStyle = null;
        var rent_inc_id = '55';
        var scrollWheelEnabled = false;
        var myLocationEnabled = true;
        var rectangleSearchEnabled = true;
        var c_mapTypeId = "style1"; // google.maps.MapTypeId.ROADMAP;
        var c_mapTypeIds = ["style1",
                            google.maps.MapTypeId.ROADMAP,
                            google.maps.MapTypeId.HYBRID];          
        //google.maps.MapTypeId.ROADMAP
        //google.maps.MapTypeId.SATELLITE
        //google.maps.MapTypeId.HYBRID
        //google.maps.MapTypeId.TERRAIN
        
        var selectorResults = '.results-properties-list';

        $(document).ready(function()
        {
            // Cluster config start //
            clusterConfig = {
              radius: 60,
              // This style will be used for clusters with more than 2 markers
//              2: {
//                content: "<div class='cluster cluster-1'>CLUSTER_COUNT</div>",
//                width: 53,
//                height: 52
//              },
              // This style will be used for clusters with more than 5 markers
              5: {
                content: "<div class='cluster cluster-1'>CLUSTER_COUNT</div>",
                width: 53,
                height: 52
              },
              // This style will be used for clusters with more than 20 markers
              20: {
                content: "<div class='cluster cluster-2'>CLUSTER_COUNT</div>",
                width: 56,
                height: 55
              },
              // This style will be used for clusters with more than 50 markers
              50: {
                content: "<div class='cluster cluster-3'>CLUSTER_COUNT</div>",
                width: 66,
                height: 65
              },
              events: {
                click:function(cluster, event, object) {
                    try {
                        var same_address = true;
                        var adr = '';
                        $.each(object.data.markers, function(item) {
                            
                            if(adr == '')
                                adr = object.data.markers[item].adr;
                            
                            if(adr != object.data.markers[item].adr)
                                same_address = false;
                        });
                        
                        if(same_address)
                        {
                            cluster.main.map.panTo(object.data.latLng);
                            cluster.main.map.setZoom(19);
                        }
                        else
                        {
                            cluster.main.map.panTo(object.data.latLng);
                            cluster.main.map.setZoom(cluster.main.map.getZoom()+1);
                        }
                    }
                    catch(err) {
                        cluster.main.map.panTo(object.data.latLng);
                        cluster.main.map.setZoom(cluster.main.map.getZoom()+1);
                    }
                }
              }
            };
            // Cluster config end //
            
            // Map style start //
            
            //mapStyle = [{"featureType":"water","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"color":"#f2f2f2"}]},{"featureType":"road","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]}];
            //mapStyle = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]}];
            mapStyle = [{"featureType":"landscape","stylers":[{"hue":"#FFA800"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#53FF00"},{"saturation":-73},{"lightness":40},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FBFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#00FFFD"},{"saturation":0},{"lightness":30},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00BFFF"},{"saturation":6},{"lightness":8},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#679714"},{"saturation":33.4},{"lightness":-25.4},{"gamma":1}]}];

            // Map style end //
            
            // Map Marker options start //
            markerOptions = {
              draggable: false
            };
            // Map Marker options  end //
            
            // Calendar translation start //
            
            var translated_cal = {
    			days: ["{lang_cal_sunday}", "{lang_cal_monday}", "{lang_cal_tuesday}", "{lang_cal_wednesday}", "{lang_cal_thursday}", "{lang_cal_friday}", "{lang_cal_saturday}", "{lang_cal_sunday}"],
    			daysShort: ["{lang_cal_sun}", "{lang_cal_mon}", "{lang_cal_tue}", "{lang_cal_wed}", "{lang_cal_thu}", "{lang_cal_fri}", "{lang_cal_sat}", "{lang_cal_sun}"],
    			daysMin: ["{lang_cal_su}", "{lang_cal_mo}", "{lang_cal_tu}", "{lang_cal_we}", "{lang_cal_th}", "{lang_cal_fr}", "{lang_cal_sa}", "{lang_cal_su}"],
    			months: ["{lang_cal_january}", "{lang_cal_february}", "{lang_cal_march}", "{lang_cal_april}", "{lang_cal_may}", "{lang_cal_june}", "{lang_cal_july}", "{lang_cal_august}", "{lang_cal_september}", "{lang_cal_october}", "{lang_cal_november}", "{lang_cal_december}"],
    			monthsShort: ["{lang_cal_jan}", "{lang_cal_feb}", "{lang_cal_mar}", "{lang_cal_apr}", "{lang_cal_may}", "{lang_cal_jun}", "{lang_cal_jul}", "{lang_cal_aug}", "{lang_cal_sep}", "{lang_cal_oct}", "{lang_cal_nov}", "{lang_cal_dec}"]
    		};
            
            if(typeof(DPGlobal) != 'undefined'){
                DPGlobal.dates = translated_cal;
            }
            
            if($(selectorResults).length <= 0)
                selectorResults = '.mytestresult';
            
            // Calendar translation End //
            
            // Slider range Start //   
            // Slider range End //
            
            // [START] Save search //  
            
            $("#search-save").click(function(){
                manualSearch(0, '#content', true);
                
                return false;
            });
            
            // [END] Save search //
            
            <?php if(config_db_item('agent_masking_enabled') == TRUE && isset($property_id) && isset($agent_id)): ?>
            // Popup form Start //
                $('.popup-with-form').magnificPopup({
                	type: 'inline',
                	preloader: false,
                	focus: '#name',
                                    
                	// When elemened is focused, some mobile browsers in some cases zoom in
                	// It looks not nice, so we disable it:
                	callbacks: {
                		beforeOpen: function() {
                			if($(window).width() < 700) {
                				this.st.focus = false;
                			} else {
                				this.st.focus = '#name';
                			}
                		}
                	}
                });
                
                $('#unhide-agent-mask').click(function(){
                    
                    var data = $('#test-form').serializeArray();
                    data.push({name: 'property_id', value: "<?php echo $property_id; ?>"});
                    data.push({name: 'agent_id', value: "<?php echo $agent_id; ?>"});
                    
                    //console.log( data );
                    $('#ajax-indicator-masking').css('display', 'inline');
                    
                    // send info to agent
                    $.post("<?php echo site_url('frontend/maskingsubmit/'.$lang_code); ?>", data,
                    function(data){
                        if(data=='successfully')
                        {
                            // Display agent details
                            $('.popup-with-form').css('display', 'none');
                            // Close popup
                            $.magnificPopup.instance.close();
                        }
                        else
                        {
                            $('.alert.hidden').css('display', 'block');
                            $('.alert.hidden').css('visibility', 'visible');
                            
                            $('#popup-form-validation').html(data);
                            
                            //console.log("Data Loaded: " + data);
                        }
                        $('#ajax-indicator-masking').css('display', 'none');
                    });

                    return false;
                });
            <?php endif; ?>
            // Popup form End //      
            
            <?php if(config_db_item('price_by_purpose') == TRUE): ?>
            // Show price by purpose START //    
            $('form.form-estate ul.nav-tabs li a').each(function(){
                var lang_id = $(this).attr('href').substr(1);
                var sel_purpose = $('select[name=option4_'+lang_id+']').find('option:selected').text();
                hide_price_fields(sel_purpose, lang_id);
                
                $('select[name=option4_'+lang_id+']').change(function(){
                    var sel_purpose = $(this).find('option:selected').text();

                    hide_price_fields(sel_purpose, lang_id);
                })
            });
            
            function hide_price_fields(sel_purpose, lang_id)
            {
                if(sel_purpose=='<?php echo lang_check('Sale')?>')
                {
                    $('input[name=option36_'+lang_id+']').parent().parent().show();
                    $('input[name=option37_'+lang_id+']').parent().parent().hide();
                    $('input[name=option'+rent_inc_id+'_'+lang_id+']').parent().parent().hide();
                    
                    $('input[name=option37_'+lang_id+']').val('');
                    $('input[name=option'+rent_inc_id+'_'+lang_id+']').val('');
                }
                else if(sel_purpose=='<?php echo lang_check('Rent')?>')
                {
                    $('input[name=option36_'+lang_id+']').parent().parent().hide();
                    $('input[name=option37_'+lang_id+']').parent().parent().show();
                    $('input[name=option'+rent_inc_id+'_'+lang_id+']').parent().parent().show();
                    
                    $('input[name=option36_'+lang_id+']').val('');
                }
                else // Sale and Rent
                {
                    $('input[name=option36_'+lang_id+']').parent().parent().show();
                    $('input[name=option37_'+lang_id+']').parent().parent().show();
                    $('input[name=option'+rent_inc_id+'_'+lang_id+']').parent().parent().show();
                }
            }
            
            // Show price by purpose END //     
            <?php endif; ?>
            
            // Filters Start //
            
            $(".checkbox_am").click((function(){
                var option_id = $(this).attr('option_id');
                
                if($(this).prop('checked'))
                {
                    $("#search_option_"+option_id).prop('checked', true);
                }
                else
                {
                    $("#search_option_"+option_id).prop('checked', false);
                }
                //console.log(option_id);
            }));
            
            $(".input_am").focusout((function(){
                var option_id = $(this).attr('option_id');
                
                $("#search_option_"+option_id).val($(this).val());
                //console.log(option_id);
            }));
            
            $(".input_am_from").focusout((function(){
                var option_id = $(this).attr('option_id');
                $("#search_option_"+option_id+"_from").val($(this).val());
                //console.log(option_id);
            }));
            
            $(".input_am_to").focusout((function(){
                var option_id = $(this).attr('option_id');
                
                $("#search_option_"+option_id+"_to").val($(this).val());
                //console.log(option_id);
            }));
            
            <?php if(empty($_GET['search'])): ?>
            $(".checkbox_am, .search-form .advanced-form-part label.checkbox input").prop('checked', false);
            $(".input_am, .input_am_from, .input_am_to, .search-form input[type=text], .search-form select").val('');
            <?php endif; ?>
            
            $('.search-form select.selectpicker').selectpicker('render');
            
            $("button.refresh_filters").click(function () { 
                manualSearch(0);
                return false;
            });
            
            // Filters End //            
            
            <?php if(config_item('ad_gallery_enabled') == TRUE): ?>
            //ad_galleries = $('.ad-gallery').adGallery();
            <?php endif; ?>
            
            /*
            $('#your_button_id').click(function(){
                $("#wrap-map").gmap3({
                 map:{
                    options:{
                     center: [{all_estates_center}],
                     zoom: {settings_zoom}
                    }
                 }});
               return false; 
            });
            */
            
            //Init carousel
            
            $('#search-start-map').click(function () { 
                $('#wrap-map-1').attr('id', 'wrap-map');
              manualSearch(0, false);
              return false;
            });
            
            /*
            $(".scroll").click(function(event){
                 event.preventDefault();
                 //calculate destination place
                 var dest=0;
                 if($(this.hash).offset().top > $(document).height()-$(window).height()){
                      dest=$(document).height()-$(window).height();
                 }else{
                      dest=$(this.hash).offset().top;
                 }
                 //go to destination
                 $('html,body').animate({scrollTop:dest}, 2000,'swing');
             });
             
             */

            /* Search start */

            /* select category */
            
            $('.menu-onmap .property-box-category').click(function () { 
              if(!$(this).parent().hasClass('list-property-button'))
              {
                  /*$(this).parent().find('li').removeClass("active");
                  $(this).addClass("active");*/
            
                  if($('.tabbed-selector_2').length){
                      return false;
                  }
            
                    var _type=$(this).attr('data-type');
                  
                    $('#search_option_2.selectpicker').val(_type);
                    $('#search_option_2.selectpicker').selectpicker('render');
                
                  if(loadOnTab) manualSearch(0, false);
                  return false;
              }
            });

            $('.menu-onmap li a').click(function () { 
              if(!$(this).parent().hasClass('list-property-button'))
              {
                  $(this).parent().parent().find('li').removeClass("active");
                  $(this).parent().addClass("active");
                  if(loadOnTab) manualSearch(0, false);
                  return false;
              }
            });
            
            /* ignore for fullscreen */
            $('.fullscreen #search_option_4.menu-onmap li a').click(function () { 
              if(!$(this).parent().hasClass('list-property-button'))
              { 
                  $(this).parent().parent().find('li').removeClass("active");
                  $(this).parent().addClass("active");
                  
                  $('#search_option_2 li').removeClass('active');
                  $('#search_option_2 li.all-button').addClass('active');
                  
                  /*if(loadOnTab) manualSearch(0, false);*/
                  return false;
              }
            });
            
            $('.fullscreen #search_option_2.menu-onmap li a').click(function () { 
              if(!$(this).parent().hasClass('list-property-button'))
              { 
                  $(this).parent().parent().find('li').removeClass("active");
                  $(this).parent().addClass("active");
                  
                  $('#search_option_4 li').removeClass('active');
                  $('#search_option_4 li.all-button').addClass('active');
                  
                  /*if(loadOnTab) manualSearch(0, false);*/
                  return false;
              }
            });
            
            /* end ignore for fullscreen */
            
            <?php if(config_item('all_results_default') !== TRUE): ?>
            if($('.menu-onmap li.active').length == 0)
            {
                if(!$('.menu-onmap li:first').hasClass('list-property-button'))
                    $('.menu-onmap li:first').addClass('active');
            }
            <?php else: ?>
            if($('.menu-onmap li.active').length == 0)
            {
                $('.menu-onmap li.all-button').addClass('active');
            }
            <?php endif; ?>
            
            $('#search-start').click(function () { 
              manualSearch(0);
              return false;
            });
            /* Search end */
            
            <?php $dates_list = ''; if(isset($available_dates) && file_exists(APPPATH.'controllers/admin/booking.php')): ?>
            var dates_list = [];
            <?php foreach($available_dates as $date_format => $unix_format): ?>
            <?php
                $dates_list.='"'.$date_format.'", ';
            ?>
            <?php endforeach; ?>
            <?php
                if($dates_list != '')
                    $dates_list = substr($dates_list, 0, -2);
            ?>dates_list = [<?php echo $dates_list; ?>];
            <?php endif; ?>
            
            /* Date picker */
            var nowTemp = new Date();
            
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

            $('.datetimepicker_standard').datepicker().on('changeDate', function(ev) {
                $(this).datepicker('hide');
            });

            var checkin = $('#datetimepicker1').datepicker({
                onRender: function(date) {
                    
                    //console.log(date.valueOf());
                    //console.log(date.toString());
                    //console.log(now.valueOf());
                    
                    var dd = date.getDate();
                    var mm = date.getMonth()+1;//January is 0!`
                    
                    var yyyy = date.getFullYear();
                    if(dd<10){dd='0'+dd}
                    if(mm<10){mm='0'+mm}
                    var today_formated = yyyy+'-'+mm+'-'+dd;
                    
                    
                    if(date.valueOf() < now.valueOf()) // Just for performance
                    {
                        return 'disabled';
                    }
                    <?php if(file_exists(APPPATH.'controllers/admin/booking.php')): ?>
                    else if(dates_list.indexOf(today_formated )>= 0)
                    {
                        return '';
                    }
                    
                    return 'disabled red';
                    <?php else: ?>
                    return '';
                    <?php endif;?>
                }
            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date);
                    newDate.setDate(newDate.getDate() + 7);
                    checkout.setValue(newDate);
                }
                checkin.hide();
                $('#datetimepicker2')[0].focus();
            }).data('datepicker');
                var checkout = $('#datetimepicker2').datepicker({
                onRender: function(date) {

                    var dd = date.getDate();
                    var mm = date.getMonth()+1;//January is 0!`
                    
                    var yyyy = date.getFullYear();
                    if(dd<10){dd='0'+dd}
                    if(mm<10){mm='0'+mm}
                    var today_formated = yyyy+'-'+mm+'-'+dd;
                    
                    
                    if(date.valueOf() <= checkin.date.valueOf()) // Just for performance
                    {
                        return 'disabled';
                    }                    
                    <?php if(file_exists(APPPATH.'controllers/admin/booking.php')): ?>
                    else if(dates_list.indexOf(today_formated )>= 0)
                    {
                        return '';
                    }
                    
                    return 'disabled red';
                    <?php else: ?>
                    return '';
                    <?php endif;?>
            }
            }).on('changeDate', function(ev) {
                checkout.hide();
            }).data('datepicker');
            
            <?php if(file_exists(APPPATH.'controllers/admin/booking.php')): ?>
            /* Search booking form */
            
            var checkin_booking = $('#booking_date_from').datepicker({
                onRender: function(date) {
                    var dd = date.getDate();
                    var mm = date.getMonth()+1;//January is 0!`
                    
                    var yyyy = date.getFullYear();
                    if(dd<10){dd='0'+dd}
                    if(mm<10){mm='0'+mm}
                    var today_formated = yyyy+'-'+mm+'-'+dd;
                    
                    
                    if(date.valueOf() < now.valueOf())
                    {
                        return 'disabled';
                    }
                    
                    return '';
                }
            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkout_booking.date.valueOf()) {
                    var newDate = new Date(ev.date);
                    newDate.setDate(newDate.getDate() + 7);
                    checkout_booking.setValue(newDate);
                }
                checkin_booking.hide();
                $('#booking_date_to')[0].focus();
            }).data('datepicker');
                var checkout_booking = $('#booking_date_to').datepicker({
                onRender: function(date) {

                    var dd = date.getDate();
                    var mm = date.getMonth()+1;//January is 0!`
                    
                    var yyyy = date.getFullYear();
                    if(dd<10){dd='0'+dd}
                    if(mm<10){mm='0'+mm}
                    var today_formated = yyyy+'-'+mm+'-'+dd;
                    
                    
                    if(date.valueOf() <= checkin_booking.date.valueOf())
                    {
                        return 'disabled';
                    }
                    
                    return '';
            }
            }).on('changeDate', function(ev) {
                checkout_booking.hide();
            }).data('datepicker');
            <?php endif;?>
            
            $('a.available.selectable').click(function(){
                $('#datetimepicker1').val($(this).attr('ref'));
                $('#datetimepicker2').val($(this).attr('ref_to'));
                $('div.property-form form input:first').focus();
                
                var nowTemp = new Date($(this).attr('ref'));
                var date_from = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

                checkin.setValue(date_from);
                date_from.setDate(date_from.getDate() + 7);
                checkout.setValue(date_from);
            });
            
            
            /* Date picker end */
            
            /* Edit property */
            
            // If alredy selected
         /* if($('#inputGps').length && $('#inputGps').val() != '')
            {
                savedGpsData = $('#inputGps').val().split(", ");
                
                $("#mapsAddress").google_map({
                    map:{
                      options:{
                        center: [parseFloat(savedGpsData[0]), parseFloat(savedGpsData[1])],
                        zoom: 14
                      }
                    },
                    marker:{
                    values:[
                      {latLng:[parseFloat(savedGpsData[0]), parseFloat(savedGpsData[1])]},
                    ],
                    options:{
                      draggable: true
                    },
                    events:{
                        dragend: function(marker){
                          $('#inputGps').val(marker.getPosition().lat()+', '+marker.getPosition().lng());
                        }
                  }}});
                
                firstSet = true;
            }
            else
            {
                $("#mapsAddress").google_map({
                    map:{
                      options:{
                        center: [{settings_gps}],
                        zoom: 12
                      },
                    },
                marker:{
                    values:[
                      {latLng:[{settings_gps}]},
                    ],
                    options:{
                      draggable: true
                    },
                    events:{
                        dragend: function(marker){
                          $('#inputGps').val(marker.getPosition().lat()+', '+marker.getPosition().lng());
                        }
                  }}
                  });
            }*/
              /*  
            $('#inputAddress').keyup(function (e) {
                clearTimeout(timerMap);
                timerMap = setTimeout(function () {
                    
                    $("#mapsAddress").google_map({
                      getlatlng:{
                        address:  $('#inputAddress').val(),
                        callback: function(results){
                          if ( !results ){
                            ShowStatus.show('<?php echo str_replace("'", "\'", lang_check('Address not found!')); ?>');
                            return;
                          } 
                          
                            if(firstSet){
                                $(this).google_map({
                                    clear: {
                                      name:["marker"],
                                      last: true
                                    }
                                });
                            }
                          
                          // Add marker
                          $(this).google_map({
                            marker:{
                              latLng:results[0].geometry.location,
                               options: {
                                  id:'searchMarker',
                                  draggable: true
                              },
                              events: {
                                dragend: function(marker){
                                  $('#inputGps').val(marker.getPosition().lat()+', '+marker.getPosition().lng());
                                }
                              }
                            }
                          });
                          
                          // Center map
                          $(this).google_map('get').setCenter( results[0].geometry.location );
                          
                          $('#inputGps').val(results[0].geometry.location.lat()+', '+results[0].geometry.location.lng());
                          
                          firstSet = true;
    
                        }
                      }
                    });
                }, 2000);
                
            });*/
                
            $('#inputAddress').keyup(function (e) {
                clearTimeout(timerMap);
                timerMap = setTimeout(function () {
                    
                }, 2000);
                
            });
            
            {has_extra_js}
            $(".cleditor").cleditor({
                width: "400px",
                height: "auto"
            });
            
            $('.tabbable li.rtab a').click(function () { 
                var tab_width = 0;
                var tab_width_real = 0;
                $('.tab-content').find('div.cleditorToolbar:first .cleditorGroup').each(function (i) {
                    tab_width += $(this).width();
                });
                
                tab_width_real = $('.tab-content').find('div.cleditorToolbar').width();
                var rows = parseInt(tab_width/tab_width_real+1)
                
                $('.tab-content').find('div.cleditorToolbar').height(rows*27);
                
                try {
                    $('.tab-content').find('.cleditor').refresh();
                }
                catch(err) {
                    // console.log(err.message);
                    // $(...).find(...).refresh is not a function
                }
                
            });
            
            /* [Edit property] */
            // If alredy selected
            if($('#inputGps').length && $('#inputGps').val() != '')
            {
                savedGpsData = $('#inputGps').val().split(", ");
                
                $("#mapsAddress").gmap3({
                    map:{
                      options:{
                        center: [parseFloat(savedGpsData[0]), parseFloat(savedGpsData[1])],
                        zoom: 14
                      }
                    },
                    marker:{
                    values:[
                      {latLng:[parseFloat(savedGpsData[0]), parseFloat(savedGpsData[1])]},
                    ],
                    options:{
                      draggable: true
                    },
                    events:{
                        dragend: function(marker){
                          if($("#inputAddress").attr("readonly"))
                          {
                            alert('<?php _l('Location change disabled'); ?>');
                            return false;
                          }
                          else
                          {
                            $('#inputGps').val(marker.getPosition().lat()+', '+marker.getPosition().lng());
                          }
                        }
                  }}});
                
                firstSet = true;
            }
            else
            {
                $("#mapsAddress").gmap3({
                    map:{
                      options:{
                        center: [{settings_gps}],
                        zoom: 12
                      },
                    },
                marker:{
                    values:[
                      {latLng:[{settings_gps}]},
                    ],
                    options:{
                      draggable: true
                    },
                    events:{
                        dragend: function(marker){
                          if($("#inputAddress").attr("readonly"))
                          {
                            alert('<?php _l('Location change disabled'); ?>');
                            return false;
                          }
                          else
                          {
                            $('#inputGps').val(marker.getPosition().lat()+', '+marker.getPosition().lng());
                          }
                        }
                  }}
                  });
                  
                  firstSet = true;
            }
                
            $('#inputAddress').keyup(function (e) {
                clearTimeout(timerMap);
                timerMap = setTimeout(function () {
                    
                    $("#mapsAddress").gmap3({
                      getlatlng:{
                        address:  $('#inputAddress').val(),
                        callback: function(results){
                          if ( !results ){
                            ShowStatus.show('<?php echo str_replace("'", "\'", lang_check('Address not found!')); ?>');
                            return;
                          } 
                          
                            if(firstSet){
                                $(this).gmap3({
                                    clear: {
                                      name:["marker"],
                                      last: true
                                    }
                                });
                            }
                          
                          // Add marker
                          $(this).gmap3({
                            marker:{
                              latLng:results[0].geometry.location,
                               options: {
                                  id:'searchMarker',
                                  draggable: true
                              },
                              events: {
                                dragend: function(marker){
                                  if($("#inputAddress").attr("readonly"))
                                  {
                                    alert('<?php _l('Location change disabled'); ?>');
                                    return false;
                                  }
                                  else
                                  {
                                    $('#inputGps').val(marker.getPosition().lat()+', '+marker.getPosition().lng());
                                  }
                                }
                              }
                            }
                          });
                          
                          // Center map
                          $(this).gmap3('get').setCenter( results[0].geometry.location );
                          
                          $('#inputGps').val(results[0].geometry.location.lat()+', '+results[0].geometry.location.lng());
                          
                          firstSet = true;
    
                        }
                      }
                    });
                }, 2000);
                
            });
            /* [/Edit property] */
            {/has_extra_js}
            
        $('.zoom-button').bind("click touchstart", function()
        {
            var myLinks = new Array();
            var current = $(this).attr('href');
            var curIndex = 0;
            
            $('.files-list-u .zoom-button').each(function (i) {
                var img_href = $(this).attr('href');
                myLinks[i] = img_href;
                if(current == img_href)
                    curIndex = i;
            });

            options = {index: curIndex}
            
            blueimp.Gallery(myLinks, options);
            
            return false;
        });
            {has_extra_js}
            loadjQueryUpload();
            {/has_extra_js}
            reloadElements();    
        });
        
        function reloadElements()
        {            
            $('.selectpicker-small').selectpicker({
                style: 'btn-default'
            });
            
            
            /*('.selectpicker-small').unbind('change');*/
            $('.selectpicker-small').on('change', function() {
                manualSearch(0);
               /* $('.selectpicker-small').unbind('change');*/
                return false;
            });
            
             $('.view-type-select').selectpicker({
                style: 'btn-default'
            });
            
            $('.view-type-select').change(function() {
                 manualSearch(0);
                /*  $('.view-type-select').unbind('change');*/
                 return false;
            });
            
            $('.view-type').click(function () { 
              $(this).parent().find('.view-type').removeClass("active");
              $(this).addClass("active");
              manualSearch(0);
            /*  $('.view-type').unbind('click');*/
              return false;
            });
            
            $('.pagination.properties a').click(function () { 
              var page_num = $(this).attr('href');
              var n = page_num.lastIndexOf("/"); 
              page_num = page_num.substr(n+1);
              
              manualSearch(page_num);
            /*  $('.pagination.properties a').unbind('click');*/
              return false;
            });
            
            $('.pagination.news a').click(function () { 
                var page_num = $(this).attr('href');
                var n = page_num.lastIndexOf("/"); 
                page_num = page_num.substr(n+1);
                
                $.post($(this).attr('href'), {search: $('#search_showroom').val()}, function(data){
                    $('.property_content_position').html(data.print);
                    
                    reloadElements();
                }, "json");
                
                return false;
            });
            
        }
        
        function manualSearch(v_pagenum, scroll_enabled, onlysave)
        {
            if (typeof scroll_enabled === 'undefined') scroll_enabled = "#content";
            if (typeof onlysave === 'undefined') onlysave = false;
            
            // Order ASC/DESC
            var v_order = $('.selectpicker-small').val();
            
            // View List/Grid
            var v_view = $('.view-type.active').attr('ref');
            
            var v_order2 = $('.my.view-type-select').val();
            //Define default data values for search
            var data = {
                order: v_order,
                view: v_view || v_order2,
                page_num: v_pagenum
            };
            
            if($('#booking_date_from').length > 0)
            {
                if($('#booking_date_from').val() != '')
                    data['v_booking_date_from'] = $('#booking_date_from').val();
            }
            
            if($('#booking_date_to').length > 0)
            {
                if($('#booking_date_to').val() != '')
                    data['v_booking_date_to'] = $('#booking_date_to').val();
            }
            
            // Purpose, "for custom tabbed selector"
            /*
            if($('#search_option_4 .active a').length > 0)
            {
                data['v_search_option_4'] = $('#search_option_4 .active a').html();
            }
            */
            
            // Improved tabbed selector code
            $(".tabbed-selector").each(function() {
              var selected_text = $(this).find(".active:not(.all-button) a").html();
              data['v_'+$(this).attr('id')] = selected_text;
            });
            
            $(".tabbed-selector_2").each(function() {
              var selected_text = $(this).find(".active:not(.all-button) a span").html();
              data['v_'+$(this).attr('id')] = selected_text;
            });
            

            
            // Add custom data values, automatically by fields inside search-form
            $('.search-form form input, .search-form form select').each(function (i) {
                if($(this).attr('type') == 'checkbox')
                {
                    if ($(this).attr('checked'))
                    {if(!data['v_'+$(this).attr('id')])
                        data['v_'+$(this).attr('id')] = $(this).val();
                    }
                }
                else if($(this).hasClass('tree-input'))
                {
                    if($(this).val() != '')
                    {
                        var tre_id_split = $(this).attr('id').split('_');
                        //console.log($(this).find("option:selected").attr('value'));
                        //console.log(tre_id_split);
                        if(data['v_search_option_'+tre_id_split[2]] == undefined)
                            data['v_search_option_'+tre_id_split[2]] = '';
                        
                        data['v_search_option_'+tre_id_split[2]]+= $(this).find("option:selected").text()+' - ';
                    }
                }
                else
                {if(!data['v_'+$(this).attr('id')])
                    data['v_'+$(this).attr('id')] = $(this).val();
                }
            });
            
            
            $(".tabbed-selector_3").each(function() {
              var selected_text = $(this).find(".active:not(.all-button) .box-category-title  span").html();
              data['v_'+$(this).attr('id')] = selected_text;
            });
            
            // Custom tags filter Start
            if($('#tags-filters').length > 0)
            {
                var tags_html = '';
                
                // Add custom data values, automatically by fields inside search-form
                $('.search-form form input, .search-form form select').each(function (i) {
                    if($(this).attr('type') == 'checkbox')
                    {
                        if ($(this).attr('checked'))
                        {
                           if(!data['v_'+$(this).attr('id')]) {
                              data['v_'+$(this).attr('id')] = $(this).val();
                           }
                            var option_name = '';
                            //var attr = $(this).attr('placeholder');
                            var attr = $(this).attr('value').substring(4);
                            if(typeof attr !== 'undefined' && attr !== false)
                            {
                                option_name = attr;
                            }
                            
                            if($(this).val() != '')
                                tags_html+='<button class="btn btn-small btn-warning filter-tag ck" rel="'+$(this).attr('id')+'" type="button"><span class="icon-remove icon-white"></span> '+option_name+'</button>&nbsp;';
                        
                        }
                    }
                    else if($(this).hasClass('tree-input'))
                    {
                        // different way
                    }
                    else
                    {if(!data['v_'+$(this).attr('id')])
                        data['v_'+$(this).attr('id')] = $(this).val();
                        
                        var option_name = '';
                        var attr = $(this).attr('placeholder');
                        if(typeof attr !== 'undefined' && attr !== false)
                        {
                            option_name = attr+': ';
                        }
                        
                        if($(this).val() != '')
                            tags_html+='<button class="btn btn-small btn-primary filter-tag" rel="'+$(this).attr('id')+'" type="button"><span class="icon-remove icon-white"></span> '+option_name+$(this).val()+'</button>&nbsp;';
                    
                    }
                });
                
                if(typeof data['v_search_option_4'] != 'undefined')
                    if(data['v_search_option_4'] != null && data['v_search_option_4'].length > 0)
                        tags_html+='<button class="btn btn-small btn-danger filter-tag" rel="4" type="button"><span class="icon-remove icon-white"></span> '+data['v_search_option_4']+'</button>&nbsp;';
                
                if(tags_html != '')
                {
                    $("#tags-filters").css('display', 'block');
                    
                    $("#tags-filters").html(tags_html);
                    
                    $(".filter-tag").click(function(){
                        var m_id = $(this).attr('rel').substring(14);
                        
                        if($(this).hasClass('ck'))
                        {
                            $('#'+$(this).attr('rel')).prop('checked', false);
                        }
                        else
                        {
                            $("input.id_"+m_id).val('');
                            $("input#"+$(this).attr('rel')).val('');
                            
                            $("select#"+$(this).attr('rel')).val('');
                            $("select.id_"+m_id).val('');
                            $("select#"+$(this).attr('rel')+".selectpicker").selectpicker('render');
                            $("select.id_"+m_id+".selectpicker").selectpicker('render');
                        }
                        
                        $(this).remove();
                        
                        
                        if($(this).attr('rel') == '4')
                        {
                            $('#search_option_4 .active').removeClass('active');
                        }
                        
                        if($(this).hasClass('ck'))
                        {
                            $("input.checkbox_am[option_id='"+m_id+"']").prop('checked', false);
                        }
                        
                        manualSearch(0);
                    });
                }
                else
                {
                    $("#tags-filters").css('display', 'none');
                }
            }
            // Custom tags filter End
            
            $("#ajax-indicator-1").show();
            
            if(onlysave == true)
            {
                $.post("{api_private_url}/save_search/{lang_code}", data, 
                       function(data){
                    console.log('f')
                    ShowStatus.show(data.message);
                                    
                    $("#ajax-indicator-1").hide();
                });
                
                return;
            }
           
            <?php if(config_item('enable_ajax_url') == true): ?>
            if(support_history_api() == true)
            {
                if(data.page_num)
                    data.page_num = data.page_num.replace("#content", "");
                    
            	var json_string=JSON.stringify(data);
                json_string = json_string.replace("&amp;", "%26"); 
                
                history.pushState(data, '', '{page_current_url}?search='+json_string);
            }
            <?php endif; ?>
           
            $.post("{ajax_load_url}/"+v_pagenum, data,
            function(data){
                
                if(mapRefresh && $("#map").length)
                {
                //Remove all markers
                $("#map").google_map( "removeMarkers", {
                        clear: {
                                    name:["markers"]
                                 }
                    }); 
             if(data.results.length > 0)
                    {
                        
                        //Add new markers
                        /*console.log(data.results);*/
                        var colors = ['orange', 'blue', 'cyan', 'pink', 'deep-purple', 'teal', 'indigo', 'green', 'light-green', 'amber', 'yellow', 'deep-orange', 'brown', 'grey'];
    
                            /*console.log(data)*/
                            var markerss= new Array();
                            for(key in data.results){
                                    var color = colors[Math.floor(Math.random()*colors.length)];  
                                    
                                    
                                    if( typeof data.results[key].latLng === 'undefined' || data.results[key].latLng === null ){
                                        // Do stuff
                                    }
                                    else
                                    {
                                        markerss.push({
                                            latLng: [data.results[key].latLng[0],data.results[key].latLng[1]],
                                            
                                            marker_content: '<div class="marker '+data.results[key].options.cssclass+'-mark-color"><img  src="'+data.results[key].options.icon+'" alt=""></div>',
                                            content: data.results[key].data,
                                            
                                                });
                                    }
                              }     
                            /* console.log(markerss);
                            * assets/img/transparent-marker-image.png
                            * */
                            $("#map").google_map({
                                        infowindow: {
                                            borderBottomSpacing: 0,
                                            height: 120,
                                            width: 424,
                                            offsetX: 30,
                                            offsetY: -80
                                        },
                                        zoom: {settings_zoom},
                                        center: {
                                            <?php if(config_item('custom_map_center') === FALSE): ?>
                                             latLng: [data.results_center[0], data.results_center[1]],
                                            <?php else: ?>
                                            latLng: [<?php echo config_item('custom_map_center'); ?>],
                                            <?php endif; ?>
                                        },
                                       markers:markerss,
                                       transparentClusterImage: $("#map").data('transparent-marker-image'),
                                       styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"labels.text.fill","stylers":[{"color":"#b43b3b"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"lightness":"8"},{"color":"#bcbec0"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#5b5b5b"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7cb3c9"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#abb9c0"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#fff1f1"},{"visibility":"off"}]}]
                                    });
                    }
                }
                
                /* add row count */
                
                $('#count_row').html(data.total_rows);
                
                /* end add row count */
                
                $(selectorResults).html(data.print);
                   /* reloadElements();*/
                    $('.pagination.properties a').click(function () { 
                      var page_num = $(this).attr('href');
                      var n = page_num.lastIndexOf("/"); 
                      page_num = page_num.substr(n+1);

                      manualSearch(page_num);
                      $('.pagination.properties a').unbind('click');
                      return false;
                    });
                
                $("#ajax-indicator-1").hide();
                  if(scroll_enabled != false)
                    $(document).scrollTop( $(scroll_enabled).offset().top );
                
//                $(selectorResults).hide(1000,function(){
//                    $(selectorResults).html(data.print);
//                    reloadElements();
//                    $(selectorResults).show(1000);
//                });
            }, "json");
            return false;
        }
        
    $.fn.startLoading = function(data){
        //$('#saveAll, #add-new-page, ol.sortable button, #saveRevision').button('loading');
    }
    
    $.fn.endLoading = function(data){
        //$('#saveAll, #add-new-page, ol.sortable button, #saveRevision').button('reset');       
        <?php if(config_item('app_type') == 'demo'):?>
            ShowStatus.show('<?php echo str_replace("'", "\'", lang('Data editing disabled in demo')); ?>');
        <?php else:?>
            //ShowStatus.show('<?php echo lang('data_saved')?>');
        <?php endif;?>
    }
    {has_extra_js}
    function loadjQueryUpload()
    {
        $('form.fileupload').each(function () {
            $(this).fileupload({
            <?php if(config_item('app_type') != 'demo'):?>
            autoUpload: true,
            <?php endif;?>
            // The maximum width of the preview images:
            previewMaxWidth: 160,
            // The maximum height of the preview images:
            previewMaxHeight: 120,
            uploadTemplateId: null,
            downloadTemplateId: null,
            uploadTemplate: function (o) {
                var rows = $();
                $.each(o.files, function (index, file) {
                    /*
                    var row = $('<li class="img-rounded template-upload">' +
                        '<div class="preview"><span class="fade"></span></div>' +
                        '<div class="filename"><code>'+file.name+'</code></div>'+
                        '<div class="options-container">' +
                        '<span class="cancel"><button  class="btn btn-mini btn-warning"><i class="icon-ban-circle icon-white"></i></button></span></div>' +
                        (file.error ? '<div class="error"></div>' :
                                '<div class="progress">' +
                                    '<div class="bar" style="width:0%;"></div></div></div>'
                        )+'</li>');
                    row.find('.name').text(file.name);
                    row.find('.size').text(o.formatFileSize(file.size));
                    if (file.error) {
                        row.find('.error').text(
                            locale.fileupload.errors[file.error] || file.error
                        );
                    }
                    */
                    var row = $('<div> </div>');
                    rows = rows.add(row);
                });
                return rows;
            },
            downloadTemplate: function (o) {
                var rows = $();
                $.each(o.files, function (index, file) {
                    var row = $('<li class="img-rounded template-download fade">' +
                        '<div class="preview"><span class="fade"></span></div>' +
                        '<div class="filename"><code>'+file.short_name+'</code></div>'+
                        '<div class="options-container">' +
                        (file.zoom_enabled?
                            '<a data-gallery="gallery" class="zoom-button btn btn-mini btn-success" download="'+file.name+'"><i class="icon-search icon-white"></i></a>'
                            : '<a target="_blank" class="btn btn-mini btn-success" download="'+file.name+'"><i class="icon-search icon-white"></i></a>') +
                        ' <span class="delete"><button class="btn btn-mini btn-danger" data-type="'+file.delete_type+'" data-url="'+file.delete_url+'"><i class="icon-trash icon-white"></i></button>' +
                        ' <input type="checkbox" value="1" name="delete"></span>' +
                        '</div>' +
                        (file.error ? '<div class="error"></div>' : '')+'</li>');
                    
                    var added=false;
                    
                    if (file.error) {
                        ShowStatus.show(file.error);
                        
//                        row.find('.name').text(file.name);
//                        row.find('.error').text(
//                            file.error
//                        );
                    } else {
                        added=true;
                        row.find('.name a').text(file.name);
                        if (file.thumbnail_url) {
                            row.find('.preview').html('<img class="img-rounded" alt="'+file.name+'" data-src="'+file.thumbnail_url+'" src="'+file.thumbnail_url+'">');  
                        }
                        row.find('a').prop('href', file.url);
                        row.find('a').prop('title', file.name);
                        row.find('.delete button')
                            .attr('data-type', file.delete_type)
                            .attr('data-url', file.delete_url);
                    }
                    if(added)
                        rows = rows.add(row);
                });
                
                return rows;
            },
            destroyed: function (e, data) {
                $.fn.endLoading();
                <?php if(config_item('app_type') != 'demo'):?>
                if(data.success)
                {
                }
                else
                {
                    ShowStatus.show('<?php echo lang_check('Unsuccessful, possible permission problems or file not exists'); ?>');
                }
                <?php endif;?>
                return false;
            },
            <?php if(config_item('app_type') == 'demo'):?>
            added: function (e, data) {
                $.fn.endLoading();
                return false;
            },
            <?php endif;?>
            finished: function (e, data) {
                $('.zoom-button').unbind('click touchstart');
                $('.zoom-button').bind("click touchstart", function()
                {
                    var myLinks = new Array();
                    var current = $(this).attr('href');
                    var curIndex = 0;
                    
                    $('.files-list-u .zoom-button').each(function (i) {
                        var img_href = $(this).attr('href');
                        myLinks[i] = img_href;
                        if(current == img_href)
                            curIndex = i;
                    });
            
                    options = {index: curIndex}
            
                    blueimp.Gallery(myLinks, options);
                    
                    return false;
                });
            },
            dropZone: $(this)
        });
        });       
        
        $("ul.files").each(function (i) {
            $(this).sortable({
                update: saveFilesOrder
            });
            $(this).disableSelection();
        });
    
    }
    
    function filesOrderToArray(container)
    {
        var data = {};

        container.find('li').each(function (i) {
            var filename = $(this).find('.options-container a:first').attr('download');
            data[i+1] = filename;
        });
        
        return data;
    }
    
    function saveFilesOrder( event, ui )
    {
        var filesOrder = filesOrderToArray($(this));
        var pageId = $(this).parent().parent().parent().attr('id').substring(11);
        var modelName = $(this).parent().parent().parent().attr('rel');
        
        $.fn.startLoading();
		$.post('<?php echo site_url('files/order'); ?>/'+pageId+'/'+modelName, 
        { 'page_id': pageId, 'order': filesOrder }, 
        function(data){
            $.fn.endLoading();
		}, "json");
    }
    
    {/has_extra_js}
        
        function init_gmap_searchbox()
        {
            if( $('#pac-input').length==0 || $('#wrap-map').length==0 )return;
            
            var markers = [];

            // Create the search box and link it to the UI element.
            var input = /** @type {HTMLInputElement} */(
              document.getElementById('pac-input'));
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            
            var searchBox = new google.maps.places.SearchBox(
            /** @type {HTMLInputElement} */(input));
            
            if(myLocationEnabled){
                // [START gmap mylocation]
                
                // Construct your control in whatever manner is appropriate.
                // Generally, your constructor will want access to the
                // DIV on which you'll attach the control UI to the Map.
                var controlDiv = document.createElement('div');
                
                // We don't really need to set an index value here, but
                // this would be how you do it. Note that we set this
                // value as a property of the DIV itself.
                controlDiv.index = 1;
                
                // Add the control to the map at a designated control position
                // by pushing it on the position's array. This code will
                // implicitly add the control to the DOM, through the Map
                // object. You should not attach the control manually.
                map.controls[google.maps.ControlPosition.RIGHT_TOP].push(controlDiv);
                
                HomeControl(controlDiv, map);
    
                // [END gmap mylocation]
            }
            
            if(rectangleSearchEnabled)
            {
                var controlDiv2 = document.createElement('div');
                controlDiv2.index = 2;
                map.controls[google.maps.ControlPosition.RIGHT_TOP].push(controlDiv2);
                RectangleControl(controlDiv2, map);
            }
            
        }
        
        function HomeControl(controlDiv, map) {
        
          // Set CSS styles for the DIV containing the control
          // Setting padding to 5 px will offset the control
          // from the edge of the map.
          controlDiv.style.padding = '5px';
        
          // Set CSS for the control border.
          var controlUI = document.createElement('div');
          controlUI.style.backgroundColor = 'white';
          controlUI.style.borderStyle = 'solid';
          controlUI.style.borderWidth = '2px';
          controlUI.style.cursor = 'pointer';
          controlUI.style.textAlign = 'center';
          controlUI.title = '{lang_MyLocation}';
          controlDiv.appendChild(controlUI);
        
          // Set CSS for the control interior.
          var controlText = document.createElement('div');
          controlText.style.fontFamily = 'Arial,sans-serif';
          controlText.style.fontSize = '12px';
          controlText.style.paddingLeft = '4px';
          controlText.style.paddingRight = '4px';
          controlText.innerHTML = '<strong>{lang_MyLocation}</strong>';
          controlUI.appendChild(controlText);
        
          // Setup the click event listeners: simply set the map to Chicago.
          google.maps.event.addDomListener(controlUI, 'click', function() {
            var myloc = new google.maps.Marker({
                clickable: false,
                icon: new google.maps.MarkerImage('assets/img/markers/marker_location.png'),
                shadow: null,
                zIndex: 999,
                map: map
            });
            
            if (navigator.geolocation) navigator.geolocation.getCurrentPosition(function(pos) {
                var me = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
                myloc.setPosition(me);
                
                // Zoom in
                var bounds = new google.maps.LatLngBounds();
                bounds.extend(me);
                map.fitBounds(bounds);
                var zoom = map.getZoom();
                map.setZoom(zoom > zoomOnMapSearch ? zoomOnMapSearch : zoom);
            }, function(error) {
                console.log(error);
            });
          });
        }
        
        var rectangle;
        var infoWindow_rectangle;
        var map_rectangle;
        
        function RectangleControl(controlDiv2, map) {
          
          map_rectangle = map;
          
          // Set CSS styles for the DIV containing the control
          // Setting padding to 5 px will offset the control
          // from the edge of the map.
          controlDiv2.style.padding = '5px';
        
          // Set CSS for the control border.
          var controlUI = document.createElement('div');
          controlUI.style.backgroundColor = 'white';
          controlUI.style.borderStyle = 'solid';
          controlUI.style.borderWidth = '2px';
          controlUI.style.cursor = 'pointer';
          controlUI.style.textAlign = 'center';
          controlUI.title = '{lang_DrawRectangle}';
          controlDiv2.appendChild(controlUI);
        
          // Set CSS for the control interior.
          var controlText = document.createElement('div');
          controlText.style.fontFamily = 'Arial,sans-serif';
          controlText.style.fontSize = '12px';
          controlText.style.paddingLeft = '4px';
          controlText.style.paddingRight = '4px';
          controlText.innerHTML = '<strong>{lang_DrawRectangle}</strong>';
          controlUI.appendChild(controlText);
        
          // Setup the click event listeners: simply set the map to Chicago.
          google.maps.event.addDomListener(controlUI, 'click', function() {
              
              if(rectangle != null)return;
              
              var map_zoom = map.getZoom();
              var map_center = map.getCenter();
            
              var bounds = new google.maps.LatLngBounds(
                  map_center,
                  new google.maps.LatLng(map_center.lat()+0.4, map_center.lng()+0.8)
              );
            
              // Define the rectangle and set its editable property to true.
              rectangle = new google.maps.Rectangle({
                bounds: bounds,
                editable: true,
                draggable: true
              });
            
              rectangle.setMap(map);
            
              // Add an event listener on the rectangle.
              google.maps.event.addListener(rectangle, 'bounds_changed', showNewRect);
            
              // Define an info window on the map.
              infoWindow_rectangle = new google.maps.InfoWindow();
              
              // define first rectangle dimension
              var ne = rectangle.getBounds().getNorthEast();
              var sw = rectangle.getBounds().getSouthWest();
              $('#rectangle_ne').val(ne.lat() + ', ' + ne.lng());
              $('#rectangle_sw').val(sw.lat() + ', ' + sw.lng());
            
          });
        }
        
        // Show the new coordinates for the rectangle in an info window.
        
        /** @this {google.maps.Rectangle} */
        function showNewRect(event) {
          var ne = rectangle.getBounds().getNorthEast();
          var sw = rectangle.getBounds().getSouthWest();
        
          var contentString = '<b><?php echo lang_check('Rectangle moved'); ?>:</b><br>' +
              '<?php echo lang_check('New north-east corner'); ?>: ' + ne.lat() + ', ' + ne.lng() + '<br>' +
              '<?php echo lang_check('New south-west corner'); ?>: ' + sw.lat() + ', ' + sw.lng();
          
          $('#rectangle_ne').val(ne.lat() + ', ' + ne.lng());
          $('#rectangle_sw').val(sw.lat() + ', ' + sw.lng());
          
          // Set the info window's content and position.
          infoWindow_rectangle.setContent(contentString);
          infoWindow_rectangle.setPosition(ne);
        
          infoWindow_rectangle.open(map_rectangle);
        }


        /* [START] NumericFields */
        
        $(function() {
            <?php if(config_db_item('swiss_number_format') == TRUE): ?>
            
            $('input.DECIMAL').number( true, 2, '.', '\'' );
            $('input.INTEGER').number( true, 0, '.', '\'' );
             
            <?php else: ?>
            
            $('input.DECIMAL').number( true, 2 );
            $('input.INTEGER').number( true, 0 );
            
            <?php endif; ?>
        });
    
        /* [END] NumericFields */
        
        /* [START] ValidateFields */
        
        $(function() {
            $('form.form-estate').h5Validate();
        });
        
        /* [END] ValidateFields */
        
    </script>
    
    
    
    
    
  {settings_tracking}