<?php if(config_db_item('currency_conversions_enabled') === TRUE): ?>

<?php

if(!empty($estate_data_option_36))
{
    $default_value = $estate_data_option_36;
    
    if(!empty($options_suffix_36))
    {
        $default_currency = $options_suffix_36;
    }
    else
    {
        $default_currency = $options_prefix_36;
    }
    
}
else if(!empty($estate_data_option_37))
{
    $default_value = $estate_data_option_37;

    if(!empty($options_suffix_37))
    {
        $default_currency = $options_suffix_37;
    }
    else
    {
        $default_currency = $options_prefix_37;
    }

}

if(!empty($default_value)):

$default_value = str_replace(',', '', $default_value);
$default_value = number_format($default_value, 2, '.', '');;

?>

<div class="widget">
    <div class="widget-title"><h2><?php _l('Currency conversions'); ?></h2></div>
<div class="widget-content text-center currency_widget">
    <table class="table table-striped">
        <tr>
            <td><input id="ccw_value" class="form-control currency_value" name="currency_value" type="text" value="<?php echo $default_value; ?>" /></td>
            <td>
<?php
$CI =& get_instance();
$CI->load->model('conversions_m');

$conversion_table = $CI->conversions_m->get_conversions_table();

// Generate options
$options = array();
if(count($conversion_table) > 0)
foreach($conversion_table['code'] as $key=>$row)
{
    $options[$key] = $key;
    if(!empty($row->currency_symbol))
        $options[$key].=' ('.$row->currency_symbol.')';

}

// Default selected
if(isset($conversion_table['code'][$default_currency]))
{
    $default_currency = $conversion_table['code'][$default_currency]->currency_code;
}
else if(isset($conversion_table['symbol'][$default_currency]))
{
    $default_currency = $conversion_table['symbol'][$default_currency]->currency_code;
}

echo form_dropdown('currency_code', $options, $default_currency, 'id="ccw_code" class="form-control currency-select"');
?>
            </td>
        </tr>
        
<?php

$default_currency_index = $conversion_table['code'][$default_currency]->conversion_index;
$js_array_gen = '';


foreach($conversion_table['code'] as $key=>$row)
{    
    $curr_complete = $key;
    if(!empty($row->currency_symbol))
        $curr_complete.=' ('.$row->currency_symbol.')';
    
    
    
    $curr_value = $default_value / $row->conversion_index * $default_currency_index;
    
    
    $js_array_gen.= '{code:"'.$key.'", codefull:"'.$curr_complete.'", index:'.$row->conversion_index.'},'."\n";
    
    if($key == $default_currency)
        continue;
    
    echo '
    <tr>
        <td>'.custom_number_format($curr_value).'</td>
        <td>'.$curr_complete.'</td>
    </tr>
    ';

}

if(!empty($js_array_gen))
    $js_array_gen = substr($js_array_gen, 0, -1);
        
?>
    </table>
</div>
</div>

<style>

.currency_widget table td
{
    width: 50%;
}

.currency_widget.widget-content {
    padding: 0px 16px !important;
}
.currency_widget table input,
.currency_widget table select
{
    width: 80%;
    min-width:0px;
    display:inline;
}

.table-striped,
.table-striped tr,
.table-striped td {
    background-color  : rgba(255, 255, 255, 0) !important;
}

.table-striped tr:first-child td {
   border: 0; 
}

.table-striped tr td {
   border: 0 !important; 
}

.currency_widget .currency_value {
    padding-right: 0; 
} 

.currency-select {
    width: auto !important;
}

.table-striped tr:first-child td:first-child {
    padding-left: 0;
}

.table-striped tr:first-child td:last-child {
    padding-right: 0;
}

</style>

<script>

$( document ).ready(function() {

    $("#ccw_code, #ccw_value").change(function() {
        refresh_cctable();
    });
    
    refresh_cctable();

});

function refresh_cctable()
{
    var curr_value = $("#ccw_value").val();
    var curr_code = $("#ccw_code").val();
    var curr_index = 1;
    
    var cc_array = 
    [
        <?php echo $js_array_gen; ?>
    ];
    
    $('.currency_widget table tr:not(:first)').remove();
    
    $.each(cc_array, function( index, value_obj ) {
        if(value_obj.code == curr_code)
        {
            curr_index = value_obj.index;
        }
    });
    
    $.each(cc_array, function( index, value_obj ) {
        if(value_obj.code != curr_code)
        {
            $('.currency_widget table').append('<tr><td>'+custom_number_format(curr_value/value_obj.index*curr_index)+'</td><td>'+value_obj.codefull+'</td></tr>');
        }
    });
    
}

function custom_number_format(val)
{
    return val.toFixed(2);
}

</script>



<?php endif;endif; ?>