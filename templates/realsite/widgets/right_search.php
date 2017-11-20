
<div class="swap-search-box">
    <div class="widget search-form" style="margin-top: 25px;">

        <div class="widget-content form-real form-real-guide">
            <form method="post" class="property-form search-select " action="{page_current_url}#contactForm">
                                        <!-- The form name must be set so the tags identify it -->

                                        <div class="form-group control-group">
                                               <input id="search_option_smart" type="text" class="form-control noavtoWidth"   value="{search_query}" placeholder="{lang_CityorCounty}" autocomplete="off" />
                                        </div>


                                        <div class="form-group control-group">
                                            <select id="search_option_4" class="span3 selectpicker nomargin" placeholder="{options_name_4}">
                                                {options_values_4}
                                            </select>
                                        </div> 

                                        <div class=" form-group control-group">
                                            <select id="search_option_44_to" class="span3" placeholder="To{options_name_44}">
                                                    <option value="0" selected="selected">{lang_To} {options_name_44}</option>
                                                    <option value="100">100 m</option>
                                                    <option value="1000">1000 m</option>
                                                    <option value="10000">10 km</option>
                                            </select>
                                        </div>



                                        <div class="form-group">
                                                        <button id="search-start" type="submit" class="btn">&nbsp;&nbsp;{lang_Search}&nbsp;&nbsp;</button>

                                        <?php if(file_exists(APPPATH.'controllers/admin/savesearch.php')): ?>
                                        <button id="search-save"  type="button" class="btn btn-warning btn-large">{lang_SaveResearch}</button>
                                        <?php endif; ?>
                                        </div>
                                    </form>

        </div><!-- /.widget-content -->
</div>
</div>





