<!DOCTYPE html>
<html>

<head>
     {template_head}
    <link rel="stylesheet" type="text/css" href="assets/css/realsite-admin.css">
    {has_color}
    <link href="assets/css/variants/admin_{color}.css" rel="stylesheet">
    {/has_color}
    
</head>

<body class="open hide-secondary-sidebar fullscreen">
    <div class="admin-wrapper">
        <div class="admin-navigation">
    <div class="admin-navigation-inner">
        <nav>
            <ul class="menu">
                <li class="avatar lang-menu">
                 {print_lang_menu}
                </li>
            </ul>
            <ul id="search_option_2" class="menu menu-onmap tabbed-selector_2">
                <li class="all-button">
                    <a class="filter-type" href="#"><strong><i class="glyphicon glyphicon-th"></i></strong> <span><?php echo lang_check('All'); ?></span></a>
                </li>
                <?php foreach ($options_values_arr_2 as $key=>$val): ?>
                 <li class=" cat_<?php echo $key;?>">
                       <a href="#" class="filter-type"><strong>
                       
                        <?php
                            // Fetch image if uploaded, in other case use standard from template
                            $type_img = '';
                            
                            if(!empty($options_obj_2->image_gallery))
                            {
                                $gallery_images = explode(',', $options_obj_2->image_gallery);
                                $value_index = $key;
                                if(isset($gallery_images[$value_index]) && !empty($gallery_images[$value_index]))
                                {
                                    $type_img = base_url('files/'.$gallery_images[$value_index]);
                                }
                            }
                            
                            if(empty($type_img))
                            {
                                $type_img = 'assets/img/markers/'.((file_exists('templates/'.$settings_template.'/assets/img/markers/type_'.  $key.'.png')) ? 'type_'.$key : 'house').'.png';
                            }
                        ?>
                        
                        <img src="<?php echo $type_img; ?>" />
                       
                       </strong><span><?php echo $val; ?></span></a>
                </li>
                <?php endforeach;?>
            </ul>
            
        </nav>
        
        <div class="projects">
            <h2>{options_name_4}</h2>
            <ul id="search_option_4" class="menu-onmap tabbed-selector">
            <li class="all-button"><a href="#"><?php echo lang_check('All'); ?></a></li>
            {options_values_li_4}
           </ul>
        </div><!-- /.projects -->
        <div class="layer"></div>
    </div><!-- /.admin-navigation-inner -->
</div><!-- /.admin-navigation -->

        <div class="admin-content">
            <div class="admin-content-inner">
                <div class="admin-content-header">
                    <div class="admin-content-header-inner">
                        <div class="container-fluid header-navigation">
                            <div class="admin-content-header-logo">
                                <a href="{homepage_url_lang}">
                                    <img src="assets/img/logo_black.png" alt="{settings_websitetitle}">
                                    {settings_websitetitle}
                                </a>
                            </div><!-- /admin-content-header-logo -->

                            <div class="admin-content-header-menu">
                            <div class="admin-content-header-menu">
                                <nav class="menu-dark">
                                 <?php _widget('menu'); ?>
                                </nav>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-main">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            </div><!-- /.admin-content-header-menu  -->
                        </div><!-- /.container-fluid -->
                         <?php if(config_db_item('property_subm_disabled')==FALSE):  ?>
                        <a class="header-action" href="{myproperties_url}" title="{lang_Addproperty}">
                            <i class="fa fa-plus"></i>
                        </a><!-- /.header-action -->
                        <?php endif;?>
                    </div><!-- /.admin-content-header-inner -->
                </div><!-- /.admin-content-header -->
                <div class="search-form hidden">
                    <form class="form-inline form-real">
                        <input id="search_option_is_featured" type="checkbox" class="form-control hidden" value="true<?php _l('is_featured'); ?>" <?php echo search_value('is_featured', 'checked'); ?> />
                    </form>
                </div>
                <div class="admin-content-main">
                    <div id="map" style="height: 100%" class="map"  data-transparent-marker-image="assets/img/transparent-marker-image.png"></div>
                </div><!-- /.container-fluid -->

 <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'small-footer')); ?>
            </div><!-- /.admin-content-main-inner -->
        </div><!-- /.admin-content -->
    </div><!-- /.admin-landing-wrapper -->

    <script type="text/javascript">

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
            zoom: {settings_zoom},
            center:   {
                    <?php if(config_item('custom_map_center') === FALSE): ?>
                    latLng: [{all_estates_center}],
                    <?php else: ?>
                    latLng: [<?php echo config_item('custom_map_center'); ?>],
                    <?php endif; ?>
                },
            markers: markers,
            transparentClusterImage: map.data('transparent-marker-image'),
            styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"labels.text.fill","stylers":[{"color":"#b43b3b"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"lightness":"8"},{"color":"#bcbec0"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#5b5b5b"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7cb3c9"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#abb9c0"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#fff1f1"},{"visibility":"off"}]}]
        },'removeMarkers');
    }
   
 })   


$('document').ready(function(){
    $('#nav-main').addClass('collapse');
})

</script>

<?php _widget('custom_javascript');?>
</body>
</html>
