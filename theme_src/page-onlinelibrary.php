<?php
/*

Template Name: Online Library

 */
 $section_toggle = get_field('section');
$list_of_sections = [];
if( have_rows('sections') ):
  $i = 0;
  while( have_rows('sections') ): the_row();
    $list_of_apps = [];
    if( have_rows('apps') ):
      $j = 0;
      while( have_rows('apps') ): the_row();
        $list_of_apps[$j] = [
          'name' => get_sub_field('name'),
          'description' => get_sub_field('description'),
          'image' => get_sub_field('image'),
          'tile_anchor' => get_sub_field('tile_anchor'),
          'url' => get_sub_field('url'),
          'referrer_policy' => get_sub_field('use_referrer_policy'),
        ];
        $j++;
      endwhile;
    endif;
    $list_of_sections[$i] = [
      'section_title' => get_sub_field('section_title'),
      'section_description' => get_sub_field('section_description'),
      'list_of_apps'  => $list_of_apps,
    ];
    $i++;
  endwhile;
 endif;

 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 ?>

<?php get_template_part('template-parts/general/content', 'banner-notification'); ?>

<style media="screen">
  .na.sideButton{
    background-color: #004765 !important;
  }
</style>

<?php if($section_toggle):?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-9">
        <!-- start button section -->
        <div class="row button_template_row ol_button_row">
          <?php for ($i = 0; $i < count($list_of_sections); $i++):?>
            <div class="col-sm-4 col-xs-12 mr_bb_col">
              <a href="#<?php echo sanitize_title($list_of_sections[$i]['section_title']);?>">
                <div class="button_template_button"><h3><?php echo $list_of_sections[$i]['section_title'];?></h3></div>
              </a>
            </div>
          <?php endfor;?>
        </div>
      <!-- end button section -->
      <!-- start category sections -->
        <?php for ($i = 0; $i < count($list_of_sections); $i++):?>
          <div id="<?php echo sanitize_title($list_of_sections[$i]['section_title']);?>"style="text-align: center; background-color: #003652; padding: 10px 0;">
            <h2><?php echo $list_of_sections[$i]['section_title'];?></h2>
          </div>
          <div class="">
            <div class="row">
              <div class="col-xs-12" style="margin-top: 20px;">
                <?php echo $list_of_sections[$i]['section_description'];?>
              </div>
            </div>

          </div>
          <div class="row ol_app_row">
            <?php for ($j = 0; $j < count($list_of_sections[$i]['list_of_apps']); $j++):?>
            <div class="col-md-3 col-sm-4 col-xs-6 ol_app_container" >
              <a href="<?php echo $list_of_sections[$i]['list_of_apps'][$j]['url']?>"
                <?php if($list_of_sections[$i]['list_of_apps'][$j]['referrer_policy']): ?>
                  referrerpolicy="no-referrer-when-downgrade"
                <?php endif; ?>
                >
                <div class="ol_app_div grow" style="background-image:url('<?php echo $list_of_sections[$i]['list_of_apps'][$j]['image']?>')"></div>
              </a>
              <div class="ol_title"><h4><?php echo $list_of_sections[$i]['list_of_apps'][$j]['name']?></h4></div>
              <div class="ol_des"><?php echo $list_of_sections[$i]['list_of_apps'][$j]['description']?></div>
              <?php if ($list_of_sections[$i]['list_of_apps'][$j]['tile_anchor']):?>
                <a href="#<?php echo $list_of_sections[$i]['list_of_apps'][$j]['tile_anchor']?>"><div style="margin-top: 10px;" class="small-btn">Read More</div></a>
              <?php endif;?>
            </div>
            <?php endfor;?>
          </div><!--app row-->
        <?php endfor;?>
      <!-- end category sections -->
    </div>
    <div class="col-md-3">
      <aside class="rpl_sidebar section-sidebar-container">
        <?php get_template_part( 'template-parts/section/content', 'section');?>
        <?php get_sidebar('section');   ?>
      </aside>
    </div>
  </div>
</div>
<?php else:?>
  <div class="container-fluid" style="padding: 0;">

    <!-- start button section -->
    <div class="row button_template_row ol_button_row">
      <?php for ($i = 0; $i < count($list_of_sections); $i++):?>
        <div class="col-sm-4 col-xs-12 mr_bb_col">
          <a href="#<?php echo sanitize_title($list_of_sections[$i]['section_title']);?>">
            <div class="button_template_button"><h3><?php echo $list_of_sections[$i]['section_title'];?></h3></div>
          </a>
        </div>
      <?php endfor;?>
    </div>
  <!-- end button section -->

  <!-- start category sections -->
    <?php for ($i = 0; $i < count($list_of_sections); $i++):?>
      <div id="<?php echo sanitize_title($list_of_sections[$i]['section_title']);?>"style="text-align: center; background-color: #003652; padding: 10px 0;">
        <h2><?php echo $list_of_sections[$i]['section_title'];?></h2>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12" style="margin-top: 20px;">
            <?php echo $list_of_sections[$i]['section_description'];?>
          </div>
        </div>

      </div>
      <div class="row ol_app_row">
        <?php for ($j = 0; $j < count($list_of_sections[$i]['list_of_apps']); $j++):?>
        <div class="col-md-3 col-sm-4 col-xs-6 ol_app_container" >
          <a href="<?php echo $list_of_sections[$i]['list_of_apps'][$j]['url']?>"
            <?php if($list_of_sections[$i]['list_of_apps'][$j]['referrer_policy']): ?>
              referrerpolicy="no-referrer-when-downgrade"
            <?php endif; ?>
          >
            <div class="ol_app_div grow" style="background-image:url('<?php echo $list_of_sections[$i]['list_of_apps'][$j]['image']?>')"></div>
          </a>
          <div class="ol_title"><h4><?php echo $list_of_sections[$i]['list_of_apps'][$j]['name']?></h4></div>
          <div class="ol_des"><?php echo $list_of_sections[$i]['list_of_apps'][$j]['description']?></div>
          <?php if ($list_of_sections[$i]['list_of_apps'][$j]['tile_anchor']):?>
            <a href="#<?php echo $list_of_sections[$i]['list_of_apps'][$j]['tile_anchor']?>"><div style="margin-top: 10px;" class="small-btn">Read More</div></a>
          <?php endif;?>
        </div>
        <?php endfor;?>
      </div><!--app row-->
    <?php endfor;?>
  <!-- end category sections -->
  </div><!--container-fluid-->
<?php endif;?>

<?php if(get_field('use_niche_widget')): ?>
  <a id="azsaclublgq"></a>
<?php endif; ?>

<?php get_template_part( 'template-parts/tilepage/content', 'tilepage' );?>




  </article><!-- #post-<?php the_ID(); ?> -->
  <?php get_footer(); ?>
