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
                    <div class="content">
                        <h1 class="page-header">{page_title}</h1>
                        <div class="post box">
                            <div class="">{page_body}</div>
                            <div style="padding: 20px 0;">
                                <?php _widget('image-gallery'); ?>   
                            </div>
                        </div><!-- /.post -->
                    </div><!-- /.content -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main -->
        <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
    </div><!-- /.page-wrapper-->
<?php _widget('custom_javascript');?>
</body>
</html>
