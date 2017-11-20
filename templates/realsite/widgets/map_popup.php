<div class="infobox">
    <a class="infobox-image <?php echo _che($option_6, ''); ?>-mark-color" href="<?php _che($url, ''); ?>">
        <img class="infobox-image-thumbnail" src="<?php _che($thumbnail_url, '');?>" alt="">
    </a>
    <div class="infobox-content">
        <div class="infobox-content-title">
            <a href="<?php _che($url, ''); ?>"><?php _che($address, ''); ?></a>
        </div>
        <div class="infobox-content-price"> </div>
        <div class="infobox-content-body"><?php _che($option_chlimit_8, ''); ?></div>
    </div>
    <div class="infobox-contact">
        <div class="infobox-contact-title"><a href="<?php _che($url, ''); ?>"><?php echo _che($option_10, ''); ?></a>
        </div>
        <div class="infobox-contact-body" style="font-size: 14px;">
            
            <?php if(!empty($option_36)): ?>
            <span class="property-box-price"><?php _che($options_prefix_36, ''); ?><?php _che($option_36, ''); ?></span><br>
            <?php endif;?>
            
            <?php if(!empty($option_4)): ?>
            <?php _che($option_4, ''); ?><br>
            <?php endif;?>
            
            <?php if(!empty($option_2)): ?>
            <?php _che($option_2, '');?>
            <?php endif;?>
        </div>
        <a href="#" class="close"><i class="fa fa-close"></i></a>
    </div>
</div>