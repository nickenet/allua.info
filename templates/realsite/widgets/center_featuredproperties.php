    <?php foreach($featured_properties as $key=>$item): ?>
    <?php
       /* if($key==0)echo '<div class="row">';*/
    ?>
        <?php _generate_results_item(array('key'=>$key, 'item'=>$item, 'columns'=>4)); ?>
    <?php
       /* if( ($key+1)%3==0 )
        {
            echo '</div><div class="row">';
        }
        if( ($key+1)==count($results) ) echo '</div>';*/
        endforeach;
    ?>
