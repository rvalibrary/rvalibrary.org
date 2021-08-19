<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RPL_Libraria
 */
$views	= pvc_get_post_views($post_id = get_the_ID());
$views_plugin_path    = 'post-views-counter/post-views-counter.php'; //for checking if posts-views-counter plugin is installed and active

?>


<!-- Start: Blog Section -->
 <?php get_template_part( 'template-parts/blog/detail/content', 'detail2' );?>
<!-- End: Blog Section -->
