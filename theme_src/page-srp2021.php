<?php
/*
Template Name: SRP 2021
 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>

<style media="screen">

article{
  overflow: hidden;
}

p{
  font-size: 18px;
}
.info-card{
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: horizontal;
-webkit-box-direction: normal;
    -ms-flex-direction: row;
        flex-direction: row;
-webkit-box-pack: center;
    -ms-flex-pack: center;
        justify-content: center;
/*   align-items: center; */
min-width: 340px;
min-height: 200px;
max-width: 600px;
border-radius: 7px;
margin: 10px;
border: 3px solid black;
position: relative;
padding: 20px;
-webkit-transition: all .3s ease;
-o-transition: all .3s ease;
transition: all .3s ease;
top: 0;
left: 0;
-webkit-box-flex: 1;
    -ms-flex: 1;
        flex: 1;
}

.info-card:hover{
top: -10px;
}

.info-card:hover:before{
top: 0px;
left: 0px;
}

.info-card:before{
content: '';
position: absolute;
top: -10px;
left: -10px;
background-color: #e71c49;
width: 100%;
height: 100%;
border-radius: 3px;
z-index: -1;
-webkit-transition: all .3s ease;
-o-transition: all .3s ease;
transition: all .3s ease;
}


.left-panel{
width: 33.333%;
height: 95%;
}

.right-panel{
width: 66.666%;
}

.left-panel .circle{
height: 100px;
width: 100px;
border-radius: 50%;
background-color: white;
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-pack: center;
    -ms-flex-pack: center;
        justify-content: center;
-webkit-box-align: center;
    -ms-flex-align: center;
        align-items: center;
}

.number{
font-size: 50px;
font-weight: 300;
}

.card-headertop{
color: white;
font-weight: 200;
letter-spacing: .01px;
margin-left: 25px;
}

.right-panel ul{
color: white;
font-weight: 200;
font-size: 14px;
letter-spacing: .5px;
}

.right-panel ul > li{
padding: 5px 0;
}

.circles{
max-height: 350px;
-webkit-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
        transform: rotate(90deg);
}

.margin-sm{
margin-top: 20px;
margin-bottom: 20px;
}

.justify-content-center{
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.circles-container{
  margin: 0 10px 0 0;
  position: relative;
  top: -10px;
}

.info-card-container{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
}

.box2{
  position: relative;
  width: 95%;
  height: 200px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  background: #fff;
  border-radius: 15px;
  -webkit-transition: all .2s ease;
  -o-transition: all .2s ease;
  transition: all .2s ease;
  -webkit-box-shadow: 0 3.2px 2.2px rgba(0, 0, 0, 0.02),
    0 7px 5.4px rgba(0, 0, 0, 0.028),
    0 12.1px 10.1px rgba(0, 0, 0, 0.035),
    0 19.8px 18.1px rgba(0, 0, 0, 0.042),
    0 34.7px 33.8px rgba(0, 0, 0, 0.05),
    0 81px 81px rgba(0, 0, 0, 0.07);
          box-shadow: 0 3.2px 2.2px rgba(0, 0, 0, 0.02),
    0 7px 5.4px rgba(0, 0, 0, 0.028),
    0 12.1px 10.1px rgba(0, 0, 0, 0.035),
    0 19.8px 18.1px rgba(0, 0, 0, 0.042),
    0 34.7px 33.8px rgba(0, 0, 0, 0.05),
    0 81px 81px rgba(0, 0, 0, 0.07)
}

.box2 svg{
  width: 100%;
  position: absolute;
  -webkit-transform: translate(5px, 5px);
      -ms-transform: translate(5px, 5px);
          transform: translate(5px, 5px);
}

.box2 svg:nth-child(1) path{
  stroke: #f3f3f3;
}

.box2 svg:nth-child(2) path{
  stroke: green;
  stroke-dasharray: 1514;
  stroke-dashoffset: 1514;
}

.animate-path{
  -webkit-animation: draw1 3s linear forwards;
          animation: draw1 3s linear forwards;
}

.box2 svg path{
  stroke: #f3f3f3;
}

.box{
  position: relative;
  width: 100%;
  margin-top: 20px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  border-radius: 15px;
  -webkit-transition: all .2s ease;
  -o-transition: all .2s ease;
  transition: all .2s ease;
}

.box:hover{
  -webkit-transform: translateY(-7px);
      -ms-transform: translateY(-7px);
          transform: translateY(-7px);
}

.box.pulse{
  -webkit-animation: pulse .2s linear forwards;
          animation: pulse .2s linear forwards;
}

.box .percent{
  position: relative;
  width: 150px;
  height: 150px;
}

.box .percent svg{
  position: relative;
  width: 150px;
  height: 150px;
}

.box .percent svg circle{
  width: 150px;
  height: 150px;
  fill: none;
  stroke-width: 10;
  stroke: #000;
  -webkit-transform: translate(5px, 5px);
      -ms-transform: translate(5px, 5px);
          transform: translate(5px, 5px);
  stroke-dasharray: 440;
  stroke-dashoffset: 440;
}

.box .percent svg circle:nth-child(1){
  stroke-dashoffset: 0;
  stroke: #f5f2eb;
}

.box .percent svg circle:nth-child(2){
  stroke-dashoffset: 440;
  stroke: #e71d4a;
}

.box .percent .number{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
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
  color: #ed1f27;
}

.box .percent .number h2{
  font-size: 48px;
  color: #e71d4a;
}

h2.expand{
  -webkit-animation: expand .3s linear forwards;
          animation: expand .3s linear forwards;
}

.box .percent .number span{
  font-size: 22px;
}

.box .text{
  padding: 10px;
  color: #999;
  font-weight: 700;
  letter-spacing: 1px;
}

@-webkit-keyframes expand {
  0%{
    font-size: 48px;
  }
  50%{
    font-size: 60px;
  }
  100%{
    font-size: 48px;
  }
}

@keyframes expand {
  0%{
    font-size: 48px;
  }
  50%{
    font-size: 60px;
  }
  100%{
    font-size: 48px;
  }
}

@-webkit-keyframes draw1 {
  to {
    stroke-dasharray: 3028;
  }
}

@keyframes draw1 {
  to {
    stroke-dasharray: 3028;
  }
}

@-webkit-keyframes spin {
  from{
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  to{
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@keyframes spin {
  from{
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  to{
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@-webkit-keyframes pulse {
  0%{
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  50%{
    -webkit-transform: scale(1.1);
            transform: scale(1.1);
  }
  100%{
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

@keyframes pulse {
  0%{
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  50%{
    -webkit-transform: scale(1.1);
            transform: scale(1.1);
  }
  100%{
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

.srp-img1{
  -webkit-animation: spin 35s linear infinite;
          animation: spin 35s linear infinite;
}

.srp-img4{
  -webkit-animation: spin 30s linear infinite;
          animation: spin 30s linear infinite;
}
</style>

<?php if ( get_field('use_banner_header') ):
  get_template_part( 'template-parts/general/content', 'event-card-banner-header' );
endif; ?>


  <div
  style="
  position: relative;
  "
  class="container-fluid">

    <img
    class="srp-img1"
    style="
    position: absolute;
    z-index: -1;
    top: -300px;
    max-width: 800px;
    min-width: 600px;
    left: -250px;
    "
    src="https://rvalibrary.org/wp-content/uploads/2021/05/06_Tullet_color_72ppi.png"
    alt="">

    <img
    class="srp-img4"
    style="
    position: absolute;
    z-index: -1;
    bottom: -850px;
    right: -350px;
    max-width: 800px;
    min-width: 600px;
    "
    src="https://rvalibrary.org/wp-content/uploads/2021/05/04_Tullet_color_72ppi.png"
    alt="">

</div>
  <div class="container" id="communityGoal">
    <div class="row" style="max-width: 900px; margin: 0 auto; margin-top: 6rem;">
      <div style="display: flex; flex: 3; flex-direction: column;">
        <h1 style="color: black;">Community Goal</h1>
        We are excited to announce we exceeded our goal of 100,000 minutes. We'll be donating $500 to the Central Virginia Food Bank and will post pictures here when we do! We want to say a special THANK YOU to all the readers in our community who helped us reach this goal!
      </div>
    </div>
    <div class="box">
      <div class="percent">
        <svg>
          <circle
          r="70"
          cy="70"
          cx="70">
          </circle>
          <circle
          class="animate"
          r="70"
          cy="70"
          cx="70">
          </circle>
        </svg>
        <div class="number">
          <h2 id="percentAnimating" data-val="<?php echo get_field('minutes_read') ?>">0</h2><span>%</span>
        </div>
      </div>
      <h2 class="text">Progress</h2>
      <div class="hidden" id="totalMinutes">
        <h1><?php echo get_field('minutes_read') ?></h2>
        <span>Minutes Read</span>
      </div>
    </div>
  </div>
  <div class="container" style="text-align: center;">
    <img class="circles" src="https://srp2021-assets.s3.amazonaws.com/08_Tullet_color_72ppi.png" alt="">
  </div>

<?php get_template_part( 'template-parts/general/content', 'featured-resource' ); ?>
<?php get_template_part( 'template-parts/general/content', 'button-list' ); ?>
<?php get_template_part( 'template-parts/general/content', 'button-list2' ); ?>

<script type="text/javascript">
  const box = document.querySelector('.box');
  let attempts = 0;
  const number = parseInt(document.querySelector('#percentAnimating').getAttribute('data-val'));
  const endingNum = 100000;
  let percentage = Math.floor((number / endingNum) * 100);
  const strokeOffset = (440 - (440 * percentageMax() ) / 100);
  if(attempts === 0 && window.scrollY >= document.querySelector('.box').getBoundingClientRect().top){
    changingNumber(0, percentage, document.querySelector('#percentAnimating'), 3000);
    attempts++;
  }
  window.addEventListener('scroll', initChangingNumber);

  function initChangingNumber() {
    const boxDistance = document.querySelector('.box').getBoundingClientRect().bottom - document.querySelector('.box').offsetHeight;
    if(Math.floor(window.scrollY) >= boxDistance && attempts === 0){
      changingNumber(0, percentage, document.querySelector('#percentAnimating'), 3000);
      window.removeEventListener('scroll', initChangingNumber);
      attempts++;
    }
  }

  function setUpStyles() {
    const style = document.createElement('style');
    style.type = 'text/css';
    const keyFrames = `
    @keyframes draw {
        to {
            stroke-dashoffset:${strokeOffset};
        }
    }
    @keyframes draw {
        100% {
            stroke-dashoffset:${strokeOffset};
        }
    }`;
    style.innerHTML = keyFrames;
    document.getElementsByTagName('head')[0].appendChild(style);
    document.querySelector('.animate').style.animation = "draw 3s linear forwards";
  }

  function percentageMax() {
    if(percentage > 100){
      percentage = 100;
      return percentage;
    } else {
      return percentage;
    }
  }

  function changingNumber(start, end, selector, duration) {
    setUpStyles();
    if(start === end) return;
    let current = start;
    const range = end - start;
    const increment = end > start ? 1 : -1;
    const stepTime = Math.abs(Math.floor(duration / range));
    let timer = setInterval(function() {
      current += increment;
      selector.innerText = current;
      if(current === 100 || current === end){
        document.querySelector('#totalMinutes').classList.remove('hidden');
        clearInterval(timer);
        box.classList.add('pulse');
        document.querySelector('#percentAnimating').classList.add('expand');
      }
    }, stepTime);
  }
  addEventListener('load', () => {
    // expandingBtnList();
    Array.from(document.querySelectorAll('.expanding-btn-container')).forEach(function(node) {
      expandingBtnListWithNode(node);
    })
  })
</script>
 <?php get_footer(); ?>
