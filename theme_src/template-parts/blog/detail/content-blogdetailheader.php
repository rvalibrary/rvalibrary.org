
<div class="page-header-default-image" style="height: 205px; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/customization/page/new_release_background3.png');">
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
	<div class="page-length-scroll-bar" style="width:0%; height: 10px; z-index: 9999; background-color: #ff7236; position: sticky; position: -webkit-sticky; top: 0; transition: all .2s ease;"></div>
