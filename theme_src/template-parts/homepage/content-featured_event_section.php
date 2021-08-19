<?php

// query featured event posts for a sticky post
$event_loop_sticky = new WP_Query( array(
  'post_type'  => 'featured_events',
  'meta_query' => array(
    array(
      'key'    => 'sticky',
      'value'  => 'Yes'
    )
  )
));

// query all published featured event posts with Data DESC, only with sticky = No
$event_loop = new WP_Query( array(
  'post_type' => 'featured_events',
  'orderby' => array(
    'date' => 'DESC'
  ),
  'meta_query' => array(
    array(
      'key'    => 'sticky',
      'value'  => 'No'
    )
  )
));

// if sticky post present, unshift sticky post to beginning of published posts array
if($event_loop_sticky->posts[0]){
    array_unshift($event_loop->posts, $event_loop_sticky->posts[0]);
}


$title = [];
$dates = [];
$location = [];
$description = [];
$view_more = [];
$button_repeater = [];
// $button_text = [];
// $button_url = [];
$sticky_bool = [];
$i = 0;

while( $event_loop ->have_posts()) : $event_loop->the_post();
  $title[$i]                 = get_the_title();
  $image_url[$i]             = get_field('event_image');
  $dates[$i]                 = get_field('dates');
  $location[$i]              = get_field('location');
  $description[$i]           = get_field('description');
  $view_more[$i]             = get_field('view_more');
  $view_more_url[$i]         = get_field('view_more_url');
  $button_repeater[$i]       = get_field('button_repeater');
  $sticky_bool[$i]           = get_field('sticky');
  $i++;
endwhile;

wp_reset_postdata();

 ?>
 <style media="screen">
   .dashicons-controls-play, .dashicons-controls-pause{
     color: white;
     position: absolute;
     top: 5px;
     left: 5px;
     text-shadow: 1px 1px 1px rgba(0,0,0,0.6);
     font-size: 25px;
     transition: color .3s ease;
     z-index: 9999;
   }
   .dashicons-controls-play:hover, .dashicons-controls-pause:hover{
     color: #cc262d;
     cursor: pointer;
   }
   .featured_event_container{
     position: relative;
   }
 </style>



 <?php if($sticky_bool[0] == 'Yes'): ?>
 <div data-sticky="true" class= "featured_event_container <?php // echo ($i > 1 ? 'owl-carousel' : '');?>" style="z-index: 0; padding: 50px 0; background-color: #004765; <?php echo ($i > 0 ? '' : 'display: none;');?>">
 <?php else: ?>
 <div class= "featured_event_container <?php // echo ($i > 1 ? 'owl-carousel' : '');?>" style="z-index: 0; padding: 50px 0; background-color: #004765; <?php echo ($i > 0 ? '' : 'display: none;');?>">
 <?php endif; ?>
 <span class="dashicons dashicons-controls-play"></span>
 <span class="dashicons dashicons-controls-pause invisible"></span>
  <div class="owl-carousel">
    <?php for ($i = 0; $i < $event_loop->found_posts; $i++):?>
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
                 <?php foreach ($button_repeater[$i] as $linkArr): ?>
                   <a href="<?php echo $linkArr[button_url]; ?>" class="btn btn-primary featured_signup_button"><?php echo $linkArr[button_text]; ?></a>
                 <?php endforeach; ?>
               <?php echo ($view_more[$i] ? '<a href="'.$view_more_url[$i].'" class="btn btn-primary featured_viewmore_button">View More Events</a>' : '');?>
               </div>
             </div>
           </div><!--row-->
         </div><!--container-->
      </div><!--owl-item-->
  <?php endfor;?>

  </div>


</div><!--background-color div-->
