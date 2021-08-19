<?php
/*

Template Name: Bookologist

 */

 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );



 $header_text             = get_field('header_text');
 $header_paragraph        = get_field('header_paragraph');
 $description_text        = get_field('description_text');
 $description_paragraph   = get_field('description_paragraph');
 $link_href               = get_field('link_href');
 $link_text               = get_field('link_text');
 $logo                    = get_field('header_image');
 $gravity_form_number     = get_field('gravity_form_number');



 ?>

<div class="" style="background-color: #055775">
  <div class="bookologist-container container-fluid">
  <div class="header-row row">
    <div class="col-lg-6 col-md-6 ">
      <img class="img-responsive bookologist-logo" src="<?php echo $logo ?>" alt="">
    </div>
    <div class="header-left col-lg-6 col-md-6 ">
      <h2 class="header-big-text"><?php echo $header_text ?></h2>
      <p class="header-text"><?php echo $header_paragraph ?></p>
    </div>

  </div>



  </div>

  <svg class="header-svg" width="100%" viewBox="0 0 3004 314" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g filter="url(#filter0_d)">
      <path d="M4 0H3000C3000 0 2470 0 2176 120C1882 240 1364 92 808 228C252 364 4 280 4 280V0Z" fill="#FDBE13"/>
    </g>
    <defs>
      <filter id="filter0_d" x="0" y="0" width="3004" height="313.654" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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


<div class="container-fluid newsletter-alt">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="center-content">
                <h2 class="section-title white-text"><?php echo $description_text ?></h2>
                <p style="color: white" class=""><?php echo $description_paragraph ?></p>
                <a href="#<?php echo $link_href ?>">
                  <button id="newsletter_subscribe_button" class="btn btn-primary">Get Started</button>
                </a>
            </div>
        </div>
    </div>
</div>


<?php get_template_part('template-parts/general/content', 'booklist-tiles') ?>

<?php set_query_var('get_posts_args', array(
    'numberposts' => 3,
    'category_name' => 'reading-recommendations',
    'order' => 'DESC',
    'orderby' => 'date'
  )) ?>

<div class="container-fluid blog-widget-container">
  <div class="container">
    <h2 class="color-white" style="text-align: left">Recommendations from the Blog</h2>
    <hr class="thick margin-sm-bottom">
  </div>
  <?php get_template_part('template-parts/homepage/content', 'new_blog_widget'); ?>
</div>

<div id="<?php echo $link_href ?>" class="container" style="margin-top: 50px;">
  <?php gravity_form( $gravity_form_number, $display_title = true, $display_description = true, $field_values = null, $ajax = true, $tabindex, $echo = true ); ?>
</div>


<?php get_template_part( 'template-parts/content', 'page' ); ?>

<?php get_footer(); ?>
