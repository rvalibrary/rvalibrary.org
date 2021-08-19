<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RPL_Libraria
 */

get_header();
get_template_part( 'template-parts/archives/content', 'archiveheader' );
?>

<section class="container archive_container" style="">


	<div class="row">
		<div class="col-sm-8" style="padding-top: 30px;">
      <?php
      if ( have_posts() ) :
        get_template_part( 'template-parts/blog/list/content', 'post_list' );
      else:?>
      <div class="no_posts" style="display: flex; justify-content: center; height: 300px; background-color: #003652; border-bottom: 5px dashed black; border-top: 5px dashed black;">
          <h2 style="align-self: center;">No posts yet...</h2>
      </div>
      <?php endif;?>
    </div>

    <div class="col-sm-4">
      <div class="blog-sidebar-container rpl_sidebar">
        <?php
		    if (is_category()){
					get_sidebar('categories');
				}elseif (is_tag()){
					get_sidebar('tags');
				}
				?>
      </div>
    </div>
	</div>




</section>


</article>
<?php get_footer();
