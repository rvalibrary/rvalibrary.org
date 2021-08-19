<?php
/*

 Template Name: Art Exhibit Events List

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

?>

<div class="art-card-header" style="background-color: #022437">
	<div class="container">
		<div class="row">
			<div class="head-text-col" class="col-sm-12">
				<h1 style="text-align: center; color: #fdbe12" id="header-month"></h1>
				<p class="head-text" style="color: #fff;"><?php the_field('title_description'); ?></p>
			</div>
		</div>
	</div>
</div>

<!--container for pushing cards into gradient: negative  -->
<div class="outer-card-container" id="outer-card-container">
	<div class="header-gradient"></div>
	<div class="flex-container">
		<div class="month-header">
			<?php the_field('month_header'); ?>
		</div>

		<?php
		// check if the repeater field has rows of data
		if( have_rows('art_events') ):
			// loop through the rows of data
		    while ( have_rows('art_events') ) : the_row();
				//vars
				$image = get_sub_field('event_image');
				$year = get_sub_field('event_year');
				$month = get_sub_field('event_month');
				$title = get_sub_field('event_title');
				$author = get_sub_field('event_author');
				$description = get_sub_field('event_description');
				$link = get_sub_field('event_link');
				$category = get_sub_field('event_category');
				$locations = get_sub_field('event_location');
		?>
		<!-- article container for card -->
		<div class="card">
		<!-- date bubble section-->
		<div class="card-date">
			<div class="card-date_year">
				<?php echo $year; ?>
			</div>
		 	<div class="card-date_month">
				<?php echo $month; ?>
			</div>
		</div>

		<!-- category tag over img -->
		<div class="card-category" >
			<?php echo $category; ?>
		</div>

		<!-- removed this ID for classname method - will break css id="card-thumb" -->
		 <div class="card-thumb">
			 <img class="main-image" src="<?php echo $image['url'] ?>">
		 </div>
	 	<!-- card body section-->
	 	 <div class="card-body">
			 <div class="card-body_title">
				 <?php echo $title; ?>
			 </div>
			 <div class="expand-container">
				 <span class="dashicons dashicons-arrow-up-alt2"></span>
				 <div class="details">More Details</div>
			 </div>
			 <div class="card-body_subtitle">
				 <?php echo $author; ?>
			 </div>
			 <?php if($locations):
			 	 $num = count($locations);
			 	 $i = 1;
			  ?>
			 <div class="card-location">

			 <?php foreach($locations as $location){
			 			 if($i < $num){
			 				 echo $location . ', ';
			 		 } else {
			 			 echo $location;
			 		 }
			 		 $i++;
			 	 }
			 ?>
			 </div>
			 <?php endif ?>
				 <p class="card-body-description">
					 <?php echo $description; ?>
				</p>
	 	</div>
 		<!-- footer section -->
		 <footer class="card-footer">
			 <span class="card-footer_content">
				 <a target="_blank" href="<?php echo $link; ?>"><i class="fas fa-calendar-alt"></i>OPEN IN CALENDAR</a>
			 </span>
		 </footer>
	</div>

<?php
    endwhile;

		else :
    // no rows found
		endif;
?>
	</div>
</div>


<?php get_template_part( 'template-parts/content', 'page' ); ?>

<div class="art-footer">
<div class="container" style="background-color: #022437; width: 100%; box-shadow: 0 -5px 8px rgba(0,0,0,0.3)">
	<h1 style="color: #fdbe12"><?php the_field('footer_title'); ?></h1>
	<p style="color: white;"><?php the_field('footer_description'); ?></p>
		<p style="color: white; font-size: 13px;">Interested in exhibiting at Richmond Public Library? Download our <strong><a href="<?php the_field('application') ?>"> application </a></strong>. <br>For more information, please review our <a href="https://rvalibrary.org/about/library-policy/"><strong>policy</a></strong> regarding art submissions.
		<br>To learn more please contact Lynn Vandenesse at the Main Library at <strong><a href="tel:(804)646-7223">(804)646-7223</a></strong> or <strong><a>lynn.vandenesse@richmondgov.com</a></strong>.</p>
</div>
</div>

<?php get_footer(); ?>
