<?php
/*

 Template Name: Local Author

 */



get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );


/* LibCal Authentication */


$libcal_id = get_field('libcal_user_id');

$creds_url = 'https://rvalibrary.libcal.com/1.1/oauth/token';
$creds_args = array(
          'body' => array( 'client_id' => '459',
                           'client_secret' => '',
                           'grant_type' => 'client_credentials'),
        );
$creds_response = json_decode(wp_remote_retrieve_body(wp_remote_post( $creds_url, $creds_args)), true);
  if ( is_wp_error( $creds_response ) ) {
     $error_message = $creds_response->get_error_message();
     echo "Something went wrong: $error_message";
  } else {

  }

?>



    <?php
      $appts_url = 'https://rvalibrary.libcal.com/1.1/appointments/bookings?user_id=' . $libcal_id . '&limit=4&days=120'
    ?>

    <?php
      $appts_args = array(
                      'headers' => array('Authorization' => 'Bearer ' . $creds_response['access_token']),
                  );
      $appts_response = json_decode(wp_remote_retrieve_body(wp_remote_get( $appts_url, $appts_args)), true);

          if ( is_wp_error( $appts_response ) ) {
               $error_message = $appts_response->get_error_message();
               echo "Something went wrong: $error_message";
            } else {

              }
        /* Date Format */
        $monthFormat = "F ";
        $dayFormat = "j ";
        $meridianFormat = "a ";
        $hourFormat = "G ";

      ?>

      <!-- Libcal's api link for appointment booking widget -->
      <script>
      jQuery.getScript("https://api3.libcal.com/js/myscheduler.min.js", function() {
          jQuery("#mysched_52676").LibCalMySched({iid: 4083, lid: 0, gid: 0, uid: 52676, width: 560, height: 680, title: 'Make an Appointment', domain: 'https://api3.libcal.com'});
      });
      </script>


<?php
  /* ACF vars */
  $header1 = get_field('main_header');
  $paragraph1 = get_field('main_paragraph');
  $author_form_link = get_field('author_form_link');
  $author_header = get_field('author_header');
  $author_paragraph = get_field('author_paragraph');
  $author_event_link = get_field('author_event_link');
  $info_header2 = get_field('info_header2');
  $image = get_field('event_image');

 ?>

<!-- ########## TEXT RIGHT - IMG LEFT SECTION ########## -->
<div class="container-fluid">
  <div class="row right_image_row">

    <div class="col-md-6 col-sm-12 col-xs-12 tiles_left_image mr_intro_image" style="background-image: url(<?php the_field('first_image') ?>); box-shadow: 0px 7px 3px rgba(0, 0, 0, 0.5);"></div><!-- img col -->

    <div class="col-md-6 col-sm-12col-xs-12 block_colored tiles_right_text" style="max-height: 700px; background-color: #022437; box-shadow: 0px 7px 3px rgba(0, 0, 0, 0.5);">
      <div class="content_right_block_section mr_intro_container">
        <div class="mr_intro">
            <h2><?php echo $header1 ?></h2>
            <p><?php echo $paragraph1 ?></p>
            <span margin-left: 5px;>&nbsp;</span>
        </div>
      </div><!-- block_section-->
    </div><!-- text col -->

  </div><!--row-->
</div><!-- container-fluid -->

<!-- ########## TEXT LEFT - IMG RIGHT SECTION ########## -->
<div class="container-fluid">
  <div class="row right_image_row">
    <div class="col-md-6 col-sm-12 col-xs-12 block_colored tiles_left_text" style="max-height: 700px; background-color: #022437; box-shadow: 0px 7px 3px rgba(0, 0, 0, 0.5);">
      <div class="content_left_block_section mr_intro_container">
        <div class="mr_intro">

            <h2><?php echo $author_header ?></h2>
            <p><?php echo $author_paragraph ?></p>

          <div class="btn-container" style="margin: 0 auto">
            <a href=""><button class="btn btn-primary" id="mysched_52676" style="display: block; margin-top: 10px; z-index: 9999">Request Lobby Space</button></a>
            <a href="<?php echo $author_form_link ?>"><button class="btn btn-primary" style="display: block; margin-top: 10px;">Local Author Form</button></a>
            <a href="<?php echo $author_event_link  ?>"><button class="btn btn-primary" style="text-align: center; display: block; margin-top: 10px;">More Author Events</button></a>
          </div>
        </div>
      </div><!-- block_section-->
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12 tiles_left_image mr_intro_image" style="background-image: url(<?php the_field('second_image') ?>);box-shadow: 0px 7px 3px rgba(0, 0, 0, 0.5);"></div><!-- img col -->
  </div><!--row-->
</div><!-- container-fluid -->

<!-- ########## COLLAPSIBLE FAQ SECTION ########## -->
<div class="faq-answer faq-even" >
  <div class="container">
    <h1 style="margin-bottom: 10px; color: #022437;"><?php echo $info_header2 ?></h1>

    <div class="collapsible-container">

      <?php
      /* ACF loop for FAQ Section repeater */
        if(have_rows('faq_section') ):
          while(have_rows('faq_section') ): the_row();

          $faq_header = get_sub_field('faq_header');
       ?>

    <div class="faq-header-container">
      <h2 class="faq-header"><span class="dashicons dashicons-plus" style="float: left; cursor: pointer; color: #3e3e3e;"></span><span class="dashicons dashicons-minus" style="float: left;cursor: pointer; color: #3e3e3e;"></span><?php echo $faq_header ?></h2>
    </div> <!-- faq-header-container -->

    <div class="text-container">
      <ul class="faq-description">
      <?php
      /* ACF loop for individual FAQ repeater */
        if( have_rows('faq_body') ):
          while(have_rows('faq_body')): the_row();

          $faq = get_sub_field('faq');
       ?>
      <li><?php echo $faq ?></li>

      <?php
        endwhile;
        endif;
       ?>
    </ul><!-- faq-description -->
  </div><!-- text-container -->

    <?php
      endwhile;
      endif;
     ?>

   </div><!-- collapsible-container -->
 </div> <!--container-->
</div> <!-- faq-answer -->

<div class="container-fluid" style="background-color: #022437; padding-top: 10px; padding-bottom: 30px; box-shadow: 0px -7px 3px rgba(0, 0, 0, 0.5);">

    <div class="local-author-event-header" style="padding: 0 0 30px 0 !important">
      Upcoming Local Author Events
    </div>
    <div class="flex-container">

  <?php
  /* Looping through each Libcal Appointment array */
  if(count($appts_response) > 0):
    foreach ($appts_response as $appt):
  ?>
      <!-- article container for card -->
    <div class="card">
        <!-- date bubble section-->
        <div class="card-date">
          <div class="card-date_year">
            <?php  echo date($dayFormat, strtotime($appt[fromDate]) )?>
          </div>
          <div class="card-date_month">
            <?php  echo date($monthFormat, strtotime($appt[fromDate]) )?>
          </div>
        </div>
        <!-- category tag over img -->
        <div class="card-category" >
          <?php echo date('g a - ', strtotime($appt[fromDate])) . date('g a', strtotime($appt[toDate])) ?>
        </div>

        <div class="card-thumb">
         <img class="main-image" src="<?php echo $image['url'] ?>">
        </div>

     <!-- card body section-->
     <div class="card-body">
       <div class="card-body_title">
         <?php echo $appt[answers][q1] ?>
       </div>
       <div class="expand-container">
         <span class="dashicons dashicons-arrow-up-alt2"></span>
         <div class="details">More Details</div>
       </div>
       <div class="card-body_subtitle">
         <?php echo $appt[firstName] . ' ' . $appt[lastName] ?>
       </div>
       <div class="card-location">
         <?php echo $appt[location] . ' -' ?>
         <?php echo $appt[directions] ?>
      </div>
         <p class="card-body-description">
           <?php echo $appt[answers][q2] ?>
        </p>
     </div>
     <!-- end card body section-->
     <!-- footer section -->
     <footer class="card-footer">
       <span class="card-footer_content">
         <i class="fas fa-book-reader" style="padding-top: 10px; padding-bottom: 10px;"></i>
       </span>
     </footer>
     <!-- end footer section -->
   </div> <!-- card -->



    <?php endforeach;?>
    <?php
      /* If Libcal appointment array is empty - display otter image */
      else:
      ?>
        <img src="https://rvalibrary.org/wp-content/uploads/2019/10/floating_otter.png" class="img-responsive otter-img"></br>

        <h2 style="text-align: center; padding-top: 15px;">No author events booked just yet - check back soon!</h2>

      <?php endif; ?>

  </div> <!-- flex-container -->
</div> <!-- container-fluid -->

<?php get_footer(); ?>
