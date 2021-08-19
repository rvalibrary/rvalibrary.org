<?php
/*
Template Name: New Art Events
 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>

<style media="screen">
<style>
  @media (max-width: 620px){
    .gradient-floating-header{
      font-size: 35px !important;
    }
  }

  .invisible{
    opacity: 0;
  }

  .header-gradient-underline-animated{
    font-size: 60px;
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

<div id="imgModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="modalText"></div>
  <div id="caption"></div>
</div>
<div class="art-card-header" style="padding: 0px !important; position: relative;">
  <div class="header-gradient-container">
    <h1 class="header-gradient-underline-animated gradient-floating-header invisible" style="
        font-size: <?php echo get_field('art_header_text_font_size'); ?>px;"><?php echo get_field('art_header_text'); ?>
    </h1>
  </div>
	<div class="container-full" style="height: 100%; position: relative;">
			<div class="head-text-col col-sm-12" style="position: relative; background-image: url('<?php echo get_field('art_background_image'); ?>'); background-size: cover; background-position: center; height: 100%; overflow: hidden;">
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

<div class="container-fluid" style="background-color: #022537; color: white; padding-bottom: 10rem; position: relative;">
	<div class="row">
		<div class="col-sm-12 col-md-2">
				<ul style="list-style: none; margin-top: 3rem; padding: 0px;">
				</ul>
		</div>
		<div class="col-sm-12 col-md-8">
      <?php if(have_rows('art_introduction_columns')): ?>
        <?php while(have_rows('art_introduction_columns')): the_row(); ?>
			<div class="head-text-col col-sm-12" style="margin-top: 2rem;">
				<div class="" style="text-align: left; color: white; font-size: 40px; font-weight: bold; text-shadow: 2px 2px 2px rgba(0,0,0,0.5); text-transform: uppercase;">
					 <?php echo get_sub_field('art_header'); ?>
				</div>
        <?php echo get_sub_field('art_paragraph'); ?>
			</div>
      <?php endwhile; endif; ?>
		</div>
		<div class="col-sm-12 col-md-2">
		</div>
	</div>
</div>
<div class="art-header">
	<div class="container-fluid">
  <?php if( have_rows('alerts') ): ?>
    <div class="col-sm-12 col-lg-12 col-md-12" style="padding: 0px 30px; margin-top: 20px;" >
      <div class="" style="text-align: center; color: white;">

      </div>
      <div class="marquee-container">
        <div class="marquee-text">
          <?php
            $counter = 0;
              while( have_rows('alerts') ): the_row();

                  $textAlert = get_sub_field('text_field');
                  if($counter === 0):
             ?>
             <div class="notification show"><?php echo $textAlert ?></div>
             <?php $counter++; ?>
           <?php else: ?>
          <div class="notification"><?php echo $textAlert ?></div>
          <?php $counter++; ?>
        <?php endif; ?>
      <?php endwhile; ?>
        </div>
        <div class="marquee-nav-icons dashicons dashicons-arrow-left-alt2" id="previous"></div>
        <div class="marquee-nav-icons dashicons dashicons-arrow-right-alt2" id="next"></div>
      </div>
    </div>
    <hr style="width: 60%; margin: 0 auto;">
    <?php endif; ?>
		<div class="col-sm-12 col-lg-12 col-md-12" style="margin-top: 20px;">
      <h1 style="color: white; text-align: center;">Featured Artists</h1>
      <div class="artist-links" style="text-align: center;">
        <?php
          if( have_rows('artist') ):
            while(have_rows('artist') ): the_row();

            $name = get_sub_field('artist_name');
         ?>
        <a class="btn btn-primary" href="#<?php echo $name ?>"><?php echo $name ?></a>

      <?php endwhile; endif; ?>

      </div>

    </div>
	</div>
</div>

<?php
  $counter = 1;
  $sliderMax = get_field('slider_max_width');

  if( have_rows('artist') ):
    while( have_rows('artist') ) : the_row();

    $artist_name = get_sub_field('artist_name');
    $artist_description = get_sub_field('description');
    $exhibit_name = get_sub_field('exhibit_name');
    $gallery_location = get_sub_field('gallery_location');
    $month = get_sub_field('month');
    $year = get_sub_field('year');


 ?>
 <?php if($counter % 2 == 1): ?>

<div class="container-fluid">
  <div class="row">

    <div class="col-md-5 col-sm-12 col-lg-5 section-block section-block-left">

    <div class="event-title-container">
      <h1 class="artist-name text-primary"><?php echo $artist_name ?></h1>
      <h4 class="exhibit-name text-secondary"><?php echo $exhibit_name ?></h4>
    </div>

    <div class="event-date-bubble-container">
      <div class="ap-month"><?php echo $month; ?></div>
      <?php $counter++?>
      <div class="ap-year"><?php the_field('year') ?></div>
    </div>

      <div class="gallery-location"><i class="fas fa-map-pin"></i><?php  echo $gallery_location ?></div>
      <div class="gallery-view">
        <a class="btn btn-primary" href="#<?php echo $artist_name ?>">Artist Gallery</a>
      </div>


      <div class="para-container">
          <?php echo $artist_description ?>
      </div>

      <div class="link-container">
          <?php
          if( have_rows('links')):
            while( have_rows('links')): the_row();
            $link = get_sub_field('link_href');
            $icon = get_sub_field('font_awesome_icon');
           ?>
        <div class="nav-circles">
          <a class="block-links" href="http://<?php echo $link ?>">
            <?php echo $icon ?>
          </a>
        </div>
        <?php endwhile; endif; ?>
      </div>

    </div>

    <div class="col-md-7 col-sm-12 col-lg-7 section-block-slider section-block">
      <div class="slider">
      <?php if($sliderMax): ?>
      <div id="<?php echo $artist_name ?>" class="slider-container" style="max-width:<?php echo $sliderMax ?>px !important">
      <?php else:  ?>
      <div id="<?php echo $artist_name ?>" class="slider-container">
      <?php endif; ?>

      <div class="expand-icon-container">
        <svg class="expand-icon" width="40" height="40" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter3_d)">
        <path d="M4.0659 11.0033C4.06768 11.5535 4.51849 11.9981 5.0728 11.9963L14.1058 11.967C14.6601 11.9652 15.108 11.5177 15.1062 10.9674C15.1045 10.4172 14.6536 9.97258 14.0993 9.97438L6.07 10.0004L6.04414 2.02997C6.04235 1.47972 5.59155 1.03512 5.03724 1.03691C4.48293 1.03871 4.03502 1.48623 4.03681 2.03648L4.0659 11.0033ZM5.21845 9.43769L4.35758 10.2978L5.78155 11.7022L6.64242 10.8421L5.21845 9.43769Z" fill="white"/>
        </g>
        <g filter="url(#filter1_d)">
        <path d="M19.3091 2.00304C19.3108 1.45279 18.8628 1.00537 18.3085 1.00369L9.27546 0.976336C8.72115 0.974657 8.27044 1.41936 8.26878 1.96961C8.26711 2.51985 8.71512 2.96728 9.26943 2.96895L17.2988 2.99327L17.2746 10.9637C17.273 11.514 17.721 11.9614 18.2753 11.9631C18.8296 11.9648 19.2803 11.5201 19.282 10.9698L19.3091 2.00304ZM18.7076 3.00803L19.013 2.70665L17.5979 1.29335L17.2924 1.59474L18.7076 3.00803Z" fill="white"/>
        </g>
        <defs>
        <filter id="filter3_d" x="0.0368042" y="1.03691" width="19.0694" height="18.9594" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
        <feOffset dy="4"/>
        <feGaussianBlur stdDeviation="2"/>
        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
        </filter>
        <filter id="filter1_d" x="4.26877" y="0.976331" width="19.0404" height="18.9868" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
        <feOffset dy="4"/>
        <feGaussianBlur stdDeviation="2"/>
        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
        </filter>
        </defs>
        </svg>
      </div>

        <div class="picture-row">
          <?php
            if( have_rows('gallery_images')):
              while( have_rows('gallery_images') ): the_row();

              $image = get_sub_field('images');
              $caption = get_sub_field('caption');
           ?>
         <img class="skip-lazy carousel-img" src="<?php echo $image['url'] ?>" alt="<?php echo $caption ?>">
       <?php endwhile; endif; ?>
        </div>

        <div class="caption-container">

        </div>

         <div class="dot-container">

        </div>


        <!-- <div class="arrow-container left-arrow-container">
          <svg class="left-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
          </svg>
        </div>
        <div class="arrow-container right-arrow-container">
          <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
          </svg>
        </div> -->
      </div>
    </div>
    </div>
  </div>
</div> <!-- container fluid -->


<?php else: ?>

  <div class="container-fluid">
    <div class="row">

      <div class="col-md-5 col-sm-12 col-lg-5 col-lg-push-7 col-md-push-7 section-block section-block-right">

      <div class="event-title-container">
        <h1 class="artist-name text-primary"><?php echo $artist_name ?></h1>
        <h4 class="exhibit-name text-secondary"><?php echo $exhibit_name ?></h4>
      </div>

      <div class="event-date-bubble-container">
        <div class="ap-month"><?php echo $month; ?></div>
        <?php $counter++?>
        <div class="ap-year"><?php the_field('year') ?></div>
      </div>

        <div class="gallery-location"><i class="fas fa-map-pin"></i><?php  echo $gallery_location ?></div>
        <div class="gallery-view">
          <a class="btn btn-primary" href="#<?php echo $artist_name ?>">Artist Gallery</a>
        </div>


        <div class="para-container">
            <?php echo $artist_description ?>
        </div>

        <div class="link-container">
          <?php
          if( have_rows('links')):
            while( have_rows('links')): the_row();
            $link = get_sub_field('link_href');
            $icon = get_sub_field('font_awesome_icon');
           ?>
        <div class="nav-circles">
          <a class="block-links" href="http://<?php echo $link ?>">
            <?php echo $icon ?>
          </a>
        </div>
        <?php endwhile; endif; ?>
        </div>

      </div>

      <div class="col-md-7 col-sm-12 col-lg-7 col-md-pull-5 col-lg-pull-5 section-block-slider section-block">
        <div class="slider">
        <?php if($sliderMax): ?>
        <div id="<?php echo $artist_name ?>" class="slider-container" style="max-width:<?php echo $sliderMax ?>px !important">
        <?php else:  ?>
        <div id="<?php echo $artist_name ?>" class="slider-container">
        <?php endif; ?>

        <div class="expand-icon-container">
          <svg class="expand-icon" width="40" height="40" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g filter="url(#filter3_d)">
          <path d="M4.0659 11.0033C4.06768 11.5535 4.51849 11.9981 5.0728 11.9963L14.1058 11.967C14.6601 11.9652 15.108 11.5177 15.1062 10.9674C15.1045 10.4172 14.6536 9.97258 14.0993 9.97438L6.07 10.0004L6.04414 2.02997C6.04235 1.47972 5.59155 1.03512 5.03724 1.03691C4.48293 1.03871 4.03502 1.48623 4.03681 2.03648L4.0659 11.0033ZM5.21845 9.43769L4.35758 10.2978L5.78155 11.7022L6.64242 10.8421L5.21845 9.43769Z" fill="white"/>
          </g>
          <g filter="url(#filter1_d)">
          <path d="M19.3091 2.00304C19.3108 1.45279 18.8628 1.00537 18.3085 1.00369L9.27546 0.976336C8.72115 0.974657 8.27044 1.41936 8.26878 1.96961C8.26711 2.51985 8.71512 2.96728 9.26943 2.96895L17.2988 2.99327L17.2746 10.9637C17.273 11.514 17.721 11.9614 18.2753 11.9631C18.8296 11.9648 19.2803 11.5201 19.282 10.9698L19.3091 2.00304ZM18.7076 3.00803L19.013 2.70665L17.5979 1.29335L17.2924 1.59474L18.7076 3.00803Z" fill="white"/>
          </g>
          <defs>
          <filter id="filter3_d" x="0.0368042" y="1.03691" width="19.0694" height="18.9594" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"/>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
          <feOffset dy="4"/>
          <feGaussianBlur stdDeviation="2"/>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
          </filter>
          <filter id="filter1_d" x="4.26877" y="0.976331" width="19.0404" height="18.9868" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"/>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
          <feOffset dy="4"/>
          <feGaussianBlur stdDeviation="2"/>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
          </filter>
          </defs>
          </svg>
        </div>

          <div class="picture-row">
            <?php
              if( have_rows('gallery_images')):
                while( have_rows('gallery_images') ): the_row();

                $image = get_sub_field('images');
                $caption = get_sub_field('caption');
             ?>
           <img class="carousel-img" src="<?php echo $image['url'] ?>" alt="<?php echo $caption ?>">
         <?php endwhile; endif; ?>
          </div>


          <div class="caption-container">

          </div>

           <div class="dot-container">

          </div>

          <!-- <div class="arrow-container left-arrow-container">
            <svg class="left-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
            </svg>
          </div>
          <div class="arrow-container right-arrow-container">
            <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
            </svg>
          </div> -->
        </div>


      </div>
    </div>
    </div>
  </div> <!-- container fluid -->
<?php endif; ?>



<?php endwhile; endif; ?>
<?php get_template_part( 'template-parts/general/content', 'contact'); ?>




<?php get_footer(); ?>
