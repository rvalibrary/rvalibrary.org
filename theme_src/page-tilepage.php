<?php
/*

Template Name: Tile Page

 */

get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
?>
<section>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>
</section>

<!--Start Repeater Section --->
<?php get_template_part( 'template-parts/tilepage/content', 'tilepage' );?>
<!--End Repeater Section --->
<section>

	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;


	 ?>
</section>



</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
