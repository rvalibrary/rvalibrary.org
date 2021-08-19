<?php
/*
 Template Name: TEST LANDING
 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>

<?php get_template_part('template-parts/general/content', 'intro-header-bg'); ?>
<?php get_template_part('template-parts/general/content', 'dramatic-description'); ?>
<?php get_template_part('template-parts/general/content', 'booklist-tiles'); ?>

<style media="screen">
.partner-container{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    background-color: white;
    border-radius: 5px;
    -webkit-box-shadow: 2px 2px 9px 0px rgba(0, 0, 0, 0.7);
            box-shadow: 2px 2px 9px 0px rgba(0, 0, 0, 0.7);
    margin-top: 15px;
    margin-bottom: 15px;
  }

  .logo-container{
    -ms-flex-item-align: center;
        align-self: center;
    margin: 15px;
    max-width: 200px;
  }
</style>

<div class="container-fluid" style="background-color: #034765;">

<div class="container">
  <h1 class="color-white" style="text-align: left;">Partners</h1>
  <hr class="thick margin-sm-bottom">
</div>

<div class="container partner-container error-info">
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/Voting-RIghts-Lab.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/united-mine-workers-of-america.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/secure-democracy.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/RIHD_Logo_Tagline_391_170.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/bridging-the-gap.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/Virginia-Organizing-Vertical-2-Logo.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/VICPP-Logo-transparent-1.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/State_logo_VA_AFL-CIOPITCON.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/R2V-logo3.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/nvm_logo.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/NoLef-Turns-Logo.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/LWV-VA-logo-official.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/Logo_CMYK_Virginia.png" alt="">
  </div>
  <div class="logo-container">
    <img class="partner-logo" src="https://rvalibrary.org/wp-content/uploads/2020/10/Advancement_Project_logo.png" alt="">
  </div>

</div>

</div>

<?php get_footer(); ?>
