<?php
/*

Template Name: Kids/Teens Landing New

*/

$sliderQuery = get_field('slider_query_var');
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
set_query_var('slider_args', $sliderQuery);
set_query_var('use_dropdown', true);
?>


<?php get_template_part('template-parts/general/content', 'parallax-header'); ?>

<?php get_template_part('template-parts/discovery/content', 'intro_new');?>

<?php get_template_part('template-parts/general/content', 'featured-resource');?>

<?php get_template_part('template-parts/general/content', 'landing-slider'); ?>

<?php get_template_part('template-parts/discovery/content', 'page_repeater');?>

<?php
if(get_field('use_blog_widget')):
  set_query_var('get_posts_args', array(
    'numberposts' => 3,
    'category_name' => get_field('blog_widget_category'),
    'order' => 'DESC',
    'orderby' => 'date',
  ));
?>
<div id="newBlog" class="container-fluid" style="background-color: #004765; padding-top: 15px;">
  <div class="container" style="">
    <h1 class="color-white" style="text-align: left;">Latest from the Blog</h1>
    <hr class="thick margin-sm-bottom">
  </div>
</div>
<?php  get_template_part('template-parts/homepage/content', 'new_blog_widget'); ?>
<?php endif; ?>


<?php get_template_part('template-parts/general/content', 'booklist-tiles');?>

<?php get_template_part('template-parts/general/content', 'twitter-feed');?>


<?php get_footer(); ?>
