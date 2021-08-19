<?php
/*
 Template Name: HIDDEN VOICES
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
/*
  .header-gradient-underline{
    position: relative;
    z-index: 1;
    width: fit-content;
    font-size: 42px;
    color: white;
    margin-bottom: 5px;
  }

  .header-gradient-underline:before{
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 90%;
    height: 65%;
    background: linear-gradient(45deg, #ee2d29, #ff7236);
    opacity: 0.9;
    z-index: -1;
  } */

  .right-angled{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
        flex-direction: column;
        /* -webkit-box-pack: center;
    -ms-flex-pack: center;
        justify-content: center; */
        /* height: 100%; */
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
      /* height: 100%; */
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

.flex-section-padding{
  padding: 3rem;
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

<div class="container-fluid" style="position: relative; background-color: #004765; color: white;">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-4 flex-center">
        <div class="block-section block-padding">
        <a href="#hiddenVoices">
          <button class="btn btn-primary" type="button" name="button">Hidden Voices Videos</button>
        </a>
        <a href="#story">
          <button class="btn btn-primary" type="button" name="button">Share Your Story</button>
        </a>
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">
        <div class="block-section block-padding">
          <!-- <h1 class="header-gradient-underline">Hidden Voices</h1> -->
          <p>Virginia is one of only three states which permanently punishes people convicted of a felony by taking away their right to vote unless the governor individually gives it back – an often long and arduous process. This archaic rule disenfranchises more than 350,000 Virginians who can’t vote but who pay taxes every year. The right to vote is fundamental to our democracy and should not be a punishment in addition to a criminal sentence.</p>
        <p>While the number of disenfranchised voters who have had their rights restored has increased over the last two administrations, individual restoration by governors is not enough. To ensure that every Virginia citizen 18 and over has the right to vote – permanently – we want the Virginia General Assembly to pass a constitutional amendment that guarantees that right. And, we want you to join the fight.  On this page you will hear the voices of incarcerated and formerly incarcerated individuals showcasing the importance of every Virginia citizen over 18 having the right to vote.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="hiddenVoices">
  <div class="container-fluid">
    <!-- <div class="container"> -->
    <div class="row angled-section">
      <div class="col-xs-12 col-sm-5 bg-linen flex-center">
        <h1 class="header-gradient-underline color-soft-black">Sheba</h1>
      </div>
      <div class="col-xs-12 col-sm-7 flex-section-padding">
        <!-- <div class=""> -->
          <!-- <p class="big-para">Election day is Tuesday November 3rd, and polls are open from 6am - 7pm.</p> -->
          <div class="video-wrapper">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/BMh8gm4Q74I" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="">
          </div>
        <!-- </div> -->
      </div>
    </div>
      <div class="row angled-section">
        <div class="col-xs-12 col-sm-5 bg-linen flex-center">
          <h1 class="header-gradient-underline color-soft-black">Richard Walker</h1>
        </div>
        <div class="col-xs-12 col-sm-7 flex-section-padding">
          <!-- <div class=""> -->
            <!-- <p class="big-para">Election day is Tuesday November 3rd, and polls are open from 6am - 7pm.</p> -->
            <div class="video-wrapper">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/WKBX8gAc0Uo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="">
            </div>
          <!-- </div> -->
        </div>
      </div>
      <div class="row angled-section">
        <div class="col-xs-12 col-sm-5 bg-linen flex-center">
          <h1 class="header-gradient-underline color-soft-black">Christopher Green</h1>
        </div>
        <div class="col-xs-12 col-sm-7 flex-section-padding">
          <!-- <div class=""> -->
            <!-- <p class="big-para">Election day is Tuesday November 3rd, and polls are open from 6am - 7pm.</p> -->
            <div class="video-wrapper">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/q1MmtOprkHY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="">
            </div>
          <!-- </div> -->
        </div>
      </div>
    <!-- </div> -->
  </div>
</section>

<div id="story" class="container-fluid" style="background-color: #004765;">
  <div class="container">
    <div class="row block-padding">
      <div class="col-sm-4 col-xs-12 margin-md-bottom">
        <div class="block-section">
          <h1 class="header-gradient-underline">Share Your Story</h1>
          <p class="color-white">If you have recently had your rights restored or you cannot vote due to a felony conviction - we want to hear your story.</p>
          <p class="color-white">There are no rules on how to share your story. Send us a video or audio recording, write a letter or a poem, or draw a picture however you feel will capture your feelings about the right to vote...we want to hear from you.</p>
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">
        <div class="block-section">
          <?php gravity_form( 23, $display_title = true, $display_description = true, $field_values = null, $ajax = true, $tabindex, $echo = true ); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('template-parts/content', 'related-links') ?>

<?php get_footer(); ?>
