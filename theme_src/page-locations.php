<?php
/*
Template Name: Locations
 */

 $url = 'https://api3.libcal.com/api_hours_grid.php?iid=4083&format=json&weeks=1&systemTime=0';
 $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
 $dayofweek = date('w');
 $response = wp_remote_get( $url );
 if( is_wp_error( $response ) ) {
    $error_message = $response->get_error_message();
    echo "Something went wrong: $error_message";
 } else {
   $body_string = json_decode($response['body'], true);
 }



 $description                 =     get_field('description');
 $holiday_hours_button_text   =     get_field('holiday_hours_button_text');
 $holiday_hours               =     get_field('holiday_hours_link');

 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 ?>

<section class="container-fluid">
  <div class="row">
    <div class="col-sm-6 col-xs-12 block_parent_left">
        <div class="block_section block-padding">
          <div class="block_section_child">
            <?php echo $description;?>
            <a href="<?php echo $holiday_hours; ?>"><button class="btn btn-primary"><?php echo $holiday_hours_button_text;?></button></a>
          </div>
        </div>

    </div>
    <div class="col-sm-6 col-xs-12" style="position: relative; padding: 0px;">
      <?php get_template_part( 'template-parts/locations/content', 'map' );?>
    </div>
  </div>
</section>


<section class="container-fluid location-image-section">
  <div class="row">

    <?php
    // check if the repeater field has rows of data
    if( have_rows('branches') ):
     	// loop through the rows of data
        while ( have_rows('branches') ) : the_row(); ?>

        <?php
          //get the branch index from LibCal
          for($i = 0; $i < count($body_string['locations']); ++$i){
            if ($body_string['locations'][$i]['name'] == get_sub_field('libcal_branch_name')){
              $branch_index = $i;
            }
          }
        ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="">
            <img src="<?php the_sub_field('branch_image');?>" alt="">
          </div>
          <a href="<?php the_sub_field('link');?>" class="location_card_overlay" style="display:flex; justify-content: center; align-content: center;">
            <span class="location_tile_name" style="align-self: center;"><h4><?php echo the_sub_field('name');?></h4></span>
            <div class="location_branch_hours" style="display: flex; justify-content: center;">
              <div style="align-self: center; width: 70%;">
                <h5 style="margin-bottom: 5px;"><?php echo the_sub_field('name');?> Hours</h5>
                <span>Updated <?php echo date('F jS, Y ');?></span>
                <hr class="medium" style="padding:0; margin: 3px 0;">
                <table style="margin-bottom: 0;">
                  <?php
                    for ($i = 0; $i < count($days); $i++){
                      timerowsAPI($days[$i], $branch_index, $body_string);
                    }
                  ?>
                </table>


              </div>

            </div>
          </a>
        </div>
      <?php endwhile;
        else :
          // no rows found
        endif;
      ?>

  </div>

</section>







 </article><!-- #post-<?php the_ID(); ?> -->
 <?php get_footer(); ?>
