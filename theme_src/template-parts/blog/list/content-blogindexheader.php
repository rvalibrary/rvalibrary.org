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
<div class="page-header-default-image" style="height: 205px; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/customization/page/default_texture.jpg');">
	<div class="page-header-image-cover"></div>
</div>
<?php endif;?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="featured-entry-header" style="padding: 20px 0;">
		<div class="container" id="page-entry-header-container" style="display: flex; justify-content: center;">
	          <div class="featured-banner" style="">
	              <h1 class="text-center"><?php echo $blog_title;?></h1>
	              <span class="underline center"></span>
	              <span class="lead text-center" style="color: white;">News, reviews, and ideas you can use from librarians and library staff at RPL</span>

								<div id="breadcrumbs-container" style="margin-top: 15px;">
									<?php
											if ( function_exists('yoast_breadcrumb') ) {
											yoast_breadcrumb('
											<span id="breadcrumbs">','</span>
											');}
										?>
								</div>
	          </div>

		</div>
	</header><!-- .entry-header -->


	<!-- MAKE SURE YOU CLOSE OFF THE ARTICLE TAG -->
