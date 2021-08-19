<?php if(get_field('use_parallax')): ?>
<div class="container-fluid parallax-container">
<?php else: ?>
<div class="container-fluid">
<?php endif; ?>
 <img class="parallax-img" src="<?php echo get_field('parallax_background'); ?>" alt="">
 <div class="banner">
   <div class="banner-links">
     <?php
     if(have_rows('banner_links')):
       while(have_rows('banner_links')): the_row();
       ?>
       <a href="<?php echo get_sub_field('banner_link_url'); ?>"><span class="<?php echo get_sub_field('banner_link_icon_class') ?>"></span><?php echo get_sub_field('banner_link_text'); ?></a>
     <?php endwhile; endif; ?>
   </div>
 </div>
</div>

<?php if(get_field('use_parallax')): ?>
  <script type="text/javascript">
  parallaxImg = document.querySelector('.parallax-img');
  if(window.innerWidth > 850) {
    window.addEventListener('scroll', () =>{
      parallaxImg.style.transform = `translate3d(0px, ${window.pageYOffset * 0.1}px, 0px)`;
    })
  }
  </script>
<?php endif; ?>
