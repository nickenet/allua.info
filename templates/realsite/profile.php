<!DOCTYPE html>
<html>
<head>
    {template_head}
</head>
<body>

<div class="page-wrapper">
    <div class="header header-standard">
        <?php _widget('header_loginmenu');?>
        <?php _widget('header_mainmenu');?>
    </div><!-- /.header-->
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="content col-sm-8 col-md-9">
                        <h1 class="page-header">{page_title}</h1>

    <p class="text mb30">
        <?php echo $agent_profile['description']; ?>
    </p>
    <?php if(count($page_documents) > 0): ?> 
    <ul class="text mb30">
    {page_documents}
    <li>
    <a href="{url}">{filename}</a>
    </li>
    {/page_documents}
    </ul>
    <?php endif; ?>  

 {has_agent}
    <div class="module">
    <div class="module-content">
        <div class="agent-card">
            <div class="row">
                <div class="col-sm-12 col-md-4 mb30">
                    <a href="{agent_url}#content" class="agent-card-image">
                        <img src="{agent_image_url}" alt="{agent_name_surname}">
                    </a><!-- /.agent-card-image -->
                </div>

                <div class="col-sm-12 col-md-3">
                    <h2>{lang_Info}</h2>

                    <div class="agent-card-info">
                        <ul>
                            <li>{agent_name_surname} </li>
                            <li>{agent_address}</li>
                        </ul>
                        <br>
                        <ul>
                            <li><i class="fa fa-phone"></i>{agent_phone}</li>
                            <li><i class="fa fa-at"></i> <a href="mailto:{{agent_mail}}?subject={lang_Estateinqueryfor}: {page_title}">{agent_mail}</a></li>
                        </ul>
                        <ul class="social social-boxed">
                            <?php if(!empty($agent_profile['facebook_link'])): ?>
                                <li><a href="<?php echo $agent_profile['facebook_link']; ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($agent_profile['youtube_link'])): ?>
                                <li><a href="<?php echo $agent_profile['youtube_link']; ?>"><i class="fa fa-youtube"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($agent_profile['gplus_link'])): ?>
                                <li><a href="<?php echo $agent_profile['gplus_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($agent_profile['twitter_link'])): ?>
                                <li><a href="<?php echo $agent_profile['twitter_link']; ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($agent_profile['linkedin_link'])): ?>
                                <li><a href="<?php echo $agent_profile['linkedin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                        </ul><!-- /.social-->
                    </div><!-- /.agent-card-info -->
                </div>

                <div class="col-sm-12 col-md-5 mb30">
                    <h2 id='contactForm'>{lang_Contactform}</h2>
                    
                    <div class="agent-card-form">
                            {has_settings_email}
                            <div id="contactForm" class="contact-form">
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
                                    
                                    <?php if(config_item( 'captcha_disabled')===FALSE): ?>
                                    <div class="control-group ">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6 col-sm-5 col-xs-6" style="padding-top:14px;">
                                                <?php echo $captcha[ 'image']; ?>
                                            </div>
                                            <div class="col-lg-7 col-md-6 col-sm-7 col-xs-5">
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
                            </div>
                            {/has_settings_email}
                    </div><!-- /.agent-card-form -->
                </div>
            </div>
        </div><!-- /.agent-card-->
    </div><!-- /.module-content -->
</div><!-- /.module -->
{/has_agent}
    <h2 class="page-header">{lang_Myproperties}</h2>
    <div id="ajax_results">
    <?php if(!empty($agent_estates)):?>
        <div class="row row-flex">
        <?php foreach($agent_estates as $key=>$item): ?>
            <?php _generate_results_item(array('key'=>$key, 'item'=>$item)); ?>
        <?php endforeach;?>
        </div><!-- /.row -->
    <?php else: ?>
        <div class="alert alert-success">
            <?php echo lang_check('Properties not available');?>
        </div>
    <?php endif;?>
<div class="center">
    <div class="pagination pagination-ajax-results">
        <?php echo $pagination_links_agent; ?>
    </div>
</div>
</div>
                </div><!-- /.content -->
                <div class="sidebar col-sm-4 col-md-3">
<?php _widget('right_recentproperties'); ?>
                </div><!-- /.sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->

            </div><!-- /.main -->
 <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
            </div><!-- /.page-wrapper-->
<?php _widget('custom_javascript');?>
</body>
</html>
