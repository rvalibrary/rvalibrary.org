<?php $id = get_field('gf_id'); ?>
<div id="submit" class="container-fluid" style="position: relative; background-color: #003652; padding: 100px 0px; color: white;">
  <div class="bg-overlay"></div>
  <div class="container" style="padding: 0px !important;">
    <div class="row">
      <div class="col-sm-4 col-xs-12 margin-md-bottom">
        <div class="block-section">
          <h1 class="header-gradient-underline"><?php echo get_field('form_header') ?></h1>
          <p class="color-white"><?php echo get_field('form_text') ?></p>
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">
        <div class="block-section">
          <?php gravity_form( $id, $display_title = true, $display_description = true, $field_values = null, $ajax = true, $tabindex, $echo = true ); ?>
        </div>
      </div>
    </div>
  </div>
</div>
