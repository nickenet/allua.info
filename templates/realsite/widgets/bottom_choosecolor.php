<?php if(config_db_item('app_type') == 'demo' || $this->session->userdata('type') == 'ADMIN'): ?>
<div class="fullwidth background-grey background-map block center mb0">
    <div class="container">
        <h1><?php _l('Build colors');?></h1>

        <div class="circle-colors">
            <a href="{page_current_url}?color=red"  class="circle-color circle-color-red"></a>
            <a href="{page_current_url}?color=pink"   class="circle-color circle-color-pink"></a>
            <a href="{page_current_url}?color=deep-purple" class="circle-color circle-color-deep-purple"></a>
            <a href="{page_current_url}?color=indigo" class="circle-color circle-color-indigo"></a>
            <a href="{page_current_url}?color=blue" class="circle-color circle-color-blue"></a>
            <a href="{page_current_url}?color=light-blue" class="circle-color circle-color-light-blue"></a>
            <a href="{page_current_url}?color=cyan" class="circle-color circle-color-cyan"></a>
            <a href="{page_current_url}?color=teal" class="circle-color circle-color-teal"></a>
            <a href="{page_current_url}?color=green" class="circle-color circle-color-green"></a>
            <a href="{page_current_url}?color=light-green" class="circle-color circle-color-light-green"></a>
            <a href="{page_current_url}?color=lime" class="circle-color circle-color-lime"></a>
            <a href="{page_current_url}?color=yellow" class="circle-color circle-color-yellow"></a>
            <a href="{page_current_url}?color=amber" class="circle-color circle-color-amber"></a>
            <a href="{page_current_url}?color=orange" class="circle-color circle-color-orange"></a>
            <a href="{page_current_url}?color=deep-orange" class="circle-color circle-color-deep-orange"></a>
            <a href="{page_current_url}?color=brown" class="circle-color circle-color-brown"></a>
            <a href="{page_current_url}?color=blue-grey" class="circle-color circle-color-blue-grey"></a>
        </div><!-- /.circle-colors -->
    </div><!-- /.container -->
</div>
<?php endif; ?>