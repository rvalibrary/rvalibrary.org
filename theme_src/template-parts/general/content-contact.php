<style media="screen">
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

div#contact p {
  color: white;
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

.bottom-arrow-divider-top:after{
  position: absolute;
    bottom: -80px;
    left: 0;
    width: 100%;
    z-index: 1;
    content: '';
    border-style: solid;
    border-width: 80px 50vw 0px;
    border-color: #fcfbf8 #012536 white #012536;
}
</style>

<div class="container-fluid bottom-arrow-divider-top" style="position: relative;"></div>

<div id="contact" class="container-fluid" style="background-color: #012536; padding: 20px; padding-top: 200px;">
  <div class="container" style="text-align: center;">
    <h1 style="color: white;"><?php echo get_field('contact_header_text'); ?></h1>
    <?php echo get_field('contact_header_paragraph_text'); ?>
    <div class="flex-container">
      <?php if(get_field('contact_use_phone')): ?>
      <a class="contact" href="tel:<?php echo get_field('contact_phone_number'); ?>">
        <div class="">
          <i class="fas fa-phone"></i>
          <p><?php echo get_field('contact_phone_number'); ?></p>
        </div>
      </a>
      <?php endif; ?>
      <?php if(get_field('contact_use_email')): ?>
      <a class="contact" href="mailto:<?php echo get_field('contact_email_address'); ?>">
        <div class="">
          <i class="fas fa-envelope"></i>
          <p><?php echo get_field('contact_email_address'); ?></p>
        </div>
      </a>
      <?php endif; ?>
      <?php if(have_rows('contact_links')): ?>
        <?php while(have_rows('contact_links')): the_row(); ?>
      <a class="contact" href="<?php echo get_sub_field('contact_href'); ?>">
        <div class="">
          <?php echo get_sub_field('contact_icon_markup'); ?>
          <p><?php echo get_sub_field('contact_link_text'); ?></p>
        </div>
      </a>
      <?php endwhile; ?>
    <?php endif; ?>
    </div>
  </div>
</div>
