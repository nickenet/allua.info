<!DOCTYPE html>
<html>
<head>
     <?php _widget('head'); ?>
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
                       <div id="main">
            <h2 class="page-header">{page_title}</h2>
            <div class="our-agents-large box-white property-detail">
                <?php if(isset($property_compare['address'])&&count($property_compare['address'])>0):?>
                <table class="table table-bordered  table-hover table-compare">
                    <thead>
                        <th></th>
                        <?php $i=1; foreach ($property_compare['url']['values'] as $k => $val):?>
                        <th>
                            <a href='<?php _che($val); ?>'><?php echo lang_check('Estate');?>  <?php echo $i;?></a>
                        </th>
                        <?php $i++; endforeach; ?>
                    </thead>
                    
                    <tr>
                        <?php _che($property_compare['address']['tr']);?>
                    </tr>
                    <tr>
                        <?php _che($property_compare['agent_name']['tr']);?>
                    </tr>
                    <tr>
                        <td>
                            <?php echo lang_check('Image');?>
                        </td>
                        <?php foreach ($property_compare['thumbnail_url']['values'] as $k => $val):?>
                        <td style="text-align:center">
                            <img src='<?php echo _simg($val, '150x100')?>'/>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                    
                    <?php 
                    // options fetch
                    foreach ($property_compare as $field_key => $values):
                    ?>
                    <?php if(!preg_match('/^option_/', $field_key)) continue;?>
                   <?php if($values['empty']!==false) continue;?>
                    <?php /*video skip*/ if($field_key=='option_12') continue;?>
                    <tr>
                        <?php _che($values['tr']);?>
                    </tr>
                    <?php endforeach; ?>
                    
                    <tr>
                        <td>
                        </td>
                        <?php foreach ($property_compare['url']['values'] as $k => $val):?>
                        <td>
                            <a class="btn btn-info" href='<?php _che($val); ?>'> <?php echo lang_check('open property');?></a>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                </table>
                <?php endif;?>
            </div><!-- /.our-agents -->        
        </div>
                    </div><!-- /.content -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main -->
        <?php _subtemplate( 'footers', _ch($subtemplate_footer, 'standart')); ?>
    </div><!-- /.page-wrapper-->
<?php _widget('custom_javascript');?>
</body>
</html>
