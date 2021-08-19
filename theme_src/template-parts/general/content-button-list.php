<style media="screen">
.btn-grid {
list-style: none;
/* margin-left: -40px; */
height: 100%;
}

.gc {
box-sizing: border-box;
display: inline-block;
margin-right: -.25em;
min-height: 1px;
padding-left: 40px;
vertical-align: top;
}

.gc--1-of-3 {
width: 100%;
}

/* .gc--2-of-3 {
width: 66.66666%;
} */

.naccs {
position: relative;
max-width: 900px;
}

.expanding-btn-container{
  display: flex;
  flex-wrap: wrap;
}

.naccs .expanding-btn-container div {
padding: 15px 20px 15px 40px;
margin: 10px 6px;
color: white;
background: #0b5288;
box-shadow: 1px 4px 2px 2px rgb(0 0 0 / 30%);
cursor: pointer;
position: relative;
vertical-align: middle;
font-weight: 700;
height: 100%;
width: fit-content;
transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

.naccs .expanding-btn-container div.active{
  width: 100%;
  height: 400px;
}

.naccs .expanding-btn-container div:hover {
box-shadow: 0px 0px 0px 0px rgb(0 0 0 / 0%);
transform: translate(1px, 4px);
}

.naccs .expanding-btn-container div span.light {
background-color: #faaf24;
position: absolute;
left: 0;
height: 100%;
width: 3px;
top: 0;
border-radius: 0;
}

.naccs .expanding-btn-container div.active {
color: $third-color;
padding: 15px 20px 15px 20px;
}

ul.nacc {
position: relative;
list-style: none;
margin: 0;
padding: 0;
transition: .5s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

ul.nacc li {
opacity: 0;
transform: translateX(50px);
position: absolute;
list-style: none;
transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

ul.nacc li.active {
transition-delay: .3s;
z-index: 2;
opacity: 1;
transform: translateX(0px);
}

ul.nacc li p {
margin: 0;
}

.col-md-4 > p{
  color: white;
}

.text-box > p{
  font-weight: 400;
}

.text-box{
  width: 100% !important;
}
</style>

<div class="container-fluid" id="<?php echo preg_replace("/(\W)+/", "", get_field('header') ); ?>" style="background-color: #013862;">
  <div class="container" style="padding: 2rem 0; min-height: 300px;">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <h1 class="header-gradient-underline"><?php echo get_field('header'); ?></h1>
        <?php echo get_field('description'); ?>
      </div>
      <div class="col-sm-12 col-md-8">
          <div class="naccs">
          <div class="btn-grid">
           <div class="gc gc--1-of-3">
            <div class="expanding-btn-container">
              <?php if(have_rows('buttons')): ?>
                <?php while(have_rows('buttons')): the_row(); ?>
                  <div alt="<?php echo get_sub_field('button_alt'); ?>" class="btn-expand"><span class="light"></span><span><?php echo get_sub_field('button_text'); ?></span></div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
           </div>
          </div>
         </div>
      </div>
    </div>
  </div>
</div>
