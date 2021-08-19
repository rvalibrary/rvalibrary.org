<?php
/*

Template Name: Vellum

 */

 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 ?>

   <section>
   			<?php
   			while ( have_posts() ) :
   				the_post();

   				get_template_part( 'template-parts/content', 'vellum' );

   				// If comments are open or we have at least one comment, load up the comment template.
   				if ( comments_open() || get_comments_number() ) :
   					comments_template();
   				endif;

   			endwhile; // End of the loop.
   			?>


   </section>



</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
