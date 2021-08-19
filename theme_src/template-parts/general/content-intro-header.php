<?php if(get_field('use_intro_header')): ?>

<!-- <div class="container-fluid"> -->
<?php if(get_field('use_header_image')): ?>
  <div class="container-fluid intro-header full-height-header" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <img class="img-responsive margin-md-bottom" style="margin: 0 auto; max-height: 500px;" src="<?php echo get_field('header_image'); ?>" alt="">
        </div>
        <div class="col-sm-8 col-xs-12 vertical-center-col">
          <h1 class="color-gold"><?php echo get_field('header_title') ?></h1>
          <p style=""><?php echo get_field('header_paragraph') ?></p>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="slanted-bottom-outer">
    <div class="slanted-bottom-container">
      <div class="slanted-bottom-inner">

      </div>
    </div>
  </div> -->
<?php else: ?>
  <div class="container-fluid intro-header full-height-header" style="padding: 3em 1em; color: white; background-color: #052b41; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="container" style="padding: 0 50px;">
      <h1 class="color-gold"><?php echo get_field('header_title') ?></h1>
      <?php echo get_field('header_paragraph') ?>
    </div>
  </div>
<?php endif; ?>

<!-- </div> -->

<?php endif; ?>
