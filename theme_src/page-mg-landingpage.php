<?php
/*

 Template Name: Landing Page

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );



?>


<div class="container-fluid header">
  <div class="layer"></div>
  <div class="row content-layer">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 left-sect">
      <img class="mg-logo" src="https://rvalibrary.org/wp-content/uploads/2020/05/VCE-Master-Gardeners-logo-transparent-2.png" alt="">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 right-sect">
      <h1>Master Gardener</h1>
      <h3>Virtual Help Desk</h3>
      <p>Get help straight from two Master Gardeners</p>
      <div class="">
        <a class="btn btn-primary" href="https://rvalibrary.org/master-gardener/submit/">Submit a Question</a>
      </div>
      <div class="">
        <a class="btn btn-primary" href="https://rvalibrary.org/master-gardener/view/">Browse Answers</a>
      </div>
      <div class="">
        <a class="btn btn-primary" href="https://rvalibrary.org/master-gardener/search#faqSection">Search Answers</a>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid descr-sect">
  <div class="jumbotron">
  <h1 class="display-4">Here to Answer Your Questions</h1>
  <p class="lead" >Connect with certified Extension Master Gardeners through the Virtual Gardening Helpdesk, in partnership with the Virginia Cooperative extension.</p>
  <hr class="my-4">
  <p>Simply submit the form with your question and your answer will be posted here shortly. Virginia Extension Master Gardeners are part of a dedicated team of more than 5,000 volunteers who work in communities throughout Virginia to promote research-based horticulture. Extension Master Gardeners (EMGs) provide vital public education related to creating and managing home landscapes, vegetable gardening, turf management, and more.</p>

  <div class="button-sect">
    <p>To learn more:</p>
    <a class="btn btn-primary" href="https://ext.vt.edu/lawn-garden/master-gardener/Become-a-Master-Gardener.html">Master Gardener</a>
  </div>


</div>


</div>

<div class="container-fluid sect-header">
  <div class="row">
    <h1 class="press-header">Master Gardeners</h1>
  </div>
</div>

<!-- ########## TEXT RIGHT - IMG LEFT SECTION ########## -->
<div class="container-fluid img-sect">
  <div class="container-fluid img-container">
    <div class="row right_image_row">

      <div class="col-md-6 col-sm-12 col-xs-12 tiles_left_image mr_intro_image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/05/janice_reilly.jpg');"></div><!-- img col -->

      <div class="col-md-6 col-sm-12 col-xs-12 block_colored tiles_right_text">
        <div class="content_right_block_section mr_intro_container">
          <div class="mr_intro">
              <h2>Janice Reilly</h2>
              <p>I’ve long been drawn to ‘all things garden’. Started a tiny gardening business catering to town gardens (which included a 5,000 bulb garden for one client). Then worked for a design/build landscape company as crew leader and designer. Transitioned to container gardening business I created for small restaurants and retail desiring to improve their street presence, and residences. Eventually designed gardens for an architectural firm working with small commercial and non-profit clients. Since relocating to Richmond I’ve been trying on different gardening hats but am mostly enjoying the work under the umbrella of Richmond’s Master Gardeners and Lewis Ginter.</p>
          </div>
        </div><!-- block_section-->
      </div><!-- text col -->

    </div><!--row-->
  </div><!-- container-fluid -->

  <!-- ########## TEXT LEFT - IMG RIGHT SECTION ########## -->
  <div class="container-fluid img-container">
    <div class="row right_image_row">
      <div class="col-md-6 col-sm-12 col-xs-12 block_colored tiles_left_text">
        <div class="content_left_block_section mr_intro_container">
          <div class="mr_intro">
              <h2>Don Moore</h2>
              <p>Don is a lifelong resident of Richmond and a graduate of Virginia Tech.  He’s had a lengthy career in the healthcare management industry, and has always had a passion for gardening.  Don has been a certified Master Gardener in Richmond through the Virginia Extension Cooperative for the last five years. He also volunteers at Lewis Ginter Botanical Garden where his focus is on plant propagation in the Greenhouse.  Don enjoys collaborating with other gardeners and sharing experiences, challenges, and new ideas.</p>
          </div>
        </div><!-- block_section-->
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12 tiles_left_image mr_intro_image" style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/05/don_moore.jpeg');"></div><!-- img col -->
    </div><!--row-->
  </div><!-- container-fluid -->
</div><!-- outermost container-fluid -->



<?php get_footer(); ?>
