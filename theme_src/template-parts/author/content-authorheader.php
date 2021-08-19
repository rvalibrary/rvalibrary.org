<div class="page-header-default-image" style="height: 205px; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/customization/page/default_texture.jpg');">
	<div class="page-header-image-cover"></div>
</div>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-entry-header">
		<div class="container" id="page-entry-header-container">
			<div>

        <h1>
          <?php echo get_the_author(); ?>'s Posts
        </h1>
        <h5>RPL Author</h5>

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



	<!-- MAKE SURE YOU CLOSE OFF THE ARTICLE TAG -->
