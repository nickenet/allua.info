<?php if(file_exists(APPPATH.'controllers/admin/reviews.php')): ?>
    <script src="assets/js/ratings/bootstrap-rating-input.js"></script> 
<?php endif; ?>
<!-- jquery.cookiebar -->
<!-- url -- http://www.primebox.co.uk/projects/jquery-cookiebar/ -->
<?php if(config_item('cookie_warning_enabled') === TRUE): ?>
<script type="text/javascript">
 $('document').ready(function(){
    $.cookieBar({
    declineButton: true,
    message: "<p><?php _l('Accept cookiebar');?></p><br>",
    acceptText: "<?php _l('I Agree');?>",
    declineText: "<?php _l('I dont agree');?>",
});
}) 

$('document').ready(function(){
    reloadPaginationUniversal();
 })
            function reloadPaginationUniversal()
        {
                 
            $('.pagination-ajax-results a').click(function () { 
                var page_num = $(this).attr('href');
                var n = page_num.lastIndexOf("/"); 
                page_num = page_num.substr(n+1);
                var results_dom_id = '#ajax_results';
                
                $.post($(this).attr('href'), {'page_num':page_num}, function(data){
                    $(results_dom_id).html(data.print);
                    
                    reloadPaginationUniversal();
                }, "json");
                
                return false;
            });
        }
</script>
<?php endif;?>
<!--end jquery.cookiebar -->

<script type="text/javascript">
$('document').ready(function(){
    reloadPaginationUniversal();
 })
            function reloadPaginationUniversal()
        {
                 
            $('.pagination-ajax-results a').click(function () { 
                var page_num = $(this).attr('href');
                var n = page_num.lastIndexOf("/"); 
                page_num = page_num.substr(n+1);
                var results_dom_id = '#ajax_results';
                
                $.post($(this).attr('href'), {'page_num':page_num}, function(data){
                    $(results_dom_id).html(data.print);
                    
                    reloadPaginationUniversal();
                }, "json");
                
                return false;
            });
        }
</script>


<script type="text/javascript">
$('document').ready(function(){
    $('#search_option_smart').typeahead({
        minLength: 1,
        source: function(query, process) {
            $.post('{typeahead_url}/smart', { q: query, limit: 8 }, function(data) {
                process(JSON.parse(data));
            });
        }
    });
    
    if($('.mobileswap-box').length) {
        if($(window).width() < 750) {
            if($('.sidebar .swap-search-box .widget.search-form').length){
                $('.mobileswap-box').append($('.sidebar .swap-search-box .widget.search-form').detach());
                
            }
        }
        
        $(window).resize(function(){
            if($(window).width() < 750) {
                if($('.sidebar .swap-search-box .widget.search-form').length){
                    $('.mobileswap-box').append($('.sidebar .swap-search-box .widget.search-form').detach());

                }
            } else {
                if($('.mobileswap-box .widget.search-form').length){
                    $('.sidebar .swap-search-box').append($('.mobileswap-box .widget.search-form').detach());

                }
                
            }
        })
        
    }
    
 })
</script>
