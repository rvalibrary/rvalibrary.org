<?php
/*

 Template Name: Gellman Redesign

 */

get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

get_template_part('template-parts/general/content', 'banner-notification');
// $gellman_flyer = get_field('gellman_event_flyer');
?>

<style>
  @media (max-width: 620px){
    .gradient-floating-header{
      font-size: 35px !important;
    }
  }

  .invisible{
    opacity: 0;
  }

  .header-gradient-underline-animated.active{
    opacity: 1;
    color: white !important;
  }

  .header-gradient-container{
    width: fit-content;
    height: fit-content;
    overflow: hidden;
    margin: 0 auto;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
  }

  .header-gradient-underline-animated:before{
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0%;
    height: 65%;
    background: linear-gradient(45deg, #ee2d29, #ff7236);
    opacity: 0.9;
    z-index: -1;
    transition: width 0.3s ease;
  }

  .header-gradient-underline-animated > span{
    position: relative;
    bottom: -100px;
    animation: slide-in-text 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
  }

  .bg-white{
    background-color: white;
    width: 100%;
    min-height: 400px;
  }

.container{
  position: relative;
}

.angled-bottom:before{
    position: absolute;
    content: "";
    display: block;
    left: 0px;
    bottom: 0px;
    transform: rotate(180deg);
    /* width: 110%; */
    border-style: solid;
    border-width: 0 100vw 80px 0;
    border-color: transparent #f4f2eb transparent transparent;
}

.flex-container{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  flex-direction: row;
}

.contact{
  text-decoration: none;
  display: flex;
  flex-direction: column;
  color: white;
  flex: 1;
  min-height: 200px;
  border-radius: 10px;
  justify-content: center;
  align-items: center;
  background-color: transparent;
  transition: background-color .3s ease;
  min-width: 300px;
}

.contact i {
  font-size: 40px;
  color: white;
  padding-bottom: 10px;
}

.contact p{
  font-weight: 200;
}

.contact:hover{
  background-color: #ff7236;
  color: white; !important;
}

.bottom-arrow-divider-top:after{
  position: absolute;
    bottom: -80px;
    left: 0;
    width: 100%;
    z-index: 1;
    content: '';
    border-style: solid;
    border-width: 80px 50vw 0px;
    border-color: #fcfbf8 #012536 white #012536;
}

.bottom-arrow-divider-top:after{
  position: absolute;
    bottom: -80px;
    left: 0;
    width: 100%;
    z-index: 1;
    content: '';
    border-style: solid;
    border-width: 80px 50vw 0px;
    border-color: #fcfbf8 #012536 white #012536;
}

@keyframes slide-in-text{
  0%{
    bottom: -100px;
  }
  100%{
    bottom: 0px;
  }
}
</style>

<div id="Modal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
	<div class="container modal-content-container"></div>
  <div id="modalText"></div>
  <div id="caption"></div>
</div>

<div class="art-card-header" style="padding: 0px !important; position: relative;">
  <div class="header-gradient-container">
    <h1 class="header-gradient-underline-animated gradient-floating-header invisible" style="
        font-size: <?php echo get_field('grc_text_size') ?>px; margin: 0 10px;"><?php echo get_field('grc_animated_text') ?>
    </h1>
  </div>
	<div class="container-full" style="height: 100%; position: relative;">
			<div class="head-text-col col-sm-12" style="position: relative; background-image: url('<?php echo get_field('grc_header_image'); ?>'); background-size: cover; background-position: center; height: 100%; overflow: hidden;">
				<div class="bottom-gradient" style="min-height: 150px; position: absolute; bottom: 0; left: 0px; background-image: linear-gradient(to bottom, rgba(3,38,56, 0) 0.1%, #022538 94%); width: 100%;
				height: 100px; display: flex; display: -ms-flexbox; display: -webkit-box; -webkit-box-align: baseline; -ms-flex-align: baseline; align-items: baseline; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; -webkit-box-pack: end; justify-content: flex-end; padding: 0 20px 20px 20px;">
				</div>
		</div>
</div>
</div>
<script type="text/javascript">

const headerTextEle = document.querySelector('.header-gradient-underline-animated');
const styleEle = document.head.appendChild(document.createElement("style"));

const text = headerTextEle.textContent;
const splitStr = text.split('');
headerTextEle.textContent = '';
headerTextEle.classList.remove('invisible');
headerTextEle.classList.add('active');

for(let i = 0; i < splitStr.length; i++) {
headerTextEle.innerHTML += `<span>${splitStr[i]}</span>`;
}


function spanCycle() {
let span = document.querySelectorAll('.header-gradient-underline-animated > span');
Array.from(span).forEach((span, index, arr) => {
  span.style.animationDelay = `${0.5 * index / 10}s`;
  if(index === Math.floor(arr.length/2)){
    span.addEventListener('animationend', () => {
      appendHeaderBeforeStyles();
    })
  }
})
}

function appendHeaderBeforeStyles() {
styleEle.innerHTML = ".header-gradient-underline-animated:before {width: 90% !important;}"
}

spanCycle();

</script>
<div class="container-fluid" style="background-color: #022537; color: white; padding-bottom: 4rem;">
	<div class="row">
		<div class="col-sm-12 col-md-2">
				<ul style="list-style: none; margin-top: 3rem; padding: 0px;">
					<?php
					if( have_rows('intro_links') ):
						 while ( have_rows('intro_links') ) : the_row();
					?>
					<li style="margin: 10px;"> <a style="font-size: 13px;" target="_blank" class="btn btn-primary-rounded" href="<?php echo get_sub_field('link_href'); ?>"><?php echo get_sub_field('link_text'); ?></a> </li>
				<?php endwhile; endif; ?>
				</ul>
		</div>
		<div class="col-sm-12 col-md-8">
			<?php
			if( have_rows('intro') ):
				 while ( have_rows('intro') ) : the_row();
			?>
			<div class="head-text-col col-sm-12" style="margin-top: 2rem;">
				<div class="" style="text-align: left; color: white; font-size: 40px; font-weight: bold; text-shadow: 2px 2px 2px rgba(0,0,0,0.5); text-transform: uppercase;">
					 <?php echo get_sub_field('title'); ?>
				</div>
				<p><?php echo get_sub_field('paragraph'); ?></p>
			</div>
		<?php endwhile; endif; ?>
		</div>
		<div class="col-sm-12 col-md-2">
		</div>
	</div>
</div>

<?php get_template_part('template-parts/general/content', 'featured-resource'); ?>

<!--container for pushing cards into gradient: negative  -->
<div class="outer-card-container container-fluid" id="outer-card-container">
		<div class="header-gradient"></div>
		<h1 class="press-header">Calendar</h1>
		<div class="container-fluid" style="background-color: transparent;">
			<div class="col-sm-12 date-fast-link" id="month-link-header" style="margin: 0 auto; text-align:center;"></div>
		</div>
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
					<?php if( get_sub_field('event_livestream') === true ): ?>
					<div class="card-livestream" data-iframe='<?php echo get_sub_field('event_livestream_iframe'); ?>'>
					<?php if(get_sub_field('event_livestream_href') || get_sub_field('event_livestream_iframe')): ?>
						<div style="color: #cf343f !important;"><span style="font-size: 12px;">Watch<i class="fa fa-video-camera" aria-hidden="true" style="padding-left: 2px;"></i></span></div>
            </div>
					<?php else: ?>
						<span style="font-size: 12px;">livestream<i class="fa fa-video-camera" aria-hidden="true" style="padding-left: 2px;"></i></span>
            </div>
					<?php endif; ?>
          <?php elseif( get_sub_field('event_cancellation') === true ): ?>
          <div class="card-livestream">
          <span style="font-size: 12px;">CANCELLED</span>
          </div>
          <?php endif; ?>
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
					 <img class="main-image" src="<?php echo $image['link'] ?>">
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
					 <a target="_blank" href="<?php echo $link; ?>"><i class="fas fa-calendar-alt"></i>CALENDAR / REGISTER</a>
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




<?php get_footer(); ?>
