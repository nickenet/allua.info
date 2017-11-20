<?php if(config_item('tree_field_enabled') === TRUE):?>
<script language="javascript">
    
    /* [START] TreeField */

    $(function() {
        $(".search-form .TREE-GENERATOR#TREE-GENERATOR_ID_64 select").change(function(e, trigger){
            console.log('change');
            if (typeof trigger === 'undefined') trigger = [];
            
            var s_value = $(this).val();
            var s_name_splited = $(this).attr('name').split("_"); 
            var s_level = parseInt(s_name_splited[3]);
            var s_lang_id = s_name_splited[1];
            var s_field_id = s_name_splited[0].substr(6);
            // console.log(s_value); console.log(s_level); console.log(s_field_id);
            //var isTrigger = isTrigger || false;
            
            if(trigger.isTrigger)
                load_by_field($(this), true, trigger.s_values_splited);
            else
                load_by_field($(this));
                
            // Reset child selection and value generator
            var generated_val = '';
            var last_selected_numeric = '';
            $(this).parent().parent()
            .find('select').each(function(index){
                // console.log($(this).attr('name'));
                if(index > s_level)
                {
                    //$(this).html('<option value=""><?php echo lang_check('No values found'); ?></option>');
                    if(!trigger.isTrigger) {
                        $(this).find("option:gt(0)").remove();
                        $(this).val('');
                        $(this).selectpicker('refresh');
                    }
                }
                else
                {
                    last_selected_numeric = $(this).val();
                    generated_val+=$(this).find("option:selected").text()+" - ";
                }    
            });
            //console.log(generated_val);
            $("#sinputOption_"+s_lang_id+"_"+s_field_id).val(generated_val);
            
            $("#inputOption_"+s_lang_id+"_"+s_field_id).attr('rel', last_selected_numeric);
            $("#inputOption_"+s_lang_id+"_"+s_field_id).val(generated_val);
            $("#inputOption_"+s_lang_id+"_"+s_field_id).trigger("change");

        });
        
    });
    
    function load_by_field(field_element, autoselect_next, s_values_splited, first_load)
    {
        if (typeof first_load === 'undefined') first_load = false;
        if (typeof autoselect_next === 'undefined') autoselect_next = false;
        if (typeof s_values_splited === 'undefined') s_values_splited = [];
        
       /* console.log('load_by_field');*/
       // console.log('isTrigger ' + first_load)
        var s_value = field_element.val();
        var s_name_splited = field_element.attr('name').split("_"); 
        var s_level = parseInt(s_name_splited[3]);
        var s_lang_id = s_name_splited[1];
        var s_field_id = s_name_splited[0].substr(6);
        // console.log(s_value); console.log(s_level); console.log(s_field_id);
        
       
        // Load values for next select
        var ajax_indicator = field_element.parent().parent().parent().find('.ajax_loading');
        var select_element = $("select[name=option"+s_field_id+"_"+s_lang_id+"_level_"+parseInt(s_level+1)+"]");
        if(select_element.length > 0 && s_value != '')
        {
            ajax_indicator.css('display', 'block');
            $.getJSON( "<?php echo site_url('api/get_level_values_select'); ?>/"+s_lang_id+"/"+s_field_id+"/"+s_value+"/"+parseInt(s_level+1), function( data ) {
                //console.log(data.generate_select);
                //console.log("select[name=option"+s_field_id+"_"+s_lang_id+"_level_"+parseInt(s_level+1)+"]");
                ajax_indicator.css('display', 'none');
                
                select_element.html(data.generate_select);
                select_element.selectpicker('refresh');
                
                //cuSel({changedEl: ".select_styled", visRows: 8, scrollArrows: true});
                

                
                if(autoselect_next)
                {
                    if(s_values_splited[s_level+1] != '')
                    {
                        var id = select_element.find('option').filter(function () { return $(this).html() == s_values_splited[s_level+1]; }).attr('selected', 'selected').val();
                        select_element.selectpicker('val', id);
                        load_by_field(select_element, true, s_values_splited);
                        
                    }
                }
                if(first_load === true){
                    var trigger = {'isTrigger' : true, 's_values_splited':s_values_splited};
                    $(".search-form .TREE-GENERATOR#TREE-GENERATOR_ID_64").find('select:first').trigger('change', [trigger]);
                }
                
            })
            <?php if(config_item('auto_category_display')=== TRUE):?>
            .success(function(data){
                //console.log(Object.keys(data.values_arr).length);
                // For old browser
                var count = 0;
                var i;
                for (i in data.values_arr) {
                    if (data.values_arr.hasOwnProperty(i)) {
                        count++;
                    }
                }
                //count = object.keys(data.values_arr).length;
                if(field_element.val() !='' &&  count > 1) {
                    field_element.closest('.field-tree').next().show();
                } else {
                    field_element.closest('.field-tree').nextAll().hide();
                }
            });
            <?php endif;?>
        } else {
            <?php if(config_item('auto_category_display')=== TRUE):?>
            field_element.closest('.field-tree').nextAll().hide();
            <?php endif;?>
        }
        
    }
    
    /* [END] TreeField */

</script>
<?php endif; ?>
<div class="map-filter-horizontal search-select">
        <div class="container search-form">
            <form class="form-inline form-real">
                <div class="row">
                <input id="rectangle_ne" type="text" class="hide" />
                <input id="rectangle_sw" type="text" class="hide" />
                <input id="search_option_is_featured" type="checkbox" class="form-control hidden" value="true<?php _l('is_featured'); ?>" <?php echo search_value('is_featured', 'checked'); ?> />
                <!-- [START] TreeSearch -->
                <?php if(config_item('tree_field_enabled') === TRUE):?>
                <?php
                
                    $CI =& get_instance();
                    $CI->load->model('treefield_m');
                    $field_id = 64;
                    $drop_options = $CI->treefield_m->get_level_values($lang_id, $field_id);
                    $drop_selected = array();
                    echo '<div class="tree TREE-GENERATOR" id="TREE-GENERATOR_ID_64">';
                    echo '<div class="field-tree form-group col-sm-3">';
                    echo form_dropdown('option'.$field_id.'_'.$lang_id.'_level_0', $drop_options, $drop_selected, 'class="form-control selectpicker tree-input" id="sinputOption_'.$lang_id.'_'.$field_id.'_level_0'.'"');
                    echo '</div>';
    
                    $levels_num = $CI->treefield_m->get_max_level($field_id);
                    
                    if($levels_num>0)
                    for($ti=1;$ti<=$levels_num;$ti++)
                    {
                        $lang_empty = lang('treefield_'.$field_id.'_'.$ti);
                        if(empty($lang_empty))
                            $lang_empty = lang_check('Please select parent');
                        
                        echo '<div class="field-tree form-group col-sm-3">';
                        echo form_dropdown('option'.$field_id.'_'.$lang_id.'_level_'.$ti, array(''=>$lang_empty), array(), 'class="form-control selectpicker tree-input" id="sinputOption_'.$lang_id.'_'.$field_id.'_level_'.$ti.'"');
                        echo '</div>';
                    }
                    echo '</div>';
                
                ?>
                <?php endif; ?>
                <!-- [END] TreeSearch -->
                </div>
                
                <div class="row">
                <div class="form-group col-sm-3">
                    <input id="search_option_smart" type="text" class="form-control noavtoWidth"   value="{search_query}" placeholder="{lang_CityorCounty}" autocomplete="off" />
                </div>  
                
                <div class="form-group col-sm-3">
                <select id="search_option_2" class="span3 selectpicker" placeholder="{options_name_2}">
                    {options_values_2}
                </select>
                </div>
                <div class="form-group col-sm-3">
                    <select id="search_option_4" placeholder="{options_name_4}">
                        {options_values_4}
                    </select>
                </div>
                
                <div class="form-group col-sm-3">
                <select id="search_option_44_to" class="span3" placeholder="To{options_name_44}">
                        <option value="0" selected="selected">{lang_To} {options_name_44}</option>
                        <option value="100">100 m</option>
                        <option value="1000">1000 m</option>
                        <option value="10000">10 km</option>
                </select>
                </div>
                
                
                </div>
                <div class="advanced-form-row hidden">
                <div class="form-row-space"></div>
                <br style="clear:both;" />
                <div class="form-group col-sm-3">
                    <input id="search_option_36_from" type="text" class="span3 mPrice form-control" placeholder="{lang_Fromprice} ({options_prefix_36}{options_suffix_36})" value="<?php echo search_value('36_from'); ?>" />
                </div>
                <div class="form-group col-sm-3">
                <input id="search_option_36_to" type="text" class="span3 xPrice form-control" placeholder="{lang_Toprice} ({options_prefix_36}{options_suffix_36})" value="<?php echo search_value('36_to'); ?>" />
               </div>
                <div class="form-group col-sm-3">
                   <input id="search_option_19" type="text" class="span3 Bathrooms form-control" placeholder="{options_name_19}" value="<?php echo search_value(19); ?>" />
                </div>
                
                <div class="form-group col-sm-3">
                  <input id="search_option_20" type="text" class="span3 form-control" placeholder="{options_name_20}" value="<?php echo search_value(20); ?>" />
                </div>
                <div class="form-group col-sm-3">
                    <select id="search_radius" name="search_radius" placeholder="<?php echo lang_check('Radius'); ?>">
                        <option value="0">0 km</option>
                        <option value="50">50 km</option>
                        <option value="100">100 km</option>
                        <option value="200">200 km</option>
                    </select>
                </div><!-- /.control-group -->
                <div class="form-row-space"></div>
                <?php if(file_exists(APPPATH.'controllers/admin/booking.php')):?>
                <input id="booking_date_from" type="text" class="span3 mPrice" placeholder="{lang_Fromdate}" value="<?php echo search_value('date_from'); ?>" />
                <input id="booking_date_to" type="text" class="span3 xPrice" placeholder="{lang_Todate}" value="<?php echo search_value('date_to'); ?>" />
                <div class="form-row-space"></div>
                <?php endif; ?>
                <?php if(config_db_item('search_energy_efficient_enabled') === TRUE): ?>
                <select id="search_option_59_to" class="span3 selectpicker nomargin" placeholder="{options_name_59}">
                    <option value="">{options_name_59}</option>
                    <option value="50">A</option>
                    <option value="90">B</option>
                    <option value="150">C</option>
                    <option value="230">D</option>
                    <option value="330">E</option>
                    <option value="450">F</option>
                    <option value="999999">G</option>
                </select>
                <div class="form-row-space"></div>
                <?php endif; ?>
                <br style="clear:both;" />
                <label class="checkbox">
                <input id="search_option_11" type="checkbox" class="span1" value="true{options_name_11}" <?php echo search_value('11', 'checked'); ?>/>{options_name_11}
                </label>
                <label class="checkbox">
                <input id="search_option_22" type="checkbox" class="span1" value="true{options_name_22}" <?php echo search_value('22', 'checked'); ?>/>{options_name_22}
                </label>
                <label class="checkbox">
                <input id="search_option_25" type="checkbox" class="span1" value="true{options_name_25}" <?php echo search_value('25', 'checked'); ?>/>{options_name_25}
                </label>
                <label class="checkbox">
                <input id="search_option_27" type="checkbox" class="span1" value="true{options_name_27}" <?php echo search_value('27', 'checked'); ?>/>{options_name_27}
                </label>
                <label class="checkbox">
                <input id="search_option_28" type="checkbox" class="span1" value="true{options_name_28}" <?php echo search_value('28', 'checked'); ?>/>{options_name_28}
                </label>
                <label class="checkbox">
                <input id="search_option_29" type="checkbox" class="span1" value="true{options_name_29}" <?php echo search_value('29', 'checked'); ?>/>{options_name_29}
                </label>
                <label class="checkbox">
                <input id="search_option_32" type="checkbox" class="span1" value="true{options_name_32}" <?php echo search_value('32', 'checked'); ?>/>{options_name_32}
                </label>
                <label class="checkbox">
                <input id="search_option_30" type="checkbox" class="span1" value="true{options_name_30}" <?php echo search_value('30', 'checked'); ?>/>{options_name_30}
                </label>
                <label class="checkbox">
                <input id="search_option_33" type="checkbox" class="span1" value="true{options_name_33}" <?php echo search_value('33', 'checked'); ?>/>{options_name_33}
                </label>
                <label class="checkbox">
                <input id="search_option_23" type="checkbox" class="span1" value="true{options_name_23}" <?php echo search_value('23', 'checked'); ?>/>{options_name_23}
                </label>
                </div>
                <br style="clear:both;" />
                <div style="display:none;"><div id="tags-filters"> </div>
    
                </div>
                <div class="form-group">
                                <button id="search-start" type="submit" class="btn">&nbsp;&nbsp;{lang_Search}&nbsp;&nbsp;</button>
                
                <?php if(file_exists(APPPATH.'controllers/admin/savesearch.php')): ?>
                <button id="search-save"  type="button" class="btn btn-warning btn-large">{lang_SaveResearch}</button>
                <?php endif; ?>
                <img id="ajax-indicator-1" src="assets/img/ajax-loader.gif" />
                </div>
                
                
            </form>
        </div><!-- /.container -->
    </div>