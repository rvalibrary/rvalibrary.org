<div class="container-fluid">
  <div class="row top_location_row" style="box-shadow: none !important;">
    <div class="col-sm-5 col-xs-12 block_parent_left">
        <div class="block_section block-padding">
          <div class="block_section_child special_block_section">
            <?php
              if(have_rows('bh_table_items')):
                while(have_rows('bh_table_items')): the_row();
             ?>
             <table>
               <tr>
                 <td><i class="<?php echo get_sub_field('bh_table_items_icon'); ?>"></i></td>
                 <td><?php echo get_sub_field('bh_table_items_text'); ?></td>
               </tr>
             </table>
             <hr class="medium">
            <?php endwhile; endif; ?>
            <?php
              if(have_rows('bh_top_links')):
                while(have_rows('bh_top_links')): the_row();
             ?>
             <a href="<?php echo get_sub_field('bh_top_links_url'); ?>"><button class="btn btn-primary" style="margin-top: 20px; width: 100%;"><?php echo get_sub_field('bh_top_links_text'); ?></button></a>
            <?php endwhile; endif; ?>
          </div>
        </div><!--emphasis_section-->
    </div>
    <div class="col-sm-7 col-xs-12 location_page_image" style="position: relative; background-image: url('<?php echo get_field('bh_image'); ?>')">
    </div>
  </div><!-- row -->
</div>
