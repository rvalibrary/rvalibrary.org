<?php
/**
 * The template for displaying authors
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RPL_Libraria
 */
get_header();
get_template_part( 'template-parts/author/content', 'authorheader' );
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
          get_sidebar('authors'); 
				?>
      </div>
    </div>
	</div>




</section>




<?php

get_footer();
