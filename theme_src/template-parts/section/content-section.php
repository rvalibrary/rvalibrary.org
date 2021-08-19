<?php
$ancestry               = get_field_object('ancestry');
$is_parent              = ($ancestry['value']=='parent' ? true : false);
$is_grandchild          = ($ancestry['value']=='grandchild' ? true : false);
$is_great_grandchild    = ($ancestry['value']=='greatgrandchild' ? true : false);
$page_id = get_the_ID();
$parent_id = wp_get_post_parent_id($page_id);
$grandparent_id = wp_get_post_parent_id($parent_id);
$great_grandparent_id = wp_get_post_parent_id($grandparent_id);

if($is_parent){
  $mypages = get_pages( array( 'child_of' => $page_id));
  $parent_link = get_page_link($page_id);
  $parent_ancestors = count(get_ancestors($page_id, 'page'));
  $parent_title = get_the_title();
}elseif($is_grandchild){
  $mypages = get_pages( array( 'child_of' => $grandparent_id));
  $parent_link = get_page_link($grandparent_id);
  $parent_ancestors = count(get_ancestors($grandparent_id, 'page'));
  $parent_title = get_the_title($grandparent_id);
}elseif($is_great_grandchild){
  $mypages = get_pages( array( 'child_of' => $great_grandparent_id));
  $parent_link = get_page_link($great_grandparent_id);
  $parent_ancestors = count(get_ancestors($great_grandparent_id, 'page'));
  $parent_title = get_the_title($great_grandparent_id);
}else{
  $mypages = get_pages( array( 'child_of' => $parent_id));
  $parent_ancestors = count(get_ancestors($parent_id, 'page'));
  $parent_link = get_page_link($parent_id);
  $parent_title = get_the_title($parent_id);
}

 ?>

  <?php if ($is_parent){$selected_class = 'current_page_bold';}else{$selected_class = '';}?>
  <h2>Browse <?php  if($is_parent){echo get_the_title();}elseif($is_grandchild){echo get_the_title($grandparent_id);}else{echo get_the_title($parent_id);}?></h2>
  <ul style="list-style: none; margin: 0; padding: 0;">
    <li style="padding: 5px 0; font-family: "Lato", Georgia, Times, serif;">
      <a class="<?php echo $selected_class;?>" href="<?php echo $parent_link;?>"><?php echo $parent_title;?></a>
    </li>
    <?php
      $i = 0;
      foreach ( $mypages as $page ){?>
        <?php if(count($page->ancestors) <= $parent_ancestors + 3):?>
          <?php if ($page->ID == $page_id){$selected_class = 'current_page_bold';}else{$selected_class = '';}?>
          <li style="<?php if(count($page->ancestors) == $parent_ancestors + 2):?>margin-left: 20px;<?php elseif(count($page->ancestors) == $parent_ancestors + 3):?>margin-left: 40px;<?php endif;?>display: flex; align-items: center; border-top: 1px solid rgba(0, 0, 0, .12); padding: 5px 0; font-family: "Lato", Georgia, Times, serif;">
          <?php if ($page->ID == $page_id):?>
            <i style="color: #f94c3f; margin-left: 10px;font-size: 9px;" class="fas fa-circle"></i>
          <?php else:?>
            <i style="color: #f94c3f; margin-left: 10px; font-size: 9px;" class="far fa-circle"></i>
          <?php endif;?>
          <?php
            $section_link = '<a class="'. $selected_class . '" style="margin-left: 15px;" href="' . get_page_link( $page->ID ) . '">';
            $section_link .= $page->post_title;
            $section_link .= '</a>';
            echo $section_link;
          ?>
          </li>
      <?php endif;?>
    <?php $i++; }//foreach?>
  </ul>
