<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RPL_Libraria
 */

 get_header();
 get_template_part( 'template-parts/blog/detail/content', 'blogdetailheader' );
?>

	<div id="primary" class="content-area" style="padding-bottom: 50px;">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
			//the_post_navigation();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->


</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
