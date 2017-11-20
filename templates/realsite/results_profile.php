<div class="row row-flex">
    <?php foreach ($agent_estates as $key => $item): ?>
        <?php _generate_results_item(array('key' => $key, 'item' => $item)); ?>
    <?php endforeach; ?>
</div><!-- /.row -->
<div class="center">
    <div class="pagination pagination-ajax-results">
        <?php echo $pagination_links_agent; ?>
    </div>
</div>