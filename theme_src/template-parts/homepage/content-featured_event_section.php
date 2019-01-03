<?php
  $event_loop = new WP_Query( array('post_type' => 'featured_events', 'orderby'=> 'rand'));
  $number_of_events = $event_loop->found_posts;
  $title = [];
  $dates = [];
  $location = [];
  $description = [];
  $view_more = [];
  $button_text = [];
  $button_url = [];
  $i = 0;
  while( $event_loop ->have_posts()) : $event_loop->the_post();
    $title[$i]                 = get_the_title();
    $image_url[$i]             = get_field('event_image');
    $dates[$i]                 = get_field('dates');
    $location[$i]              = get_field('location');
    $description[$i]           = get_field('description');
    $view_more[$i]             = get_field('view_more');
    $view_more_url[$i]         = get_field('view_more_url');
    $button_text[$i]           = get_field('button_text');
    $button_url[$i]            = get_field('button_url');
    $i++;
  endwhile;
  wp_reset_postdata();
 ?>



<div class= "featured_event_container <?php // echo ($i > 1 ? 'owl-carousel' : '');?>" style="z-index: 0; padding: 50px 0; background-color: #004765; <?php echo ($i > 0 ? '' : 'display: none;');?>">


  <div class="owl-carousel">
    <?php for ($i = 0; $i < $number_of_events; $i++):?>
      <div class="">
        <div class="container ">
           <div class="row featuredevent_row">
             <div class="col-md-6 featuredevent_image_div">
               <div class="" style="width: 100%;">
                   <img src="<?php echo $image_url[$i]; ?>" alt="">
               </div>
             </div>

             <div class="col-md-6 featuredevent_text_div" style="">
               <div class="" style="">
                 <!-- <span style="font-size: 30px;">Richmond Art Fair</span><br> -->
                 <h2 style="color: #fdbe12;"><?php echo $title[$i]; ?></h2><br>
                 <span style="font-size: 17px; text-transform: uppercase; color: rgba(255,255,255,.8);"><?php echo $dates[$i]; ?></span><br>
                 <span style="font-size: 17px; text-transform: uppercase; color: rgba(255,255,255,.8);"><?php echo $location[$i]; ?></span>
                 <p style="font-size: 18px; margin-top: 15px; line-height: 30px;"><?php echo $description[$i]; ?></p>
               </div>
               <div class="featuredevent_button_div" style="">
                 <a href="<?php echo $button_url[$i]; ?>" class="btn btn-primary featured_signup_button"><?php echo $button_text[$i]; ?></a>
                 <?php echo ($view_more[$i] ? '<a href="'.$view_more_url[$i].'" class="btn btn-primary featured_viewmore_button">View More Events</a>' : '');?>
               </div>
             </div>
           </div><!--row-->
         </div><!--container-->
      </div><!--owl-item-->
  <?php endfor;?>

  </div>


</div><!--background-color div-->
