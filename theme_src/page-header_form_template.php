<?php
/*
Template Name: Header & Form
 */

 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 ?>

 <?php
 // HEADER acf fields
 $header_title        = get_field('header_title');
 $header_paragraph    = get_field('header_paragraph');
 $use_header_image    = get_field('use_header_image');
 if($use_header_image == 1):
    $header_image = get_field('header_image');
  endif;

 // end HEADER fields

 // GRAVITY FORM acf fields
 $gravity_form_id = get_field('gravity_form_id');
 // end GRAVITY FORM fields
 ?>

<?php if($use_header_image == 1): ?>
  <div class="container-fluid full-height-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <img class="img-responsive margin-md-bottom" style="margin: 0 auto; max-height: 500px;" src="<?php echo $header_image ?>" alt="">
        </div>
        <div class="col-sm-8 col-xs-12 vertical-center-col">
          <h1 class="color-tomato_orange"><?php echo $header_title ?></h1>
          <p style=""><?php echo $header_paragraph ?></p>
        </div>
      </div>
    </div>
    <?php if($gravity_form_id): ?>
    <div class="container margin-md-top margin-md-bottom">
      <?php gravity_form( $gravity_form_id, $display_title = true, $display_description = true, $field_values = null, $ajax = true, $tabindex, $echo = true ); ?>
    </div>
  <?php endif; ?>
  </div>
<?php else: ?>
 <div class="container-fluid full-height-header">
   <div class="container">
     <h1 class="color-tomato_orange"><?php echo $header_title ?></h1>
     <p><?php echo $header_paragraph ?></p>
   </div>
   <div class="container margin-md-top margin-md-bottom">
     <?php gravity_form( $gravity_form_id, $display_title = true, $display_description = true, $field_values = null, $ajax = true, $tabindex, $echo = true ); ?>
   </div>
 </div>
<?php endif; ?>




 <?php get_footer(); ?>
