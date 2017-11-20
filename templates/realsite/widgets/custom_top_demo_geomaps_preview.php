<?php

/*
 * Show dropdown with svg maps for demo preview
 * 
 * NOTE: Use on page with widget top_geosearchvisual.
 * 
 * Config: 
 * config_item('app_type') == 'demo'
 */

if(config_item('app_type') != 'demo') return false;

$errors_svg = array();
$geo_map_prepared = array();
if( file_exists(FCPATH.'templates/'.$this->data['settings']['template'].'/assets/svg_maps/')) {
    $svg_files = array_diff( scandir(FCPATH.'templates/'.$this->data['settings']['template'].'/assets/svg_maps/'), array('..', '.'));
    
    foreach ($svg_files  as $svg) {
        $sql_o = file_get_contents(FCPATH.'templates/'.$this->data['settings']['template'].'/assets/svg_maps/'.$svg);
        $match = '';
        preg_match_all('/(data-title-map)=("[^"]*")/i', $sql_o, $match);
        $preview_link = $page_current_url.'?geo_map_preview='.basename($svg, '.svg');
        if(!empty($match[2])) {
            $geo_map_prepared[$preview_link] = trim(str_replace('"', '', $match[2][0]));
        } else if(stristr($sql_o, "http://amcharts.com/ammap") != FALSE ) {
            $match='';
            preg_match_all('/(SVG map) of ([^"]* -)/i', $sql_o, $match2);
            if(!empty($match2) && isset($match2[2][0])) {
                $title = str_replace(array(" -","High","Low"), '', $match2[2][0]);
                $geo_map_prepared[$preview_link] = trim($title);
            }
        }
    }
}
asort($geo_map_prepared);

$geo_map_preview='';
if(isset($_GET['geo_map_preview']) &&  !empty($_GET['geo_map_preview'])) {
    $geo_map_preview = $page_current_url.'?geo_map_preview='.trim($_GET['geo_map_preview']);  
}

?>
<div class="top-geo_map_preview color-primary hidden">
    <div class="container clearfix">
        <div class="row">
            <div class="col-md-12">
                <div class="geo_map_preview">
                    <label for="geo_map_preview"><?php echo lang_check('Select your country map:'); ?> </label>
                    <?php echo form_dropdown('geo_map',  array_merge(array('' => lang_check('Select map')), $geo_map_prepared), $geo_map_preview, 'class="form-control" id="geo_map_preview"') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function(){
    $('#geo_map_preview').change(function(){
        var url = $(this).val();
        window.location.href=url;
    })
})
</script>