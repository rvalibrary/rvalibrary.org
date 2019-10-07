<?php
/*

 Template Name: Gellman Redesign

 */

get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

$gellman_flyer = get_field('gellman_event_flyer');

?>

<div class="art-card-header" style="background-color: #022437">
		<div class="container">
			<div class="row">
				<div class="head-text-col col-sm-12">
	 				<img style="margin: 0 auto" class="gellman-music-staff img-responsive" src="<?php echo $header_image['url']; ?>" />
					<p class="head-text" style="color: #fff;"><?php the_field('title_description'); ?></p>
					<p>For the full Gellman Room Concert Series performance list, please check this season's <a href="<?php echo $gellman_flyer['url']; ?>">event flyer</a>.</p>
			</div>
			<div class="col-sm-12 date-fast-link" id="month-link-header" style="text-align:center;"></div>
		</div>
	</div>
</div>

<div class="header-gradient"></div>

<!--container for pushing cards into gradient: negative  -->
<div class="outer-card-container" id="outer-card-container">

			<?php
					// check if the repeater field has rows of data
					if( have_rows('gellman_room_concert') ):
						// loop through the rows of data
					   while ( have_rows('gellman_room_concert') ) : the_row();
							//vars for top level repeater
							$month = get_sub_field('month_header');
					?>

			<div class="month-card-container">


			<div class="month-header">
				<?php echo $month; ?>
			</div>

			<?php
			/* Second level loop for adding multiple cards for each month heading*/
			if( have_rows('event_cards') ):
				while( have_rows('event_cards') ) : the_row();
								//ACF vars
								$day = get_sub_field('event_day');
								$month = get_sub_field('event_month');
								$image = get_sub_field('event_image');
								$title = get_sub_field('event_title');
								$performers = get_sub_field('event_performers');
								$description = get_sub_field('event_description');
								$link = get_sub_field('event_link');
								$location = get_sub_field('event_location');
				?>

				<!-- article container for card -->
			<div class="card">
					<!-- date bubble section-->
					<div class="card-date">

						<div class="card-date_year">
 							<?php echo $day; ?>
 						</div>
 					 	<div class="card-date_month">
 							<?php echo $month; ?>
 						</div>

					</div> <!-- end card-date -->


				<div class="card-category">
					<?php echo $title; ?>
				</div>

					<!-- removed this ID for classname method - will break css id="card-thumb" -->
				 <div class="card-thumb">
					 <img class="main-image" src="<?php echo $image['url'] ?>">
				 </div>

				 <!-- card body section-->
				 <div class="card-body">
					 <div class="card-body_title">
						 <?php echo $performers; ?>
					 </div>

					 <div class="expand-container">
						 <span class="dashicons dashicons-arrow-up-alt2"></span>
						 <div class="details">More Details</div>
					 </div>

					 <div class="card-body_subtitle">
							<span>  </span>
					 </div>

					 <div class="card-location">
	 					<?php echo $location; ?>
	 				 </div>
						 <p class="card-body-description">
							 <?php echo $description; ?>
						</p>
				 </div> <!-- end card-body -->

			 <!-- footer section -->
			 <footer class="card-footer">
				 <span class="card-footer_content">
					 <a target="_blank" href="<?php echo $link; ?>"><i class="fas fa-calendar-alt"></i>OPEN IN CALENDAR</a>
				 </span>
 		 	 </footer>

		 </div><!-- end card -->

		 <?php
				endwhile;
				endif;
		  ?>


	 </div><!--Month container that includes month heading and all subsequent cards - only 1 month-card-container per group of monthly events-->
	 <?php
	 	endwhile;
	 	endif;
	 ?>
 </div> <!--Card container for gradient push - should only be one per page, wrapping every month including each card-->



<?php get_template_part( 'template-parts/content', 'page' ); ?>

<?php get_footer(); ?>
