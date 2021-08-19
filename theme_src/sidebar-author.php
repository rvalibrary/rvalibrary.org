<?php if (get_avatar_url(get_the_author_meta('ID'), array('size' => '200'))):?>

<div style="border: 4px solid #003652; margin-top: 15px;">
  <img style="width: 100%;" src="<?php echo get_avatar_url(get_the_author_meta('ID'), array('size' => '400'));?>" alt="">
</div>

<?php endif;?>

<?php if (get_the_author_meta('description')):?>
<div style="margin-top: 10px;">
  <?php echo get_the_author_meta('description');?>
</div>

<?php endif;?>

<?php dynamic_sidebar( 'sidebar-author' ); ?>
