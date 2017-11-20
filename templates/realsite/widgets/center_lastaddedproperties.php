<h2 class="page-header">{lang_Lastaddedproperties}</h2>
<div class="row row-flex">
    <?php foreach($last_estates as $key=>$item): ?>
    <?php _generate_results_item(array( 'key'=>$key, 'item'=>$item, 'columns'=>3)); ?>
    <?php endforeach; ?>
</div>