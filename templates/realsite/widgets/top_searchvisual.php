<style>
    /* temp style */
    .map-wrapper .map-filter-horizontal {
        position: static;
    }
    
    </style>
<div class="map-wrapper" >
<div class="map-filter-horizontal search-select">
        <div class="container search-form">
            <form class="form-inline form-real">
                <input id="search_option_is_featured" type="checkbox" class="form-control hidden" value="true<?php _l('is_featured'); ?>" <?php echo search_value('is_featured', 'checked'); ?> />
                <div class="row">
                 <?php _search_form_primary(1); ?>
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

</div><!-- /.map-wrapper -->