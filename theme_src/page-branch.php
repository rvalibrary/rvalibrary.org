<?php
/*
Template Name: Branch
 */
$hours_id = get_field('libcal_branch_hour_id');
/*

LibCal Hours API
Use client_id below to find corresponding client_secret in libcal api authentication menu

*/
 date_default_timezone_set('America/New_York');
 $hours_auth_url = 'https://rvalibrary.libcal.com/1.1/oauth/token';
 $hours_auth_args = array(
                    'body' => array( 'client_id' => '617',
                                     'client_secret'=> 'find client_secret at libcal api admin menu',
                                     'grant_type' => 'client_credentials'
                    ),
                  );
$hours_creds_response = json_decode(wp_remote_retrieve_body(wp_remote_post( $hours_auth_url, $hours_auth_args )), true);
if( is_wp_error($hour_creds_response) ){
  echo $hours_creds_response->get_error_message();
}



$hours_url = 'https://rvalibrary.libcal.com/api/1.1/hours/' . $hours_id . '?&to=' . getFutureDays();
$hours_args = array(
                'headers' => array('Authorization' => 'Bearer ' . $hours_creds_response['access_token']),
              );
$hours_response = json_decode(wp_remote_retrieve_body(wp_remote_get($hours_url, $hours_args)), true);
//LibCal Hours API End

/*

LibCal Upcoming Events
Use client_id below to find corresponding client_secret in libcal api authentication menu
*/
//LibCal API
$creds_url = 'https://api2.libcal.com/1.1/oauth/token';
$creds_args = array(
        	'body' => array( 'client_id' => '196',
                           'client_secret' => 'find client_secret at libcal api admin menu',
                           'grant_type' => 'client_credentials'),
        );
$creds_response = json_decode(wp_remote_retrieve_body(wp_remote_post( $creds_url, $creds_args)), true);
if ( is_wp_error( $creds_response ) ) {
   $error_message = $creds_response->get_error_message();
   echo "Something went wrong: $error_message";
}


$cal_id           =     get_field('libcal_calendar_id');
$calendar_url     =     get_field('calendar_url');

$events_url = 'https://api2.libcal.com/1.1/events?cal_id=' . $cal_id  . '&days=30&limit=3';
$events_args = array(
              'headers' => array('Authorization' => 'Bearer ' . $creds_response['access_token']),
          );
$events_response = json_decode(wp_remote_retrieve_body(wp_remote_get( $events_url, $events_args)), true);
if ( is_wp_error( $events_response ) ) {
   $error_message = $events_response->get_error_message();
   echo "Something went wrong: $error_message";
} else {
  $events_array = $events_response['events'];
}
// Libcal Upcoming Events API End

 /* Factoid Start*/
$i = 0;
if( have_rows('factoids') ){
 while ( have_rows('factoids') ){
   the_row();
   $list_of_factoids[$i] = get_sub_field('factoid');
   $i++;
 }//while
}//if
$randomFactoidIndex = rand(0,count($list_of_factoids)-1);
/* Factoid End */



$branch_image             =     get_field('image');
$address                  =     get_field('address');
$branch_manager           =     get_field('branch_manager');
$phone                    =     get_field('phone_number');
$meeting_room_title       =     get_field('meeting_room_title');
$meeting_room_content     =     get_field('meeting_room_content');
$meeting_room_image       =     get_field('meeting_room_image');
$show_event_space_button  =     get_field('show_event_space_button');
$show_study_room_button   =     get_field('show_study_room_button');
$no_events_image          =     get_field('no_events_image');



get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>


<div class="container-fluid">
  <div class="row top_location_row">
    <div class="col-sm-6 col-xs-12 block_parent_left">
        <div class="block_section block-padding">
          <div class="block_section_child special_block_section">
            <table>
              <tr>
                <td><i class="fas fa-info"></i></td>
                <td><?php echo $list_of_factoids[$randomFactoidIndex]; ?></td>
              </tr>
            </table>
            <hr class="medium">
            <table>
              <tr>
                <td><i class="fas fa-phone"></i></td>
                <td><?php echo $phone;?></td>
              </tr>
            </table>
            <hr class="medium">
            <table>
              <tr>
                <td class=""><i class="fas fa-home"></i></td>
                <td class=""><?php echo $address;?></td>
              </tr>
            </table>
            <?php if ($branch_manager):?>
            <hr class="medium">
            <table>
              <tr>
                <td class=""><i class="fas fa-user-tie"></i></td>
                <td class=""><?php echo $branch_manager ;?></td>
              </tr>
            </table>
            <?php endif;?>
            <a href="#hours_section"><button class="btn btn-primary" style="margin-top: 20px; width: 100%;">Hours</button></a>
            <a href="#meeting_rooms_section"><button class="btn btn-primary" style="margin-top: 20px; width: 100%;">Meeting Rooms</button></a>
            <?php if(get_field('use_available_services')): ?>
              <a href="#AvailableServices"><button class="btn btn-primary" style="margin-top: 20px; width: 100%;">Available Services</button></a>
            <?php endif; ?>
          </div>
        </div><!--emphasis_section-->

    </div>
    <div class="col-sm-6 col-xs-12 location_page_image" style="position: relative; background-image: url('<?php echo $branch_image;?>')">
      <?php openCloseEvaluation($hours_response); ?>
    </div>
  </div><!-- row -->


  <div class="row">
    <div class="col-xs-12" style="padding: 0;">
      <?php get_template_part( 'template-parts/location/content', 'map' );?>
    </div>
  </div>



  <div class="row" id="hours_section">
    <!--Start Hours Section -->
    <div class="col-sm-6 col-xs-12" style="">
      <div class="content_block_section block-static">
        <div class="block_section_child block-padding">
          <h3 style="margin-bottom: 10px;">Hours</h3>
          <table class="table table-striped" id="location_hours_table">
            <?php
              foreach (array_keys($hours_response[0][dates]) as $singleDate) {
                timerowsAPI($hours_response[0][dates], $singleDate);
              }
            ?>
          </table>
        </div>
      </div><!-- block_section-->
      <?php if(get_field('use_available_services')): ?>
      <div id="AvailableServices" class="content_block_section block-static">
        <div class="block_section_child block-padding">
          <h3>Available Services</h3>
          <div class="services-container">
            <?php
              if(have_rows('use_available_services_repeater')):
                    while(have_rows('use_available_services_repeater')): the_row();
            ?>
            <?php if( get_sub_field('tooltip_info') ): ?>
            <li data-toggle="tooltip" title="<?php echo get_sub_field('tooltip_info'); ?>">
            <?php else: ?>
            <li>
            <?php endif; ?>
              <i class="fas fa-check"></i>
              <?php echo get_sub_field('service'); ?>
            </li>
          <?php endwhile; ?>
        <?php endif; ?>
          </div>
        </div>
      </div><!-- block_section-->
      <?php endif; ?>
    </div>
    <!--End Hours Section -->

    <!--Start Features Section -->
    <div class="col-sm-6 col-xs-12">
      <div class="block-static content_right_block_section block-padding">
        <div class="">

          <h3 style="margin-bottom: 5px;">Features</h3>
          <?php
          // check if the repeater field has rows of data
          if( have_rows('features') ):
           	// loop through the rows of data
              while ( have_rows('features') ) : the_row();?>
              <h5><?php echo the_sub_field('feature_title');?></h5>
              <p><?php echo the_sub_field('feature_description');?></p>
          <?php
              endwhile;
          else :
              // no rows found
          endif;
          ?>
        </div>
      </div><!-- block_section-->
    </div>
  <!--End Features Section -->
  </div><!--row-->


  <!-- meeting rooms section -->
  <div class="row" id="meeting_rooms_section">
    <div class="col-sm-6 col-xs-12 location_meeting_room_image" style="background-image: url('<?php echo $meeting_room_image;?>')"></div>
    <div class="col-sm-6 col-xs-12" style="background-color: #ce232a;">
      <div class="block-static content_right_block_section block-padding" style="display: flex; justify-content: center; flex-direction: column; height: 100%;">
        <div class="" style="color: white;">
          <h3 style="margin-bottom: 5px;"><?php echo $meeting_room_title; ?></h3>
          <?php echo $meeting_room_content; ?>
          <?php if($show_event_space_button):
            $event_space_button = get_field('event_space_button');
          ?>
            <a href="<?php echo $event_space_button['button_url'];?>"><button class="btn btn-primary" style="margin-top: 10px;"><?php echo $event_space_button['button_text'];?></button></a>
          <?php endif;?>
          <?php if($show_study_room_button && $show_event_space_button):?>
            <span margin-left: 5px;>&nbsp;</span>
          <?php endif;?>
          <?php if($show_study_room_button):
            $study_room_button = get_field('study_room_button');
          ?>
            <a href="<?php echo $study_room_button['button_url'];?>"><button class="btn btn-primary" style="margin-top: 10px;"><?php echo $study_room_button['button_text'];?></button></a>
          <?php endif;?>
        </div>
      </div><!-- block_section-->
    </div>
  </div><!--row-->
</div><!--container-fluid -->

<!--Start Repeater Section --->
<?php get_template_part( 'template-parts/tilepage/content', 'tilepage' );?>
<!--End Repeater Section --->


<!-- upcoming events section -->

<?php
  $dateFormat1 = "D ";
  $dateFormat2 = "d ";
  $dateFormat3 = "M ";
  $dateFormat_time = "g:i a";
?>
<div style="background-color: #023651; padding: 30px 0;">
  <div class="container">
    <div class="row" style="margin-bottom: 10px;">
      <div class="col-sm-6 col-xs-12" style="padding-left: 10px; display: flex; flex-direction: column; justify-content: flex-end;"><h2>Upcoming Events at <?php echo $branch_name;?></h2></div>
      <div class="col-sm-6 col-xs-12 location_view_more_events" style="padding-right: 10px; padding-left: 10px;"><a href="<?php echo $calendar_url;?>" target="_blank"><button class="btn btn-primary">View More Events</button></a></div>
    </div>


    <div class="row">
      <?php
      if($events_array):
      for ($i = 0; $i < 3; $i++){
        $event_time_start = new DateTime($events_array[$i]['start']);
        $event_time_end = new DateTime($events_array[$i]['end']);
      ?>
      <!--start the event loop -->
      <?php if( strlen($events_array[$i]['title']) != 0 ): ?>
      <div class="col-xs-12 col-sm-4 location_event_card_container">
        <div class="location_event_card" style="position: relative;">
          <div class="location_event_header" style="display: flex; ">
            <!--start title -->
            <div class="" style="height: 85.454px; background-color: #ff7236; color: white; padding: 10px; padding-left: 20px; flex-grow: 1; display: flex; flex-direction: column; justify-content: center;">
              <h3 style="" id="location_event_title"><?php custom_echo($events_array[$i]['title'], 55)?></h3>
            </div>
            <!--end title -->

            <div class="" style="height: 85.454px; width: 85.454px; flex-shrink: 0; display: flex; justify-content: center; border: 5px solid #ff7236;">
              <div class="" style="align-self: center; color: #ff7236;">
                <h5 style="text-align: center;"><?php echo date( $dateFormat1, strtotime($events_array[$i]['start']) )?></h5>
                <h3 style="text-align: center;"><?php echo date( $dateFormat2, strtotime($events_array[$i]['start']) )?></h3>
                <h5 style="text-align: center;"><?php echo date( $dateFormat3, strtotime($events_array[$i]['start']) )?></h5>
              </div>
            </div>
          </div>

          <div class="" style="padding: 10px 20px;">
            <i class="fa fa-clock-o"></i>&nbsp;<?php echo $event_time_start->format("g:i a")?> - <?php echo $event_time_end->format("g:i a")?>
            <p>
              <?php if($events_array[$i]['location']['name']):?>
              <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo strip_tags($events_array[$i]['location']['name']);?>
              <?php else:?>
              &nbsp;
              <?php endif;?>
            </p>
            <p><?php custom_echo(strip_tags($events_array[$i]['description']), 236);?></p>
          </div>

          <a href="<?php echo $events_array[$i]['url']['public'];?>" target="_blank"><button class="btn btn-primary" style="position: absolute; bottom: 10px; left: 20px;">See Event</button></a>
        </div>
      </div><!-- location_event_card_container-->
    <?php endif; ?>
      <?php }
    else:
       ?>
       <div class="container">
        <h3 style="text-align: center; padding: 30px 0px; color: #fdbe12;">No Events Available - Check Back Later!</h3>
        <div class="container">
          <img src="<?php echo $no_events_img; ?>" class="img-responsive" style="min-width: 250px; margin: 0 auto;">
        </div>
       </div>
      <!--end the event loop -->

    <?php endif; ?>
    </div><!--row-->
  </div><!--container-->
</div><!--background-color-->





</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
