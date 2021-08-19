<?php
/*
Template Name: Event List
 */

$section_toggle = get_field('section_toggle');
// $events_sections = get_field('events_sections');

 /* LibCal Authentication */
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
 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 ?>

<?php if($section_toggle):?>
    <div class="container">
      <div class="row">

        <div class="col-sm-9">


          <?php
          while ( have_posts() ) :
            the_post();
            if (get_the_content()):?>
            <div class="col-sm-12" style="margin-top: 35px;">
        		    <?php the_content();?>
            </div>
            <?php endif;
          endwhile; // End of the loop.
          ?>




          <?php
          if( have_rows('events_sections') ):
              while ( have_rows('events_sections') ) : the_row();
              $cat_string = '';
              $cal_string = '';
              ?>

              <div class="col-sm-12">
                    <?php while ( have_rows('libcal_categories') ) : the_row();
                      $cat_string = $cat_string . get_sub_field('category_id');
                      $cat_string = $cat_string . ',';
                    endwhile;?>

                    <?php
                    $events_url = 'https://api2.libcal.com/1.1/events?cal_id=' . get_sub_field('cal_id') . '&category=' . $cat_string  . '&days=10000&' . 'limit=' . get_sub_field('max_quantity_of_events');?>

                    <?php
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
               ?>
                 <!-- upcoming events section -->
                 <?php
                   $dateFormat1 = "D ";
                   $dateFormat2 = "d ";
                   $dateFormat3 = "M ";
                   $dateFormat_time = "g:i a";
                 ?>


                 <div style="padding: 30px 0;">

                     <div class="row">
                       <div class="col-xs-12">
                         <h3><?php the_sub_field('section_title');?></h3>
                         <hr class="thick" style="margin-bottom: 0;">
                       </div>
                     </div>

                    <?php if(count($events_array) > 0):?>
                     <div class="row">
                       <?php for ($i = 0; $i < count($events_array); $i++){
							if (date('I') == 1){
								$event_time_start = strtotime($events_array[$i]['start']);
								$event_time_end = strtotime($events_array[$i]['end']);
							}else{
								$event_time_start = strtotime($events_array[$i]['start']  . "+1hours");
								$event_time_end = strtotime($events_array[$i]['end']  . "+1hours");
							}
                       ?>
                       <!--start the event loop -->
                       <div class="col-md-6 col-lg-4 col-sm-12 location_event_card_container" style="margin-top: 15px;">
                         <div class="location_event_card" style="position: relative; border: 3px solid #ff7236;">
                           <div class="eventlist_card_header" style="display: flex; ">
                             <!--start title -->
                             <div class="eventlist_card_header_title" style="height: 85.454px; background-color: #ff7236; color: white; padding: 10px; padding-left: 20px; flex-grow: 1; display: flex; flex-direction: column; justify-content: center;">
                               <h3 style="" id=""><?php custom_echo($events_array[$i]['title'], 55)?></h3>
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

                   <?php else:?>
                     <div style="margin-top: 10px;">
                       No events under this category yet, but stay tuned...<br>
                       <a href="http://rvalibrary.libcal.com" class="btn btn-primary" style="margin-top: 10px;">Browse more events here</a>
                     </div>
                   <?php endif;?>

                 </div><!--background-color-->
              </div><!--col-sm-12-->
          <?php
              endwhile; //have_rows('events_sections')
          else :
          endif;
          ?>
        </div><!--col-sm-9-->

        <div class="col-sm-3">
          <aside class="rpl_sidebar section-sidebar-container">
            <?php get_template_part( 'template-parts/section/content', 'section');?>
            <?php get_sidebar('section');   ?>
          </aside>
        </div><!-- col-sm-3-->
      </div><!--row-->
    </div><!--container-->
<?php else:?>



  <div class="container">
    <div class="row">

      <div class="col-sm-12">


          <?php
          while ( have_posts() ) :
            the_post();
            if (get_the_content()):?>
            <div style="margin-top: 35px;">
                <?php the_content();?>
            </div>
            <?php endif;
          endwhile; // End of the loop.
          ?>




        <?php
        if( have_rows('events_sections') ):
            while ( have_rows('events_sections') ) : the_row();
            $cat_string = '';
            $cal_string = '';
            ?>

                  <?php while ( have_rows('libcal_categories') ) : the_row();
                    $cat_string = $cat_string . get_sub_field('category_id');
                    $cat_string = $cat_string . ',';
                  endwhile;?>

                  <?php
                  $events_url = 'https://api2.libcal.com/1.1/events?cal_id=' . get_sub_field('cal_id') . '&category=' . $cat_string  . '&days=10000&' . 'limit=' . get_sub_field('max_quantity_of_events');?>

                  <?php
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
             ?>
               <!-- upcoming events section -->
               <?php
                 $dateFormat1 = "D ";
                 $dateFormat2 = "d ";
                 $dateFormat3 = "M ";
                 $dateFormat_time = "g:i a";
               ?>


               <div style="padding: 30px 0;">

                   <div class="row">
                     <div class="col-xs-12">
                       <h3><?php the_sub_field('section_title');?></h3>
                       <hr class="thick" style="margin-bottom: 0;">
                     </div>
                   </div>

                  <?php if(count($events_array) > 0):?>
                   <div class="row">
                     <?php for ($i = 0; $i < count($events_array); $i++){
                     $event_time_start = strtotime($events_array[$i]['start']  . "+1hours");
                     $event_time_end = strtotime($events_array[$i]['end']  . "+1hours");
                     ?>
                     <!--start the event loop -->
                     <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12 location_event_card_container" style="margin-top: 15px;">
                       <div class="location_event_card" style="position: relative; border: 3px solid #ff7236;">
                         <div class="eventlist_card_header" style="display: flex; ">
                           <!--start title -->
                           <div class="eventlist_card_header_title" style="height: 85.454px; background-color: #ff7236; color: white; padding: 10px; padding-left: 20px; flex-grow: 1; display: flex; flex-direction: column; justify-content: center;">
                             <h3 style="" id=""><?php custom_echo($events_array[$i]['title'], 55)?></h3>
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
                 <?php else:?>
                   <div style="margin-top: 10px;">
                     No events under this category yet, but stay tuned...<br>
                     <a href="http://rvalibrary.libcal.com" class="btn btn-primary" style="margin-top: 10px;">Browse more events here</a>
                   </div>
                 <?php endif;?>
               </div><!--background-color-->

        <?php
            endwhile; //have_rows('events_sections')
        else :
        endif;
        ?>
      </div><!--col-sm-9-->

    </div><!--row-->
  </div><!--container-->



<?php endif;?>

</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
