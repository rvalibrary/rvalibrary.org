<?php
/*
Template Name: Discovery
 */

 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 ?>

<?php get_template_part('template-parts/discovery/content', 'intro_new');?>


<?php get_template_part('template-parts/discovery/content', 'page_repeater');?>


<section>
  <?php
  while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;

  endwhile; // End of the loop.
  ?>
</section>


</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
