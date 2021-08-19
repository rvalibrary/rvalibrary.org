<?php
/* Template Name: Innovation Lab */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>

<style media="screen">
  .col-md-4 > div {
    color: white !important;
  }
</style>


<?php
get_template_part('template-parts/general/content', 'parallax-header');
get_template_part('template-parts/discovery/content', 'intro_new');
get_template_part('template-parts/general/content', 'branch-header');
get_template_part('template-parts/general/content', 'button-list2');
get_template_part('template-parts/general/content', 'collapsible-faq-section');
get_footer();
?>
