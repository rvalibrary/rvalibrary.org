<?php
/*
Template Name: FAQ
 */


get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>

<?php get_template_part( 'template-parts/general/content', 'intro-header' ); ?>

<?php get_template_part( 'template-parts/general/content', 'faq' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
