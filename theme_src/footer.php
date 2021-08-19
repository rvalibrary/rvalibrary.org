<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RPL_Libraria
 */

?>

	</div><!-- #content -->

	<!-- Start: Footer -->
	<footer class="site-footer">
		<!-- start Mosio for Libraries Widget -->
<div id="mosio-widget-container"></div>
<!-- end Mosio for Libraries Widget -->
			<div class="container">
					<div id="footer-widgets">
							<div class="row">
									<div class="col-md-3 col-sm-6 col-xs-12 widget-container ">
											<div id="text-2" class="widget widget_text">
													<h3 class="footer-widget-title h3_hard_coded_heading">Richmond, Virginia</h3>
													<!-- <hr class="small"> -->
													<div class="textwidget">
															All library locations offer programs and classes, event spaces, free wireless internet access, and public use computers.
													</div>
													<address>
															<div class="info">
																<table>
																	<tr>
																		<td style="vertical-align:top; width: 23px;"><i class="fa fa-location-arrow"></i></td>
																		<td><span>101 East Franklin St., Richmond, VA 23219</span></td>
																	</tr>
																</table>


															</div>
															<div class="info">
																	<table>
																		<tr>
																			<td style="vertical-align:top; width: 23px;"><i class="fa fa-envelope"></i></td>
																			<td><span><a target="_blank" rel="noopener" href="https://chat.mosio.com/par/chat/new_chat/mb3505">cyberlibrarian</a></span></td>
																		</tr>
																	</table>
															</div>
															<div class="info">
																<table>
																	<tr>
																		<td style="vertical-align:top; width: 23px;"><i class="fa fa-phone"></i></td>
																		<td><span><a href="tel:012-345-6789">804-646-7223</a></span></td>
																	</tr>
																</table>
															</div>
															<div class="info">
																<table>
																	<tr>
																		<!-- <td style="vertical-align:top; width: 23px;"><i class="fa fa-phone"></i></td> -->
																		<td style="width: 30px;"><span><a href="https://play.google.com/store/apps/details?id=us.sol.RichmondPublicLibrary"><i style="font-size: 30px;" class="fab fa-android"></i></a></span></td>
																		<td><span><a href="https://apps.apple.com/us/app/richmond-public-library-app/id1534581206"><i style="font-size: 30px;" class="fab fa-apple"></i></a></span></td>
																	</tr>
																</table>
															</div>
													</address>
											</div>
									</div>
									<div class="col-md-3 col-sm-6  col-xs-12 widget-container ">
											<div class="widget widget_nav_menu">
												<div>
													<h3 class="footer-widget-title h3_hard_coded_heading">Quick Links</h3>
													<!-- <hr class="small"> -->
													<div class="menu-quick-links-container">
														<?php wp_nav_menu( array( 'theme_location' => 'quick_links' ) );?>
													</div>
												</div>
											</div>
									</div>
									<div class="clearfix hidden-lg hidden-md hidden-xs tablet-margin-bottom"></div>
									<div class="col-md-3 col-sm-6 col-xs-12 widget-container ">
											<div class="widget widget_text">
												<div>
													<h3 class="footer-widget-title h3_hard_coded_heading">Opportunities</h3>
													<!-- <hr class="small"> -->
													<div class="menu-quick-links-container">
														<?php wp_nav_menu( array( 'theme_location' => 'opportunities' ) );?>
													</div>
												</div>

											</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12 widget-container">
										<div>
											<div id="text-4" class="widget widget_text">
													<h3 class="footer-widget-title h3_hard_coded_heading">Follow Us</h3>
													<div class="social_div_container">
														<a href="https://www.facebook.com/RichmondPublicLibrary" target="_blank"><div class="social_div rpl_facebook"><i class="fab fa-facebook-f"></i></div></a>
														<a href="https://twitter.com/rvalibrary" target="_blank"><div class="social_div rpl_twitter"><i class="fa fa-twitter"></i></div></a>
														<a href="https://www.youtube.com/channel/UCPSmqJrGcubvYML4e7o4ZNg/featured" target="_blank"><div class="social_div rpl_youtube"><i class="fab fa-youtube"></i></div></a>
														<a href="https://www.instagram.com/rvalibrary" target="_blank">
															<div class="social_div rpl_instagram">
																<i class="fab fa-instagram" style="z-index: 10;"></i>
																<div class="instagram_background" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;"></div>
															</div>
														</a>
													</div>

											</div>

											<div class="widget widget_text">
													<h3 class="footer-widget-title h3_hard_coded_heading">Translate our page</h3>
													<div id="google_translate_element"></div><script type="text/javascript">
				 function googleTranslateElementInit() {new google.translate.TranslateElement({pageLanguage: 'en', autoDisplay: false, gaTrack: true, gaId: 'UA-78846324-1'}, 'google_translate_element');}</script>
				 <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
											</div>


											<div class="" style="display:flex;">
												<div style="width: 90px; margin-right:10px; "><a href="https://www.rva.gov/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/customization/footer/richmond_logo.gif" alt="Richmond Logo"></a></div>
												<!-- <div style="width: 73px;"><a href="https://www.virginia.gov/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/customization/footer/virginia_seal.png" alt="Richmond Logo"></a></div> -->
											</div>
										</div>


									</div>
							</div>
					</div>
			</div>
			<div class="sub-footer">
					<div class="container">
							<div class="row">
									<div class="footer-text col-md-3">
											<p>&copy; 2018 Richmond Public Library. All rights reserved.</p>
									</div>
									<div class="col-md-9 pull-right">
										<?php wp_nav_menu( array( 'theme_location' => 'footer_bottom',
									 														'menu_class' => false,
																							'menu_id'=> false) );?>
									</div>
							</div>
					</div>
			</div>
	</footer>
	<!-- End: Footer -->

	<div id="scroll-to-top-button">
		<div>
			<i class="fas fa-arrow-up "></i>
		</div>
	</div><!--scroll-to-top-button-->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
