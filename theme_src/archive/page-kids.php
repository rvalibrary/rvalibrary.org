<?php
/*

Template Name// Kids Landing

 */

get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );

wp_reset_postdata();
   $post_args = array(
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
    'category'    => 'kids',
    'category_name'    => 'kids',
  );
 $postslist = get_posts($post_args);
 $post = $postslist[0];
 setup_postdata($post);


?>


<div class="container">
  <div class="row" style="padding: 25px 0;">
    <div class="col-sm-12 col-md-8">
      <div class="row">
        <div class="col-sm-12">
          <?php layerslider(1) ?>
        </div>
      </div><!-- slider -->
      <div class="row kids_blog">
        <div class="col-sm-12">
        <?php
          if ($post):
            get_template_part( 'template-parts/kids/content', 'recent_kids_post');
          endif;
        ?>
        </div>
      </div><!-- kids blog -->
      <div class="kids_tiles" style="">
        <div class="row">
          <?php
          wp_reset_postdata();
          // check if the repeater field has rows of data

          if( have_rows('tile_rows') ):
              while ( have_rows('tile_rows') ) : the_row();?>
          <?php if( have_rows('tiles') ):
                  while ( have_rows('tiles') ) : the_row();?>
                  <div class="col-xs-12 col-sm-6 col-md-4 kids_discovery_link">
                    <a href="<?php the_sub_field('link');?>"><div style="background-color: <?php the_sub_field('background_color');?>;"><h3><?php the_sub_field('text');?></h3></div></a>
                  </div>
          <?php   endwhile; //tiles
                  else: ?>
                  <h4 style="margin-top: 25px;">No tiles</h4>
          <?php   endif;//tiles?>
          <?php
              endwhile; // tile_rows
              else :
                  ?><h4 style="margin-top: 25px;">No tile rows</h4><?php
              endif; //tile rows ?>
        </div><!--row-->
      </div><!--kids_tiles-->
    </div>
    <aside class="col-sm-12 col-md-4 kids_aside">
      <?php
          get_template_part( 'template-parts/section/content', 'section');
      ?>
      <?php
      the_content();
      ?>
    </aside><!--kids storytime hours-->
  </div><!--row-->

</div>





</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
