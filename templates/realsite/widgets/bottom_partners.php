<div class="container">
    <div class="partners">
        <div class="row">
             <?php foreach($all_agents as $agent): ?>
            <?php if(isset($agent['image_sec_url'])): ?>
              <div class="col-sm-2 col-xs-6">
                <a class="partner-item" href="<?php echo $agent['agent_url']; ?>">
                    <img style="max-height:50px;" src="<?php echo $agent['image_sec_url']; ?>" class="partner-thumbnail" alt="">
                </a>
               </div>
             <?php endif; ?>
            <?php endforeach; ?>
        </div><!-- /.row -->
    </div>
</div>