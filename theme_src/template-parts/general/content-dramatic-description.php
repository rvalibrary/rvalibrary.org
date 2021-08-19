<div class="container-fluid color-white bg-light-slate-blue" style="padding-bottom: 3rem;">
  <div class="container border-left margin-huge-top margin-big-bottom">
    <div class="row">
      <div class="col-xs-12">
        <h4 class="header-gradient-underline"><?php echo get_field('dramatic_description_header'); ?></h4>
        <p style="font-size: 20px;"><?php echo get_field('dramatic_description_paragraph'); ?></p>
      </div>
    </div>
  </div>
  <?php if(get_field('use_video')): ?>
  <div class="row flex-center">
    <div class="col-xs-12 col-md-8">
      <div class="video-wrapper">
        <?php echo get_field('iframe_embed'); ?>
    </div>
  </div>
 <?php endif; ?>
</div>
</div>
