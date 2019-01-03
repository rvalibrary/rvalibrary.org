<?php
/*

Template Name: Section

 */
 $is_parent    =   get_field('parent_page');
 $page_id = get_the_ID();
 $parent_id = wp_get_post_parent_id($page_id);

 if($is_parent){
   $mypages = get_pages( array( 'child_of' => $page_id));
 }else{
   $mypages = get_pages( array( 'child_of' => $parent_id));
 }


 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 ?>

   <section>
   			<?php
   			while ( have_posts() ) :
   				the_post();
   				?>

          <div class="entry-content" style="padding-top: 0; margin-top: 0;">
            <div class="container">
              <div class="row">
                <div class="<?php if(count($mypages)>0):?>col-md-9<?php else:?>col-md-12<?php endif;?>" style="padding-top: 35px; padding-bottom: 25px;">
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
                  <aside class="rpl_sidebar section-sidebar-container">
                    <?php get_template_part( 'template-parts/section/content', 'section');?>
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


          <?php
   				// If comments are open or we have at least one comment, load up the comment template.
   				if ( comments_open() || get_comments_number() ) :
   					comments_template();
   				endif;

   			endwhile; // End of the loop.
   			?>


   </section>



</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
