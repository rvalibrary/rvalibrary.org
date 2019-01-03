<div class="page-header-default-image" style="height: 205px; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/customization/page/default_texture.jpg');">
	<div class="page-header-image-cover"></div>
</div>


<article>
	<header class="page-entry-header">
		<div class="container" id="page-entry-header-container">
			<div>
				<?php if (is_category()){
					the_archive_title( '<h1 class="page-title">', '</h1><h5>(category archive)</h5>' );
				}elseif (is_tag()){
					the_archive_title( '<h1 class="page-title">', '</h1><h5>(tag archive)</h5>' );
				}elseif (is_author()){
					the_archive_title( '<h1 class="page-title">', '</h1><h5>(author archive)</h5>' );
				}else{
					the_archive_title( '<h1 class="page-title">', ' Archive</h1>' );
				} ?>
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
