<?php
/*
Template Name: Branch
 */

/* LibCal Hours Start */
 $url = 'https://api3.libcal.com/api_hours_grid.php?iid=4083&format=json&weeks=1&systemTime=0';
 $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
 $dayofweek = date('w');
 $response = wp_remote_get( $url );
 $branch_name = get_field('libcal_branch_name');
 if( is_wp_error( $response ) ) {
    $error_message = $response->get_error_message();
    echo "Something went wrong: $error_message";
 } else {
   $body_string = json_decode($response['body'], true);
 }

 for($i = 0; $i < count($body_string['locations']); ++$i){
   if ($body_string['locations'][$i]['name'] == $branch_name){
     $branch_index = $i;
   }
 }
/* LibCal Hours End */


/* LibCal Upcoming Events */
//LibCal API
date_default_timezone_set('EST');
$creds_url = 'https://api2.libcal.com/1.1/oauth/token';
$creds_args = array(
        	'body' => array( 'client_id' => '196',
                           'client_secret' => '4b619f6823c68f8541c9591a79a64543',
                           'grant_type' => 'client_credentials'),
        );
$creds_response = json_decode(wp_remote_retrieve_body(wp_remote_post( $creds_url, $creds_args)), true);
if ( is_wp_error( $creds_response ) ) {
   $error_message = $creds_response->get_error_message();
   echo "Something went wrong: $error_message";
} else {
   // echo 'Response:<pre>';
   // print_r( $creds_response['access_token']);
   // echo '</pre>';
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
   // echo 'Response:<pre>';
   // print_r( $events_response['events'][0]);
   // echo '</pre>';
}

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
          </div>
        </div><!--emphasis_section-->

    </div>
    <div class="col-sm-6 col-xs-12 location_page_image" style="background-image: url('<?php echo $branch_image;?>')"></div>
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
              for ($i = 0; $i < count($days); $i++){
                timerowsAPI($days[$i], $branch_index, $body_string);
              }
            ?>
          </table>
          <div style="display: flex; justify-content: center;">
            <?php
              ////this code adds a closed/open status below the hours table
              // echo "<span id='location_status'>Status:&nbsp;</span>";
              // $is_open = $body_string['locations'][$branch_index]['weeks'][0][$days[$dayofweek]]['times']['currently_open'];
              //
              // if ($is_open){
              //   echo "<span id='location_open'>OPEN</span>";
              // } else {
              //   echo "<span id='location_closed'>CLOSED</span>";
              // }
            ?>
          </div>

        </div>
      </div><!-- block_section-->
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
      <?php for ($i = 0; $i < 3; $i++){
      // $event_time_start = strtotime($events_array[$i]['start']  . "+1hours");
      // $event_time_end = strtotime($events_array[$i]['end']  . "+1hours");
      $event_time_start = strtotime($events_array[$i]['start']);
      $event_time_end = strtotime($events_array[$i]['end']);
      ?>
      <!--start the event loop -->
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
            <i class="fa fa-clock-o"></i>&nbsp;<?php echo date( $dateFormat_time, $event_time_start)?> - <?php echo date( $dateFormat_time, $event_time_end)?>
            <p>
              <?php if ($events_array[$i]['location']['name']):?>
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
      <?php } ?>
      <!--end the event loop -->


    </div><!--row-->
  </div><!--container-->
</div><!--background-color-->





</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
