<div class="header header-standard">
   <div class="header-topbar">
       <div class="container">
           <div class="header-topbar-left">
          <?php _widget('top_usermenu'); ?>
           </div><!-- /.header-topbar-left -->

           <div class="header-topbar-right lang-menu">
                   {print_lang_menu}
               <!-- /.header-topbar-links -->
            <ul class="header-topbar-social ml30">
                   <li><a href="https://www.facebook.com/share.php?u={homepage_url}"><i class="fa fa-facebook"></i></a></li>
                   <li><a href="https://plus.google.com/share?url={homepage_url}"><i class="fa fa-google-plus"></i></a></li>
                   <li><a href="https://twitter.com/home?status={homepage_url}"><i class="fa fa-twitter"></i></a></li>
               </ul><!-- /.header-topbar-social -->
           </div><!-- /.header-topbar-right -->
       </div><!-- /.container -->
   </div><!-- /.header-topbar -->

   <div class="container">
       <div class="header-inner">
           <div class="header-main">
               <div class="header-title">
                   <a href="{homepage_url_lang}">
                       <img src="<?php echo $website_logo_url; ?>" alt="{settings_websitetitle}">

                        <span>{settings_websitetitle}</span>
                   </a>
               </div><!-- /.header-title -->

               <div class="header-navigation">
                   <div class="nav-main-wrapper">
    <div class="nav-main-title visible-xs">
        <a href="{homepage_url_lang}">
            <img src="<?php echo $website_logo_url; ?>" alt="{settings_websitetitle}">
             <span>{settings_websitetitle}</span>
        </a>
    </div><!-- /.nav-main-title -->

    <div class="nav-main-inner">
        <nav>
              <?php _widget('header_menu'); ?>
            <!-- /.nav -->
        </nav>
    </div><!-- /.nav-main-inner -->
</div><!-- /.nav-main-wrapper -->
<button type="button" class="navbar-toggle">
    <span class="sr-only"><?php _l('Toggle navigation');?></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
               </div><!-- /.header-navigation -->
           </div><!-- /.header-main -->

           <a class="header-action" href="{myproperties_url}" title="{lang_Addproperty}">
               <i class="fa fa-plus"></i>
           </a><!-- /.header-action -->
       </div><!-- /.header-inner -->
   </div><!-- /.container -->
</div><!-- /.header-->
