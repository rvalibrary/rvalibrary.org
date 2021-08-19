<?php if(get_field('use_featured_resource')): ?>
<?php if(get_field('use_bg_wrapper')): ?>
<div class="container-fluid" style="background-color: <?php echo get_field('bg_color'); ?>">
<?php endif; ?>
<div id="<?php echo preg_replace("/(\W)+/", "", get_field('header_text') ); ?>" class="container-fluid margin-md-top margin-md-bottom" style="margin-left: 15px; margin-right: 15px;">
  <h1 class="press-header"><?php echo get_field('header_text'); ?></h1>
  <div class="content-wrapper">
    <div class="background-wrapper">
      <div class="gradient"></div>
      <div class="color-space"></div>
      <div class="background-image background-image-right" style="background: url('<?php echo get_field('resource_image'); ?>'); background-position: center; background-size: cover;"></div>
    </div>
    <div class="main-content">
      <img class="app-icon" src="<?php echo get_field('resource_image'); ?>" alt="">
      <div class="text-content">
        <h1><?php echo get_field('resource_name'); ?></h1>
        <p class="type"><?php echo get_field('resource_types'); ?></p>
        <p class="age"><?php echo get_field('resource_age_groups'); ?></p>
        <?php if(get_field('has_checkouts')): ?>
          <p class="checkouts"><?php echo get_field('number_of_checkouts'); ?></p>
        <?php endif; ?>
        <p class="description"><?php echo get_field('resource_description'); ?></p>
        <div class="link-container">
          <?php if(have_rows('links')): ?>
            <?php while(have_rows('links')): the_row(); ?>
              <a class="btn btn-primary" href="<?php echo get_sub_field('resource_href') ?>"><?php echo get_sub_field('resource_link_text'); ?></a>
            <?php endwhile; ?>
          <?php endif; ?>        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php endif; ?>
