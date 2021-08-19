<?php

  $views_plugin_path    = 'post-views-counter/post-views-counter.php'; //for checking if posts-views-counter plugin is installed and active
  $views                = pvc_get_post_views($post_id = get_the_ID());
 ?>


<div class="archive_item_container">
  <div class="archive_meta_sidebar">
    <div class="archive_meta_item">
      <i class="far fa-calendar-alt archive_meta_icon"></i>
      <span class="archive_meta_text"><?php echo get_the_date('M d, Y');?></span>
    </div>

    <!-- <hr class="archive_meta_divider"> -->
    <div class="archive_meta_item">
      <i class="far fa-comments archive_meta_icon"></i>
      <span class="archive_meta_text">
          <?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?>
          <?php if (comments_open()){
            echo '(open)';
          }else{
            echo '(closed)';
          }?>

      </span>
    </div>





  </div><!--archive_meta_sidebar-->

  <div class="archive_item_content">
  <?php if ( has_post_thumbnail()) :?>
    <a href="<?php echo get_permalink();?>">
      <?php if ( has_post_thumbnail()) :?>
      <figure class="archive_content_image" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>')">
      <?php else:?>
      <figure class="archive_content_image" style="background-image: url('<?php echo get_parent_theme_file_uri(); ?> /assets/images/blog/1170x500.jpg')">
      <?php endif;?>
      </figure>
    </a>
  <?php endif;?>

    <div class="archive_content_text" style="display: flex; flex-direction: column; flex-grow: 1;">

      <a href="<?php echo get_permalink();?>"><?php the_title( '<h2 class="entry-title" style="color: #282828;">', '</h2>' ); ?></a>
      <div class="archive_title_meta">

          <?php if (is_plugin_active($views_plugin_path)):?>
            <div class="" style="display: flex; align-items: center;">
              <i class="fa fa-eye" style="font-size: 15px;"></i>&nbsp;<?php echo $views;?>
            </div>
          <?php endif;?>
          &nbsp;&nbsp;&nbsp;
          <!--start wp_ulike-->
          <?php if (function_exists('wp_ulike_get_post_likes')):
            if (wp_ulike_get_post_likes(get_the_ID()) > 0):
              echo '<i class="far fa-thumbs-up"></i>&nbsp;';
            	echo wp_ulike_get_post_likes(get_the_ID());
            endif;
          endif;?>
          <!--end wp_ulike-->
          <span class="spacer"></span>
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


      </div><!-- archive title meta -->
      <div style="padding-bottom: 15px;">
        <?php the_excerpt();?>
      </div>
      <div class="" style="flex-grow: 1; display: flex; align-items: center;">
        <a href="<?php echo get_permalink();?>" class="btn btn-primary">Read More &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div><!--archive_content_text-->

  </div><!--archive_item_content-->

</div><!-- archive_item_container-->
