<!DOCTYPE html>
<html>
<head>
    {template_head}
    <script>
        $('document').ready(function(){
            $('#search-start, .menu-onmap .property-box-category').click(function(){
                $('.custom-row .content ').css('margin-top','45px');
                $('.type-property-block').slideDown('fast');
            })
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
            <?php _widget('top_sliderdistance');?>
            <div class="container" id="content">
                <div class="type-property-block" style="display:none;">
                    <div class="properties-sort properties-sort-main">
                        <h2 class="real-h">{lang_Realestates} : <span id="count_row"></span></h2>
                        <div class="options">
                            <a class="view-type active hidden-phone" ref="grid" href="#"><img src="assets/img/glyphicons/glyphicons_156_show_thumbnails.png" />
                            </a>
                            <a class="view-type hidden-phone" ref="list" href="#"><img src="assets/img/glyphicons/glyphicons_157_show_thumbnails_with_lines.png" />
                            </a>
                            <div class="form-group col-sm-3 pull-right">
                                <select class="span3 selectpicker-small pull-right" placeholder="{lang_OrderBy}">
                                    <option value="id ASC" {order_dateASC_selected}>{lang_DateASC}</option>
                                    <option value="id DESC" {order_dateDESC_selected}>{lang_DateDESC}</option>
                                    <option value="price ASC" {order_priceASC_selected}>{lang_PriceASC}</option>
                                    <option value="price DESC" {order_priceDESC_selected}>{lang_PriceDESC}</option>
                                </select>
                            </div>
                            <span class="pull-right hidden-xs">{lang_OrderBy}&nbsp;&nbsp;&nbsp;</span>
                        </div>
                    </div>
                </div>
                <div class="row  custom-row">
                    <div class="content col-sm-8 col-md-9">
                        <div class=" mytestresult">
                            <?php _widget('center_categories');?>
                            <h1 class="page-header">{page_title}</h1>
                            <div class="post box">
                                <div class="container-body">{page_body}</div>
                                <div style="padding: 20px 0;">
                                    <?php _widget('center_imagegallery'); ?>
                                </div>
                            </div>
                            <!-- /.post -->
                            <?php _widget('center_lastaddedproperties'); ?>
                        </div>
                    </div>
                    <!-- /.content -->
                    <div class="sidebar col-sm-4 col-md-3">
                        <?php _widget( "right_agents"); ?>
                        <!-- /.widget -->
                        <?php _widget('right_adsverticalsmall'); ?>
                        <?php _widget( "right_recentproperties");?>
                    </div>
                    <!-- /.sidebar -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->

        </div>
        <!-- /.main -->
        <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
        <!-- /.footer -->
    </div>
    <!-- /.page-wrapper-->
<?php _widget('custom_javascript');?>
</body>

</html>