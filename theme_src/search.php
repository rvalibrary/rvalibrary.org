<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package RPL_Libraria
 */

get_header();
get_template_part( 'template-parts/search/content', 'searchheader' );
?>
<!-- <div class="blog_index_container"> -->
<div class="container">
  <div class="row">

    <div class="col-sm-8" style="padding-top: 30px;">
      <?php
      if ( have_posts() ) :
        get_template_part( 'template-parts/search/content', 'list' );
      else:?>
      <div class="no_posts" style="display: flex; justify-content: center; height: 300px; background-color: #003652; border-bottom: 5px dashed black; border-top: 5px dashed black;">
          <h2 style="align-self: center;">No pages or posts found...</h2>
      </div>
      <?php endif;?>
    </div>

    <div class="col-sm-4">
      <div class="blog-sidebar-container rpl_sidebar" style="padding-top: 35px;">
        <?php get_sidebar('search');   ?>
      </div>
    </div>

  </div>
</div><!--container-->
<?php
get_footer();
