<?php
  if(get_field('use_banner_notification')): ?>
    <div class="container-fluid notification-banner">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <?php the_field('banner_text'); ?>
        </div>
      </div>
    </div>
<?php endif ?>
