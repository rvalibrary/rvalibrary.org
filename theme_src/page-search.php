<?php
/*
Template Name: Search
 */
get_header();
?>


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
  $default_background = get_stylesheet_directory_uri() . '/assets/images/customization/homepage/resized_backgrounds/new_release_background3.png';
  ?>




<section class="changing-image"  style="background-image: url('<?php echo (count($background) == 0 ? $default_background : $background[$randomImageIndex]);?>');">
  <div class="changing-image-cover">

    <div class="container search-float">
      <form style="display:flex; " class="searchbar_form" role = "search" id="searchform" action="http://ibistro.ci.richmond.va.us/uhtbin/cgisirsi/x/0/0/123?" method="get"
                     onsubmit="_gaq.push(['_trackEvent','Catalog','Search',this.href]);">
        <div class="form-group searchbar-wrapper" style="display: flex; flex-grow: 1;">
          <div class="search_choice_overlay"><div class=""><span>Search the <span class="catalog_selection_click">Catalog</span> or <span class="site_selection_click">Site</span></span></div></div>
          <input class="" id="searchbar" placeholder="Search the Catalog" id="keywords" name="searchdata1" type="text">
          <button id="searchbutton" disabled type="submit" style="display:flex; justify-content: center;"><i style="align-self: center;" class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
  </div>

</section>



<?php get_footer(); ?>
