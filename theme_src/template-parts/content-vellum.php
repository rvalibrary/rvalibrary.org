<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RPL_Libraria
 */



?>
	<div class="entry-content">
		<div class="container vellum" style="padding-top: 25px; padding-bottom: 25px;">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rpl-libraria' ),
			'after'  => '</div>',
		) );
		?>
		</div>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<div class="container">
				<?php
				edit_post_link( __( 'Edit', 'rpl-libraria' ), '<span>', '</span>', null, 'btn btn-primary btn-edit-post-link' );
				?>
			</div>

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
