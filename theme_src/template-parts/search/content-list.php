<?php while ( have_posts() ) :  the_post();
  $day_of_month         = get_the_date('j');
  $month                = get_the_date('M');
  $views                = pvc_get_post_views($post_id = get_the_ID());
  $featured_image_url   = get_the_post_thumbnail_url();
  $views_plugin_path    = 'post-views-counter/post-views-counter.php'; //for checking if posts-views-counter plugin is installed and active
  $categories_array     = [];
  $categories_raw     = [];
  $i = 0;
  $categories_raw       = get_the_category();
  foreach($categories_raw as $category){
    $categories_array[$i] = $category->name;
    $i++;
  }
// $views        = str_replace(pvc_post_views($post_id = get_the_ID(), $echo = false),  ' /', '');

?>

<?php if(get_post_type() == 'post'):?>
    <div class="post_list_item_container" style="margin-bottom: 50px;">
      <h2 class="entry-title" style="text-transform: none; padding-bottom: 5px;">
        <a href="<?php echo get_permalink();?>">
          <?php the_title();?>
          <span style="font-family: Permanent Marker; font-weight: 200; font-size: 20px;"> (Post)</span>
        </a>
      </h2>
    <div style="text-transform: uppercase; ">Posted about <?php echo get_time_since_posted();?> by <a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></div>
    <div class="" style="font-size: 12px; margin-top: 3px;">
      Posted in
      <?php
        foreach ( $categories_raw as $category ) {
            printf( '<a href="%1$s">%2$s</a>',
                esc_url( get_category_link( $category->term_id ) ),
                esc_html( $category->name )
            );
            if(next( $categories_raw )){
              echo ', ';
            }

        }//foreach
      ?>

      <?php if (get_the_tag_list()):?>
        | Tagged with <?php echo get_the_tag_list('',', ',''); ?>
      <?php endif;?>
    </div>
      <?php if ( has_post_thumbnail() ) :?>
        <a href="<?php echo get_permalink();?>">
          <div class="post_list_image_container" style="margin-top: 10px; margin-bottom: 10px; height: 400px; background-image: url('<?php echo $featured_image_url;?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
        </a>
      <?php endif;?>




      <div style="margin-bottom: 10px; margin-top: 2px;">
      <?php echo get_the_excerpt();?>
      </div>

      <a href="<?php echo get_permalink();?>" class="btn btn-primary">Continue Reading</a>
    </div>
<?php elseif(get_post_type() == 'page'):?>
  <div class="post_list_item_container" style="margin-bottom: 50px;">
    <h2 class="entry-title" style="text-transform: none; padding-bottom: 5px;">
      <a href="<?php echo get_permalink();?>">
        <?php the_title();?>
        <span style="font-family: Permanent Marker; font-weight: 200; font-size: 20px;"> (Page)</span>
      </a>
    </h2>

  <?php
    $page_id = get_the_ID();
    $parent_id = wp_get_post_parent_id($page_id);
    $parent_link = get_page_link($parent_id);
    $parent_title = get_the_title($parent_id);
  ?>

  <div style="text-transform: uppercase; ">Published about <?php echo get_time_since_posted();?></div>
  <?php if($parent_id != 0):?>
    <div style="font-size: 12px; margin-top: 3px;">
      Child of <a href="<?php echo $parent_link;?>"><?php echo $parent_title;?></a>
    </div>
  <?php endif;?>
    <?php if ( has_post_thumbnail() ) :?>
      <a href="<?php echo get_permalink();?>">
        <div class="post_list_image_container" style="margin-top: 10px; margin-bottom: 10px; height: 400px; background-image: url('<?php echo $featured_image_url;?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
      </a>
    <?php endif;?>

    <a href="<?php echo get_permalink();?>" class="btn btn-primary" style="margin-top: 8px;">View Page</a>
  </div>


<?php else:?>
  <h2 style="color: black;">Other type item</h2>

<?php endif;?>


<?php endwhile;?><!--foreach $categories_raw-->

<div class="" style="margin-bottom: 20px;">
  <?php the_posts_pagination();?>
</div>
