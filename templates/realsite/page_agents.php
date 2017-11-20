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
                            <div class="">{page_body}</div>
                            <?php _widget('center_imagegallery'); ?>      
                        </div><!-- /.content -->

                        <div class="sidebar col-sm-4 col-md-3">

                            <?php _widget('right_agents'); ?>      
                            <?php _widget('right_contact'); ?>      
                            
                        </div><!-- /.sidebar -->
                    </div><!-- /.row -->
                </div><!-- /.container -->

            </div><!-- /.main -->
            <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
            <!-- /.footer -->
        </div><!-- /.page-wrapper-->
        <?php _widget('custom_javascript');?>
    </body>
</html>
