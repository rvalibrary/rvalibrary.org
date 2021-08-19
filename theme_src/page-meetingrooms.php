<?php
/*

Template Name: Meeting Rooms

 */

$intro_section      =     get_field('intro_section');
//////////////////////////////////////////
/////////START EVENT SPACES LOOP//////////
//////////////////////////////////////////
//event space branches
$list_of_branches = [];
if( have_rows('event_spaces_section')){
  $i = 0;
  while ( have_rows('event_spaces_section') ) : the_row();
    //event space branch rooms
    $list_of_rooms = [];
    if( have_rows('event_spaces') ){
      $j = 0;
      while ( have_rows('event_spaces') ) : the_row();
        //event space room specs
        $list_of_specs = [];
        if( have_rows('room_specifications') ){
          $k = 0;
          while ( have_rows('room_specifications') ) : the_row();
            $list_of_specs[$k] = ['spec_title'=>get_sub_field('spec_title'),
                                  'spec_description'=>get_sub_field('spec_description'),
                                  ];
          $k++;
          endwhile;//room_specifications
        }else{
        }
        $list_of_rooms[$j] = ['room_name'=>get_sub_field('room_name'),
                              'room_image'=>get_sub_field('room_image'),
                              'room_details'=>get_sub_field('room_details'),
                              'room_specifications'=> $list_of_specs,
                              'request_url'=>get_sub_field('request_url'),
                              ];
      $j++;
      endwhile; //event_spaces
    }else{
    }
    $list_of_branches[$i] = ['branch_name'=>get_sub_field('branch_name'),
                             'slug'=>get_sub_field('slug'),
                             'list_of_rooms' => $list_of_rooms,
                            ];
    $i++;
  endwhile;//event_spaces_section
}else{
}
/////////END EVENT SPACES LOOP//////////

//////////////////////////////////////////
/////////START STUDY ROOMS LOOP//////////
//////////////////////////////////////////

if( have_rows('study_rooms_section')){
  $i = 0;
  $list_of_study_room_branches = [];
  while ( have_rows('study_rooms_section') ) : the_row();
    if( have_rows('study_rooms') ){
      $j = 0;
      $list_of_study_rooms = [];
    while ( have_rows('study_rooms') ) : the_row();
      //event space room specs
      if( have_rows('room_specifications') ){
        $k = 0;
        $list_of_study_room_specs = [];
        while ( have_rows('room_specifications') ) : the_row();
          $list_of_study_room_specs[$k] = ['spec_title'=>get_sub_field('spec_title'),
                                'spec_description'=>get_sub_field('spec_description'),
                                ];
        $k++;
        endwhile;//room_specifications
      }else{
      }

      $list_of_study_rooms[$j] = ['room_name'=>get_sub_field('room_name'),
                                  'room_image'=>get_sub_field('room_image'),
                                  'room_details'=>get_sub_field('room_details'),
                                  'request_url'=>get_sub_field('request_url'),
                                  'study_room_specs'=>$list_of_study_room_specs,
                                  ];
    $j++;
    endwhile;
    }else{
    }
    $list_of_study_room_branches[$i] = ['branch_name'=>get_sub_field('branch_name'),
                                        'slug'=>get_sub_field('slug'),
                                        'list_of_study_rooms'=>$list_of_study_rooms,];
    $i++;
  endwhile;
}else{
}



get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );
?>

<div class="container-fluid">
  <div class="row left_image_row">
    <div class="col-sm-6 col-xs-12 tiles_left_image mr_intro_image" style="background-image: url(<?php echo $intro_section['image'];?>);"></div>
    <div class="col-sm-6 col-xs-12 block_colored tiles_left_text" style="background-color: #022437;">
      <div class="content_right_block_section mr_intro_container">
        <div class="mr_intro">
          <?php echo $intro_section['intro_description'];?>
            <a href="#event-spaces"><button class="btn btn-primary" style="margin-top: 10px;">See Event Spaces</button></a>
            <span margin-left: 5px;>&nbsp;</span>
            <a href="#study-rooms"><button class="btn btn-primary" style="margin-top: 10px;">See Study Rooms</button></a>
        </div>
      </div><!-- block_section-->
    </div>
  </div><!--row-->

  <div id="event-spaces" class="row">
    <div class="col-xs-12" style="text-align: center; background-color: #003652; padding: 25px 0;">
      <h2>Event Spaces</h2>
    </div><!--col-xs-12-->
  </div><!--row-->

<!--////////////////////////////////////////////////////-->
<!--//////////////EVENT SPACE ANCHOR BUTTONS////////////-->
<!--////////////////////////////////////////////////////-->

<div class="row mr_branch_button_row" style="background-color: #003652;">
  <?php for ($i = 0; $i < count($list_of_branches); $i++):?>
      <div class="col-sm-4 col-xs-6 mr_bb_col"><a href="#<?php echo $list_of_branches[$i]['slug'];?>"><div class="mr_branch_button"><h3><?php echo $list_of_branches[$i]['branch_name'];?></h3></div></a></div>
      <!-- <div class="col-xs-12"><h3 style="color: white;">NO BRANCHES</h3></div> -->
  <?php endfor;?>
</div><!--mr_branch_button_row-->

<!--////////////////////////////////////////////////////-->
<!--//////////////EVENT SPACE BRANCHES//////////////////-->
<!--////////////////////////////////////////////////////-->

<?php for ($i = 0; $i < count($list_of_branches); $i++):?>
        <div id="<?php echo $list_of_branches[$i]['slug'];?>" class="row">
          <div class="col-xs-12 event_space_color mr_branch_title_container">
            <h2 style="color: white;"><?php echo $list_of_branches[$i]['branch_name'];?></h2>
            <!-- <span class="underline center"></span> -->
          </div><!--col-xs-12-->
        </div><!--row-->
        <!--////////////////////////////////////////////////////-->
        <!--//////////////EVENT SPACE BRANCH ROOMS//////////////////-->
        <!--////////////////////////////////////////////////////-->
        <?php for ($j = 0; $j < count($list_of_branches[$i]['list_of_rooms']); $j++):?>
              <section class="event_space_color">
                <div class="row left_image_row" style="background-color: inherit; padding-bottom: 40px;">
                  <div class="col-sm-6 col-xs-12 tiles_left_image mr_room_image_container">
                    <a href="<?php echo $list_of_branches[$i]['list_of_rooms'][$j]['room_image'];?>" target="_blank">
                      <div class="mr_room_image" style="background-image: url('<?php echo $list_of_branches[$i]['list_of_rooms'][$j]['room_image'];?>');">
                        <div class="mr_room_image_title event_space_color_faded"><?php echo $list_of_branches[$i]['list_of_rooms'][$j]['room_name'];?></div>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-xs-12 block_colored tiles_left_text" style="background-color: inherit;">
                    <div class="content_right_block_section mr_room_details">
                      <div class="">
                        <h3><?php echo $list_of_branches[$i]['list_of_rooms'][$j]['room_name'];?>&nbsp;(<?php echo $list_of_branches[$i]['branch_name'];?>)</h3>
                        <?php if ($list_of_branches[$i]['list_of_rooms'][$j]['room_details']):?>
                          <p class="mr_description"><?php echo $list_of_branches[$i]['list_of_rooms'][$j]['room_details'];?></p>
                        <?php endif;?>
                        <table class="mr_specs_table">
                          <!--////////////////////////////////////////////////////-->
                          <!--//////////////EVENT SPACE ROOM SPECS//////////////////-->
                          <!--////////////////////////////////////////////////////-->

                          <?php for ($k = 0; $k < count($list_of_branches[$i]['list_of_rooms'][$j]['room_specifications']); $k++):?>
                              <tr>
                                <td class="mr_titlecell"><?php echo $list_of_branches[$i]['list_of_rooms'][$j]['room_specifications'][$k]['spec_title']; ?>:</td>
                                <td class="mr_datacell"><?php echo $list_of_branches[$i]['list_of_rooms'][$j]['room_specifications'][$k]['spec_description']; ?></td>
                              </tr>
                          <?php endfor;?>
                          <!--//////////////END EVENT SPACE BRANCH ROOMS//////////////////-->
                        </table>
                          <a target = "_blank" href="<?php echo $list_of_branches[$i]['list_of_rooms'][$j]['request_url']?>"><button class="btn btn-primary" style="margin-top: 10px;">Request <?php echo $list_of_branches[$i]['list_of_rooms'][$j]['room_name'];?></button></a>
                      </div>
                    </div><!-- block_section-->
                  </div>
                </div><!--row-->

              </section>
        <?php endfor;?>
        <!--//////////////END EVENT SPACE BRANCH ROOMS//////////////////-->

<?php endfor;?>
<!--//////////////END EVENT SPACE BRANCHES//////////////////-->



  <div class="row">
    <div id="study-rooms" class="col-xs-12" style="text-align: center; background-color: #003652; padding: 25px 0;">
      <h2>Study Rooms</h2>
    </div><!--col-xs-12-->
  </div><!--row-->


  <div class="row mr_branch_button_row" style="background-color: #003652;">
    <?php for ($i = 0; $i < count($list_of_study_room_branches); $i++):?>
      <div class="col-sm-6 col-xs-12 mr_bb_col"><a href="#<?php echo $list_of_study_room_branches[$i]['slug'];?>"><div class="mr_branch_button"><h3><?php echo $list_of_study_room_branches[$i]['branch_name'];?></h3></div></a></div>
    <?php endfor;?>
  </div>

  <!--////////////////////////////////////////////////////-->
  <!--//////////////STUDY ROOM BRANCHES//////////////////-->
  <!--////////////////////////////////////////////////////-->

  <?php for ($i = 0; $i < count($list_of_study_room_branches); $i++):?>
          <div id="<?php echo $list_of_study_room_branches[$i]['slug'];?>" class="row">
            <div class="col-xs-12 study_room_color mr_branch_title_container">
              <h2 style="color: white;"><?php echo $list_of_study_room_branches[$i]['branch_name'];?></h2>
            </div><!--col-xs-12-->
          </div><!--row-->
          <!--////////////////////////////////////////////////////-->
          <!--//////////////EVENT SPACE BRANCH ROOMS//////////////////-->
          <!--////////////////////////////////////////////////////-->
          <?php for ($j = 0; $j < count($list_of_study_room_branches[$i]['list_of_study_rooms']); $j++):?>
                <section class="study_room_color">
                  <div class="row left_image_row" style="background-color: inherit; padding-bottom: 40px;">
                    <div class="col-sm-6 col-xs-12 tiles_left_image mr_room_image_container" style="">
                      <a href="<?php echo $list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['room_image'];?>" target="_blank">
                        <div class="mr_room_image" style="background-image: url('<?php echo $list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['room_image'];?>');">
                          <div class="mr_room_image_title study_room_color_faded"><?php echo $list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['room_name'];?></div>
                        </div>
                      </a>
                    </div>
                    <div class="col-sm-6 col-xs-12 block_colored tiles_left_text" style="background-color: inherit;">
                      <div class="content_right_block_section mr_room_details">
                        <div class="">
                          <h3><?php echo $list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['room_name'];?>&nbsp;(<?php echo $list_of_study_room_branches[$i]['branch_name'];?>)</h3>
                          <?php if ($list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['room_details']):?>
                            <p class="mr_description"><?php echo $list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['room_details'];?></p>
                          <?php endif;?>
                          <table class="mr_specs_table">
                            <!--////////////////////////////////////////////////////-->
                            <!--//////////////STUDY ROOM SPECS//////////////////-->
                            <!--////////////////////////////////////////////////////-->

                            <?php for ($k = 0; $k < count($list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['study_room_specs']); $k++):?>
                                <tr>
                                  <td class="mr_titlecell"><?php echo $list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['study_room_specs'][$k]['spec_title']; ?>:</td>
                                  <td class="mr_datacell"><?php echo $list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['study_room_specs'][$k]['spec_description']; ?></td>
                                </tr>
                            <?php endfor;?>
                            <!--//////////////END EVENT SPACE BRANCH ROOMS//////////////////-->
                          </table>


                          <a target = "_blank" href="<?php echo $list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['request_url']?>"><button class="btn btn-primary" style="margin-top: 10px;">Request <?php echo $list_of_study_room_branches[$i]['list_of_study_rooms'][$j]['room_name'];?></button></a>
                        </div>
                      </div><!-- block_section-->
                    </div>
                  </div><!--row-->

                </section>
          <?php endfor;?>
          <!--//////////////END STUDY ROOMS//////////////////-->
  <?php endfor;?>
  <!--//////////////END STUDY ROOM BRANCHES//////////////////-->

</div><!--container fluid-->








 </article><!-- #post-<?php the_ID(); ?> -->
 <?php get_footer(); ?>
