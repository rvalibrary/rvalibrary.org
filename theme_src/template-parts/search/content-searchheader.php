<div class="page-header-default-image" style="height: 205px; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/customization/page/default_texture.jpg');">
	<div class="page-header-image-cover"></div>
</div>


<article>
	<header class="page-entry-header">
		<div class="container" id="page-entry-header-container">
			<div>
				<h1>
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'rpl-libraria' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>

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
