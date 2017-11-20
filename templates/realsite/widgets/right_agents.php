<div class="widget">
    <div class="widget-title">
        <h2>{lang_Agents}</h2>
    </div><!--/.widget-title -->
    <form class="form-search agents search-agent" style='margin-bottom:10px;' action="<?php echo current_url().'#content'; ?>" method="get">
                            <input style='margin-bottom:5px;' name="search-agent" type="text" placeholder="{lang_CityorName}" value="<?php echo $this->input->get('search-agent'); ?>" class="input-medium" />
                            <button type="submit" class="btn">{lang_Search}</button>
    </form>
    <div class="widget-content">
        
        <?php foreach($paginated_agents as $item): ?>
        <div class="agent-small">
            <div class="agent-small-inner">
                <div class="agent-small-image">
                    <a href="<?php  _che($item['agent_url']);?>" class="agent-small-image-inner">
                       <img src="<?php echo _simg($item['image_url'], '90x90'); ?>" alt="<?php  _che($item['name_surname']);?>" />
                    </a><!-- /.agent-small-image-inner -->
                </div><!-- /.agent-small-image -->

                <div class="agent-small-content">
                    <h3 class="agent-small-title">
                        <a href="<?php  _che($item['agent_url']);?>"><?php  _che($item['name_surname']);?></a>
                    </h3>

                    <div class="agent-small-email">
                        <i class="fa fa-at"></i> <a href="mailto:<?php  _che($item['mail']);?>?subject={lang_Estateinqueryfor}: {page_title}"><?php  _che($item['mail']);?></a>
                    </div><!-- /.agent-small-email -->

                    <div class="agent-small-phone">
                        <i class="fa fa-phone"></i> <?php  _che($item['phone']);?>
                    </div><!-- /.agent-small-phone -->
                </div><!-- /.agent-small-content -->
            </div><!-- /.agent-small-inner -->
        </div><!-- /.agent-small -->       
      <?php endforeach;?>
    </div><!-- /.widget-content -->
</div>