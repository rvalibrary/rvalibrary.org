<?php
$blog_title						=		get_field('blog_title', get_option('page_for_posts'));
$blog_subtitle				=		get_field('blog_subtitle', get_option('page_for_posts'));
$blog_image						=		get_field('header_image', get_option('page_for_posts'));
?>


<?php if (get_the_post_thumbnail_url(get_option('page_for_posts'))):?>
<div class="page-header-default-image" style="height: 205px; background-image: url('<?php echo get_the_post_thumbnail_url(get_option('page_for_posts'));?>');">
	<div class="page-header-image-cover"></div>
</div>
<?php else:?>
<div class="page-header-default-image" style="height: 205px; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/customization/page/new_release_background3.png');">
	<div class="page-header-image-cover"></div>
</div>
<?php endif;?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-entry-header">
		<div class="container" id="page-entry-header-container">
			<div>
				<h1 class="entry-title"><?php echo $blog_title;?></h1>
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
