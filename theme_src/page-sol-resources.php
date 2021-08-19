<?php
/*

Template Name: SOL Resources

 */

 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );

 ?>


<?php get_template_part('template-parts/general/content', 'intro-header'); ?>

<?php get_template_part('template-parts/general/content', 'collapsible-faq-section'); ?>


<?php get_template_part('template-parts/general/content', 'booklist-tiles'); ?>
<?php get_template_part('template-parts/content', 'related-links'); ?>


 <?php get_footer(); ?>
