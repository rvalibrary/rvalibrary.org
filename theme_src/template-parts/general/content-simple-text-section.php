<style media="screen">
  .blob{
    max-width: 450px;
    position: absolute;
    z-index: -1;
  }

  .svg1{
    top: -200px;
    left: -160px;
    transform: rotate(90deg);
  }

  .svg2{
    bottom: -180px;
    right: -160px;
  }
</style>

<div class="container-fluid" style="position: relative; margin-top: 200px; margin-bottom: 150px;">
  <?php if(get_field('use_wavy')): ?>
    <svg class="blob svg1" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
      <path fill="#fdbe12" d="M46.1,-46.8C61.4,-42.1,76.6,-29.2,80.6,-13.2C84.6,2.7,77.3,21.5,64.8,32C52.3,42.4,34.6,44.3,19.2,47.7C3.9,51.1,-9.1,56,-21,53.5C-32.8,50.9,-43.4,41.1,-50,29.2C-56.5,17.2,-58.9,3.2,-58.7,-12.4C-58.4,-28.1,-55.4,-45.3,-45.2,-50.9C-35,-56.4,-17.5,-50.2,-1,-49C15.4,-47.8,30.8,-51.4,46.1,-46.8Z" transform="translate(100 100)" />
    </svg>
    <svg class="blob svg2" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
      <path fill="#fdbe12" d="M39,-65.1C47.2,-55.4,48.2,-39,49.7,-25.7C51.2,-12.4,53.2,-2.2,52.4,7.9C51.5,18.1,47.9,28.3,41.3,35.6C34.6,42.9,24.9,47.3,14.1,52.5C3.4,57.6,-8.5,63.4,-22.4,64.7C-36.4,65.9,-52.4,62.6,-65,53.4C-77.7,44.2,-86.8,29,-81.8,16.1C-76.9,3.3,-57.8,-7.2,-50.7,-23.3C-43.5,-39.3,-48.3,-61,-41.9,-71.5C-35.4,-82,-17.7,-81.3,-1.2,-79.5C15.4,-77.8,30.8,-74.8,39,-65.1Z" transform="translate(100 100)" />
    </svg>
  <?php endif ?>
  <?php if(get_field('use_top_quick_navigation')): ?>
    <div class="container">
      <div class="row">
        <?php if(have_rows('big_buttons')): ?>
          <?php while(have_rows('big_buttons')): the_row(); ?>
              <a style="margin: 5px;" class="btn btn-primary" href="<?php echo get_sub_field('link_href'); ?>">
                <?php echo get_sub_field('link_text'); ?>
              </a>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
  <div class="container">
    <div class="row" style="max-width: 900px; margin: 0 auto;">
      <div style="display: flex; flex: 3; flex-direction: column;">
        <h1 style="color: black;"><?php echo get_field('text_header'); ?></h1>
        <?php echo get_field('paragraph'); ?>
      </div>
    </div>
  </div>
</div>
