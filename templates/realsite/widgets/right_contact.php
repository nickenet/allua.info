    <div class="widget">
    <div class="widget-title">
        <h2>{lang_Info}</h2>
    </div><!-- /.widget-title -->

    <div class="widget-content">
        {settings_websitetitle}<br>
        {settings_address}<br>
        {lang_Email}: <a href="mailto:{settings_email}">{settings_email}</a><br>
        {lang_Phone}: {settings_phone}
        <ul class="clearfix sharing-buttons">
            <li class="no-margin">
                <a class="facebook" href="https://www.facebook.com/share.php?u={homepage_url}&title={settings_websitetitle}"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-facebook fa-left no-margin"></i>
                </a>
            </li>
            <li class="no-margin">
                <a class="google-plus" href="https://plus.google.com/share?url={homepage_url}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-google-plus fa-left no-margin"></i>
                </a>
            </li>
            <li class="no-margin">
                <a class="twitter"  href="https://twitter.com/home?status={settings_websitetitle}%20{homepage_url}"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-twitter fa-left no-margin"></i>
                </a>
            </li>
        </ul>
    </div><!-- /.widget-content -->
</div><!-- /.widget -->