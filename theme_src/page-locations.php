<?php
/*
Template Name: Locations
 */

//
// Updated Hours Libcal API Get
// Use client_id below to find corresponding client_secret in libcal api authentication menu

 date_default_timezone_set('America/New_York');
 $hours_auth_url = 'https://rvalibrary.libcal.com/1.1/oauth/token';
 $hours_auth_args = array(
                    'body' => array( 'client_id' => '617',
                                     'client_secret'=> 'find client_secret at libcal api admin menu',,
                                     'grant_type' => 'client_credentials'
                    ),
                  );
$hours_creds_response = json_decode(wp_remote_retrieve_body(wp_remote_post( $hours_auth_url, $hours_auth_args )), true);
if( is_wp_error($hour_creds_response) ){
  echo $hours_creds_response->get_error_message();
}

$hours_url = 'https://rvalibrary.libcal.com/api/1.1/hours/6356,6740,6741,6739,6735,6738,6742,6737,6743?&to=' . getFutureDays();
$hours_args = array(
                'headers' => array('Authorization' => 'Bearer ' . $hours_creds_response['access_token']),
              );
$hours_response = json_decode(wp_remote_retrieve_body(wp_remote_get($hours_url, $hours_args)), true);

//
// End Libcal API
//

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
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="">
            <img src="<?php the_sub_field('branch_image');?>" alt="">
          </div>
          <a href="<?php the_sub_field('link');?>" class="location_card_overlay" style="display:flex; justify-content: center; align-content: center;">
            <span class="location_tile_name" style="align-self: center;"><h4><?php echo the_sub_field('name');?></h4></span>
            <div class="location_branch_hours" style="display: flex; justify-content: center;">
              <div style="align-self: center; width: 95%;">
                <h5 style="margin-bottom: 5px;"><?php echo the_sub_field('name');?> Hours</h5>
                <span style="font-size: 11px; color: #fdbe12;">Updated <?php echo date('F jS, Y ');?></span>
                <hr class="medium" style="padding:0; margin: 3px 0;">
                <table style="margin-bottom: 0;">
                  <?php
                    foreach($hours_response as $location):
                      if($location[name] === get_sub_field('libcal_branch_name') ){
                        foreach(array_keys($location[dates]) as $singleDate){
                          timeRowsAPI($location[dates], $singleDate);
                        }
                        break;
                      }
                    endforeach;
                  ?>
                </table>


              </div>

            </div>
          </a>
        </div>
      <?php
        endwhile;
        endif;
      ?>

  </div>

</section>







 </article><!-- #post-<?php the_ID(); ?> -->
 <?php get_footer(); ?>
