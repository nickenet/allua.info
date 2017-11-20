<?php if(file_exists(APPPATH.'controllers/admin/ads.php')):?>
 <div class="widget widget-simple">   
  {has_ads_160x600px}
    <div class="widget-title">
        <h2>{lang_Ads}</h2>
    </div><!-- /.widget-title -->
  <div class="sidebar-ads-1 widget-content">
      <a href="{random_ads_160x600px_link}" target="_blank"><img src="{random_ads_160x600px_image}" /></a>
  </div>
  {/has_ads_160x600px}
  </div> 
<?php elseif(!empty($settings_adsense160_600)): ?>
<div class="widget widget-simple"> 
    <div class="widget-title">
        <h2>{lang_Ads}</h2>
    </div><!-- /.widget-title -->
  <div class="sidebar-ads-1 widget-content">
  <?php echo $settings_adsense160_600; ?>
  
  </div>
</div> 
<?php endif;?>