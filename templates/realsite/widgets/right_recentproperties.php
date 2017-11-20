<div class="widget widget-simple">
    <div class="widget-title">
        <h2>{lang_Lastaddedproperties}</h2>
    </div><!-- /.widget-title -->
    <div class="widget-content">
        
        <?php foreach ($last_estates as $key => $item):?>
        <div class="property-small">
            <div class="property-small-inner">
                <div class="property-small-image">
                    <a href="<?php echo _ch($item['url']); ?>" class="property-small-image-inner">
                        <img src="<?php echo _simg($item['thumbnail_url'], '80x60'); ?>" alt="<?php echo _ch($item['alt']); ?>">
                    </a><!-- /.property-small-image-inner -->
                </div><!-- /.property-small-image -->
 
                <div class="property-small-content">
                    <h3 class="property-small-title">
                        <a href="<?php echo _ch($item['url']); ?>"><?php echo _ch($item['option_10']); ?></a>
                    </h3>

                    <ul class="property-small-location">
                        <li><a href="#"><?php echo _ch($item['option_7']); ?></a>,</li>
                         <li><a href="#"><?php echo _ch($item['option_5']); ?></a></li>
                    </ul>

                    <div class="property-small-price">
                         <?php if(!empty($item[ 'option_36']))echo $options_prefix_36.price_format($item[ 'option_36'], $lang_id).$options_suffix_36; ?>
                    </div><!-- /.property-small-price -->
                </div><!-- /.property-small-content -->
            </div><!-- /.property-small-inner -->
        </div><!-- /.property-small -->
        <?php endforeach;?>
     
        <!-- /.property-small -->
    </div><!-- /.widget-content -->
</div>