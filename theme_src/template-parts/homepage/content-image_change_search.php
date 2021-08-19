<?php
  global $post;
  $args = array('post_type' => 'background_image');
  $post = get_posts( $args )[0];
  setup_postdata( $post );
  $images  = get_field('images');
  $background = []; //setup background array which will source from repeater field
  $i = 0;
  while( have_rows('images') ): the_row();
    $background[$i] = get_sub_field('background');
    $i++;
  endwhile;
  wp_reset_postdata();
  $randomImageIndex = rand(0,count($background)-1);
  $default_background = get_template_directory_uri() . '/assets/images/customization/homepage/resized_backgrounds/new_release_background3.png';
  ?>

<style media="screen">
  canvas{
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
  }
</style>


<section class="changing-image"  style="background-image: url('<?php echo (count($background) == 0 ? $default_background : $background[$randomImageIndex]);?>');">
  <canvas></canvas>
  <div class="changing-image-cover">
    <?php get_template_part('template-parts/homepage/content', 'big_search'); ?>
  </div>

</section>
