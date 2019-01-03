<?php if (has_post_thumbnail()):?>
<div class="page-header-image" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
<?php else:?>
<div class="page-header-default-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/customization/page/new_release_background3.png');">
<?php endif;?>
	<div class="page-header-image-cover"></div>
</div>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-entry-header">
		<div class="container" id="page-entry-header-container">
			<div>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
