<div class="container-fluid" style="width: auto; background-color: #055775">
  <div class="container" style="text-align:center; margin-top:20px">
    <h2 class="section-title" style="color: white">Latest from the Blog</h2>
  </div>

  <?php
    global $post;
    $args = array(
      'posts_per_page' => 3,
      'order' => 'DESC',
      'orderby' => 'date'
    );
    $postsArr = get_posts( $args );


      ?>

      <div class="tabby-container">
        <div class="tab-container">
          <?php
            $counter = 1;
            $dateArr = [];

            foreach ($postsArr as $post):
              setup_postdata( $post );
              $date = new DateTime($post->post_date);
              $dateObj = new stdClass();
              $formattedDateDay = $date->format('d');
              $dateObj->day = $formattedDateDay;
              $formattedDateMonth = substr($date->format('F'), 0, 3);
              $dateObj->month = $formattedDateMonth;
              $fullyFormattedDate = $formattedDateDay . ' ' . $formattedDateMonth;
              $dateObj->fullDate = $fullyFormattedDate;
              array_push($dateArr, $dateObj);
          ?>
          <div data-id="<?php echo $counter ?>" class="tab-box">
            <?php echo $dateArr[count($dateArr) - 1]->fullDate ?>
          </div>
        <?php
          $counter++;
          endforeach;
        ?>
        </div>
        <div class="content-container">
          <?php
            $counter = 1;
            foreach( $postsArr as $post ):
          ?>
          <?php if($counter == 1): ?>
          <div data-id="<?php echo $counter ?>" class="content selected">
          <?php else : ?>
            <div data-id="<?php echo $counter ?>" class="content hide">
          <?php endif; ?>
            <div class="left-container">
              <h3 class="title"><?php echo $post->post_title ?></h3>

              <a target="_blank" href="https://rvalibrary.org/shelf-respect/author/<?php echo get_the_author_meta('user_login', $post->post_author) ?>/">
              <h5 class="author">
                <span class="dashicons dashicons-admin-users"></span>
                <?php echo get_the_author_meta('display_name', $post->post_author) ?></h5>
              </a>

              <p class="tags">Posted in
                <?php $categoryArr = get_the_category();
                    if($categoryArr):
                      foreach($categoryArr as $category):
                ?>
                <a target="_blank" href="https://rvalibrary.org/shelf-respect/category/<?php  echo sanitize_title_with_dashes($category->cat_name)?>/"> <?php  echo $category->cat_name ?> </a> |

             <?php
           endforeach;
           endif;
           ?>
             </p>
             <p class="tags">
               <?php
              $tagArr = wp_get_post_tags($post->ID);
               if($tagArr):
                 foreach ($tagArr as $tag):
                 if($tag == $tagArr[count($tagArr) - 1] ):
                 ?>
                 <a target="_blank" href="https://rvalibrary.org/shelf-respect/tag/<?php echo sanitize_title_with_dashes($tag->name) ?>/">
                   <span class="dashicons dashicons-tag"></span> <?php echo $tag->name ?>
                 </a>
               <?php else: ?>
                 <a target="_blank" href="https://rvalibrary.org/shelf-respect/tag/<?php echo sanitize_title_with_dashes($tag->name) ?>/">
                   <span class="dashicons dashicons-tag"></span> <?php echo $tag->name ?>
                 </a>
               <?php  endif; endforeach; endif;  ?>
             </p>
             </p>
             </p>
              <p class="excerpt">
                <?php echo substr(wp_strip_all_tags( $post->post_content ), 0, 500 ) . '...' ?>
              </p>
                <a class="btn btn-primary" target="_blank" href="<?php echo $post->guid ?>">Read More</a>
            </div>
            <div class="right-container">
              <div class="month"><?php echo $dateArr[$counter - 1]->month ?></div>
              <div class="day"><?php echo $dateArr[$counter - 1]->day ?></div>
              <?php if( get_the_post_thumbnail() ): ?>
              <div class="img" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')">
              <?php else: ?>
                <div class="img" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/04/library-shelf.jpeg')">
              <?php endif; ?>
              </div>
            </div>
          </div>
          <?php
            $counter++;
            endforeach;
            wp_reset_postdata();
           ?>
         </div>
        </div>
        <div class="container-fluid" style="text-align: center; margin-bottom: 30px;">
          <h2 class="section-title" style="color: white">Never Miss a Post</h2>
            <button data-target=".modal" data-toggle="modal" class="btn btn-primary shelf-respect-subscribe-button">Subscribe</button>
        </div>
      </div>

    </div>
  </div>
