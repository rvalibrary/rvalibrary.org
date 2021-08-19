<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RPL_Libraria
 */

 get_header();
 get_template_part( 'template-parts/blog/list/content', 'blogindexheader2' );

?>

<div class="intro_div_holder_shadow" style="background-color: #022437; z-index: 10; position: relative;">
  <div class="container">
      <div class="row">
        <div class="col-xs-12 block_colored tiles_left_text">
          <div class="discovery_intro_container">
            <div class="discovery_browse">
              News, reviews, and ideas you can use from librarians and library staff at RPL
            </div>
          </div><!-- block_section-->
        </div>
      </div><!--row-->
  </div><!--container-fluid-->
</div>



<!-- <div class="blog_index_container"> -->
<div class="container">
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
        <?php get_sidebar('blog');   ?>
      </div>
    </div>

  </div>




</div><!--container-->




</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
