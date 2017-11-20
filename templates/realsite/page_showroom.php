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
                <?php if(file_exists(APPPATH.'controllers/admin/showroom.php')):?>
                <div class="content col-sm-8 col-md-9">
                <?php else:?>
                <div class="col-md-12">  
                <?php endif;?>
                    <h1 class="page-header">{page_title}</h1>
                    <div class="">{page_body}</div>
                    <br style="clear: both;" />
                     <?php _widget('image-gallery');?>       
                                
            <?php if(file_exists(APPPATH.'controllers/admin/showroom.php')):?>
            <?php foreach($showroom_module_all as $key=>$row):?> 
            <div class="post box">
            <div class="post-image-left">
                <a href="<?php echo site_url($lang_code.'/'.$row->id.'/'.url_title_cro($row->title)); ?>">
                 <?php if(file_exists('files/thumbnail/'.$row->image_filename)):?>
                  <img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="<?php echo base_url('files/thumbnail/'.$row->image_filename)?>" />
                <?php else:?>
                  <img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="assets/img/no_image.jpg" />
                <?php endif;?>
                </a>
            </div><!-- /.post-image -->

            <div class="post-body">
                <h2 class="post-title">
                    <a href="<?php echo site_url($lang_code.'/'.$row->id.'/'.url_title_cro($row->title)); ?>"><?php echo $row->title; ?></a>
                </h2><!-- /.post-title -->

                <div class="post-meta">
                    <div class="post-meta-author">
                        Posted by <a href="blog-index.html#">admin</a>
                    </div><!-- /.post-meta-author -->

                    <div class="post-meta-tags">
                        <?php foreach (explode(',', $row->keywords) as $val): ?>
                            <span class="keyword_post"><?php echo trim($val); ?></span>
                        <?php endforeach; ?>
                    </div><!-- /.post-meta-tags -->
                </div><!-- /.post-meta -->

                <div class="post-excerpt">
                    <?php echo $row->description; ?>
                </div><!-- /.post-excerpt -->

                <a href="<?php echo site_url('showroom/'.$row->id.'/'.$lang_code); ?>#content-position" class="post-read-more">{lang_Details}</a>
            </div><!-- /.post-body -->
        </div><!-- /.post -->

            <?php endforeach;?>
            <?php endif;?>
                </div>
                <!-- /.content -->
                <?php if(file_exists(APPPATH.'controllers/admin/showroom.php')):?>
                <div class="sidebar col-sm-4 col-md-3">
                                          <div class="widget">
    <div class="widget-title">
        <h2><?php _l('Custom Menu');?></h2>
    </div><!-- /.widget-title -->
    <div class="widget-content">
        <ul class="menu">
                 <?php foreach($categories_showroom as $id=>$category_name):?>
            <?php if($id != 0): ?>
                <li><a href="{page_current_url}?cat=<?php echo $id; ?>#news"><?php echo $category_name; ?></a></li>
            <?php endif;?>
            <?php endforeach;?>
        </ul>
    </div><!-- /.widget-content -->
</div><!-- /.widget -->
                    
                </div>
                <!-- /.sidebar -->
                <?php endif;?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main -->
    <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
</div>
<!-- /.page-wrapper-->
<?php _widget('custom_javascript');?>
</body>
</html>