<?php
$day_of_month         = get_the_date('j');
$month                = get_the_date('M');
?>


<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="blog-detail-main">
				<div class="container">
					<div class="row">
						<div class="blog-page">
								<div class="blog-section">
									<article>
										<div class="blog-detail">
												<header class="entry-header">
													<?php if (get_the_tag_list()):?>
		                      <div class="blog_meta_category">
		                          <?php echo get_the_tag_list('',', ',''); ?>
		                      </div>
		                    <?php endif;?>
														<h2 class="entry-title"><?php the_title();?></h2>
														<div class="entry-meta">
																<span><i class="fa fa-user"></i>&nbsp;<a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></span>
														</div>
												</header>
												<div class="post-thumbnail">
														<div class="post-date-box">
							                  <div class="post-date">
							                      <a class="date" href="<?php echo get_permalink();?>"><?php echo $day_of_month;?></a>
							                  </div>
							                  <div class="post-date-month">
							                      <a class="month" href="<?php echo get_permalink();?>"><?php echo $month;?></a>
							                  </div>
							              </div>
														<?php if ( has_post_thumbnail()) :?>
														<figure class="blog_detail_featured_image" style="height: 400px; background-image: url('<?php echo get_the_post_thumbnail_url();?>')">
														<?php else:?>
														<figure class="blog_detail_featured_image" style="height: 250px; background-image: url('<?php echo get_parent_theme_file_uri(); ?>/assets/images/customization/blog/default_texture_blog.png')">
														<?php endif;?>
														</figure>
												</div>
												<div class="post-detail">
														<div class="post-detail-head" style="display: flex; justify-content: flex-start; padding-right: 20px;">
																<div class="post-share">
																		<div class="post-share-div" style="display: flex; justify-content: center; flex-direction: column;">
																			<a class="blog-meta-link" href="#."><i class="fa fa-comment"></i>&nbsp;<?php echo get_comments_number(); ?></a>
																		</div>

																		<div class="post-share-border"></div>
																		<!--start wp_ulike-->
																		<?php if(function_exists('wp_ulike')){
																			 wp_ulike('get');
																		 }?>
																		<!--end wp_ulike-->

																		<!--start comment views plugin-->
																		<?php if (is_plugin_active($views_plugin_path)):?>
																			<div class="post-share-border"></div>
																			<div class="post-share-div" style="display: flex; justify-content: center; flex-direction: column;">
																				<a class="blog-meta-link" href="#."><i class="fa fa-eye"></i>&nbsp;<?php echo $views;?></a>
																			</div>
																		<?php endif;?>
																		<!--end comment views-->
																		<div class="post-share-border"></div>

																</div><!--post-share-->
																<span class="example-spacer" style="flex: 1 1 auto;"></span>
																<div class="" style="align-self: center;">


																	<!-- AddToAny BEGIN -->
																	 <style>
																		 div.a2a_kit span{display:none;}
																		 div#a2apage_dropdown a{font-family: "Open Sans", Helvetica, Arial, sans-serif;}
																	 </style>

																	 <script type="text/javascript">
																	 var a2a_config = a2a_config || {};
																		 a2a_config.onclick = 2;
																		 // a2a_config.delay = 1000;
																		 a2a_config.linkname = 'Example Page';
																		 a2a_config.linkurl = 'http://www.example.com/page.html';
																	 </script>

																	 <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
																			 <a class="a2a_dd blog-meta-link" href=""><i class="fa fa-share-alt"></i> Share</a>
																	 </div>

																	 <script async src="https://static.addtoany.com/menu/page.js"></script>
																	 <!-- AddToAny END -->

																		<!-- <ul>
																				<li>
																						<a href="#.">
																								<i class="fa fa-facebook"></i>
																								<span>/ Facebook</span>
																						</a>
																				</li>
																				<li><a href="#."><i class="fa fa-twitter"></i> <span>/ Twitter</span></a></li>
																				<li><a href="#."><i class="fa fa-google-plus"></i> <span>/ Google+</span></a></li>
																				<li><a href="#."><i class="fa fa-youtube-play"></i> <span>/ Youtube</span></a></li>
																		</ul> -->
																</div>
																<div class="clearfix"></div>
														</div>
														<div class="entry-content">
															<?php the_content();?>
														</div>
														<?php if (get_the_tag_list()):?>
														<footer class="entry-footer">
																<div class="col-xs-12 col-sm-12 entry-tags">
																		<strong><i class="fa fa-tags" aria-hidden="true"></i> Tags:</strong>
																			<span>
																				<?php echo get_the_tag_list('',', ',''); ?>
																			</span>
																</div>
														</footer>
														<?php endif;?>
												</div>
										</div>
								</article>
								<?php
								if (get_the_author_meta('description')){
									get_template_part( 'template-parts/blog/detail/content', 'aboutauthor' );
								}?>
							</div>
						</div>
					</div><!--row-->
				</div><!--container-->
			</div>
		</div>
	</main>
</div><!--content-->
