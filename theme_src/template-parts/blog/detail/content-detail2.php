<?php
$views_plugin_path    = 'post-views-counter/post-views-counter.php'; //for checking if posts-views-counter plugin is installed and active
$views                = pvc_get_post_views($post_id = get_the_ID());
$categories_array     = [];
$categories_raw     = [];
$i = 0;
$categories_raw       = get_the_category();
foreach($categories_raw as $category){
  $categories_array[$i] = $category->name;
  $i++;
}
?>

<div class="container">
  <div class="row">
    <div class="col-sm-8" style="margin-top: 30px;">
      <h2 class="entry-title" style="color: black; text-transform: none; padding-bottom: 5px;"><?php the_title();?></h2>
      <div style="text-transform: uppercase;">Posted about <?php echo get_time_since_posted();?> by <a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></div>
      <div class="" style="font-size: 12px; margin-top: 2px;">
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
          <div class="post_list_image_container" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');"></div>
      <?php endif;?>

      <div class="post-detail-head">
          <div class="post-share" style="display:flex; align-items: center;">
              <!--start wp_ulike-->
              <?php if(function_exists('wp_ulike')){
                 wp_ulike('get');
               }?>
              <!--end wp_ulike-->

              <div class="post-share-div" style="margin-left: 20px; display: flex; align-items:center; color: #616161;">
                <i class="fa fa-comment"></i>&nbsp;<?php echo get_comments_number(); ?>
              </div>


              <!--start comment views plugin-->
              <?php if (is_plugin_active($views_plugin_path)):?>
                <div class="post-share-div" style="margin-left: 20px; display: flex; align-items: center;">
                  <i class="fa fa-eye"></i>&nbsp;<?php echo $views;?>
                </div>
              <?php endif;?>
              <!--end comment views-->


              <span class="example-spacer" style="flex: 1 1 auto;"></span>


              <!-- AddToAny BEGIN -->
               <style>
                 div.a2a_kit span{display:none;}
                 div#a2apage_dropdown a{font-family: "Open Sans", Helvetica, Arial, sans-serif;}
               </style>

               <script type="text/javascript">
               var a2a_config = a2a_config || {};
                 a2a_config.onclick = 2;
                 // a2a_config.delay = 1000;
                 a2a_config.linkname = '<?php the_title();?>';
                 a2a_config.linkurl = '<?php echo get_permalink();?>';
               </script>

               <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                   <a class="a2a_dd blog-meta-link" href=""><i class="fa fa-share-alt"></i> Share</a>
               </div>

               <script async src="https://static.addtoany.com/menu/page.js"></script>
               <!-- AddToAny END -->
          </div><!--post-share-->


          <!-- <div class="clearfix"></div> -->
      </div><!--post-detail-head-->


      <div class="entry-content">
        <?php the_content();?>
      </div>


    </div><!--col-sm-8-->

    <div class="col-sm-4">
      <div class="blog-sidebar-container rpl_sidebar">
        <?php get_sidebar('detail');   ?>
      </div>

    </div>
  </div><!--row-->
</div><!--container-->
