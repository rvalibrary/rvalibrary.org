<?php


$display_group_titles   =   get_field('display_group_titles');
////////////////////////////////////////////
/////////START GROUP REPEATER LOOP//////////
////////////////////////////////////////////

$list_of_groups = [];
if(have_rows('group_repeater')){
  $i = 0;
  while ( have_rows('group_repeater') ) : the_row();
  $list_of_pages = [];
  $featured_item = [];
  if( have_rows('page_repeater') ){
    $j = 0;
    while ( have_rows('page_repeater') ) : the_row();

      if (get_sub_field('featured') == false){
        $list_of_pages[$j] = ['page'=>get_sub_field('page'),
                              'title'=>get_sub_field('title'),
                              'page_image'=>get_sub_field('page_image'),
                              'description' => get_sub_field('description'),
                              ];
      $j++;
      }else{

        $featured_item =     ['page'=>get_sub_field('page'),
                              'title'=>get_sub_field('title'),
                              'page_image'=>get_sub_field('page_image'),
                              'left' => get_sub_field('left'),
                              'description' => get_sub_field('description'),
                              ];
      }
  endwhile; //page_repeater
  }//page_repeater endif
  $list_of_groups[$i] = ['group_title'=>get_sub_field('group_title'),
                         'list_of_pages' => $list_of_pages,
                         'featured_item' => $featured_item,
                         'three_row' => get_sub_field('three_row'),
                          ];
  $i++;
endwhile;//group_repeater
}//group_repeater endif
?>



<div class="container discovery_container">
<?php for ($i = 0; $i < count($list_of_groups); $i++):?>
  <?php if($list_of_groups[$i]['three_row'] == false):?>
      <section class="discovery_section">
        <div class="row" id="<?php echo sanitize_title($list_of_groups[$i]['group_title']);?>">
          <div class="col-xs-12">
            <?php if($display_group_titles):?>
              <h3><?php echo $list_of_groups[$i]['group_title'];?></h3>
            <?php endif;?>
            <hr class="thick" style="margin-bottom: 20px;">
          </div>
        </div>

      <?php
      if($list_of_groups[$i]['featured_item']):
              if($list_of_groups[$i]['featured_item']['left']):
            ?>
              <!-------------------->
              <!---IF LEFT---------->
              <!-------------------->
              <div class="row">
                  <!-- FEATURED IMAGE -->
                  <div class="col-md-6 discovery_featured_div">
                    <a href="<?php echo $list_of_groups[$i]['featured_item']['page'];?>">
                      <div style="background-image: url('<?php echo $list_of_groups[$i]['featured_item']['page_image'];?>')">
                        <div class="discovery_overlay"></div>
                      </div>
                      <h4><?php echo $list_of_groups[$i]['featured_item']['title'];?></h4></a>
                    <p><?php echo $list_of_groups[$i]['featured_item']['description'];?></p>
                  </div>

                  <!-- IMAGE QUAD -->
                  <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0;">
                  <?php for ($j = 0; $j < count($list_of_groups[$i]['list_of_pages']) && $j < 4; $j++): ?>
                    <?php if($j % 2 == 0){
                      echo "<div class='row' style='margin: 0;'>";
                    }?>
                    <div class="col-sm-6 col-xs-12 discovery_div"><a href="<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page'];?>">
                      <div style="background-image: url('<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page_image'];?>')">
                        <div class="discovery_overlay"></div>
                      </div>
                      <h4><?php echo $list_of_groups[$i]['list_of_pages'][$j]['title'];?></h4></a></div>
                    <?php if($j % 2 != 0){
                      echo "</div><!--row-->";
                    }?>
                  <?php endfor;//list_of_groups?>
                  </div><!--col-sm-6-->
                </div><!--row-->

              <?php if (count($list_of_groups[$i]['list_of_pages']) > 4):?>
                <?php for ($j = 4; $j < count($list_of_groups[$i]['list_of_pages']); $j++):?>
                  <?php if($j % 4 == 0){
                    echo "<div class='row'>";
                  }?>
                  <div class="col-md-3 col-sm-6 col-xs-12 discovery_div"><a href="<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page'];?>">
                    <div style="background-image: url('<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page_image'];?>')">
                      <div class="discovery_overlay"></div>
                    </div>
                    <h4><?php echo $list_of_groups[$i]['list_of_pages'][$j]['title'];?></h4></a></div>
                  <?php if($j % 4 == 3){
                    echo "</div><!--row-->";
                  }elseif($j == count($list_of_groups[$i]['list_of_pages'])-1){
                    echo "</div><!--row-->";
                  }?>
                <?php endfor;?>
              <?php endif; // if > 4 pages?>
              <!-- end if left -->
            <?php else://else right?>
            <!-------------------->
            <!--ELSE RIGHT------>
            <!-------------------->
            <div class="row">
              <!-- IMAGE QUAD -->
              <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0;">
              <?php for ($j = 0; $j < count($list_of_groups[$i]['list_of_pages']) && $j < 4; $j++): ?>
                <?php if($j % 2 == 0){
                  echo "<div class='row' style='margin: 0;'>";
                }?>
                <div class="col-sm-6 col-xs-12 discovery_div"><a href="<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page'];?>">
                  <div style="background-image: url('<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page_image'];?>')">
                    <div class="discovery_overlay"></div>
                  </div>
                  <h4><?php echo $list_of_groups[$i]['list_of_pages'][$j]['title'];?></h4></a></div>
                <?php if($j % 2 != 0){
                  echo "</div>";
                }?>
              <?php endfor;//list_of_groups?>
              </div><!--col-sm-6-->


            </div><!--col-md-6-->
            <!-- FEATURED IMAGE -->
            <div class="col-md-6 discovery_featured_div">
              <a href="<?php echo $list_of_groups[$i]['featured_item']['page'];?>">
                <div style="background-image: url('<?php echo $list_of_groups[$i]['featured_item']['page_image'];?>')">
                  <div class="discovery_overlay"></div>
                </div>
                <h4><?php echo $list_of_groups[$i]['featured_item']['title'];?></h4></a>
              <p><?php echo $list_of_groups[$i]['featured_item']['description'];?></p>
            </div>

            </div><!--row-->

            <?php if (count($list_of_groups[$i]['list_of_pages']) > 4):?>
              <?php for ($j = 4; $j < count($list_of_groups[$i]['list_of_pages']); $j++):?>
                <?php if($j % 4 == 0){
                  echo "<div class='row'>";
                }?>
                <div class="col-md-3 col-sm-6 col-xs-12 discovery_div"><a href="<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page'];?>">
                  <div style="background-image: url('<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page_image'];?>')">
                    <div class="discovery_overlay"></div>
                  </div>
                  <h4><?php echo $list_of_groups[$i]['list_of_pages'][$j]['title'];?></h4></a></div>
                <?php if($j % 4 == 3){
                  echo "</div>";
                }elseif($j == count($list_of_groups[$i]['list_of_pages'])-1){
                  echo "</div>";
                }?>
              <?php endfor;?>

            <?php endif; //if > 4 pages?>
            <!-- end else right -->

            <?php   endif; //if left or right?>




      <?php else: //there's no featured?>


        <!-------------------->
        <!---NO FEATURED------>
        <!-------------------->

        <?php if (count($list_of_groups[$i]['list_of_pages']) > 0):?>
          <?php for ($j = 0; $j < count($list_of_groups[$i]['list_of_pages']); $j++):?>
            <?php if($j % 4 == 0){
              echo "<div class='row'>";
            }?>
            <div class="col-md-3 col-sm-6 col-xs-12 discovery_div">
              <a href="<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page'];?>">
                <div style="background-image: url('<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page_image'];?>')">
                  <div class="discovery_overlay"></div>
                </div>
                <h4><?php echo $list_of_groups[$i]['list_of_pages'][$j]['title'];?></h4>
              </a>
              <p><?php echo $list_of_groups[$i]['list_of_pages'][$j]['description'];?></p>

            </div>
            <?php if($j % 4 == 3){
              echo "</div>";
            }elseif($j == count($list_of_groups[$i]['list_of_pages'])-1){
              echo "</div>";
            }?>
          <?php endfor;?>
        <?php endif; //if > 0 pages?>


      <?php endif; //if there's a featured?>


      </section>

  <?php else:// else if threes = true?>

  <section class="discovery_section">
    <div class="row" id="<?php echo sanitize_title($list_of_groups[$i]['group_title']);?>">
      <div class="col-xs-12">
        <?php if($display_group_titles):?>
          <h3><?php echo $list_of_groups[$i]['group_title'];?></h3>
        <?php endif;?>
        <hr class="thick" style="margin-bottom: 20px;">
      </div>
    </div>


    <?php if (count($list_of_groups[$i]['list_of_pages']) > 0):?>
      <?php for ($j = 0; $j < count($list_of_groups[$i]['list_of_pages']); $j++):?>
        <?php if($j % 3 == 0){
          echo "<div class='row'>";
        }?>
        <div class="col-md-4 col-xs-12 discovery_div threes_discovery">
          <a href="<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page'];?>">
            <div style="background-image: url('<?php echo $list_of_groups[$i]['list_of_pages'][$j]['page_image'];?>')">
              <div class="discovery_overlay"></div>
            </div>
            <h4><?php echo $list_of_groups[$i]['list_of_pages'][$j]['title'];?></h4>
          </a>
          <p><?php echo $list_of_groups[$i]['list_of_pages'][$j]['description'];?></p>

        </div>
        <?php if($j % 3 == 2){
          echo "</div>";
        }elseif($j == count($list_of_groups[$i]['list_of_pages'])-1){
          echo "</div>";
        }?>
      <?php endfor;?>
    <?php endif; //if > 0 pages?>
  </section>



  <?php endif;//end if not threes?>
<?php endfor; // list_of_groups?>






</div>
