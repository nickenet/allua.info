<?php if(file_exists(APPPATH.'controllers/admin/booking.php')):?>
<div class="form-group col-sm-3">
    <div class="form-group col-sm-6" style="padding-left:0">
        <input id="booking_date_from" type="text" class="form-control noavtoWidth" values="<?php echo search_value('date_from'); ?>"  placeholder="<?php _l('Fromdate'); ?>" autocomplete="off" />
</div>
<div class="form-group col-sm-6" style="padding-right:0">
     <input id="booking_date_to" type="text" class="form-control noavtoWidth" values="<?php echo search_value('date_to'); ?>"  placeholder="<?php _l('Todate'); ?>" autocomplete="off" />
</div>
</div>


        
<?php endif; ?>
