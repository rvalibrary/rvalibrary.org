<?php
/*

Template Name: Virtual Events

*/

get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>

<?php if ( get_field('use_banner_header') ):
  get_template_part( 'template-parts/general/content', 'event-card-banner-header' );
endif; ?>

<?php if( get_field('use_intro_paragraph') ):
  get_template_part( 'template-parts/general/content', 'simple-text-section' );
endif; ?>

<?php get_template_part( 'template-parts/general/content', 'event-card' ); ?>
<?php get_template_part( 'template-parts/content', 'related-links'); ?>







 <?php get_template_part( 'template-parts/content', 'page' ); ?>


 <?php get_footer(); ?>
