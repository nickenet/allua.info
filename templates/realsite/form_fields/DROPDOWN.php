<?php
    $col=6;
    $f_id = $field->id;
    $placeholder = _ch(${'options_name_'.$f_id});
    $direction = $field->direction;
    if($direction == 'NONE'){
        $col=12;
        $direction = '';
    }
    else
    {
        $placeholder = lang_check($direction);
        $direction=strtolower('_'.$direction);
    }
    
    $f_id = $field->id;
    $class_add = $field->class;
    if(empty($class_add))
        $class_add = ' col-sm-12';
    
?>
<div class="form-group col-sm-3">
    <select id="search_option_<?php echo $f_id; ?><?php echo $direction;?>" placeholder="{options_name_<?php echo $f_id; ?>}">
        <?php _che(${'options_values_'.$f_id}); ?>
    </select>
</div>