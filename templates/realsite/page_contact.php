<!DOCTYPE html>
<html>
<head>
    {template_head}
    <script>
        /**
         * Contact map
         */
        $('document').ready(function(){
            var map_contact = $('#map-contact');
            if (map_contact.length) {
                map_contact.google_map({
                    markers: [{
                        latLng:[{settings_gps}]
                    }],
                    center: {
                        latLng: [{settings_gps}],
                    },
                    zoom: {settings_zoom},
                });
            }
        })
    </script>
</head>
<body>
<div class="page-wrapper">
     <div class="header header-standard">
        <?php _widget('header_loginmenu');?>
        <?php _widget('header_mainmenu');?>
    </div><!-- /.header-->
    <div class="main">
        <div id="map-contact"></div>
        <!-- /#map-contact -->
        <div class="container">
            <div class="content">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                {page_body}
                            </div>
                            <!-- /.col-* -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col-* -->
                    <div class="col-sm-6">
                        <div class="box">
                            {has_settings_email}
                            <h2 class="mt0" id="form">{lang_Contactform}</h2>
                            <div id="contactForm" class="contact-form">
                                {validation_errors} {form_sent_message}
                                <form method="post" class="property-form" action="{page_current_url}#form">
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
                                    <div class="form-group control-group {form_error_message}">
                                        <textarea id="message" name="message" rows="4" class="form-control" placeholder="{lang_Message}">{form_value_message}</textarea>
                                    </div>

                                    <?php if(config_item( 'captcha_disabled')===FALSE): ?>
                                    <div class="control-group ">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6" style="padding-top:14px;">
                                                <?php echo $captcha[ 'image']; ?>
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-sm-7   col-xs-5 ">
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
                                    <button class="btn" type="submit">{lang_Send}</button>
                                </form>
                            </div>
                            {/has_settings_email}
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col-* -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.container -->
        <div class="container">
        <?php _widget('image-gallery'); ?>
             <hr />
        </div>
        <?php _widget( "partners"); ?>
    </div>
    <!-- /.main -->
    <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
</div>
<!-- /.page-wrapper-->
 <?php _widget('custom_javascript');?>
</body>
</html>