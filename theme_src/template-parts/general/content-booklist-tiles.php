<?php if(get_field('use_quick_link_nav')): ?>
  <div class="container margin-big-top margin-big-bottom">
        <div class="row">
          <?php
          if(have_rows('book_list_tiles_section')):
            while(have_rows('book_list_tiles_section')): the_row();
          ?>
           <div class="col-sm-6 col-xs-12 col-lg-4 mr_bb_col">
             <a href="#<?php echo preg_replace("/(\W)+/", "", get_sub_field('book_list_header') ); ?>">
               <div class="button_template_button"><h3><?php echo get_sub_field('book_list_header'); ?></h3></div>
             </a>
           </div><!-- col -->
          <?php
            endwhile;
           endif;
           ?>
        </div><!-- row -->
  </div><!-- quick link container -->
<?php endif; ?>
<div class="container-fluid" style="background-color: #004765;">
<?php
if(have_rows('book_list_tiles_section')):
  while(have_rows('book_list_tiles_section')): the_row();
  $image = get_sub_field('list_tile_background_image');
?>
<div id="<?php echo preg_replace("/(\W)+/", "", get_sub_field('book_list_header') ); ?>" class="container-fluid" style="padding: 3rem 0rem;">
  <?php if(get_sub_field('book_list_header')): ?>
    <div class="container">
      <div class="container" style="">
        <h1 class="color-white" style="text-align: left;"><?php echo get_sub_field('book_list_header'); ?></h1>
        <hr class="thick margin-sm-bottom">
      </div>
    </div>
  <?php endif; ?>
<?php
$bookologistTiles = new TileClass;
if( have_rows('list_tiles_section_repeater') ):
  while( have_rows('list_tiles_section_repeater') ): the_row();?>
<?php
    $bookologistTiles->buildItem(get_sub_field('list_tiles'), $image);
    if( get_sub_field('tile_direction') == 'Right' ){
      $grid = $bookologistTiles->buildRightContainer($bookologistTiles->itemStaging, get_sub_field('use_big_tiles'));
    } else {
      $grid = $bookologistTiles->buildLeftContainer($bookologistTiles->itemStaging, get_sub_field('use_big_tiles'));
    }
    echo $grid;
    $bookologistTiles->itemStaging = array();
?>
<?php
endwhile;
endif;
?>
</div> <!-- inner container-fluid with section ID -->
<?php
endwhile;
endif;
 ?>
 <?php if(get_field('use_bottom_link')): ?>
   <div class="row" style="justify-content: center;">
   <?php if(have_rows('bottom_link_repeater')): ?>
     <?php while(have_rows('bottom_link_repeater')): the_row(); ?>

     <div id="event<?php echo get_row_index(); ?>" class="col-sm-6 col-xs-12 col-lg-4 mr_bb_col">
       <a href="https://<?php echo get_sub_field('bottom_link_href'); ?>">
        <div class="button_template_button">
          <h3><?php echo get_sub_field('bottom_link_text') ?></h3>
        </div>
       </a>
     </div>

    <?php endwhile; ?>
  <?php endif; ?>
  </div>
 <?php endif; ?>
</div><!-- outer container fluid -->
