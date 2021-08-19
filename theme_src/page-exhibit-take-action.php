<?php
/*
 Template Name: TAKE ACTION
 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>

<style media="screen">

  body{
    scroll-behavior: smooth;
  }
  .block-section > a > button {
    margin: 10px 5px;
  }

  .right-angled{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
        flex-direction: column;
        padding: 0 40px;
        position: relative;
}

@media (max-width: 767px){
  .right-angled:after, .left-angled:after{
    display: none;
  }
}

.right-angled:after{
  content: '';
  position: absolute;
  right: -50px;
  top: 0;
  border-width: 150px 50px 150px 50px;
  border-style: solid;
  border-color: #f5f2eb white  #f5f2eb #f5f2eb;
  z-index: -1;
}

.left-angled{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
      flex-direction: column;
      -webkit-box-pack: center;
  -ms-flex-pack: center;
      justify-content: center;
      padding: 0 40px;
      position: relative;
}

.left-angled:after{
  content: '';
  position: absolute;
  left: -50px;
  top: 0;
  border-width: 150px 50px 150px 50px;
  border-style: solid;
  border-color: #f5f2eb #f5f2eb #f5f2eb white;
  z-index: -1;
}

.angled-section{
  min-height: 300px;
}

.section-side-padding{
  padding-left: 6rem;
}

.big-para{
  font-size: 20px;
}

.bg-overlay{
  background-color: rgba(0,71,100,0.95);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}

.gform_wrapper{
  background-color: transparent;
  box-shadow: none !important;
  margin-top: 0px !important;
  padding-top: 0px !important;
}

.gform_title, .gsection_title{
  color: #ff7236 !important;
}

.gfield_label, .gfield_description, label{
  color: white !important;
}

</style>

<div class="container-fluid" style="position: relative; background-color: #004765; color: white; background: url('https://rvalibrary.org/wp-content/uploads/2020/10/virginia.png'); background-position: center; background-size: contain; background-repeat: no-repeat;">
  <div class="bg-overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-4 flex-center">
        <div class="block-section block-padding">
        <a href="#email1">
          <button class="btn btn-primary" type="button" name="button">Email Your Legislator</button>
        </a>
        <a href="#petition">
          <button class="btn btn-primary" type="button" name="button">Sign the Petition</button>
        </a>
          <a href="#email2">
            <button class="btn btn-primary" type="button" name="button">Share Your Thoughts</button>
          </a>
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">
        <div class="block-section block-padding">
          <p>Our state constitution has disenfranchised hundreds of thousands of Virginians, the
        majority of whom are Black. In 1902 a new Virginia constitution went into effect that
        purposefully suppressed the Black vote by implementing poll taxes, a complex
        registration process and permanently disenfranchised people convicted of a felony. This
        new constitution disenfranchised about 90% of Black men, dropping the number of
        eligible Black male voters from 147,000 in 1901 to about 10,000 by 1905. Today, nearly
        22% of Black Virginians are permanently banned from voting due to racist voter
        suppression laws left behind from the Jim Crow Era.</p>
        <p>In order to remove this racist tool we will need to pass a constitutional amendment that
        allows all Virginia citizens 18 and over the right to vote that can never be taken away.</p>
        <p>The process for passing a constitutional amendment requires the General Assembly to
        pass our amendment twice before it can be put on the ballot for voters to support. We
        need your help - legislators need to know that you will not tolerate the deliberate
        suppression of Black voters any longer.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="email1" class="container-fluid" style="background-color: #004765;">
  <div class="container">
    <div class="row block-padding">
      <div class="col-sm-4 col-xs-12 margin-md-bottom">
        <div class="block-section">
          <h1 class="header-gradient-underline">Contact</h1>
          <p class="color-white">Send an email to a member of the Senate Privileges and Election Committee(SP&EC).</p>
          <!-- <button class="btn btn-primary" type="button" name="button">SP&EC Addresses</button> -->
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">
        <div class="block-section">
          <?php gravity_form( 22, $display_title = true, $display_description = true, $field_values = null, $ajax = true, $tabindex, $echo = true ); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="petition" class="newsletter section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="center-content">
                    <h2 class="section-title">Sign the Petition</h2>
                    <p class="">Click here to sign the petition guaranteeing the right of every Virginia citizen 18 and older to vote</p>

                    <a target="_blank" href="https://virginiainterfaithcenter.ourpowerbase.net/civicrm/petition/sign?sid=138&amp;reset=1">
                      <button id="newsletter_subscribe_button" class="btn btn-primary">Sign</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="email2" class="container-fluid" style="background-color: #004765;">
  <div class="container">
    <div class="row block-padding">
      <div class="col-sm-4 col-xs-12 margin-md-bottom">
        <div class="block-section">
          <h1 class="header-gradient-underline">Your Thoughts</h1>
          <p class="color-white">We hope you enjoyed the exhibit and maybe learned something new. Take a few moments to share your thoughts.</p>
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">
        <div class="block-section">
          <?php gravity_form( 24, $display_title = true, $display_description = true, $field_values = null, $ajax = true, $tabindex, $echo = true ); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('template-parts/content', 'related-links') ?>

<?php get_footer(); ?>
