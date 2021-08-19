<div class="container-fluid" style='background-color:<?php echo get_field("card_background_color") ?>'>
  <?php if(get_field('banner_text')): ?>
  <h1 class="press-header"><?php echo get_field('banner_text') ?></h1>
  <?php endif; ?>
  <div class="flex-event-card-container">
    <?php
     if(have_rows('cards') ):
       while(have_rows('cards') ): the_row();

   ?>
    <div class="flex-event-card">
      <div class="card-img">
        <img src="<?php echo get_sub_field('card_image') ?>" alt="">
      </div>      
      <div class="card-info-body">
        <h1><?php echo get_sub_field('card_header_text') ?></h1>
        <?php if(get_sub_field('card_event_date')): ?>
          <p style="font-size: 13px; margin-bottom: 10px !important;"><span class="dashicons dashicons-calendar-alt" style="color: #ff7236;"></span><span style="padding-left: 10px;"><?php echo get_sub_field('card_event_date') ?></span></p>
        <?php endif; ?>
        <?php if(get_sub_field('card_event_time')): ?>
          <p style="font-size: 13px; margin-bottom: 10px !important;"><span class="dashicons dashicons-clock" style="color: #ff7236;"></span><span style="padding-left: 10px;"><?php echo get_sub_field('card_event_time') ?></span></p>
        <?php endif; ?>
        <p><?php echo get_sub_field('card_paragraph') ?></p>
        <?php if(have_rows('links')): ?>
          <?php while(have_rows('links')): the_row(); ?>
            <a class="btn btn-primary" target="_blank" href="<?php echo get_sub_field('card_link') ?>"><?php echo get_sub_field('card_link_text') ?></a>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  <?php
     endwhile;
   endif;
 ?>
  </div>
</div>
