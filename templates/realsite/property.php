<!DOCTYPE html>
<html>
<head>
  {template_head}
    <script>
        var map_router;
        var map;
    $(document).ready(function(){

})
  </script>
  
<script>
    $(document).ready(function(){
    /**
      * Property detail map
      */
     var map_property = $('#map-property');
     if (map_property.length) {
         map_property.google_map({
             markers: [{
                  latLng: [{estate_data_gps}]
             }],
             zoom: {settings_zoom}+6,
             center: {
                latLng: [{estate_data_gps}]
            },
         });
     }
})
</script>

<?php if(file_exists(FCPATH.'templates/'.$settings_template.'/assets/js/places.js')): ?>
<script src="assets/js/places.js"></script>
<?php endif; ?>

<?php if(!empty($estate_data_address)): ?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "<?php _che($estate_data_option_2); ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?php _che($estate_data_address); ?>"
  },
  "description": "<?php _che($page_description); ?>",
  "name": "{page_title}",
  "telephone": "<?php _che($agent_phone); ?>"
}

</script>
<?php endif; ?>

<style type="text/css">
    
    .header,
    .footer,
    .page-wrapper,
    .main {
        display: block !important;
        height: initial !important;
    }
    
    .page-wrapper-header {
        display: initial !important;
    }
    
    body  .main .row .property-gallery {
        width: 100% !important;
        overflow: hidden;
    }

</style>

</head>

<body>
<?php if (!empty($settings_facebook_jsdk) && (config_db_item('appId') == '' || !file_exists(FCPATH . 'templates/' . $settings_template . '/assets/js/like2unlock/js/jquery.op.like2unlock.min.js'))): ?>
<?php
if (!empty($lang_facebook_code))
    $settings_facebook_jsdk = str_replace('en_EN', $lang_facebook_code, $settings_facebook_jsdk);
?>
<?php echo $settings_facebook_jsdk; ?>
<?php endif; ?>
<div class="page-wrapper page-wrapper-header">
    <div class="header header-standard">
        <?php _widget('header_loginmenu');?>
        <?php _widget('header_mainmenu');?>
    </div><!-- /.header-->
</div><!-- /.header-->

<?php _widget('ads_horizontal'); ?>

<div class="page-wrapper"> 
    <div class="main">   
        <div class="container">
            <div class="row">
                <div class="content col-sm-8 col-md-9">
                        <h1 class="page-header">{page_title} #{estate_data_id}</h1>

    <div class="row">
        <?php if(!empty($estate_data_option_36)): ?>
    <div class="col-sm-6 col-md-3">
        <div class="module">
            <div class="module-info center vertical-align min-width">
                {options_name_36}
            </div><!-- /.module-info -->

            <div class="module-content vertical-align">
                <span>{options_prefix_36} {estate_data_option_36}</span>
            </div><!-- /.module-content -->
        </div><!--- /.module -->
    </div>
        <?php endif; ?>

         <?php if(!empty($estate_data_option_57)): ?>
    <div class="col-sm-6 col-md-3">
        <div class="module">
            <div class="module-info center vertical-align min-width">
                {options_name_57}
            </div><!-- /.module-info -->

            <div class="module-content vertical-align">
                <span>{estate_data_option_57} {options_suffix_57}</span>
            </div><!-- /.module-content -->
        </div><!--- /.module -->
    </div>
        <?php endif; ?>

         <?php if(!empty($estate_data_option_19)): ?>
    <div class="col-sm-6 col-md-3">
        <div class="module">
            <div class="module-info center vertical-align min-width">
                {options_name_19}
            </div><!-- /.module-info -->

            <div class="module-content vertical-align">
                <span>{estate_data_option_19}</span>
            </div><!-- /.module-content -->
        </div><!--- /.module -->
    </div>
        <?php endif; ?>

            <?php if(!empty($estate_data_option_20)): ?>
    <div class="col-sm-6 col-md-3">
        <div class="module">
            <div class="module-info center vertical-align min-width">
                {options_name_20}
            </div><!-- /.module-info -->

            <div class="module-content vertical-align">
                <span>{estate_data_option_20}</span>
            </div><!-- /.module-content -->
        </div><!--- /.module -->
    </div>
            <?php endif; ?>
</div><!-- /.row -->

    <div class="row">
    <div class="col-sm-12 col-md-7">
        <div class="property-gallery">
           
            <div class="property-gallery-preview">
                <a href="<?php _che($estate_image_url);?>">
                    <img src="<?php echo _simg($estate_image_url, '484x277');?>" alt="">
                </a>
            </div><!-- /.property-gallery-preview -->

            <div class="property-gallery-list-wrapper">
                <div class="property-gallery-list">
                    <?php foreach($slideshow_property_images as $file): ?>
                    <div class="property-gallery-list-item active">
                        <a href="<?php echo _simg($file['url'], '484x277'); ?>" data-link="<?php _che($file['url']);?>">
                            <img src="<?php echo _simg($file['url'], '50x50'); ?>" alt="<?php echo _che($file['alt']);?>">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div><!-- /.property-gallery-list -->
            </div><!-- /.property-gallery-list-wrapper -->
            
        </div><!-- /.property-gallery -->
        <div class="clearfix">
        <?php if(file_exists(APPPATH.'controllers/admin/favorites.php')):?>
            <?php
                $favorite_added = false;
                if(count($not_logged) == 0)
                {
                    $CI =& get_instance();
                    $CI->load->model('favorites_m');
                    $favorite_added = $CI->favorites_m->check_if_exists($this->session->userdata('id'), 
                                                                        $estate_data_id);
                    if($favorite_added>0)$favorite_added = true;
                }
            ?>
            <div class="favorite pull-left" style="padding: 0px 0px 10px 4px;">
                <a class="btn btn-warning" id="add_to_favorites" href="#" style="<?php echo ($favorite_added)?'display:none;':''; ?>"><i class="icon-star icon-white"></i> <?php echo lang_check('Add to favorites'); ?> <i class="load-indicator"></i></a>
                <a class="btn btn-success" id="remove_from_favorites" href="#" style="<?php echo (!$favorite_added)?'display:none;':''; ?>"><i class="icon-star icon-white"></i> <?php echo lang_check('Remove from favorites'); ?> <i class="load-indicator"></i></a>
            </div>
        <?php endif; ?>
        <?php _widget('custom_property_center_reports');?>
        </div>
    </div>

    <div class="col-sm-12 col-md-5">
        <div class="property-list">
            <dl>
                {category_options_1}
                 {is_text}
                 <dt>{option_name}</dt><dd>{option_prefix} {option_value} {option_suffix}</dd>
                 {/is_text}
                 {is_dropdown}
                 <dt>{option_name}</dt><dd><span class='label label-success'>{option_prefix} {option_value} {option_suffix}</span></dd>
                 {/is_dropdown}
                 {is_checkbox}
                 <dt>{option_name}</dt><dd>{option_prefix} {option_value} {option_suffix}</dd>
                 {/is_checkbox}
                {/category_options_1}
            </dl>
        </div><!-- /.property-list -->

        <h2 class="mb30"><?php _l('Share links');?></h2>

             <ul class="clearfix sharing-buttons">
            <li>
                <a class="facebook" href="https://www.facebook.com/share.php?u={page_current_url}&title={page_title}"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-facebook fa-left"></i>
                    <span class="social-name">Facebook</span>
                </a>
            </li>
            <li>
                <a class="google-plus" href="https://plus.google.com/share?url={page_current_url}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-google-plus fa-left"></i>
                    <span class="social-name">Google+</span>
                </a>
            </li>
            <li>
                <a class="twitter" href="https://twitter.com/home?status={page_title}%20{page_current_url}"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-twitter fa-left"></i>
                    <span class="social-name">Twitter</span>
                </a>
            </li>
        </ul>
   </div>
</div><!-- /.row -->

<div class="mb30">
    <h2 class="page-header">{lang_Description}</h2>
    <p class="text">
         {estate_data_option_17}
    </p>
</div>

<?php if(isset($category_options_21) && $category_options_count_21>0): ?>
<h2 class="page-header">{options_name_21}</h2>
<div class="property-amenities">
    <ul>
        {category_options_21}
        {is_checkbox}
        <li class="col-xs-6 col-sm-3">
        <i class="fa fa-check ok"></i>&nbsp;&nbsp;{option_name}&nbsp;&nbsp;{icon}
        </li>
        {/is_checkbox}
        {/category_options_21}
        
    </ul>
</div><!-- /.property-amenities -->
<?php endif; ?>

<?php if(isset($category_options_52) && $category_options_count_52>0): ?>
<h2 class="page-header">{options_name_52}</h2>
<div class="property-amenities">
    <ul>
        {category_options_52}
        {is_checkbox}
        <li class="col-xs-6 col-sm-3">
        <i class="fa fa-check ok"></i>&nbsp;&nbsp;{option_name}&nbsp;&nbsp;{icon}
        </li>
        {/is_checkbox}
        {/category_options_52}
    </ul>
</div><!-- /.property-amenities -->
<?php endif; ?>

<?php if(isset($category_options_43) && $category_options_count_43>0): ?>
<h2 class="page-header">{options_name_43}</h2>
<div class="property-amenities">
    <ul>
        {category_options_43}
        {is_text}
        <li class="col-xs-6 col-sm-3">
        <i class="fa fa-check ok"></i>{icon} {option_name}:&nbsp;&nbsp;{option_prefix}{option_value}{option_suffix}
        </li>
        {/is_text}
        {/category_options_43}
        
    </ul>
</div><!-- /.property-amenities -->
<?php endif; ?>
                
<?php if(file_exists(APPPATH.'controllers/admin/booking.php') && count($property_rates)>0):?>
                <h2>{lang_Rates}</h2>
                <table class="table table-striped ">
                    <thead>
                    <tr>
                    <th>{lang_From}</th>
                    <th>{lang_To}</th>
                    <th>{lang_Nightly}</th>
                    <th>{lang_Weekly}</th>
                    <th>{lang_Monthly}</th>
                    <th>{lang_MinStay}</th>
                    <th>{lang_ChangeoverDay}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($property_rates as $key=>$rate): ?>
                    <tr>
                    <td><?php echo date('Y-m-d', strtotime($rate->date_from)); ?></td>
                    <td><?php echo date('Y-m-d', strtotime($rate->date_to)); ?></td>
                    <td><?php echo $rate->rate_nightly.' '.$rate->currency_code; ?></td>
                    <td><?php echo $rate->rate_weekly.' '.$rate->currency_code; ?></td>
                    <td><?php echo $rate->rate_monthly.' '.$rate->currency_code; ?></td>
                    <td><?php echo $rate->min_stay; ?></td>
                    <td><?php echo $changeover_days[$rate->changeover_day]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <h2>{lang_AvailabilityCalender}</h2>
                <div class="av_calender">
                <?php
                    $row_break=0;
                    
                    foreach($months_availability as $v_month)
                    {
                        echo $v_month;
                        
                        $row_break++;
                        if($row_break%3 == 0)
                        echo '<div style="clear: both;height:10px;"></div>';
                    }
                ?>
                <br style="clear: both;" />
                </div>
                <?php endif;?>


<?php if(config_db_item('property_map_disabled') === FALSE): ?>

<?php _widget('property_center_nearplaces'); ?>
<?php endif; ?>

<?php if(config_db_item('property_map_route_enabled') === TRUE): ?>
<?php _widget('property_center_companyroute'); ?>
<?php endif; ?>


                <?php if(!empty($estate_data_option_12)): ?>
                <h2>{options_name_9}</h2>
                    <?php 
                    $estate_data_option_12 = trim($estate_data_option_12);
                    if(filter_var($estate_data_option_12, FILTER_VALIDATE_URL) && 
                        (strpos($estate_data_option_12, 'youtube.com')!==FALSE || strpos($estate_data_option_12, 'youtu.be')!==FALSE)
                      ):
                        
                        $youtube_id='';
                        if(strpos($estate_data_option_12, 'youtube.com')!==FALSE)
                            $youtube_id= substr($estate_data_option_12, strpos($estate_data_option_12, "v=") + 2);
                        if(strpos($estate_data_option_12, 'youtu.be')!==FALSE)
                            $youtube_id = substr($estate_data_option_12, strpos($estate_data_option_12, "e/") + 2); 
                    ?>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_id;?>" frameborder="0" allowfullscreen></iframe>
                    <?php else :?>
                    {estate_data_option_12}
                    <?php endif; ?>
                    <br style="clear:both;" />
                <?php endif; ?>

                <?php if(config_db_item('walkscore_enabled') == TRUE && !empty($estate_data_address) && !empty($estate_data_gps)): ?>
                <br />
                <script type='text/javascript'>
                var ws_wsid = '';
                <?php
                echo "var ws_address = '$estate_data_address';";
                $base_url = base_url();
                $url_protocol='http://';
                if(strpos( $base_url,'https')!== false){
                    $url_protocol='https://';
                }
                ?> 
                var ws_width = '500';
                var ws_height = '336';
                var ws_layout = 'horizontal';
                var ws_commute = 'true';
                var ws_transit_score = 'true';
                var ws_map_modules = 'all';
                            </script><style type='text/css'>#ws-walkscore-tile{padding-bottom: 15px !important;position:relative;text-align:left}#ws-walkscore-tile *{float:none;}#ws-footer a,#ws-footer a:link{font:11px/14px Verdana,Arial,Helvetica,sans-serif;margin-right:6px;white-space:nowrap;padding:0;color:#000;font-weight:bold;text-decoration:none}#ws-footer a:hover{color:#777;text-decoration:none}#ws-footer a:active{color:#b14900}#ws-street{height: 30px !important;border: 1px solid #e2e2e2 !important;padding-left: 10px !important;}#ws-a{line-height: 30px !important;} #ws-go{right: -15px !important;height: 30px;background: #eee;padding: 0 10px !important;;border: 1px solid #eee;border: 1px solid #e2e2e2 !important;margin-left: 0px;font-size: 14px;}#ws-go:hover{background: #dedede !important;}</style><div id='ws-walkscore-tile'><div id='ws-footer' style='position:absolute;top:318px;left:8px;width:488px'><form id='ws-form'><a id='ws-a' href='<?php echo $url_protocol;?>www.walkscore.com/' target='_blank'>What's Your Walk Score?</a><input type='text' id='ws-street' style='position:absolute;top:0px;left:170px;width:286px' /><input type='submit' id='ws-go' value="<?php echo lang_check('Go');?>" border='0' alt='get my Walk Score' style='position:absolute;top:0px;right:0px' /></form></div></div><script type='text/javascript' src='<?php echo $url_protocol;?>www.walkscore.com/tile/show-walkscore-tile.php'></script>
                <hr>
                <?php endif; ?>
                
                <?php _widget('center_imagegallery'); ?>
                
                <?php
                //Fetch repository
                $file_rep = array();
                
                if(!empty($estate_data_option_65) && is_numeric($estate_data_option_65)){
                    $rep_id = $estate_data_option_65;
                    $file_rep = $this->file_m->get_by(array('repository_id'=>$rep_id));
                }
                
                // If not defined in this language
                if(count($file_rep) == 0)
                {
                    //Fetch option for default language
                    $def_lang_id = $this->language_m->get_default_id();
                    if(!empty($def_lang_id))
                    {
                        $def_lang_rep_id = $this->option_m->get_property_value($def_lang_id, $estate_data_id, 65);
                        
                        if(!empty($def_lang_rep_id))
                        $file_rep = $this->file_m->get_by(array('repository_id'=>$def_lang_rep_id));
                    }
                }
                
                $rep_value = '';
                if(count($file_rep))
                {
                    echo '<h2>'.$options_name_65.'</h2>';
                    $rep_value.= '<ul data-target="#modal-gallery" data-toggle="modal-gallery" class="files files-list ui-sortable content-images">';
                    foreach($file_rep as $file_r)
                    {
                        if(file_exists(FCPATH.'/files/thumbnail/'.$file_r->filename))
                        {
                            $rep_value.=
                            '<li class="template-download fade in">'.
                            '    <a data-gallery="gallery" href="'.base_url('files/'.$file_r->filename).'" title="'.$file_r->filename.'" download="'.base_url('files/'.$file_r->filename).'" class="preview show-icon">'.
                            '        <img src="assets/img/preview-icon.png" class="" />'.
                            '    </a>'.
                            '    <div class="preview-img"><img src="'.base_url('files/thumbnail/'.$file_r->filename).'" data-src="'.base_url('files/'.$file_r->filename).'" alt="'.$file_r->filename.'" class="" /></div>'.
                            '</li>';
                        }
                        else if(file_exists(FCPATH.'/templates/'.$settings_template.'/assets/img/icons/filetype/'.get_file_extension($file_r->filename).'.png'))
                        {
                            $rep_value.=
                            '<li class="template-download fade in">'.
                            '    <a target="_blank" href="'.base_url('files/'.$file_r->filename).'" title="'.$file_r->filename.'" download="'.base_url('files/'.$file_r->filename).'" class="preview show-icon direct-download">'.
                            '        <img src="assets/img/preview-icon.png" class="" />'.
                            '    </a>'.
                            '    <div class="preview-img"><img src="assets/img/icons/filetype/'.get_file_extension($file_r->filename).'.png" data-src="'.base_url('files/'.$file_r->filename).'" alt="'.$file_r->filename.'" class="" /></div>'.
                            '</li>';
                        }
                    }
                    $rep_value.= '</ul>';

                    echo $rep_value;
                    echo '<br style="clear:both;" />';
                }
                ?>
                
                 <?php if(file_exists(APPPATH.'controllers/admin/reviews.php') && $settings_reviews_enabled): ?>
                 <div id="main">
                        <h2 id="form_review" class="page-header"><?php echo lang_check('YourReview'); ?></h2>
                        <?php if(count($not_logged) && config_item('reviews_without_login') === FALSE): ?>
                        <p class="alert alert-success">
                            <?php echo lang_check('LoginToReview'); ?>
                        </p>
                        <?php else: ?>
                        
                        <?php if($reviews_submitted == 0): ?>
                        <?php _che($reviews_validation_errors); ?>
                        <form  class="form-horizontal no-padding " method="post" action="{page_current_url}#form_review">
                        
                        <?php if(count($not_logged) && config_item('reviews_without_login') === TRUE): ?>
                        <div class="control-group">
                            <label class="control-label" for="inputMailR"><?php echo lang_check('Email'); ?></label>
                            <div class="controls">
                                <input id="inputMailR" type="text" name="mail" placeholder="{lang_Email}" />
                            </div>
                        </div>
                        <?php endif; ?> 
                            
                        <div class="control-group">
                        <label class="control-label" for="inputRating"><?php echo lang_check('Rating'); ?></label>
                        <div class="controls">
                            <input type="number" data-max="5" data-min="1" name="stars" id="stars" class="rating form-control INPUTBOX" data-empty-value="5" value="5" data-active-icon="icon-star" data-inactive-icon="icon-star-empty" />
                        </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputMessageR"><?php echo lang_check('Message'); ?></label>
                            <div class="controls">
                                <textarea id="inputMessageR" class="form-control TEXTAREA" rows="3" name="message" rows="3" placeholder="{lang_Message}"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn"><?php echo lang_check('Send'); ?></button>
                            </div>
                        </div>
                        </form>
                        <?php else: ?>
                        <p class="alert alert-info">
                            <?php echo lang_check('ThanksOnReview'); ?>
                        </p>
                        <?php endif; ?>

                        <?php endif; ?>
                        

                        <?php if($settings_reviews_public_visible_enabled): ?>
                        <h2><?php echo lang_check('Reviews'); ?></h2>
                        <div class="box">
                        <?php if(count($not_logged) && !$settings_reviews_public_visible_enabled): ?>
                        <p class="alert alert-success">
                            <?php echo lang_check('LoginToReadReviews'); ?>
                        </p>
                        <?php else: ?>
                        <?php if(count($reviews_all) > 0): ?>
                        <ul class="media-list">
                        <?php foreach($reviews_all as $review_data): ?>
                        <?php //print_r($review_data); ?>
                        <li class="media">
                        <div class="pull-left">
                        <?php if(isset($review_data['image_user_filename'])): ?>
                        <img class="media-object" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="<?php echo base_url('files/thumbnail/'.$review_data['image_user_filename']); ?>" />
                        <?php else: ?>
                        <img class="media-object" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="assets/img/user-agent.png" />
                        <?php endif; ?>
                        </div>
                        <div class="media-body">
                        <h4 class="media-heading"><div class="review_stars_<?php echo $review_data['stars']; ?>"> </div></h4>
                        <?php if($review_data['is_visible']): ?>
                        <?php echo $review_data['message']; ?>
                        <?php else: ?>
                        <?php echo lang_check('HiddenByAdmin'); ?>
                        <?php endif; ?>
                        </div>
                        </li>
                        <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        <p class="alert alert-success">
                            <?php echo lang_check('SubmitFirstReview'); ?>
                        </p>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php _widget('property_center-facecomments');?>
                <hr/>
                
                 <?php if(count($agent_estates) > 0): ?>
                <h2>{lang_Agentestates}</h2>
   <div id="ajax_results">
    <div class="row row-flex">
    <?php foreach($agent_estates as $key=>$item): ?>
        <?php _generate_results_item(array('key'=>$key, 'item'=>$item)); ?>
    <?php endforeach;?>
</div><!-- /.row -->
<div class="center">
    <div class="pagination pagination-ajax-results">
        <?php echo $pagination_links_agent; ?>
    </div>
</div>
</div>
                <?php endif;?>
                <br style="clear:both;" />
                
</div><!-- /.content -->

<div class="sidebar col-sm-4 col-md-3">
<?php _widget('property_right_companydetails');?>    
{has_agent}
<div class="widget">
        <div class="widget-title">
            <h2>{lang_Agent}</h2>
        </div><!-- /.widget-title -->
        <div class="widget-content">
        <div class="agent-small">
            <div class="agent-small-inner">
                <div class="agent-small-image">
                    <a href="{agent_url}" class="agent-small-image-inner">
                        <img src="{agent_image_url}" alt="">
                    </a><!-- /.agent-small-image-inner -->
                </div><!-- /.agent-small-image -->

                <div class="agent-small-content">
                    <h3 class="agent-small-title">
                        <a href="{agent_url}">{agent_name_surname}</a>
                    </h3>

                    <div class="agent-small-email">
                        <i class="fa fa-at"></i> <a href="mailto:{agent_mail}?subject={lang_Estateinqueryfor}: {page_title}">{agent_mail}</a>
                    </div><!-- /.agent-small-email -->

                    <div class="agent-small-phone">
                        <i class="fa fa-phone"></i> {agent_phone}
                    </div><!-- /.agent-small-phone -->
                </div><!-- /.agent-small-content -->
            </div><!-- /.agent-small-inner -->
        </div><!-- /.agent-small -->       
    </div><!-- /.widget-content -->
</div><!-- /.widget -->
{/has_agent}
<?php _widget('property_right_qrcode');?>
<?php _widget('property_right_pdf');?>
<?php if(file_exists(APPPATH.'controllers/propertycompare.php')):?>
    <?php _widget('property_compare'); ?>
<?php endif;?>
<?php _widget('property_right_currency-conversions');?>
<?php if(!empty($estate_data_option_56) || (!empty($avarage_stars) && file_exists(APPPATH.'controllers/admin/reviews.php') && $settings_reviews_enabled)): ?>
<div class="widget">   
    <div class="widget-title">
        <h2> <?php _l('Pro');?></h2>
    </div><!--/.widget-title -->
    <div class="widget widget-content">
    <div class="row-fluid box-white ">
    <?php if(!empty($estate_data_option_56)): ?>
    <div class="row-fluid bottom-border clearfix">
        <strong class="pull-left">{lang_Pro}:</strong>
        <span class="pull-right review_stars_<?php echo $estate_data_option_56; ?>"> </span>
    </div>
    <?php endif;?>
    <?php if(!empty($avarage_stars) && file_exists(APPPATH.'controllers/admin/reviews.php') && $settings_reviews_enabled): ?>
    <div class="row-fluide  clearfix">  
        <strong class="pull-left">{lang_Users}:</strong>
        <span class="pull-right review_stars_<?php echo $avarage_stars; ?>"> </span>
    </div> 
    <?php endif;?>
    </div>
</div>         
</div>         
<?php endif;?>  
        
<?php _widget('right_ads'); ?>
<?php _widget('right_recentproperties'); ?>
<?php _widget('property_right_weather');?>
<div class="widget">
    <div class="widget-title" id="contactForm">
        <h2 id="form">{lang_Enquireform}</h2>
    </div><!-- /.widget-title -->

    <div class="widget-content">
                               {has_settings_email}
                                {validation_errors} {form_sent_message}
                                <form method="post" class="property-form" action="{page_current_url}#contactForm">
                                    <!-- The form name must be set so the tags identify it -->
                                    <input type="hidden" name="form" value="contact" />
                                    
                                    <div class="control-group {form_error_firstname}">
                                        <input class="form-control" id="firstname" name="firstname" type="text" placeholder="{lang_FirstLast}" value="{form_value_firstname}" />
                                    </div>
                                    <div class="control-group {form_error_email}">
                                        <input class="form-control" id="email" name="email" type="text" placeholder="{lang_Email}" value="{form_value_email}" />
                                    </div>
                                    <div class="control-group {form_error_phone}">
                                        <input class="form-control" id="phone" name="phone" type="text" placeholder="{lang_Phone}" value="{form_value_phone}" />
                                    </div>
                                    
                                    <div class="control-group {form_error_address}">
                                        <input class="form-control" id="address" name="address" type="text" placeholder="{lang_Address}" value="{form_value_address}" />
                                    </div>
                                    
                                    <?php if(config_item('reservations_disabled') === FALSE ||
                                    (file_exists(APPPATH.'controllers/admin/booking.php') && count($is_purpose_rent) && $this->session->userdata('type')=='USER' && config_item('reservations_disabled') === FALSE)): ?>
                                        {is_purpose_rent}
                                        <div class="control-group {form_error_fromdate}">
                                            <input class="form-control"  id="datetimepicker1" name="fromdate" type="text" placeholder="{lang_FromDate}" value="{form_value_fromdate}" />
                                        </div><!-- /.form-group -->
                                        <div class="control-group{form_error_todate}">
                                            <input class="form-control" id="datetimepicker2" name="todate" type="text" placeholder="{lang_ToDate}" value="{form_value_todate}" />
                                        </div><!-- /.form-group -->
                                    {/is_purpose_rent}
                                    <?php endif; ?>
                                    
                                    <?php if(config_item( 'captcha_disabled')===FALSE): ?>
                                    <div class="control-group ">
                                        <div class="row">
                                            <div class="col-lg-6" style="padding-top:14px;">
                                                <?php echo $captcha[ 'image']; ?>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="captcha form-control {form_error_captcha}" name="captcha" type="text" placeholder="{lang_Captcha}" value="" />
                                                <input class="hidden" name="captcha_hash" type="text" value="<?php echo $captcha_hash; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(config_item('recaptcha_site_key') !== FALSE): ?>
                                    <div class="control-group" >
                                        <label class="control-label captcha"></label>
                                        <div class="">
                                            <?php _recaptcha(true); ?>
                                       </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="form-group control-group {form_error_message}">
                                        <textarea id="message" name="message" rows="4" class="form-control" type="text" placeholder="{lang_Message}">{form_value_message}</textarea>
                                    </div>
                                    <button class="btn" type="submit">{lang_Send}</button>
                                </form>
                            {/has_settings_email}
    </div><!-- /.widget-content -->
</div><!-- /.widget -->


                </div><!-- /.sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->

            </div><!-- /.main -->

  <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
            </div><!-- /.page-wrapper-->
 
<script type="text/javascript">

$(document).ready(function() {

<?php if(file_exists(APPPATH.'controllers/admin/favorites.php')):?>
    // [START] Add to favorites //  
    
    $("#add_to_favorites").click(function(){
        
        var data = { property_id: {estate_data_id} };
        
        var load_indicator = $(this).find('.load-indicator');
        load_indicator.css('display', 'inline-block');
        $.post("{api_private_url}/add_to_favorites/{lang_code}", data, 
               function(data){
            
            ShowStatus.show(data.message);
                            
            load_indicator.css('display', 'none');
            
            if(data.success)
            {
                $("#add_to_favorites").css('display', 'none');
                $("#remove_from_favorites").css('display', 'inline-block');
            }
        });

        return false;
    });
    
    $("#remove_from_favorites").click(function(){
        
        var data = { property_id: {estate_data_id} };
        
        var load_indicator = $(this).find('.load-indicator');
        load_indicator.css('display', 'inline-block');
        $.post("{api_private_url}/remove_from_favorites/{lang_code}", data, 
               function(data){
            
            ShowStatus.show(data.message);
                            
            load_indicator.css('display', 'none');
            
            if(data.success)
            {
                $("#remove_from_favorites").css('display', 'none');
                $("#add_to_favorites").css('display', 'inline-block');
            }
        });

        return false;
    });
    
    // [END] Add to favorites //  
<?php endif; ?>
});


</script>
<script>
    
    $(document).ready(function(){
        
    $(document).on('touchstart click', '.property-gallery-preview', function () {
        var myLinks = new Array();
        var current_link = $(this).find('a').first().attr('href');
        var curIndex=0;
        $('.property-gallery .owl-item').each(function (i) {
            var img_link = $(this).find('a').first().attr('data-link');
            myLinks[i] = img_link;
            if(current_link == img_link)
                curIndex = i;
        });
        options = {index: curIndex};
        blueimp.Gallery(myLinks,options);
        
        return false;
    });   
        
    })
    
</script>
<?php _widget('custom_javascript');?>
</body>
</html>
