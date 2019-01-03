<?php
/*
Template Name: History
 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>



<div class="container history_container" style="padding-top: 25px; padding-bottom: 25px;">
  <?php if (have_rows('timeline')):?>
    <?php while (have_rows('timeline')): the_row();
      //vars
      $year               =   get_sub_field('year');
      $title              =   get_sub_field('title');
      $year_details       =   get_sub_field('year_details');
      $image              =   get_sub_field('image');
      $image_caption      =   get_sub_field('image_caption');
      $right_align        =   get_sub_field('right_align');
    ?>
      <?php if ($right_align):?>
        <div class="row history_reverse_row" style="margin-top: 3px;">
          <div class="history_year" style=""><strong><?php echo $year;?></strong></div>
          <div class="col-sm-6 history_left_div">
            <div class="history_description pull-right">
              <?php echo $year_details;?>
            </div>
          </div>
          <div class="col-sm-6 history_right_div">
            <div class="history_title">
              <h3 style="margin-bottom: 10px;"><?php echo $title;?></h3>
              <?php if ($image):?>
                <img alt="history_image" class="history_image" src="<?php echo $image;?>" />
                <br>
                <caption><i><?php echo $image_caption; ?></i></caption>
              <?php endif;?>
            </div>
          </div>
        </div>
      <?php else:?>
        <div class="row">
          <div class="history_year" style=""><strong><?php echo $year;?></strong></div>
          <div class="col-sm-6 col-xs-12 history_left_div">

            <h3 style="margin-bottom: 10px;"><?php echo $title;?></h3>
            <?php if ($image):?>
              <img alt="history_image" class="history_image" src="<?php echo $image;?>" />
              <br>
              <caption><i><?php echo $image_caption; ?></i></caption>
            <?php endif;?>
          </div>
          <div class="col-sm-6 col-xs-12 history_right_div">
            <div class="history_description">
              <?php echo $year_details;?>
            </div>


          </div>
        </div>
      <?php endif;?>
    <?php endwhile;?>
  <?php endif;?>



</div>










 </article><!-- #post-<?php the_ID(); ?> -->
 <?php get_footer(); ?>
