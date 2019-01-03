<?php if (has_post_thumbnail()):?>
<div class="page-header-image" style="height: 205px; background-image: url('<?php the_post_thumbnail_url(); ?>');">
<?php else:?>
<div class="page-header-default-image" style="height: 205px; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/customization/page/new_release_background3.png');">
<?php endif;?>
	<div class="page-header-image-cover"></div>
</div>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="featured-entry-header">
		<div class="container" id="page-entry-header-container">
			<div>

			</div>
			<div class="spacer"></div>
			<div id="breadcrumbs-container">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('
            <span id="breadcrumbs">','</span>
            ');}
          ?>
			</div>

		</div>
	</header><!-- .entry-header -->

  <!-- Start: Page Banner -->
  <section class="page-banner services-banner" style="display:flex; flex-direction: column; justify-content: center;">
      <div class="container" style="align-self: center;">
          <div class="featured-banner" style="">
              <h2><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></h2>
              <span class="underline center"></span>
              <span class="lead">Proin ac eros pellentesque dolor pharetra tempo.</span>
          </div>
      </div><!--container-->
  </section>
    <!-- End: Page Banner -->

	<!-- MAKE SURE YOU CLOSE OFF THE ARTICLE TAG -->
