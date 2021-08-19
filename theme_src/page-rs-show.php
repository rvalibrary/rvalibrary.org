<?php
/*

 Template Name: RS Single Item

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

$collectionName = htmlspecialchars($_GET['collection']);
$itemTitle = htmlspecialchars($_GET['title']);
$nullURLParams;
$nullTitle = true;

if(strlen($collectionName) === 0 || strlen($itemTitle) === 0) {
  $nullURLParams = true;
} else {
  $nullURLParams = false;
}
?>
<?php if($nullURLParams): ?>
  <div id="content" class="site-content">
      <div id="primary" class="content-area">
          <main id="main" class="site-main">
              <div class="error-main">
                  <div class="container" style="padding: 80px 0;">
                            <div class="col-md-5 col-md-offset-1 border-dark new-user">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="error-info bg-light margin-right">
                                            <h2>OOPS <small>Media Not Found!</small></h2>
                                            <span>Looks like that item in our collection doesn't exist.</span>
                                            <p>Probably due to a malformed url. Go back to our collection home page and try again.</p>
                                            <a href="https://rvalibrary.org/richmond-speaks/collections">Collection Home Page</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-5  border-dark-left">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="error-box bg-dark margin-left text-center">
                                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/customization/404/upset_otter.png" alt="Error Image">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <!-- </div> -->
                      <!-- </div> -->
                  </div>
              </div>
          </main>
      </div>
  </div>
  <!-- End: 404 Section -->
<?php else: ?>
<?php
$collection = new WP_Query( array(
  'post_type' => 'oral_history',
  'orderby' => array(
    'date' => 'DESC'
  ),
  'meta_query' => array(
    array(
      'key' => 'type',
      'value' => 'collection',
    ),
    array(
      'key' => 'collection_title',
      'value' => $collectionName,
    )
  )
));
$item = new WP_Query( array(
  'post_type' => 'oral_history',
  'orderby' => array(
    'date' => 'DESC'
  ),
  'meta_query' => array(
    array(
      'key' => 'type',
      'value' => 'item',
    ),
    array(
      'key'    => 'title',
      'value'  => $itemTitle,
    )
  )
));

// WP_Query arguments
// $previousPost = new WP_Query( array(
//   'post_type' => 'oral_history',
//   'date_query'    => array(
//         'column'  => 'post_date',
//         'before'   => $item->post->post_date
//     ),
//     'meta_query' => array(
//       array(
//         'key' => 'type',
//         'value' => 'item',
//       ),
//       array(
//         'key'    => 'collection',
//         'value'  => $collectionName,
//       )
//     )
// ));
//
// $nextPost = new WP_Query( array(
//   'post_type' => 'oral_history',
//   'date_query'    => array(
//         'column'  => 'post_date',
//         'after'   => $item->post->post_date
//     ),
//     'meta_query' => array(
//       array(
//         'key' => 'type',
//         'value' => 'item',
//       ),
//       array(
//         'key'    => 'collection',
//         'value'  => $collectionName,
//       )
//     )
// ));
global $post;
$post = get_post($item->post->ID);
$previousPost = get_previous_post();
$nextPost = get_next_post();
if( $collection->post_count > 0 && $item->post_count > 0): ?>
<?php while($item->have_posts()) : $item->the_post(); ?>
<div class="intro_div_holder_shadow" style="background-color: #022437; position: relative;">
  <div class="container">
      <div class="row">
        <div class="col-xs-12 block_colored tiles_left_text">
          <div class="discovery_intro_container">
            <div class="discovery_browse">
                <h3 class="h3_hard_coded_heading" style="color: #fdbe12;"><?php echo get_field('title'); ?></h3>
                <?php echo get_field('paragraph'); ?>
            </div>
          </div><!-- block_section-->
        </div>
      </div><!--row-->
  </div><!--container-fluid-->
  <div class="fit-width-container" style="position: absolute; bottom: 5px; right: 5px;">
    <div class="nav-circles">
      <a class="block-links" href="https://www.facebook.com/RichmondPublicLibrary/">
        <i class="fab fa-facebook"></i>
      </a>
    </div>
    <div class="nav-circles">
      <a class="block-links" href="https://www.instagram.com/rvalibrary/">
        <i class="fab fa-instagram"></i>
      </a>
    </div>
    <div class="nav-circles">
      <a class="block-links" href="https://twitter.com/rvalibrary">
        <i class="fab fa-twitter"></i>
      </a>
    </div>
  </div>
</div>
<div class="container" style="padding: 30px 20px;">
  <div class="col-md-12 border-dark new-user">
    <div class="row">
      <div class="col-xs-12">
        <div class="error-info bg-light margin-right">
          <h2><?php echo get_field('title') ?>
            <small><?php echo get_field('interview_date'); ?></small>
            <small><?php echo get_field('interviewee'); ?></small>
            <small><?php echo get_field('interview_duration'); ?></small>
          </h2>
          <audio controls style="width: 100%; margin-bottom: 15px;">
            <source src="<?php echo get_field('item_audio') ?>" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
          <div id="meta" class="faq-answer faq-even" >
            <div class="container-fluid" style="padding: 15px;">
              <h1 style="margin-bottom: 10px; color: #022437;">Track Meta</h1>
              <div class="collapsible-container">
                <div class="faq-header-container">
                  <h2 class="faq-header" style="font-size: 30px; margin-bottom: 0px;"><span class="dashicons dashicons-plus" style="float: left; cursor: pointer; color: #3e3e3e;"></span><span class="dashicons dashicons-minus" style="display: none; float: left;cursor: pointer; color: #3e3e3e;"></span>Details</h2>
                </div> <!-- faq-header-container -->
                <div class="text-container">
                  <ul class="faq-description">
                  <li>Interviewer: <?php echo get_field('interviewer'); ?></li>
                  <li>Location: <?php echo get_field('location'); ?></li>
                  <li>Filed In: <?php echo get_field('collection'); ?></li>
                </ul><!-- faq-description -->
              </div><!-- text-container -->
              <div class="faq-header-container">
                <h2 class="faq-header" style="font-size: 33px; margin-bottom: 0px;"><span class="dashicons dashicons-plus" style="float: left; cursor: pointer; color: #3e3e3e;"></span><span class="dashicons dashicons-minus" style="display: none; float: left;cursor: pointer; color: #3e3e3e;"></span>Transcript</h2>
              </div> <!-- faq-header-container -->
              <div class="text-container">
                <?php if(get_field('transcription')): ?>
                <p><?php echo get_field('transcription'); ?></p>
              <?php else: ?>
                <p>Sorry, no transcript available at this time.</p>
              <?php endif; ?>
            </div><!-- text-container -->
             </div><!-- collapsible-container -->
           </div> <!--container-->
          </div> <!-- faq-answer -->
        </div>
      </div>
    </div>
  </div>
  <h1 style="color: #fdbe14; border-bottom: 2px solid #fdbe14; margin: 15px 0px;">
    Explore
  </h1>
  <div class="row">
    <?php if($previousPost && get_field('type', $previousPost->ID) == "Item"): ?>
    <div class="col-sm-6 col-xs-12 mr_bb_col">
      <a href="https://rvalibrary.org/richmond-speaks/collections/item/?collection=<?php echo get_field('collection', $previousPost->ID); ?>&title=<?php echo get_field('title', $previousPost->ID); ?>">
        <div class="button_template_button" style="position: relative;">
          <p style="position: absolute; top: 0px; left: 0px; font-size: 12px;">previous</p>
          <h3><?php echo get_field('title', $previousPost->ID);?></h3>
        </div>
      </a>
    </div>
    <?php endif; ?>
    <?php if($nextPost && get_field('type', $nextPost->ID) == "Item"): ?>
    <div class="col-sm-6 col-xs-12 mr_bb_col">
      <a href="https://rvalibrary.org/richmond-speaks/collections/item/?collection=<?php echo get_field('collection', $nextPost->ID); ?>&title=<?php echo get_field('title', $nextPost->ID); ?>">
        <div class="button_template_button" style="position: relative;">
          <p style="position: absolute; top: 0px; right: 0px; font-size: 12px;">next</p>
          <h3><?php echo get_field('title', $nextPost->ID);?></h3>
        </div>
      </a>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php endwhile; ?>
<?php else: ?>
  <div id="content" class="site-content">
      <div id="primary" class="content-area">
          <main id="main" class="site-main">
              <div class="error-main">
                  <div class="container" style="padding: 80px 0;">
                            <div class="col-md-5 col-md-offset-1 border-dark new-user">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="error-info bg-light margin-right">
                                            <h2>OOPS <small>Media Not Found!</small></h2>
                                            <span>
                                              <?php echo $itemTitle ?> in collection <?php echo $collectionName ?> not found!
                                            </span>
                                            <?php if(count($collection) > 0): ?>
                                              <a href="https://rvalibrary.org/richmond-speaks/collections">Collection Home Page</a>
                                            <?php endif; ?>
                                            <p>Probably due to a malformed url. Go back and try again.</p>
                                            <a href="https://rvalibrary.org/richmond-speaks/collections/?collection=<?php echo $collectionName ?>">Back to <?php echo $collectionName ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-5  border-dark-left">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="error-box bg-dark margin-left text-center">
                                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/customization/404/upset_otter.png" alt="Error Image">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <!-- </div> -->
                      <!-- </div> -->
                  </div>
              </div>
          </main>
      </div>
  </div>
<?php endif; ?>
<?php endif; ?>


<?php get_footer(); ?>
