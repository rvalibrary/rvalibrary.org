<?php
/*

 Template Name: Richmond Speaks Collections

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

$collectionName = htmlspecialchars($_GET['collection']);
$defaultBanner = get_field('default_banner_image');
$defaultCard = get_field('default_card_image');
$isEmpty;
$isCollectionEmpty = true;
if(strlen($collectionName) == 0) {
  $isEmpty = true;
} else {
  $isEmpty = false;
}
?>
<?php
if(!$isEmpty){
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
  $collectionItems = new WP_Query( array(
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
        'key'    => 'collection',
        'value'  => $collectionName,
      )
    )
  ));
}
?>

<?php if(!$isEmpty && count($collection) > 0): ?>
<?php while($collection->have_posts()) : $collection->the_post(); ?>
<?php $isCollectionEmpty = false; ?>
<div class="container-fluid parallax-container">
  <div class="container-fluid">
    <?php if(get_field('collection_banner_image')): ?>
    <img class="parallax-img" src="<?php echo get_field('collection_banner_image'); ?>" alt="">
    <?php else: ?>
    <img class="parallax-img" src="<?php echo $defaultBanner ?>" alt="">
    <?php endif; ?>
    <div class="banner">
      <div class="banner-links">
          <a href="#"><span class=""></span>Test</a>
      </div>
    </div>
  </div>
</div>
<div class="intro_div_holder_shadow" style="background-color: #022437; position: relative;">
  <div class="container">
      <div class="row">
        <div class="col-xs-12 block_colored tiles_left_text">
          <div class="discovery_intro_container">
            <div class="discovery_browse">
                <h3 class="h3_hard_coded_heading" style="color: #fdbe12;"><?php echo get_field('collection_title'); ?></h3>
                <?php echo get_field('collection_description'); ?>
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
<div id="<?php echo $collectionName ?>" class="container-fluid" style='background-color:#f5f2eb'>
  <h1 class="press-header">From the Collection</h1>
  <div class="flex-event-card-container">
<?php
if($collectionItems->found_posts != 0):
while( $collectionItems->have_posts()) : $collectionItems->the_post();
?>
    <div class="flex-event-card">
      <div class="card-img" style="background-image: linear-gradient(180deg, rgb(2,79,107), #055775); text-align: center;">
        <?php if(get_field('item_image')): ?>
        <img src="<?php echo get_field('item_image'); ?>" alt="">
        <?php else: ?>
          <img src="<?php echo $defaultCard; ?>" alt="">
      <?php endif; ?>
      </div>
      <div class="card-info-body">
        <h1><?php echo get_field('title'); ?></h1>
          <p style="font-size: 13px; margin-bottom: 10px !important;"><span class="dashicons dashicons-calendar-alt" style="color: #ff7236;"></span><span style="padding-left: 10px;"><?php echo get_field('interview_date') ?></span></p>
          <p style="font-size: 13px; margin-bottom: 10px !important;"><span class="dashicons dashicons-location-alt" style="color: #ff7236;"></span><span style="padding-left: 10px;"><?php echo get_field('location') ?></span></p>
        <p><?php echo get_field('paragraph'); ?></p>
        <a class="btn btn-primary" target="_blank" href="https://rvalibrary.org/richmond-speaks/collections/item/?collection=<?php echo $collectionName ?>&title=<?php echo get_field('title'); ?>">Listen</a>
      </div>
    </div>
<?php endwhile;
else:
?>
<div class="container-fluid" style="padding: 4rem 1rem;">
  <h1>No items currently available in this collection.</h1>
</div>
<?php endif; ?>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php if($isCollectionEmpty): ?>
<?php
  $collections = new WP_Query( array(
    'post_type' => 'oral_history',
    'orderby' => array(
      'date' => 'DESC'
    ),
    'meta_query' => array(
      array(
        'key' => 'type',
        'value' => 'collection',
      )
    )
  ));
?>
<div class="container-fluid parallax-container">
  <div class="container-fluid">
    <img class="parallax-img" src="<?php echo $defaultBanner; ?>" alt="">
    <div class="banner">
      <div class="banner-links">
          <!-- <a href="#"><span class=""></span>Test</a> -->
      </div>
    </div>
  </div>
</div>
<div class="intro_div_holder_shadow" style="background-color: #022437; position: relative;">
  <div class="container">
      <div class="row">
        <div class="col-xs-12 block_colored tiles_left_text">
          <div class="discovery_intro_container">
            <div class="discovery_browse">
                <h3 class="h3_hard_coded_heading" style="color: #fdbe12;"><?php echo get_field('default_collection_title'); ?></h3>
                <?php echo get_field('default_collection_paragraph'); ?>
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
<div id="collections" class="container-fluid" style='background-color:#f5f2eb'>
  <h1 class="press-header">Collections</h1>
  <div class="flex-event-card-container">
<?php
while( $collections->have_posts()) : $collections->the_post();
?>
    <div class="flex-event-card">
      <div class="card-img" style="background-image: linear-gradient(180deg, rgb(2,79,107), #055775); text-align: center;">
        <?php if(get_field('collection_image')): ?>
        <img src="<?php echo get_field('collection_image'); ?>" alt="">
        <?php else: ?>
          <img src="<?php echo $defaultCard; ?>" alt="">
      <?php endif; ?>
      </div>
      <div class="card-info-body">
        <h1><?php echo get_field('collection_title'); ?></h1>
          <p style="font-size: 13px; margin-bottom: 10px !important;"><span style="padding-left: 10px;"><?php echo get_field('collection_description') ?></span></p>
        <p><?php echo get_field('paragraph'); ?></p>
        <a class="btn btn-primary" target="_blank" href="https://rvalibrary.org/richmond-speaks/collections/?collection=<?php echo strtolower(get_field('collection_title')); ?>">Browse</a>
      </div>
    </div>
<?php endwhile;
wp_reset_postdata();
?>
</div>
</div>
<?php endif; ?>

<?php
get_footer();
?>

<script type="text/javascript">
parallaxImg = document.querySelector('.parallax-img');
if(window.innerWidth > 850) {
  window.addEventListener('scroll', () =>{
    parallaxImg.style.transform = `translate3d(0px, ${window.pageYOffset * 0.1}px, 0px)`;
  })
}
</script>
