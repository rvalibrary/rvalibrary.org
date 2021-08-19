<?php
/*
 Template Name: Richmond Speaks
 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
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
    border-color: transparent white transparent transparent;
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

.col-sm-12 li{
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

<?php get_template_part('template-parts/general/content', 'angled-header');?>

<?php
$collections = new WP_Query( array(
  'post_type' => 'oral_history',
  'orderby' => array(
    'date' => 'DESC'
  ),
  'meta_query' => array(
    array(
      'key' => 'type',
      'value' => 'collection',
    ),
  )
));
?>

<section class="discovery_section">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h3>Collections</h3>
      <hr class="thick" style="margin-bottom: 20px;">
    </div>
  </div>
    <?php $counter = 1; ?>
    <?php while($collections->have_posts()) : $collections->the_post(); ?>
    <?php if($counter % 2 === 1 ): ?>
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12 discovery_featured_div">
        <a href="https://rvalibrary.org/richmond-speaks/collections/?collection=<?php echo get_field('collection_title'); ?>">
          <div style="background-image: url('<?php echo get_field('collection_image'); ?>')">
            <div class="discovery_overlay"></div>
          </div>
          <h4><?php echo get_field('collection_title'); ?></h4>
        </a>
      </div>
    <?php else: ?>
      <div class="col-md-6 col-sm-12 col-xs-12 discovery_featured_div">
        <a href="https://rvalibrary.org/richmond-speaks/collections/?collection=<?php echo get_field('collection_title'); ?>">
          <div style="background-image: url('<?php echo get_field('collection_image'); ?>')">
            <div class="discovery_overlay"></div>
          </div>
          <h4><?php echo get_field('collection_title'); ?></h4>
        </a>
      </div>
    </div>
    <?php endif; ?>
    <?php $counter += 1; ?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>
<?php get_template_part('template-parts/homepage/content', 'newsletter'); ?>
<?php
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
