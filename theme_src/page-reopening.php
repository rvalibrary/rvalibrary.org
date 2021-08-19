<?php
/*
Template Name: Reopening
 */


get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>

<?php get_template_part( 'template-parts/general/content', 'intro-header' ); ?>

<?php get_template_part( 'template-parts/general/content', 'faq' ); ?>

<?php get_template_part( 'template-parts/general/content', 'collapsible-faq-section' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
