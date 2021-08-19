<?php
/*

 Template Name: New Master Gardeners

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

$search_criteria = array();
$form_id         = 14;
$sorting         = array();
$paging          = array( 'offset' => 0, 'page_size' => 5 );
$total_count     = 0;
$entries         = GFAPI::get_entries( $form_id, $search_criteria, $sorting, $paging, $total_count );

$start_date                    = date( 'Y-m-d', strtotime('-120 days') );
$end_date                      = date( 'Y-m-d', time() );
$search_criteria['start_date'] = $start_date;
$search_criteria['end_date']   = $end_date;
$tagCollection                 = GFAPI::get_entries($form_id, $search_criteria);

$categories = array();
foreach ($tagCollection as $entry):
  foreach (unserialize($entry[6]) as $category):
    $category = strtolower($category);
    if(!$categories[$category]):
      $categories[$category] = 1;
    else:
      $newVal = $categories[$category] + 1;
      $categories[$category] = $newVal;
    endif;
  endforeach;
endforeach;

arsort($categories);
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
  border-color: #f5f2eb #f2f0f4  #f5f2eb #f5f2eb;
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
  background-color: rgba(0,71,100,0.75);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}

.button-sect > a > button{
  margin: 5px;
}

.newsletter-inner:after{
  position: absolute;
  content: "";
  display: block;
  right: 0px;
  bottom: -80px;
  width: 110%;
  z-index: 9999;
  border-style: solid;
  border-width: 0 100vw 80px 0;
  border-color: transparent #f2f0f4 transparent transparent;
}

.curation-container > li{
  display: inline-block;
}

.flex-center{
  flex-direction: column;
}

.flex-left{
  display: flex;
  justify-content: center;
  align-items: baseline;
  flex-direction: column;
}

.top-angled-section:before{
  position: absolute;
  content: "";
  display: block;
  left: 0;
  top: -80px;
  z-index: 9999;
  /* transform: rotate(180deg); */
  /* width: 110%; */
  border-style: solid;
  border-width: 50px 100vw 50px 0px;
  border-color: transparent #f5f2eb #f5f2eb;
}

.mg-description:after{
  content: '';
  background: linear-gradient(90deg, white (21px), transparent 1%),
		linear-gradient(90deg white (21px), transparent 1%) center,
		black;
}


/* slider styles - import to main stylesheet */

/* Version: 1.1 */

@media(max-width: 499px){
  .parallax-container{
    height: 250px !important;
  }
  .parallax-img{
    top: 0px !important;
  }
}

@media (min-width: 500px) and (max-width: 850px)  {
  .parallax-container{
    height: 175px !important;
  }
}

@media (max-width: 900px) {
  .carousel-img {
    display: block !important;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
  }
  .slider-text-area{
    width: 100% !important;
    padding: 15px !important;
    margin-top: 15px;
  }
  .img-container{
    /* max-height: 200px;
    width: 100% !important; */
  }
  .picture-row{
    /* height: 55vh !important; */
  }
}

@media (min-width: 1100px) {
  .picture-row{
    max-height: 100% !important;
  }
  /* .carousel-img{
    height: 100%;
  } */
}

html{
  scroll-behavior: smooth;
}

.cool-header{
  position: relative;
  background-color: inherit;
  border-bottom: 2px solid white;
  margin-bottom: 2rem;
}

/* .cool-header::before{
  position: absolute;
  content: '';
  top: 30px;
  left: 0;
  background-color: white;
  width: 100%;
  height: 2px;
} */

.banner-links{
  margin: 20px 0 0 10px;
}

.ctf-tweets{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.ctf-tweets > .ctf-item{
  -webkit-box-shadow: 3px 5px 7px 1px rgba(0,0,0,0.5);
          box-shadow: 3px 5px 7px 1px rgba(0,0,0,0.5);
  margin: 20px;
  min-width: 300px;
  max-width: 400px;
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  padding: 40px 20px !important;
  border-radius: 5px;
  background: white;
}

.img-container{
  width: 0%;
  display: none;
  text-align: center;
  margin: 0 auto;
  /* display: -webkit-box;
  display: -ms-flexbox;
  display: flex; */
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.slider-text-area{
  width: 100%;
  text-align: left;
  position: relative;
  padding: 25px;
  /* background-color: rgba(255,255,255,0.8); */
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
}

.parallax-container{
  height: 250px;
  position: relative;
  overflow: hidden;
}

.parallax-img{
  position: absolute;
  width: 100%;
  bottom: 0px;
  left: 0;
  -webkit-transition: -webkit-transform .1s ease;
  transition: -webkit-transform .1s ease;
  -o-transition: transform .1s ease;
  transition: transform .1s ease;
  transition: transform .1s ease, -webkit-transform .1s ease;
}

.banner{
  width: 80%;
  min-height: 10px;
  background-image: -o-linear-gradient(45deg, #032437 90%, rgba(255,114,54, 0) calc(90% + 2px));
  background-image: linear-gradient(45deg, #032437 90%, rgba(255,114,54, 0) calc(90% + 2px));
  position: absolute;
  bottom: -3px;
  left: 0;
  padding: 10px 60px 10px 20px;
}

@media(max-width: 1000px){
  .banner{
    width: 100%;
    background: #032436;
  }
}

.banner > .banner-links > a {
  padding: 10px;
}

.slider-container > .dot-container-top {
  top: 12px;
}

.slider-container-top {
  padding-top: 25px;
}

@media only screen and (min-width: 300px) and (max-width: 991px) {
  .gallery-view{
    display: block !important;
  }
}

.art-header > .container-fluid{
  text-align: center;
  background-color: #022437;
  padding: 40px 0px;
}

.art-footer{
  text-align: center;
  background-color: #022437;
}

.container-fluid{
  /* max-width: 2000px !important; */
}

.artist-links > .btn{
  margin: 5px;
}


.section-block{
  padding: 25px;
  position: relative;
  border-radius: 3px;
  z-index: 2;
}

.section-block-slider{
  background-color: #fcfbf8;
}

.section-block-left{
  -webkit-box-shadow: 1px 1px 3px -2px rgba(0,0,0,0.5);
  box-shadow: 1px 1px 3px -2px rgba(0,0,0,0.5);
  z-index: 3;
}

.section-block-right{
  -webkit-box-shadow: -1px 1px 3px -2px rgba(0,0,0,0.5);
  box-shadow: -1px 1px 3px -2px rgba(0,0,0,0.5);
  z-index: 3;
}

.para-container{
  width: 100%;
  margin-top: 15px;
}

.para-container > p{
  font-size: 13px !important;
}

.gallery-location{
  margin: 5px 0;
  font-size: 13px;
  color: #cc262d;
}

.link-container{
  width: 100%;
}

.nav-circles{
  display: inline-block;
  width: 43px;
  height: 43px;
  border-radius: 50%;
  border: 2px solid #ff7236;
  text-align: center;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.nav-circles > .block-links{
  color: #ff7236 !important;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.nav-circles > .block-links > i{
  font-size: 1.8rem;
  margin-top: 10px;
}

.nav-circles:hover{
  background-color: #ff7236;
}

.nav-circles:hover .block-links{
  color: white !important;
}

.event-date-bubble-container{
  width: 75px;
  height: 75px;
  color: white;
  background-color: #ff7236;
  position: absolute;
  right: 5px;
  top: 5px;
  text-align: center;
}

.gallery-view{
  font-size: 13px;
  margin: 0;
  display: none;
}

.ap-month{
  font-size: 20px;
}

.ap-year{
  font-size: 15px;
}

.event-title-container{
  width: -webkit-fit-content;
  width: -moz-fit-content;
  width: fit-content;
  border-bottom: 1px solid black;
  margin-top: 55px;
}

.artist-name{
  margin: 0;
}

.exhibit-name{
  margin: 0;
  margin-top: -6px;
}

.slider-container{
  max-width: 1000px;
  /* max-height:50vh; */
  /* max-width: 700px; */
  /* height: auto; */
  margin: 0 auto;
  overflow: hidden;
  position: -webkit-sticky;
  position: sticky;
  top: 10px;
  /* padding-bottom: 40px; */
  opacity: 1;
  -webkit-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}

.picture-row{
  width: 100%;
  height: -webkit-fit-content;
  height: -moz-fit-content;
  height: fit-content;
  /* max-height: 90vh; */
  height: 50vh;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-transition: all .5s ease;
  -o-transition: all .5s ease;
  transition: all .5s ease;
  /* new shiz for parallax  */
   -webkit-box-orient: vertical;
   -webkit-box-direction: normal;
       -ms-flex-direction: column;
           flex-direction: column;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-align: end;
      -ms-flex-align: end;
          align-items: end;

}

.arrow-container{
  width: -webkit-fit-content;
  width: -moz-fit-content;
  width: fit-content;
  position: absolute;
  z-index: 1;
  height: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
          -webkit-transition: all 0.3s ease;
          -o-transition: all 0.3s ease;
          transition: all 0.3s ease;

}

.left-arrow-container{
  left: -45px;
  top: 0;
}

.right-arrow-container{
  right: -45px;
  top: 0;
}

.slider-container:hover .left-arrow-container{
  left: 5px;
}

.slider-container:hover .right-arrow-container{
  right: 5px;
}

.slider-container:hover .expand-icon-container{
  -webkit-transform: scale(1) !important;
      -ms-transform: scale(1) !important;
          transform: scale(1) !important;
  opacity: 1 !important;
}



.left-arrow, .right-arrow{
  width: 30px;
  height: 30px;
  -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,0.8);
          box-shadow: 1px 1px 1px rgba(0,0,0,0.8);
  border-radius: 50%;
  background: #f7f7f7;
  fill: #c7c7c7;
}

.left-arrow:hover, .right-arrow:hover{
  cursor: pointer;
}

.dot-container{
  position: absolute;
  /* bottom: -10px; */
  font-size: 12px;
  left: 50%;
   -webkit-transform: translate(-50%, -50%);
       -ms-transform: translate(-50%, -50%);
           transform: translate(-50%, -50%);
  padding: 5px 10px;
  border-radius: 5px 5px 0px 0px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.nav-dots{
  height: 15px;
  width: 15px;
  border-radius: 50%;
  display: inline-block;
  background-color: rgba(238,238,238, 0.6);
  -webkit-transition: .5s ease;
  -o-transition: .5s ease;
  -webkit-transition: all .5s ease;
  -o-transition: all .5s ease;
  transition: all .5s ease;
  cursor: pointer;
  margin: 5px;
  -webkit-box-shadow: 2px 2px 2px rgba(0,0,0,0.6);
          box-shadow: 2px 2px 2px rgba(0,0,0,0.6);
}

.nav-dots:hover{
  background-color: white;
}

.nav-dots.selected{
  background-color: #fff;
  -webkit-transform:scale(1.5);
      -ms-transform:scale(1.5);
          transform:scale(1.5);
  /* width: 35px;
  border-radius: 20%; */
}

.caption-container{
  position: absolute;
  border-radius: 2px;
  width: -webkit-fit-content;
  width: -moz-fit-content;
  width: fit-content;
  padding: 5px 10px;
  font-size: 12px;
  bottom: 40px;
  left: 0;
  color: white;
  z-index: 2;
  background-color: rgba(0,0,0,0.6);
  opacity: 0;
  -webkit-animation: fadeIn 1s ease-in-out forwards;
          animation: fadeIn 1s ease-in-out forwards;
}

.carousel-img{
  width: 100%;
  /* height: 100%; */
  /* height: 90vh; */
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  /* border-radius: 5px; */
  cursor: pointer;
  opacity: 1;
  -webkit-transition: opacity 0.3s ease-in-out;
  -o-transition: opacity 0.3s ease-in-out;
  transition: opacity 0.3s ease-in-out;
  /* background-size: cover; */
}

.carousel-img .img{
  /* width: 50%; */
  /* height: 100%; */
}

.carousel-img:hover {
  /* opacity: 0.8; */
  cursor: pointer;
}


.expand-icon-container{
  position: absolute;
  top: 5px;
  left: 5px;
  z-index: 2;
  border-radius: 2px;
  -webkit-transform: scale(0);
      -ms-transform: scale(0);
          transform: scale(0);
  opacity: 0;
  -webkit-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}

.expand-icon-container:hover{
  cursor: pointer;
}

/*
//////////////////
Featured Resource
/////////////////
*/

@media (max-width: 900px){
  .gradient{
    display: none;
  }
  .color-space{
    z-index: 1;
    width: 100% !important;;
    opacity: 0.9;
  }
  .background-image{
    position: absolute !important;
    width: 100% !important;
    top: 0;
    left: 0;
    filter: blur(2px);
  }
  .app-icon{
    display: none;
  }
  .main-content{
    flex-direction: column !important;
  }
}

@media (max-width: 700px){}

.content-wrapper{
  width: 100%;
  display: flex;
  overflow: hidden;
  min-height: 400px;
  align-items: center;
  /* height: 70vh; */
  /* max-height: 85vh; */
  position: relative;
  padding: 15px;
}

.background-wrapper{
  height: 100%;
  width: 100%;
  position: absolute;
  background-color: #003752;
  top: 0;
/*   right: 0;
  bottom: 0; */
  left: 0;
  display: flex;
}

.gradient{
  position: absolute;
  top: 0;
  left: 50%;
  right: 0;
  bottom: 0;
  margin: auto;
  width: 90%;
  height: 100%;
  background-image: linear-gradient(to left, rgba(0,71,101, 0) 1%, #003752 100%);
  /* background-image: linear-gradient(to left, rgba(0,71,101, 0) 1%, #022437 100%); */
  z-index: 1;
}

.color-space{
  width: 50%;
  background-color: #003752;
  /* background-color: #022437; */
  height: 100%;
}

.background-image{
  width: 50%;
  height: 100%;
  position: relative;
}

.main-content{
  width: 100%;
  height: 100%;
  color: white;
  z-index: 1;
  display: flex;
  align-items: center;
  flex-direction: row;
}

.app-icon{
  width: 250px;
  height: auto;
  border-radius: 5px;
  margin-left: 45px;
  box-shadow: 3px 4px 20px rgba(0,0,0,0.4);
}

.text-content{
  display: flex;
  flex-direction: column;
  padding-left: 15px;
}

.text-content > h1{
  font-size: 50px;
  padding-bottom: 10px;
}

.text-content > .type{
  font-weight: 100;
  font-size: 12px;
  margin-bottom: 5px;
}

.text-content > .age{
  font-weight: 100;
  font-size: 14px;
  margin-bottom: 5px;
}

.text-content > .checkouts{
  margin-bottom: 25px;
  font-weight: 200;
}

.checkout-number{
  font-weight: 400;
  color: #ff7236;
  font-size: 20px;
}

.text-content > .description{
  font-size: 15px;
  max-width: 600px;
  padding-right: 15px;
}

.btn-primary-rounded-sm{
  border-radius: 20px;
  font-size: 12px;
  padding: 5px 14px 5px;
}


</style>

<div class="container-fluid angled-header" style="display: flex; padding-bottom: 50px; position: relative; background-color: #004765; color: white; background: url('https://rvalibrary.org/wp-content/uploads/2021/03/garden-header-scaled-optimized.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat;background-attachment: fixed;">
  <div class="bg-overlay"></div>
  <div class="container" style="display: flex; align-items: center; justify-content: center;">
    <div class="row" style="align-items: center;">
      <div class="col-xs-12 col-sm-4 flex-center">
        <div class="block-section block-padding">
          <img class="mg-logo" src="https://rvalibrary.org/wp-content/uploads/2020/05/VCE-Master-Gardeners-logo-transparent-2.png" alt="" style="min-width: 210px;">
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">
        <div class="block-section block-padding">
          <h1>Master Gardener</h1>
          <h3>Virtual Help Desk</h3>
          <p>Connect with certified Extension Master Gardeners through the Virtual Gardening Helpdesk, in partnership with the Virginia Cooperative extension.</p>
        <div class="button-sect">
          <p><a href="https://ext.vt.edu/lawn-garden/master-gardener/Become-a-Master-Gardener.html">Learn More</a></p>
        </div>
        <div class="button-sect">
        <a href="#submit">
          <button class="btn btn-primary" type="button" name="button">Submit A Question</button>
        </a>
        <a href="https://rvalibrary.org/master-gardener/search/#faqSection">
          <button class="btn btn-primary" type="button" name="button">Search Answers</button>
        </a>
          <a href="https://rvalibrary.org/master-gardener/view/">
            <button class="btn btn-primary" type="button" name="button">Browse All Answers</button>
          </a>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="newQuestions" >
    <div class="container-fluid newsletter-inner" style="position: relative; background-color: #f2f0f4;">
        <div class="row" style="display: block !important; text-align: center; padding: 20px 0px; overflow: hidden;">
            <div class="col-sm-12">
              <div class="container">
                <div class="mg-form-container" style="max-width: 650px; margin: 0 auto;">
                  <form method="get" action="https://rvalibrary.org/master-gardener/search#faqSection">
                     <input placeholder="Search something" type="text" value="" name="query">
                    <button class="mg-search" type="submit"> <i class="mg-search-icon fa fa-search"></i></button>
                  </form>
                </div>
              </div>
              <ul class="curation-container" style="list-style: none; margin-top: 3rem; padding: 0px; display: inline-block; text-align: center; max-width: 560px; position: relative; z-index: 100;">
                <h2 class="section-title">Popular Tags</h2>
                <?php foreach($categories as $category => $value): ?>
                  <li style="margin: 2px;"> <a style="font-size: 13px;" target="_blank" class="btn btn-primary-rounded" href="https://rvalibrary.org/master-gardener/search/?tag=<?php echo $category ?>#faqSection"><?php echo $category; ?></a> </li>
                <?php endforeach; ?>
								</ul>
                <div class="center-content" style="z-index: 1; position: relative;">
                  <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="position: absolute; max-width: 600px;left: -200px; top: -200px; opacity: 1; z-index: -1;">
<path fill="#dbe5dd" d="M67.1,-20.9C73.3,-2.8,55.2,24.1,31.5,40.7C7.8,57.3,-21.4,63.5,-36.7,52.1C-52,40.6,-53.3,11.4,-44.9,-9.8C-36.5,-31,-18.2,-44.2,6.1,-46.2C30.4,-48.2,60.9,-38.9,67.1,-20.9Z" transform="translate(100 100)"></path>
</svg>
<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="position: absolute; max-width: 600px;right: -200px; bottom: -100px; opacity: 1; z-index: -1;">
<path fill="#dbe5dd" d="M67.1,-20.9C73.3,-2.8,55.2,24.1,31.5,40.7C7.8,57.3,-21.4,63.5,-36.7,52.1C-52,40.6,-53.3,11.4,-44.9,-9.8C-36.5,-31,-18.2,-44.2,6.1,-46.2C30.4,-48.2,60.9,-38.9,67.1,-20.9Z" transform="translate(100 100)"></path>
</svg>
                    <h2 class="section-title">Newly Answered</h2>
                    <div class="slider" style="padding: 20px; position: relative;">
                    <div style="margin-top: 10px;" class="slider-container slider-container-top">

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

                      <div class="picture-row">
                      <?php foreach ($entries as $entry): ?>
                        <?php

                        ?>
                        <div class="carousel-img">

                              <div class="img-container">
                              </div>

                          <div class="slider-text-area">
                            <?php $date_created = new DateTime($entry['date_created']); ?>
                            <span style="color: #ff7236"><?php echo $date_created->format('F j, Y'); ?></span>
                            <strong>Question:</strong>
                            <p style="font-size: 13px; font-style: italic;"><?php echo $entry[3] ?></p>
                            <?php if(unserialize($entry[6])): ?>
                            <strong>Filed Under</strong>
                            <span style="margin: 10px 0px;">
                            <?php foreach (unserialize($entry[6]) as $category): ?>
                              <?php $category = strtolower($category); ?>
                            <a target="blank" class="btn-primary btn-primary-rounded-sm" href="https://rvalibrary.org/master-gardener/search/?tag=<?php echo $category ?>"><?php echo $category ?></a>
                          <?php endforeach; ?>
                          </span>
                        <?php endif; ?>
                            <h1 style="color: #004765"><?php echo $entry[4] ?></h1>
                            <?php $excerpt = substr(stripslashes($entry[5]), 0, 550); ?>
                            <p style="color: #004765; font-size: 15px; border-left: 3px solid #004765; padding: 10px;"><?php echo substr($excerpt, 0, strrpos($excerpt, ' ') ) . '...'?></p>
                            <a target="_blank" href="https://rvalibrary.org/master-gardener/search/?query=<?php echo stripslashes($entry[4]) ?>#faqSection">
                              <button id="" class="btn btn-primary">Read More</button>
                            </a>
                          </div>
                        </div>
                      <?php endforeach; ?>

                      </div>
                       <div class="dot-container dot-container-top">

                      </div>
                    </div>
                  </div>
                    <a target="_blank" href="https://rvalibrary.org/master-gardener/view/">
                      <button id="newsletter_subscribe_button" class="btn btn-primary">Browse All</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="submit" class="container-fluid" style="position: relative; background-color: #003652; padding: 100px 0px; background-color: #004765; color: white; background: url('https://rvalibrary.org/wp-content/uploads/2021/03/mg-form-area-optimized.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat;background-attachment: fixed;">
  <div class="bg-overlay"></div>
  <div class="container" style="padding: 0px !important;">
    <div class="row">
      <div class="col-sm-4 col-xs-12 margin-md-bottom">
        <div class="block-section">
          <h1 class="header-gradient-underline">Help Desk</h1>
          <p class="color-white">Simply submit the form with your question and your answer will be privately emailed back to you and posted here on our question and answer forum. It's that simple! Virginia Extension Master Gardeners are part of a dedicated team of more than 5,000 volunteers who work in communities throughout Virginia to promote research-based horticulture. Extension Master Gardeners (EMGs) provide vital public education related to creating and managing home landscapes, vegetable gardening, turf management, and more.</p>
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">
        <div class="block-section">
          <?php gravity_form( 13, $display_title = true, $display_description = true, $field_values = null, $ajax = true, $tabindex, $echo = true ); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="gardeners">
  <div class="container-fluid bg-linen top-angled-section" style="position: relative;">
    <h1 style="padding-top: 25px !important; color: 282828; text-align: center;">Meet the Masters</h1>
    <div class="row angled-section">
      <div class="container margin-big-top">
      <div class="col-xs-12 col-sm-12 flex-center" style="flex-direction: row; flex-wrap: wrap;">
        <div class="avatar-container flex-center full-padding"style="flex-direction: column;">
          <img style="width: 175px; border-radius: 50%; box-shadow: 2px 3px 12px 0px rgb(0 0 0 / 50%);" src="https://rvalibrary.org/wp-content/uploads/2021/02/janice_reilly-crop2.jpg" alt="">
          <h1 class="header-gradient-underline color-soft-black">Janice Reilly</h1>
        </div>
        <div class="mg-description" style="max-width: 550px;">
          <p class="">I’ve long been drawn to ‘all things garden’. Started a tiny gardening business catering to town gardens (which included a 5,000 bulb garden for one client). Then worked for a design/build landscape company as crew leader and designer. Transitioned to container gardening business I created for small restaurants and retail desiring to improve their street presence, and residences. Eventually designed gardens for an architectural firm working with small commercial and non-profit clients. Since relocating to Richmond I’ve been trying on different gardening hats but am mostly enjoying the work under the umbrella of Richmond’s Master Gardeners and Lewis Ginter.</p>
        </div>
      </div>
    </div>
    </div>
      <div class="row angled-section">
        <div class="col-xs-12 col-sm-12 flex-center" style="flex-direction: row; flex-wrap: wrap;">
        <div class="avatar-container flex-center full-padding" style="flex-direction: column;">
          <img style="width: 175px; border-radius: 50%; box-shadow: 2px 3px 12px 0px rgb(0 0 0 / 50%);" src="https://rvalibrary.org/wp-content/uploads/2021/02/don_moore-crop2.jpeg" alt="">
          <h1 class="header-gradient-underline color-soft-black">Don Moore</h1>
        </div>
        <div class="mg-description" style="max-width: 550px;">
        <p>Don is a lifelong resident of Richmond and a graduate of Virginia Tech. He’s had a lengthy career in the healthcare management industry, and has always had a passion for gardening. Don has been a certified Master Gardener in Richmond through the Virginia Extension Cooperative for the last five years. He also volunteers at Lewis Ginter Botanical Garden where his focus is on plant propagation in the Greenhouse. Don enjoys collaborating with other gardeners and sharing experiences, challenges, and new ideas.</p>
      </div>
        </div>
        <div class="col-xs-12 col-sm-7 flex-section-padding flex-left">
            <div class="">
            </div>
        </div>
      </div>
  </div>
</section>



<?php get_footer(); ?>
