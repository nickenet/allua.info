{has_view_grid}
<div class="row">
    {has_no_results}
    <li class="span12 result-answer">
        <div class="alert alert-success">
            {lang_Noestates}
        </div>
    </li>
    {/has_no_results}
    <div class="row-flex">
    <?php foreach($results as $key=>$item): ?>
    <?php
       /* if($key==0)echo '<div class="row">';*/
    ?>
        <?php _generate_results_item(array('key'=>$key, 'item'=>$item)); ?>
    <?php
       /* if( ($key+1)%3==0 )
        {
            echo '</div><div class="row">';
        }
        if( ($key+1)==count($results) ) echo '</div>';*/
        endforeach;
    ?>
    </div>
</div>
<!-- /.row -->
<div class="center">
    <div class="pagination properties">
        {pagination_links}
    </div>
</div>
{/has_view_grid} 

{has_view_list} 
{has_no_results}
<li class="span12  result-answer">
    <div class="alert alert-success">
        {lang_Noestates}
    </div>
</li>
{/has_no_results}

<?php foreach($results as $key=>$item): ?>
<?php if(config_db_item('template_purpose') == 'real-estate'): ?>
    <div class="property-row">
    <a href="<?php echo _ch($item['url']); ?>" class="property-row-image">
        <img class="property-row-img-cover" src="<?php echo _simg($item['thumbnail_url'], '260x195'); ?>" alt="">
    </a>
    <!-- /.property-row-image -->

    <div class="property-row-content">
        <h2 class="property-row-title">
            <a href="<?php echo _ch($item['url']); ?>"><?php echo _ch($item['option_10']); ?></a>
        </h2>

        <ul class="property-row-location">
            <li>
                <a href="#">
                    <?php echo _ch($item[ 'option_7']); ?>
                </a>,</li>
            <li>
                <a href="#">
                    <?php echo _ch($item[ 'option_5']); ?>
                </a>
            </li>
        </ul>

        <div class="property-row-body">
            <p>
                <?php echo _ch($item[ 'option_8']); ?> </p>
        </div>
        <!-- /.property-row-body -->

        <div class="property-row-meta">
            <?php if($item[ 'option_36']): ?>
            <div class="property-row-meta-item property-box-price">
                <span><?php echo $options_prefix_36; ?></span>
                <strong><?php echo _ch($item['option_36']); ?></strong>
            </div>
            <!-- /.property-box-meta-item -->
            <?php endif; ?>
            <?php if($item[ 'option_57']): ?>
            <div class="property-row-meta-item">
                <span><i class="fa fa-arrows"></i></span>
                <strong><?php echo _ch($item['option_57']); ?><?php echo $options_suffix_57; ?></strong>
            </div>
            <!-- /.property-box-meta-item -->
            <?php endif; ?>
            <div class="property-row-meta-item">
                <span><i class="fa fa-car"></i></span>
                <strong class="<?php echo  (!empty($item['option_32'])) ? 'glyphicon glyphicon-ok':'glyphicon glyphicon-remove';  ?>"></strong>
            </div>
            <!-- /.property-box-meta-item -->

            <?php if($item[ 'option_4']): ?>
            <div class="property-row-meta-item">
                <span><i class="fa fa-file"></i></span>
                <strong><?php echo _ch($item['option_4']); ?></strong>
            </div>
            <?php endif;?>

            <!-- /.property-box-meta-item -->
        </div>
        <!-- /.property-row-meta -->

    </div>
    <!-- /.property-row-content -->
</div>
<?php else: ?>
<div class="property-row">
    <a href="<?php echo _ch($item['url']); ?>" class="property-row-image">
        <img class="property-row-img-cover" src="<?php echo _simg($item['thumbnail_url'], '260x195'); ?>" alt="">
    </a>
    <!-- /.property-row-image -->

    <div class="property-row-content">
        <h2 class="property-row-title">
            <a href="<?php echo _ch($item['url']); ?>"><?php echo _ch($item['option_10']); ?></a>
        </h2>

        <ul class="property-row-location">
            <li>
                <a href="#">
                    <?php echo _ch($item[ 'option_7']); ?>
                </a>,</li>
            <li>
                <a href="#">
                    <?php echo _ch($item[ 'option_5']); ?>
                </a>
            </li>
        </ul>

        <div class="property-row-body">
            <p>
                <?php echo _ch($item[ 'option_8']); ?> </p>
        </div>
        <!-- /.property-row-body -->

        <div class="property-row-meta">
            <?php if($item[ 'option_36']): ?>
            <div class="property-row-meta-item property-box-price">
                <span><?php echo $options_prefix_36; ?></span>
                <strong><?php echo _ch($item['option_36']); ?></strong>
            </div>
            <!-- /.property-box-meta-item -->
            <?php endif; ?>
            <?php if($item[ 'option_44']): ?>
            <div class="property-row-meta-item">
                <span><i class="glyphicon glyphicon-resize-full"></i></span>
                <strong><?php echo _ch($item['option_44']); ?><?php echo $options_suffix_44; ?></strong>
            </div>
            <!-- /.property-box-meta-item -->
            <?php endif; ?>
            
            <?php if($item[ 'option_2']): ?>
            <div class="property-row-meta-item">
                <strong><?php echo _ch($item['option_2']); ?></strong>
            </div>
            <!-- /.property-box-meta-item -->
            <?php endif; ?>
            
            <?php if($item[ 'option_56']): ?>
            <div class="property-row-meta-item">
                <span><i class="glyphicon glyphicon-starglyphicon glyphicon-star"></i></span>
                <strong><?php echo _ch($item['option_56']); ?></strong>
            </div>
            <!-- /.property-box-meta-item -->
            <?php endif; ?>
            
            <div class="property-row-meta-item">
                <span><i class="fa fa-car"></i></span>
                <strong class="<?php echo (!empty($item['option_32'])) ? 'glyphicon glyphicon-ok':'glyphicon glyphicon-remove';  ?>"></strong>
            </div>
            <!-- /.property-box-meta-item -->

            <?php if($item[ 'option_4']): ?>
            <div class="property-row-meta-item">
                <span><i class="fa fa-file"></i></span>
                <strong><?php echo _ch($item['option_4']); ?></strong>
            </div>
            <?php endif;?>

            <!-- /.property-box-meta-item -->
        </div>
        <!-- /.property-row-meta -->

    </div>
    <!-- /.property-row-content -->
</div>


<?php endif;?>
<!-- /.property-row -->
<?php endforeach; ?>
<div class="center">
    <div class="pagination properties center ">
        {pagination_links}
    </div>
    <!-- /.center -->
</div>
{/has_view_list}