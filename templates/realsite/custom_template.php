<!DOCTYPE html>
<html>
<head>
    {template_head}
</head>
<body>
    
<div class="page-wrapper">
    <div class="header header-standard">
        <?php 
        foreach($widgets_order->header as $widget_filename){
            _widget($widget_filename);
        } 
        ?>
    </div><!-- /.header-->

    <div class="main">
        <?php 
        foreach($widgets_order->top as $widget_filename){
            _widget($widget_filename);
        } 
        ?>
        <div class="container" id='content'>
            <div class="type-property-block" style="display:none;">
                <div class="properties-sort properties-sort-main">
                    <h2 class="real-h">{lang_Realestates} : <span id="count_row"> <?php echo $total_rows; ?></span></h2>
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
            <div class="row main-row">
                <div class="content col-sm-8 col-md-9">
                 <?php 
                foreach($widgets_order->center as $widget_filename){
                    _widget($widget_filename);
                } 
                ?> 

                </div>
                <!-- /.content -->
                <div class="sidebar col-sm-4 col-md-3">
                <?php 
                foreach($widgets_order->right as $widget_filename){
                    _widget($widget_filename);
                } 
                ?> 
                </div>
                <!-- /.sidebar -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

        <?php 
        foreach($widgets_order->bottom as $widget_filename){
            _widget($widget_filename);
        } 
        ?> 
        <!-- /.widget -->
    </div>
    <!-- /.main -->
    <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
</div>
<!-- /.page-wrapper-->
<?php _widget('custom_javascript');?>
<script>
    $(document).ready(function(){
        if($('.container .mytestresult').length>0){
            $('.type-property-block').show();
        }
    })
</script>
</body>
</html>