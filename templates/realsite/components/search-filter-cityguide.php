<div class="map-filter-horizontal search-select cityguide-search-box">
        <div class="container search-form">
          
         <ul class="menu menu-onmap tabbed-selector_2 cityguide-list-search" id="search_option_2">
                <li class="all-button">
                     <a href="#" class="cityguide-search-btn header">
                        <strong class="cityguide-search-icon"><i class="glyphicon glyphicon-th"></i></strong>
                        <span class="glyphicon-class"><?php echo lang_check('All'); ?></span>
                    </a>
                </li>
                <?php foreach ($options_values_arr_2 as $key=>$val): ?>
                 <li class="cat_<?php echo $key;?>">
                     <a href="#" class="cityguide-search-btn header">
                        <strong class="cityguide-search-icon">
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
                        
                        <img src="<?php echo $type_img; ?>">
                        
                        </strong>
                        <span class="glyphicon-class"><?php echo $val; ?></span>
                    </a>
                  </li>
                <?php endforeach;?>
    </ul>
                <div class="search-form hidden">
                    <form class="form-inline form-real">
                        <input id="search_option_is_featured" type="checkbox" class="form-control hidden" value="true<?php _l('is_featured'); ?>" <?php echo search_value('is_featured', 'checked'); ?> />
                    </form>
                </div>
        </div><!-- /.container -->
    </div>