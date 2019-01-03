<?php
/*
Template Name: Home Page
 */
get_header();
?>


      <!-- Start: Top Most Section -->
      <!-- Start: Search Section -->
      <?php //get_template_part('template-parts/homepage/old/content', 'slider'); ?>
      <?php //get_template_part('template-parts/homepage/old/content', 'searchfilters'); ?>
      <?php get_template_part('template-parts/homepage/content', 'image_change_search'); ?>
      <!-- End: Top Most Section -->
      <!-- End: Search Section -->

      <!-- Start: Featured Event Section -->
      <?php get_template_part('template-parts/homepage/content', 'featured_event_section'); ?>
      <!-- End: Featured Event Section -->

      <!-- Start: Tiles -->
      <?php get_template_part('template-parts/homepage/content', 'tiles'); ?>
      <!-- End: Tiles -->

      <!-- Start: Category Filter -->
      <?php //get_template_part('template-parts/homepage/content', 'new_releases'); ?>
      <!-- Start: Category Filter -->

      <!-- Start: Newsletter -->
      <?php get_template_part('template-parts/homepage/content', 'newsletter'); ?>
      <!-- End: Newsletter -->

      <!-- Start: Social Network -->
      <?php //get_template_part('template-parts/homepage/content', 'social_network'); ?>
      <!-- End: Social Network -->

      <!-- Start: Welcome Section -->
      <?php //get_template_part('template-parts/homepage/unused/content', 'welcome'); ?>
      <!-- End: Welcome Section -->

      <!-- Start: Meet Staff -->
      <?php //get_template_part('template-parts/homepage/unused/content', 'meet_staff'); ?>
      <!-- End: Meet Staff -->

      <!-- Start: Latest Blog -->
      <?php //get_template_part('template-parts/homepage/unused/content', 'blog_latest'); ?>
      <!-- End: Latest Blog -->

      <!-- Start: Our Community Section -->
      <?php //get_template_part('template-parts/homepage/unused/content', 'community'); ?>
      <!-- End: Our Community Section -->

      <!-- Start: News & Event -->
      <?php //get_template_part('template-parts/homepage/unused/content', 'news_events'); ?>
      <!-- End: News & Event -->



<?php get_footer(); ?>
