<?php if(get_field('use_twitter_feed')): ?>
<div style="background-color:<?php echo get_field('background_color') ?>;" class="container-fluid" id="socialTwitter">
  <div class="row">
    <div class="container">
      <h1 style="border-bottom: 2px solid white; margin: 15px 0px; color: white;">Social</h1>
      <?php echo get_field('twitter_feed') ?>
    </div>
  </div>
</div>
<?php endif; ?>
