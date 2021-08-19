<?php
	if(have_rows('tiles_text_layout')):
		while(have_rows('tiles_text_layout')) : the_row();
			$tile_text_select			=		get_sub_field('tile_text_select');
			$text 								=		get_sub_field('text');
			if ($tile_text_select == 'text'):
				if ($text['background_color'] == '#ffffff'){
					$font_color = 'black';
				} else {
					$font_color = 'white';
				}
?>
				<div id = "<?php echo sanitize_title($text['sub-section_title']);?>" class="tilepage_fullwidth_text_container"style="background-color: <?php echo $text['background_color'];?>;">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 tilepage_fullwidth_text_col" style="color:<?php echo $font_color;?>;">
								<?php echo $text['text_area'];?>
							</div><!--col-xs-12-->
						</div><!--row-->
					</div><!--container-->
				</div><!--tilepage_text_container-->

<?php
			elseif($tile_text_select == 'tiles'):
				if(have_rows('tile_repeater')):
					while(have_rows('tile_repeater')) : the_row();
						$right_left_image			=			get_sub_field('right_left_image');
						$background_color			=			get_sub_field('background_color');
						$section_title				=			get_sub_field('sub-section_title');
?>
					<section>
						<div class="container-fluid" style="padding: 0 !important;">
<?php
						if($right_left_image == 'left_image'):
							$left_tile_setup		=			get_sub_field('left_tile_setup');
?>

							<div id="<?php echo sanitize_title($section_title);?>" class="row left_image_row">
								<div class="col-sm-6 col-xs-12 tiles_left_image" style="background-image: url('<?php echo $left_tile_setup['left_image'];?>')"></div>
								<div class="col-sm-6 col-xs-12 block_colored tiles_left_text" style="background-color: <?php echo $background_color;?>;">
									<div class="block-padding content_right_block_section">
										<div style="">
											<?php echo $left_tile_setup['left_text'];?>
										</div>
									</div><!-- block_section-->
								</div>
							</div><!--row-->



<?php
						elseif($right_left_image == 'right_image'):
							$right_tile_setup		=			get_sub_field('right_tile_setup');
?>

							<div id="<?php echo sanitize_title($section_title);?>" class="row">
								<div class="col-sm-6 col-xs-12 block_parent_left block_colored" style="background-color: <?php echo $background_color;?>;">
									<div class="block_section block-padding">
										<div class="block_section_child">
											<?php echo $right_tile_setup['right_text'];?>
										</div>
									</div><!-- block_section-->
								</div>
								<div class="col-sm-6 col-xs-12 tiles_right_image" style="background-image: url('<?php echo $right_tile_setup['right_image'];?>')"></div>
							</div><!--row-->
<?php
						endif;//if($right_left_image )
?>
						</div>
					</section>
<?php
					endwhile;//(have_rows('tile_repeater')
				endif;//if(have_rows('tile_repeater')
?>

<?php endif;//if($tile_text_select)?>
<?php
		endwhile;//have_rows('tiles_text_layout')
	endif;//have_rows('tiles_text_layout')
?>
