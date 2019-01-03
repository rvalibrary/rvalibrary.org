<!-- Start: Blog Section -->
<div class="blog-page grid" style="margin-left: -15px;" id="blog-page-grid">
  <?php get_template_part( 'template-parts/blog/list/tiles/content', 'loop' );?>
</div><!--grid-->
<!-- End: Blog Section -->
<?php the_posts_pagination();?>
