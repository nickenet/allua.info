<div class="widget-center-agent">
<h2 class="page-header">{lang_Agents}</h2>
<div class="row">
    <?php foreach($paginated_agents as $item): ?>
    <div class="col-sm-12 col-md-6">
        <div class="agent-medium">
            <a class="agent-medium-image" href="<?php  _che($item['agent_url']);?>">
                <img src="<?php echo _simg($item['image_url'], '250x250'); ?>" alt="<?php  _che($item['name_surname']);?>" />
            </a>
            <!-- /.agent-medium-image -->
            <div class="agent-medium-content">
                <h2 class="agent-medium-title"><?php  _che($item['name_surname']);?></h2>
                <div class="agent-medium-subtitle"><?php  _che($item['total_listings_num']);?> <?php _l('properties');?></div>
                <!-- /.agent-medium-subtitle -->
                <hr>
                <ul>
                    <li><i class="fa fa-phone"></i><?php  _che($item['phone']);?></li>
                    <li><i class="fa fa-at"></i> <a href="mailto:<?php  _che($item['mail']);?>"><?php  _che($item['mail']);?></a>
                    </li>
                   <!--  <li><i class="fa fa-globe"></i> <a href="http://realsite.com">realsite.com</a> -->
                    </li>
                </ul>
            </div>
            <!-- /.agent-medium-content -->
        </div>
        <!-- /.agent-medium -->
    </div>
    <?php endforeach;?>

</div></div>
<!-- /.row -->