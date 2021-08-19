<?php
/*
Template Name: Volunteer
 */

 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 get_template_part( 'template-parts/general/content', 'intro-header' );
 ?>

 <div id="faqSection"></div>
 <?php get_template_part( 'template-parts/general/content', 'faq' ); ?>

 <div id="form"></div>
 <?php get_template_part( 'template-parts/general/content', '2col-form' ); ?>

 <div id="guidelines"></div>
 <?php get_template_part('template-parts/general/content', 'collapsible-faq-section'); ?>
  <?php get_footer(); ?>
