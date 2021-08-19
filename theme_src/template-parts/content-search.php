<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RPL_Libraria
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( 'post' === get_post_type() ) : ?>
			<?php
			get_template_part( 'template-parts/archives/content', 'postitem');
			?>
		<?php endif; ?>

		<?php if ( 'page' === get_post_type() ) : ?>
			<?php
			get_template_part( 'template-parts/archives/content', 'pageitem');
			?>
		<?php endif; ?>



		<?php
		if (($wp_query->current_post +1) != ($wp_query->post_count)) {
			echo '<hr style="background-color: transparent; width: 95%; border-bottom: 1px dashed #003652;">';
		}
		?>
</article><!-- #post-<?php the_ID(); ?> -->
