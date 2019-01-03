<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RPL_Libraria
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="_globalsign-domain-verification" content="SO_62AMnmrwTnHesBV6zkTax58HlFryotcqQgBEOpx" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"> -->

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

	<?php wp_head(); ?>

<?php
	/*Alerts cookie check*/
	if($_COOKIE['alerts_exited'] == 'true') {
	 echo '
	 <style type="text/css">
		 #alerts_bar {
			 display: none;
		 }
		 #alerts_bar_button {
			 display: none;
		 }
	 </style>';
	}
?>

<?php
	wp_reset_postdata();
	$post_args = array(
	 'orderby'          => 'date',
	 'order'            => 'DESC',
	 'post_type'        => 'post',
	 'post_status'      => 'publish',
	);
	$postslist = get_posts($post_args);
	$post = $postslist[0];

	setup_postdata($post);


	/*Latest post check*/
	if(!is_old_post(1)){
		echo '
		<style type="text/css">
		#shelf_respect:after{
		  font-family: FontAwesome;
		  content: " \f024";
		}
		</style>';
	}

	wp_reset_postdata();

?>


<!-- color: #fdbe12; -->

</head>

<body <?php body_class(); ?>>

<?php rpl_body(); ?>
<!--============================================-->
<!--========== START ALERTS SECTION ============-->
<!--============================================-->

	<?php $alert_loop = new WP_Query( array('post_type' => 'alert', 'orderby' => 'post_id', 'order' => 'DSC')); ?>
	<?php while( $alert_loop ->have_posts()) : $alert_loop->the_post(); ?>


		<div class="" style="" id="alerts_bar">
			<i class="far fa-times-circle" id="alert_exit"></i>
			<?php if(get_field('icons') == 'bell'):?><i class="far fa-bell"></i>&nbsp;<?php endif;?>
			<?php if(get_field('icons') == 'caution'):?><i class="fa fa-warning site-alert--icon"></i>&nbsp;<?php endif;?>
			<span><strong><?php the_field('alert_message'); ?></strong></span>
			<?php if(get_field('icons') == 'caution'):?>&nbsp;<i class="fa fa-warning site-alert--icon"></i><?php endif;?>
			<?php if(get_field('icons') == 'bell'):?>&nbsp;<i class="far fa-bell"></i><?php endif;?>
		</div><!-- alerts_bar -->

		<div id="alerts_bar_button">
			<?php if(get_field('icons') == 'caution'):?><i class="fa fa-warning site-alert--icon"></i><?php endif;?>
			<?php if(get_field('icons') == 'bell'):?><i class="far fa-bell"></i><?php endif;?>

		</div>

	<?php endwhile; ?>
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

	<!--============================================-->
	<!--========== END ALERTS SECTION ==============-->
	<!--============================================-->


<div id="page" class="site">
	<!-- Start: Header Section -->
        <header id="header-v1" class="navbar-wrapper">
					<!-- ////////////////////////// START: TIP TOP NAV SECTION ////////////////////////////////////-->
						<div class="tip-top-nav animated fadeInDown">
							<div class="container" style="color: white;">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<div class="mobile_svg_logo">
										<?php get_template_part('template-parts/header/content', 'svg_logo_updated'); ?>
									</div>
								</a>
								<div class="spacer"></div>
								<?php wp_nav_menu( array( 'theme_location' => 'tippy_top' ) );?>
							</div>
						</div>
					<!-- ////////////////////////// END: TIP TOP NAV SECTION ////////////////////////////////////-->


            <div class="container nav-container">
                    <nav class="navbar navbar-default">

					<!-- ////////////////////////// START: DESKTOP NAV SECTION ////////////////////////////////////-->
											<div id="brand_and_menu_container" style="display: flex; align-items: center; justify-content: flex-end;">
												<div class="rpl-brand"><!--had 'navbar-brand' class -->
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
															<div class="svg_logo">
																<?php get_template_part('template-parts/header/content', 'svg_logo_updated'); ?>
															</div>
															<div class="logo_text">
																Richmond <br>Public<br>Library
															</div>
													</a>
												</div>
												<span style="flex-grow: 1;"></span>
												<div class="primary_menu">
													<?php wp_nav_menu( array( 'theme_location' => 'primary' ) );?>
												</div>

											</div>

					<!-- ////////////////////////// END: DESKTOP NAV SECTION ////////////////////////////////////-->
									      <?php //get_template_part('template-parts/header/content', 'old_mobile_menu'); ?>
                    </nav>
            </div><!--container -->
        </header>
        <!-- End: Header Section -->

	<div id="content" class="site-content">
