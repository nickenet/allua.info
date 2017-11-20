<?php _widget('custom_top_demo_geomaps_preview');?>
<div class="header-topbar">
    <div class="container">
        <div class="header-topbar-left">
        <?php _widget('top_usermenu'); ?>
        </div><!-- /.header-topbar-left -->

        <div class="header-topbar-right lang-menu">
                {print_lang_menu}
            <!-- /.header-topbar-links -->
         <ul class="header-topbar-social ml30">
                <li><a href="https://www.facebook.com/share.php?u={homepage_url}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://plus.google.com/share?url={homepage_url}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="https://twitter.com/home?status={homepage_url}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a></li>
            </ul><!-- /.header-topbar-social -->
        </div><!-- /.header-topbar-right -->
    </div><!-- /.container -->
</div><!-- /.header-topbar -->