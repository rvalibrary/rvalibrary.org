<?php
/*

 Template Name: New Board Page

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

?>


<?php $section_title = get_field("section_title"); ?>

<div class="entry-content" style="padding-top: 0; margin-top: 0;">
  <div class="container" style=" width: 100% !important;">
    <div class="row">
      <!-- left section of page with col md 9 -->
      <div class="col-md-9" style="margin: 0 auto;">
        <div class="container" style="width: 100% !important; text-align: center;">
          <h1 class="section-header"><?php echo $section_title ?></h1>

          <?php
            //check if member card rows exist
            if( have_rows("member_card") ):
              while( have_rows("member_card") ) : the_row();
                $member_image = get_sub_field("image");
                $name = get_sub_field("name");
                $position = get_sub_field("position");
                $term_length = get_sub_field("term_length");
                $date = get_sub_field("date_ending");
           ?>

          <div class="board-container">
            <div class="image-container">
              <img src="<?php echo $member_image['url'] ?>" alt="">
            </div>
            <div class="description-container">

              <h3><?php echo $name ?>
                <!-- check if position field is empty -->
                <?php if($position): ?>
                  <!-- if not empty echo out text -->
                  <span> - <?php echo $position ?></span>
                  <!-- if empty, create empty span tags -->
                <?php else: ?>
                  <span></span>
                <?php endif ?>
                </h3>

              <p><?php echo $term_length ?> Term Ending: <span><?php echo $date ?></span> (Council) </p>
            </div>
          </div>

        <?php
          endwhile;
          endif;
        ?>
      </div> <!-- container -->

    </div><!--col-md-9-->

    <div class="col-md-3">
      <aside class="rpl_sidebar section-sidebar-container">
        <?php get_template_part( 'template-parts/section/content', 'section');?>
      </aside>
    </div><!--col-md-3-->

    </div><!--row-->

  </div><!-- container -->
</div><!-- .entry-content -->



<?php get_template_part( 'template-parts/content', 'page' ); ?>


<?php get_footer(); ?>
