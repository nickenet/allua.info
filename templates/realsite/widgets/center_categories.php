<div class="mytestresult-preperad">
    <div class="widget-center_categories">
        <h1 class="page-header">{options_name_2}</h1>
        <div class="post box">
            <div style="padding: 20px 0;" class="menu menu-onmap tabbed-selector_3">
                <?php foreach ($options_values_arr_2 as $key=>$val): ?>
                    <div class="col-md-4 col-sm-6">
                        <a href="#" class="property-box property-box-category" data-type="<?php  echo _ch($val); ?>">
                            <div class="box-category-image">
                                <img src="assets/img/categories/<?php echo (file_exists('templates/'.$settings_template.'/assets/img/categories/type_image_'.$key.'.jpg')) ? 'type_image_'.$key : 'default'; ?>.jpg"/>
                                <div class="box-category-icon">

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
                                </div>
                                <span class="property-box-excerpt">
                                    <img alt="images" src="assets/img/view.png" class="full-icon">
                                </span>
                            </div>
                            <div class="box-category-title">
                                <span><?php  echo _ch($val); ?></span>
                            </div>
                        </a>
                        <!-- /.property-box -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('document').ready(function(){
    
    $('.property-box-category, #search-start, #search-start').click(function(){
        
        if($('.tabbed-selector_2').length){
            var _type=$(this).attr('data-type');
            //console.log(_type)
            $(".tabbed-selector_2 li a").each(function() {
              var selected_text = $(this).find("span").html();
              if(selected_text == _type) {
                  console.log(selected_text)
                  $(this).trigger('click');
              }
            });
        }
        
        
        if($('.container .mytestresult').length>0){
            $('.type-property-block').show();
            $('.widget-center_categories').hide();
            return false;
        }
        
        $('.mytestresult-preperad').addClass('mytestresult')
        $('.type-property-block').show();
    })
    
     $('.menu-onmap li a').click(function () { 
            if($('.container .mytestresult').length>0){
                $('.type-property-block').show();
                $('.widget-center_categories').hide();
                return false;
            }

            $('.mytestresult-preperad').addClass('mytestresult')
            $('.type-property-block').show();
        });
    
})

</script>