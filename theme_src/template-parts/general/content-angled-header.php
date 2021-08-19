<style media="screen">
.angled-bottom:before{
    position: absolute;
    content: "";
    display: block;
    left: 0px;
    bottom: 0px;
    transform: rotate(180deg);
    border-style: solid;
    border-width: 0 100vw 80px 0;
    border-color: transparent white transparent transparent;
}
</style>

<div class="art-card-header" style="padding: 0px !important; position: relative;">
  <div class="header-gradient-container">
    <h1 class="header-gradient-underline-animated gradient-floating-header invisible" style="
        font-size: 40px; margin: 0 10px;">
        <?php echo get_field('animated_title') ?>
    </h1>
  </div>
		<div class="container-fluid" style="height: 100%; position: relative;">
				<div class="head-text-col col-sm-12" style="position: relative; background-image: url('<?php echo get_field('header_image') ?>'); background-size: cover; background-position: center; height: 100%; overflow: hidden;">
					<div class="bottom-gradient" style="position: absolute; bottom: 0; left: 0px; background-image: linear-gradient(to bottom, rgba(3,38,56, 0) 0.1%, #022538 94%); width: 100%;
					height: 100px; display: flex; display: -ms-flexbox; display: -webkit-box; -webkit-box-align: baseline; -ms-flex-align: baseline; align-items: baseline; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; -webkit-box-pack: end; justify-content: flex-end; padding: 0 20px 20px 20px;">
					</div>
			</div>
	</div>
</div>
<div class="container-fluid angled-bottom" style="background-color: #022537; color: white; padding-bottom: 8rem; position: relative;">
	<div class="row">
		<div class="col-sm-12 col-md-3">
				<ul style="list-style: none; margin-top: 3rem; padding: 0px;">
					<?php
					if( have_rows('intro_links') ):
						 while ( have_rows('intro_links') ) : the_row();
					?>
					<li style="margin: 10px;"> <a style="font-size: 13px;" class="btn btn-primary-rounded" href="<?php echo get_sub_field('link_href'); ?>"><?php echo get_sub_field('link_text'); ?></a> </li>
				<?php endwhile; endif; ?>
				</ul>
		</div>
		<div class="col-sm-12 col-md-7">
			<?php
			if( have_rows('intro') ):
				 while ( have_rows('intro') ) : the_row();
			?>
			<div class="head-text-col col-sm-12" style="margin-top: 2rem;">
				<div class="" style="text-align: left; color: white; font-size: 40px; font-weight: bold; text-shadow: 2px 2px 2px rgba(0,0,0,0.5); text-transform: uppercase;">
					 <?php echo get_sub_field('title'); ?>
				</div>
				<p><?php echo get_sub_field('paragraph'); ?></p>
			</div>
		<?php endwhile; endif; ?>
		</div>
		<div class="col-sm-12 col-md-2">
		</div>
	</div>
</div>
