<div class="container-fluid header-fullwidth-bg" style="background-image: url('<?php echo get_field('header_bg'); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
  <!-- <div class="overlay"></div> -->
  <div class="row content-layer">
    <div class="col-xs-12 offset-header-box">
      <h1 class="header-gradient-underline"><?php echo get_field('header_top_text'); ?></h1>
      <h3><?php echo get_field('header_middle_text'); ?></h3>
      <p><?php echo get_field('header_bottom_text'); ?></p>
      <div>
      <?php if(have_rows('link_repeater') ): ?>
        <?php while(have_rows('link_repeater') ): the_row(); ?>
          <a class="btn btn-primary" href="#<?php echo get_sub_field('link_href');?>"><?php echo get_sub_field('link_text'); ?></a>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if(get_field('use_bg_gradient')): ?>
  <div class="bottom-gradient" style="min-height: 150px; position: absolute; bottom: 0; left: 0px; background-image: linear-gradient(to bottom, rgba(3,38,56, 0) 0.1%, <?php echo get_field('gradient_color') ?> 94%); width: 100%;
  height: 100px; display: flex; display: -ms-flexbox; display: -webkit-box; -webkit-box-align: baseline; -ms-flex-align: baseline; align-items: baseline; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; -webkit-box-pack: end; justify-content: flex-end; padding: 0 20px 20px 20px;">
  </div>
  <?php endif; ?>
</div>
