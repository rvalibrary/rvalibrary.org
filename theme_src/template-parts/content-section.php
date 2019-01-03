<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RPL_Libraria
 */


$is_parent    =   get_field('parent_page');
$page_id = get_the_ID();
$parent_id = wp_get_post_parent_id($page_id);

if($is_parent){
  $mypages = get_pages( array( 'child_of' => $page_id));
}else{
  $mypages = get_pages( array( 'child_of' => $parent_id));
}



?>
	<div class="entry-content">
		<div class="container vellum" style="padding-top: 25px; padding-bottom: 25px;">
      <div class="row">
        <div class="<?php if(count($mypages)>0):?>col-md-9<?php else:?>col-md-12<?php endif;?>">
          <?php
          the_content();

          wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rpl-libraria' ),
            'after'  => '</div>',
          ) );
          ?>
        </div><!--col-md-4-->
        <?php if(count($mypages) > 0):?>
        <div class="col-md-3">
          <aside>
            <h3>Browse <?php  if($is_parent){echo get_the_title();}else{echo get_the_title($parent_id);}?></h3>
            <ul style="list-style: none; margin: 0; padding: 0;">
              <?php
                $i = 0;
                foreach ( $mypages as $page ){?>
                <li style="<?php if($i<count($mypages)-1):?>border-bottom: 1px solid rgba(0, 0, 0, .12);<?php endif;?> padding: 5px 0; font-family: "Lato", Georgia, Times, serif;">
                <i style="color: #f94c3f; margin-right: 10px;" class="fas fa-caret-right"></i>
                <?php
                  $section_link = '<a href="' . get_page_link( $page->ID ) . '">';
                  $section_link .= $page->post_title;
                  $section_link .= '</a>';
                  echo $section_link;
                ?>
                </li>
              <?php $i++; }//foreach?>
            </ul>
            <?php get_sidebar('section');   ?>
          </aside>
        </div><!--col-md-3-->
      <?php endif;?>
      </div><!--row-->

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
