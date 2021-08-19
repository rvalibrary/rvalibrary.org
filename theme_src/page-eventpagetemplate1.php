<?php
/*

Template Name: Event Page Template 1

 */

$alert          = get_field('alert');

 get_header();
  get_template_part( 'template-parts/page/content', 'pageheader' );
 ?>


 <div class="container" style="padding-bottom: 30px;">
   <div class="row">

     <div class="col-sm-9">

       <?php if ($alert['display']):?>
          <div style="background-color: rgb(254, 226, 74); padding: 5px 5px; text-align: center;">
            <span style="font-weight: bold;">
            <i class="far fa-bell" style="margin-right: 5px;"></i>
            <?php echo $alert['text'];?>
            <i class="far fa-bell" style="margin-left: 5px;"></i>
            </span>
          </div>
        <?php endif;?>



     	<div class="entry-content">

        <?php
          // check if the repeater field has rows of data
          if( have_rows('section_repeater') ):
            while ( have_rows('section_repeater') ) : the_row();
              $section_type = get_sub_field('section_type');?>
              <!--TEXT SECTION-->
              <?php if ($section_type == 'text_section'):
                  $text_section = get_sub_field('text_section');?>
                <div class="row">
                  <?php if ($text_section['image_pref'] == 'none'):?>
                    <div class="col-sm-12">
                      <?php if ($text_section['section_title']):?>
                        <h3><?php echo $text_section['section_title'];?></h3>
                      <?php endif;?>
                      <?php echo $text_section['content'];?>
                    </div>

                  <?php elseif($text_section['image_pref'] == 'left'):?>
                  <div class="col-sm-12">
                    <?php if ($text_section['section_title']):?>
                      <h3><?php echo $text_section['section_title'];?></h3>
                    <?php endif;?>
                    <img class="ept_featured_image" style="width: 100%; margin-bottom: 5px;" src="<?php echo $text_section['image'];?>" alt="">
                      <img class="ept_floated_image" style="width: 40%; float: left; margin-right: 10px; margin-top: 5px;" src="<?php echo $text_section['image'];?>" alt="">
                      <?php echo $text_section['content'];?>
                  </div>
                <?php elseif($text_section['image_pref'] == 'right'):?>
                  <div class="col-sm-12">
                    <?php if ($text_section['section_title']):?>
                      <h3><?php echo $text_section['section_title'];?></h3>
                    <?php endif;?>
                    <img class="ept_featured_image" style="width: 100%; margin-bottom: 5px;" src="<?php echo $text_section['image'];?>" alt="">
                      <img class="ept_floated_image" style="width: 40%; float: right; margin-top: 5px; margin-left: 10px;" src="<?php echo $text_section['image'];?>" alt="">
                      <?php echo $text_section['content'];?>
                  </div>
                <?php endif;//if $section_type['image_pref'] == 'none/left/right' ?>
                </div>

              <!--FULL IMAGE SECTION-->
              <?php elseif ($section_type == 'full_image'):
                $full_image = get_sub_field('full_image');?>
                <div class="row" style="margin-bottom: 20px;">
                  <div class="col-sm-12">
                    <img src="<?php echo $full_image;?>" alt="">
                  </div>
                </div>

              <!--BOOK SECTION-->
              <?php elseif ($section_type == 'book_section'):?>
                <div class="book_section" style="margin-bottom: 30px;">
                <?php
                if( have_rows('book_section_repeater') ):?>
                  <?php
                  $book_counter = 1;
                  while ( have_rows('book_section_repeater') ) : the_row();
                  $book_title = get_sub_field('book_title');
                  $book_image = get_sub_field('cover_image');
                  $book_link = get_sub_field('book_link');?>
                  <?php if($book_counter % 4 == 1):?>
                  <div class="row">
                  <?php endif;?>
                    <div class="col-md-3 col-sm-6" style="margin-top: 30px;">
                      <a href="<?php echo $book_link;?>" target="_blank">
                        <img src="<?php echo $book_image;?>" alt="<?php echo $book_title;?> cover">
                      </a>
                      <div style="text-align: center;">
                          <span style="font-size: 18px;"><strong><u><a href="<?php echo $book_link;?>" target="_blank" style="color: black;"><?php echo $book_title;?></a></u></strong></span>
                        <br>
                        <span>
                        By
                        <?php if( have_rows('authors') ):?>
                          <?php
                          $author_counter = 1;
                          while ( have_rows('authors') ) : the_row();
                            $name = get_sub_field('name');
                            $url  = get_sub_field('url');
                            ?>
                            <?php if ($author_counter > 1):?>
                              <br> </span>
                            <?php endif;?>

                            <?php if($url):?>
                              <a href="<?php echo $url;?>" target="_blank"><?php echo $name;?></a>
                            <?php else:?>
						   
                              <?php echo $name;?>
                            <?php endif;?>
                            <?php $author_counter++;
                          endwhile;
                          endif;?>
                        </span>
                      </div>
                    </div><!--col-md-3-->
                  <?php if($book_counter % 4 == 0):?>
                  </div><!-- row-->
                  <?php endif;?>


                <?php
                  $book_counter++;
                  endwhile;
                  if($book_counter % 4 != 1):?>
                  </div><!-- row-->
                  <?php endif;
                else :
                    // no rows found
                endif;?>
              </div><!--book_section-->




              <?php
              endif; //if $section_type == 'text_section/full_image/book_section'
              endwhile;
              ?>
            <?php
            else:
            // no rows found
            endif;
            ?>
      </div><!--entry-content-->
     </div><!--col-sm-9-->




     <div class="col-sm-3">
       <aside class="rpl_sidebar section-sidebar-container">
         <?php get_template_part( 'template-parts/section/content', 'section');?>
         <?php get_sidebar('section');   ?>
       </aside>
     </div><!-- col-sm-3-->
   </div><!--row-->
 </div><!--container-->



 </article><!-- #post-<?php the_ID(); ?> -->
 <?php get_footer(); ?>
