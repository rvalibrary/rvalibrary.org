<!-- ########## COLLAPSIBLE FAQ SECTION ########## -->
<?php $count = 1; ?>
<?php if(have_rows('dropdown_section')):
        while(have_rows('dropdown_section')): the_row();
?>
<?php if($count != 1): ?>
<div style="padding-top: 0px !important" id="<?php echo preg_replace("/(\W)+/", "", get_sub_field('info_header2') ); ?>" class="faq-answer faq-even" >
<?php else: ?>
<div id="<?php echo preg_replace("/(\W)+/", "", get_sub_field('info_header2') ); ?>" class="faq-answer faq-even" >
<?php endif; ?>
  <div class="container">

    <h1 style="margin-bottom: 10px; color: #022437;"><?php echo get_sub_field('info_header2') ?></h1>
    <?php if(get_sub_field('info_paragraph_header')): ?>
    <p style="font-size: 14px;"><?php echo get_sub_field('info_paragraph_header'); ?></p>
    <?php endif; ?>

    <div class="collapsible-container">

      <?php
      /* ACF loop for FAQ Section repeater */
        if(have_rows('faq_section') ):
          while(have_rows('faq_section') ): the_row();

          $faq_header = get_sub_field('faq_header');
       ?>

    <div class="faq-header-container">
      <h2 class="faq-header"><span class="dashicons dashicons-plus" style="float: left; cursor: pointer; color: #3e3e3e;"></span><span class="dashicons dashicons-minus" style="float: left;cursor: pointer; color: #3e3e3e;"></span><?php echo $faq_header ?></h2>
    </div> <!-- faq-header-container -->

    <div class="text-container">
      <ul class="faq-description">
      <?php
      /* ACF loop for individual FAQ repeater */
        if( have_rows('faq_body') ):
          while(have_rows('faq_body')): the_row();

          $faq = get_sub_field('faq');
       ?>
      <li><?php echo $faq ?></li>

      <?php
        endwhile;
        endif;
       ?>
    </ul><!-- faq-description -->
  </div><!-- text-container -->

    <?php
      endwhile;
      endif;
     ?>

   </div><!-- collapsible-container -->
 </div> <!--container-->
 <?php $count++; ?>
</div> <!-- faq-answer -->
<?php
endwhile;
endif;
 ?>
