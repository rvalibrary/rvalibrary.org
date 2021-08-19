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
  <article>
      <div class="grid-item blog-item">
          <div class="post-thumbnail">
              <div class="post-date-box">
                  <div class="post-date">
                      <a class="date" href="<?php echo get_permalink();?>"><?php echo $day_of_month;?></a>
                  </div>
                  <div class="post-date-month">
                      <a class="month" href="<?php echo get_permalink();?>"><?php echo $month;?></a>
                  </div>
              </div>
              <?php if ( has_post_thumbnail() ) :?>
                <a href="<?php echo get_permalink();?>"><img alt="blog" src="<?php echo $featured_image_url;?>" /></a>
              <?php else:?>
                <a href="<?php echo get_permalink();?>"><img alt="blog" src="<?php echo get_parent_theme_file_uri(); ?>/assets/images/customization/blog/default_texture.png" /></a>
              <?php endif;?>
              <div class="post-share">
                  <div class="post-share-div" style="display: flex; justify-content: center; flex-direction: column;">
                    <a class="blog-meta-link" href="#."><i class="fa fa-comment"></i>&nbsp;<?php echo get_comments_number(); ?></a>
                  </div>


                  <!--start wp_ulike-->
                  <?php if (function_exists('wp_ulike_get_post_likes')):
                    if (wp_ulike_get_post_likes(get_the_ID())){
                      echo '<div class="post-share-border"></div>';
                      echo '<i class="far fa-thumbs-up"></i>&nbsp;';
                      echo wp_ulike_get_post_likes(get_the_ID());
                    }
                  endif;?>
                  <!--end wp_ulike-->

                  <!--start comment views plugin-->
                  <?php if (is_plugin_active($views_plugin_path)):?>
                    <div class="post-share-border"></div>
                    <div class="post-share-div" style="display: flex; justify-content: center; flex-direction: column;">
                      <a class="blog-meta-link" href="#."><i class="fa fa-eye"></i>&nbsp;<?php echo $views;?></a>
                    </div>
                  <?php endif;?>
                  <!--end comment views-->
                  <div class="post-share-border"></div>
                  <!-- AddToAny BEGIN -->
                   <style>
                     div.a2a_kit span{display:none;}
                     div#a2apage_dropdown a{font-family: "Open Sans", Helvetica, Arial, sans-serif;}
                   </style>

                   <script type="text/javascript">
                   var a2a_config = a2a_config || {};
                     a2a_config.onclick = 2;
                     // a2a_config.delay = 1000;
                     a2a_config.linkname = 'Example Page';
                     a2a_config.linkurl = 'http://www.example.com/page.html';
                   </script>
                   <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                       <a class="a2a_dd blog-meta-link" href=""><i class="fa fa-share-alt"></i> Share</a>
                   </div>

                   <script async src="https://static.addtoany.com/menu/page.js"></script>
                   <!-- AddToAny END -->
              </div><!--post-share-->
          </div>
          <div class="post-detail">
              <header class="entry-header">
                  <?php if (get_the_tag_list()):?>
                  <div class="blog_meta_category">
                      <span class="arrow-right"></span>
                      <?php echo get_the_tag_list('',', ',''); ?>
                  </div>
                <?php endif;?>
                  <h3 class="entry-title"><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h3>
                  <div class="entry-meta">
                      <span><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></span>&nbsp;
                      <span><i class="fa fa-comment"></i> <a href="#"><?php echo comments_number(); ?></a></span>&nbsp;
                      <?php if (!empty($categories_array) && $categories_array[0] != 'Uncategorized' ):?>
                        <span>
                          <i class="fas fa-bookmark"></i>
                            <?php
                              foreach ( $categories_raw as $category ) {
                                if ($category->name != 'Uncategorized'){
                                  printf( '<a href="%1$s">%2$s</a>&nbsp;',
                                      esc_url( get_category_link( $category->term_id ) ),
                                      esc_html( $category->name )
                                  );
                                }//if
                              }//foreach
                            ?>
                        </span>
                    <?php endif;?>
                  </div>
              </header>
              <div class="entry-content">
                  <p><?php the_excerpt();?></p>
              </div>
              <footer class="entry-footer">
                  <a class="btn btn-default" href="<?php echo get_permalink();?>">Read More</a>
              </footer>
          </div>
      </div>
  </article>
<?php endwhile;?>
