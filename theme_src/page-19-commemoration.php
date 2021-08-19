<?php
/*
 Template Name: 19th Commemoration
 */
 $slider_event_args = array(
    "queryStrings" => [
        "cal_id" => ['7469', '14747'],
        "category" => ['38052'],
    ],
);
 set_query_var('slider_args', $slider_event_args);
 set_query_var('use_dropwdown', false);
 set_query_var('get_posts_args', array(
     'numberposts' => 5,
     'category_name' => 'womens history',
     'order' => 'DESC',
     'orderby' => 'date'
   ));
 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 get_template_part('template-parts/general/content', 'intro-header-bg');
 ?>
 <style media="screen">
 .angled-bottom:before{
     position: absolute;
     content: "";
     display: block;
     left: 0px;
     bottom: 0px;
     transform: rotate(180deg);
     border-style: solid;
     border-width: 0 100vw 80px 0;
     border-color: transparent #f4f2eb transparent transparent;
 }

 .angled-bottom-white:before{
     position: absolute;
     content: "";
     display: block;
     left: 0px;
     bottom: 0px;
     transform: rotate(180deg);
     border-style: solid;
     border-width: 0 100vw 80px 0;
     border-color: transparent white transparent transparent;
 }

 .col-sm-12 li {
   display: inline-block !important;
 }
 </style>
 <div class="container-fluid angled-bottom" style="background-color: #003652; color: white; padding: 10rem 0; position: relative;">
 	<div class="row">
 		<div class="col-sm-12 col-md-2">
 				<ul style="list-style: none; margin-top: 3rem; padding: 0px;">
 					<li style="margin: 10px;"> <a style="font-size: 13px;" class="btn btn-primary-rounded" href="#Featured">Featured</a> </li>
          <li style="margin: 10px;"> <a style="font-size: 13px;" class="btn btn-primary-rounded" href="#FromtheCollection">Books</a> </li>
          <li style="margin: 10px;"> <a style="font-size: 13px;" class="btn btn-primary-rounded" href="#apiSlider">Events</a> </li>
          <li style="margin: 10px;"> <a style="font-size: 13px;" class="btn btn-primary-rounded" href="#blog">Law Blog</a> </li>
 				</ul>
 		</div>
 		<div class="col-sm-12 col-md-8">
 			<div class="head-text-col col-sm-12" style="margin-top: 2rem;">
 				<div class="" style="text-align: left; color: white; font-size: 40px; font-weight: bold; text-shadow: 2px 2px 2px rgba(0,0,0,0.5); text-transform: uppercase;">
          The 19th Amendment
 				</div>
 				<p>In commemoration of the Ratification and adoption of the 19th amendment to the U.S. Constitution in 1920, the Richmond Public Law Library is hosting a month long program of events. Join us for one of our events on voter rights for women, browse our collection of talks on women suffrage or checkout some of our related materials on this topic.</p>
 			</div>
 		</div>
 		<div class="col-sm-12 col-md-2">
 		</div>
 	</div>
</div>
 <?php
 get_template_part('template-parts/general/content', 'featured-resource');
 get_template_part('template-parts/general/content', 'button-list');
 get_template_part('template-parts/general/content', 'landing-slider');
 ?>
 <div class="container-fluid blog-widget-container" id="blog" style="background-color: #014865; padding-top: 50px;">
   <div class="container">
     <h2 class="color-white" style="text-align: left">From the Law Library</h2>
     <hr class="thick margin-sm-bottom">
   </div>
   <?php get_template_part('template-parts/homepage/content', 'new_blog_widget'); ?>
 </div>
 <?php
 get_template_part('template-parts/homepage/content', 'newsletter');
 get_footer();
 ?>
 <script type="text/javascript">
   window.onload = function() {
     const sliderParams = {
       automate: {
         automation: true,
         speed: 10
       },
       navDots: true,
       captions: false,
       arrows: false,
       expand: false
     }
     expandingBtnList();
     const slider = sliderFactory( document.querySelector('.slider'), sliderParams );
     slider.init();
   }
 </script>
