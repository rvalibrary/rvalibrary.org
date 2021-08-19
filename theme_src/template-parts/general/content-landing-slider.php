<?php
global $post;

$slider_args = get_query_var('slider_args');
$use_dropdown = get_query_var('use_dropdown');

// Use client_id below to find corresponding client_secret in libcal api authentication menu

date_default_timezone_set('America/New_York');
$creds_url = 'https://rvalibrary.libcal.com/1.1/oauth/token';
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

if(gettype($slider_args) != "array") {
  if($slider_args === "children"){
    $age_group_cat_id = 4468;
  } elseif($slider_args === "teens") {
    $age_group_cat_id = 4471;
  } elseif($slider_args === "law") {
    $age_group_cat_id = 38052;
  } else {
    $age_group_cat_id = 4467;
  }
}


$cal_id           =     get_field('libcal_calendar_id');
$calendar_url     =     get_field('calendar_url');

if(gettype($slider_args) != "array") {
  $events_url = 'https://rvalibrary.libcal.com/1.1/events?cal_id=14747&audience=' . $age_group_cat_id . '&limit=5&days=60';
} else {
  $events_url = 'https://rvalibrary.libcal.com/1.1/events?';
  foreach($slider_args as $queryString):
      if(gettype($queryString) === 'array') {
          foreach($queryString as $queryName => $values):
             $events_url .= $queryName . '=';
              $i = 1;
              foreach($values as $value):
                 if($i < count($values)){
                     $events_url .= $value .',';
                 } else {
                     $events_url .= $value;
                 }
                $i++;
              endforeach;
              $events_url .= '&';
          endforeach;
      }
  endforeach;
  $events_url .= 'limit=5&days=120';
}
$events_args = array(
              'headers' => array('Authorization' => 'Bearer ' . $creds_response['access_token']),
          );
$events_response = json_decode(wp_remote_retrieve_body(wp_remote_get( $events_url, $events_args)), true);
if ( is_wp_error( $events_response ) ) {
   $error_message = $events_response->get_error_message();
   echo "Something went wrong: $error_message";
} else {
  $events_array = $events_response['events'];
  // print_r($events_array);
}
?>

<div data-cat="<?php echo $age_group_cat_id ?>" class="slider" id="apiSlider" style="padding: 20px; margin-top: 30px;">
  <?php if($use_dropdown): ?>
  <div style="float: left;" class="dropdown">
    <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Branch - Virtual
      <span class="caret"></span>
    </button>
    <ul style="border: 1px solid gray;" class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <li><a>Virtual</a></li>
      <li><a>Main</a></li>
      <li><a>Belmont</a></li>
      <li><a>Broad Rock</a></li>
      <li><a>East End</a></li>
      <li><a>Ginter Park</a></li>
      <li><a>Hull Street</a></li>
      <li><a>North Avenue</a></li>
      <li><a>West End</a></li>
      <li><a>Westover Hills</a></li>
    </ul>
  </div>
<?php endif; ?>
  <div style="margin-top: 55px;" class="slider-container slider-container-top">

    <div class="expand-icon-container">
      <svg class="expand-icon" width="40" height="40" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g filter="url(#filter3_d)">
      <path d="M4.0659 11.0033C4.06768 11.5535 4.51849 11.9981 5.0728 11.9963L14.1058 11.967C14.6601 11.9652 15.108 11.5177 15.1062 10.9674C15.1045 10.4172 14.6536 9.97258 14.0993 9.97438L6.07 10.0004L6.04414 2.02997C6.04235 1.47972 5.59155 1.03512 5.03724 1.03691C4.48293 1.03871 4.03502 1.48623 4.03681 2.03648L4.0659 11.0033ZM5.21845 9.43769L4.35758 10.2978L5.78155 11.7022L6.64242 10.8421L5.21845 9.43769Z" fill="white"/>
      </g>
      <g filter="url(#filter4_d)">
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
      <filter id="filter4_d" x="4.26877" y="0.976331" width="19.0404" height="18.9868" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
    <?php get_template_part('template-parts/general/slider/content', 'expand-icon'); ?>

    <div class="picture-row">
    <?php foreach ($events_array as $event): ?>
      <?php
      $beginDate = strtotime($event['start']);
      $endDate   = strtotime($event['end']);
      ?>
      <div class="carousel-img">
          <?php if($event['featured_image']): ?>
            <div class="img-container">
              <img src="<?php echo $event['featured_image'] ?>" class="img" style="max-height: 100%;">
            </div>
          <?php else: ?>
            <div class="img-container">
              <img src="https://rvalibrary.org/wp-content/uploads/2021/05/rpl-logo-blue.png" class="img" style="max-height: 100%;">
            </div>
          <?php endif; ?>
        <div class="slider-text-area">
          <h3 style="color: #004765"><?php echo $event['title'] ?></h3>
          <h5><?php echo date('F d', $beginDate); ?></h5>
          <h5><?php echo date('g:ia', $beginDate) . ' - ' . date('g:ia', $endDate); ?></h5>
          <p>
            <?php foreach ($event['category'] as $singleCategory):?>
              <span style="font-weight: bold; font-size: 12px; color: #ff7236; text-decoration: underline;"><?php print_r($singleCategory["name"]) ?></span>
            <?php endforeach; ?>
         </p>
          <p style="max-width: 1000px; font-size: 16px;"><?php echo substr(filter_var($event['description'], FILTER_SANITIZE_STRING), 0, 250) . '...'; ?></p>
          <a style="align-self: flex-start;" href="<?php echo $event['url']['public'] ?>" class="btn btn-primary">Learn More</a>
        </div>
      </div>
    <?php endforeach; ?>
      <!-- <div class="carousel-img">
        <div style="background: #fff url('https://images.unsplash.com/photo-1450704944629-6a65f6810cf2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1047&q=80') no-repeat center; background-size: cover;" class="img"></div>
        <div class="">
          <h1>Header</h1>
          <p>paragraph</p>
        </div>
      </div>
      <div class="carousel-img">
        <div style="background: #fff url('https://images.unsplash.com/photo-1450704944629-6a65f6810cf2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1047&q=80') no-repeat center; background-size: cover;" class="img"></div>
        <div class="">
          <h1>Header</h1>
          <p>paragraph</p>
        </div>
      </div>
      <div class="carousel-img">
        <div style="background: #fff url('https://images.unsplash.com/photo-1450704944629-6a65f6810cf2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1047&q=80') no-repeat center; background-size: cover;" class="img"></div>
        <div class="">
          <h1>Header</h1>
          <p>paragraph</p>
        </div>
      </div>
      <div class="carousel-img">
        <div style="background: #fff url('https://images.unsplash.com/photo-1450704944629-6a65f6810cf2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1047&q=80') no-repeat center; background-size: cover;" class="img"></div>
        <div class="">
          <h1>Header</h1>
          <p>paragraph</p>
        </div>
      </div> -->
      <!-- <img class="carousel-img" src="https://images.unsplash.com/photo-1565638459249-c85cbb2faaa8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="">
      <img class="carousel-img" src="https://images.unsplash.com/photo-1565638459249-c85cbb2faaa8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="test2">
      <img class="carousel-img" src="https://images.unsplash.com/photo-1565638459249-c85cbb2faaa8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="test3">
      <img class="carousel-img" src="https://images.unsplash.com/photo-1565638459249-c85cbb2faaa8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="test4">
      <img class="carousel-img" src="https://images.unsplash.com/photo-1565638459249-c85cbb2faaa8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="test5"> -->

    </div>

    <div class="caption-container">

    </div>

     <div class="dot-container dot-container-top">

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
