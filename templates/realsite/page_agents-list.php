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
                    <div class=''>
                        {page_body}
                    </div>
                    <?php _widget( 'center_imagegallery'); ?>
                    <hr/> 
                    <?php foreach($paginated_agents as $item): ?>
                    <div class="agent-row">
                        <div class="row">
                            <div class="agent-row-image col-sm-3">
                                <div class="agent-row-image-inner">
                                    <a href="<?php  _che($item['agent_url']);?>#content">
                                        <img src="<?php echo _simg($item['image_url'], '200x200'); ?>" alt="<?php  _che($item['name_surname']);?>" />
                                    </a>
                                </div>
                                <!-- /.agent-row-image-inner -->
                            </div>
                            <!-- /.agent-row-image -->

                            <div class="agent-row-content col-sm-5">
                                <h2 class="agent-row-title"><a href="<?php  _che($item['agent_url']);?>#content"><?php  _che($item['name_surname']);?></a></h2>
                                <div class="agent-row-subtitle"><?php  _che($item['total_listings_num']);?> <?php _l('properties');?></div>
                                <hr>

                                <p>
                                    <?php  _che($item['description']);?>
                                </p>
                            </div>

                            <div class="agent-row-info col-sm-4">
                                <ul>
                                    <li><?php  _che($item['address']);?>
                                        <li>
                                </ul>
                                <br>
                                <ul>
                                    <li><i class="fa fa-phone"></i> <a href="tel:<?php  _che($item['phone']);?>"><?php  _che($item['phone']);?></a></li>
                                    <li><i class="fa fa-at"></i> <a href="mailto:<?php  _che($item['mail']);?>?subject={lang_Estateinqueryfor}: {page_title}"><?php  _che($item['mail']);?></a>
                                    </li>
                                    <!--<li><i class="fa fa-globe"></i> <a href="http://example.com">example.com</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <?php endforeach;?>
                    <!-- /.agent-row -->
                    <?php echo $agents_pagination; ?>
                </div>
                <!-- /.content -->

                <div class="sidebar col-sm-4 col-md-3">
                    <div class="widget search-agent">
                        <div class="widget-title">
                            <h2>{lang_Search}</h2>
                        </div>
                        <form class="form-search agents" action="<?php echo current_url().'#content'; ?>" method="get">
                            <input name="search-agent" type="text" placeholder="{lang_CityorName}" value="<?php echo $this->input->get('search-agent'); ?>" class="input-medium" />
                            <button type="submit" class="btn">{lang_Search}</button>
                        </form>
                    </div>
                    <?php _widget( 'right_contact'); ?>

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