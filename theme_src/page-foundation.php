<?php
/*
Template Name: Foundation
*/
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
the_content();
if( !post_password_required( $post )):
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

.bottom-arrow-divider:after{
  position: absolute;
    bottom: -80px;
    left: 0;
    width: 100%;
    z-index: 1;
    content: '';
    border-style: solid;
    border-width: 100px 50vw 0px;
    border-color: white #012536 white #012536;
}

ul{
  display: inline-block;
}

.col-sm-12 li, .col-sm-12 a{
  display: inline-block !important;
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
<div class="art-card-header" style="padding: 0px !important; position: relative;">
  <div class="header-gradient-container">
    <h1 class="header-gradient-underline-animated gradient-floating-header invisible" style="
        font-size: 60px;">RPL Foundation
    </h1>
  </div>
	<div class="container-full" style="height: 100%; position: relative;">
			<div class="head-text-col col-sm-12" style="position: relative; background-image: url('https://rvalibrary.org/wp-content/uploads/2021/07/Exterior-Library-Park-Azaleas-scaled.jpg'); background-size: cover; background-position: center; height: 100%; overflow: hidden;">
				<div class="bottom-gradient" style="min-height: 150px; position: absolute; bottom: 0; left: 0px; background-image: linear-gradient(to bottom, rgba(3,38,56, 0) 0.1%, #022538 94%); width: 100%;
				height: 100px; display: flex; display: -ms-flexbox; display: -webkit-box; -webkit-box-align: baseline; -ms-flex-align: baseline; align-items: baseline; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; -webkit-box-pack: end; justify-content: flex-end; padding: 0 20px 20px 20px;">
				</div>
		</div>
</div>
</div>
<div class="container-fluid angled-bottom" style="background-color: #022537; color: white; padding-bottom: 10rem; position: relative;">
	<div class="row">
		<div class="col-sm-12 col-md-2">
				<ul style="list-style: none; margin-top: 3rem; padding: 0px;">
					<li style="margin: 10px;"> <a style="font-size: 13px;" target="_blank" class="btn btn-primary-rounded" href="https://secure.qgiv.com/for/rpldonpag">Donate</a> </li>
          <li style="margin: 10px;"> <a style="font-size: 13px;" target="_blank" class="btn btn-primary-rounded" href="https://smile.amazon.com/gp/chpf/homepage/ref=smi_chpf_redirect?ie=UTF8&ein=54-1856348&ref_=smi_ext_ch_54-1856348_cl">Amazon Smile</a> </li>
          <li style="margin: 10px;"> <a style="font-size: 13px;" class="btn btn-primary-rounded" href="#contact">Contact</a> </li>
          <li style="margin: 10px;"> <a style="font-size: 13px;" class="btn btn-primary-rounded" href="#Members">Members</a> </li>
				</ul>
		</div>
		<div class="col-sm-12 col-md-8">
			<div class="head-text-col col-sm-12" style="margin-top: 2rem;">
				<div class="" style="text-align: left; color: white; font-size: 40px; font-weight: bold; text-shadow: 2px 2px 2px rgba(0,0,0,0.5); text-transform: uppercase;">
					 Who We Are
				</div>
				<p>The RPL Foundation is a charitable non-profit created to further promote and develop the Library's mission and its programs. Through grants and donations, the Foundation aims to extend the Library's public programming and community outreach, enabling the Library to become more accessible and responsive to its patrons.</p>
			</div>
		</div>
		<div class="col-sm-12 col-md-2">
		</div>
	</div>
</div>
<?php
// get_template_part('template-parts/discovery/content', 'intro_new');
get_template_part( 'template-parts/general/content', 'list-full-width' );
get_template_part('template-parts/homepage/content', 'newsletter');
?>
<div class="container-fluid bottom-arrow-divider" style="position: relative;"></div>
<div id="contact" class="container-fluid" style="background-color: #012536; padding: 20px; padding-top: 200px;">
  <div class="container" style="text-align: center;">
    <h1 style="color: white;">Get In Touch</h1>
    <p style="color: white;"> For memorial or tribute gifts, planned gifts, pledges, gifts of stock and corporate donations, or any other donations, contact <strong>Susan Revere</strong>.</p>
    <div class="flex-container">
      <a class="contact" href="https://rvalibrary.org/about/locations/main-library/">
        <div class="">
          <i class="fas fa-map-marker-alt"></i>
          <p>101 East Franklin St</p>
        </div>
      </a>
      <a class="contact" href="tel:+18046465511">
        <div class="">
          <i class="fas fa-phone"></i>
          <p>804-646-5511</p>
        </div>
      </a>
      <a class="contact" href="mailto:susan.revere@richmondgov.com">
        <div class="">
          <i class="fas fa-envelope"></i>
          <p>susan.revere@richmondgov.com</p>
        </div>
      </a>
    </div>
  </div>
</div>
<div class="container-fluid">
  <script type = "text/javascript">_dafdirect_settings="541856348_1111_870cfcb1-3eb8-4020-bb5f-6c8850a8e6f4"</script><script type = "text/javascript" src= "https://www.dafdirect.org/ddirect/dafdirect4.js"></script>
</div>
<?php
get_template_part( 'template-parts/general/content', 'button-list' );
endif;
get_footer();
?>

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
