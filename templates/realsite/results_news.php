<?php foreach($news_module_all as $key=>$row):?> 
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

        <a href="<?php echo site_url($lang_code.'/'.$row->id.'/'.url_title_cro($row->title)); ?>" class="post-read-more">{lang_Details}</a>
    </div><!-- /.post-body -->
</div><!-- /.post -->
<?php endforeach;?>

<div class="center">
    <div class="pagination news center ">
        <?php echo $news_pagination; ?>
    </div>
    <!-- /.center -->
</div>