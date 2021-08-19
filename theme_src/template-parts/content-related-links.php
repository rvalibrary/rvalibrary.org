<?php
$children = get_pages( array(
  'parent'     => wp_get_post_parent_id(get_the_ID()),
  'sort_order' => 'ASC',
  'exclude'    => get_the_ID()

))

 ?>

<div class="container">
    <h1 style="color: #fdbe14; border-bottom: 2px solid #fdbe14; margin: 15px 0px;">Related Links</h1>
      <div class="row">
        <?php
         foreach ($children as $childPage) : ?>
         <div class="col-sm-6 col-xs-12 col-lg-4 mr_bb_col">
           <a href="<?php echo $childPage->guid ?>">
             <div class="button_template_button"><h3><?php echo $childPage->post_title ?></h3></div>
           </a>
         </div>
       <?php endforeach; ?>
      </div>
</div>
