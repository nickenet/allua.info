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
        <?php _widget('top_slidercityguide');?>
        <div class="container" id='content'>
            <div class="type-property-block">
                <div class="properties-sort properties-sort-main">
                    <h2 class="real-h">{lang_Realestates} : <span id="count_row"> <?php echo $total_rows; ?></span></h2>
                    <div class="options">
                        <a class="view-type active hidden-phone" ref="grid" href="#"><img src="assets/img/glyphicons/glyphicons_156_show_thumbnails.png" />
                        </a>
                        <a class="view-type hidden-phone" ref="list" href="#"><img src="assets/img/glyphicons/glyphicons_157_show_thumbnails_with_lines.png" />
                        </a>
                        <div class="form-group col-sm-3 pull-right">
                            <select class="span3 selectpicker-small pull-right" placeholder="{lang_OrderBy}">
                                <option value="date ASC" {order_dateASC_selected}>{lang_DateASC}</option>
                                <option value="date DESC" {order_dateDESC_selected}>{lang_DateDESC}</option>
                                <option value="field_44_int ASC" {order_priceASC_selected}>{lang_BeacheDistance}</option>
                                <option value="field_56_int ASC" {order_priceASC_selected}>{lang_RatingASC}</option>
                                <option value="field_56_int DESC" {order_priceDESC_selected}>{lang_RatingDESC}</option>
                            </select>
                        </div>
                        <span class="pull-right hidden-xs">{lang_OrderBy}&nbsp;&nbsp;&nbsp;</span>
                    </div>
                </div>
            </div>
            <div class="row main-row">
                <div class="content col-sm-8 col-md-9">
                        <?php _widget('center_recentproperties'); ?>  
                    <!-- /.property-carousel-wrapper -->

                    <?php _widget('center_defaultcontent'); ?>  
                    <!-- /.row -->
                </div>
                <!-- /.content -->
                <div class="sidebar col-sm-4 col-md-3">
                    <?php _widget("right_search"); ?>
                    <?php _widget("right_facebooklike"); ?>
                    <?php _widget("right_agents"); ?>
                    <!-- /.widget -->
                    
                    <?php _widget('right_adsverticalsmall'); ?>

                    <?php _widget( "right_recentproperties");?>
                    <!-- /.widget -->
                </div>
                <!-- /.sidebar -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

        <?php _widget( "bottom_partners"); ?>
        <!-- /.widget -->

        <?php _widget( "bottom_choosecolor"); ?>
        <!-- /.widget -->
    </div>
    <!-- /.main -->
    <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
</div>
<!-- /.page-wrapper-->
<?php _widget('custom_javascript');?>
</body>
</html>