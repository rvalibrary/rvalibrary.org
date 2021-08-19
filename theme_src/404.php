<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package RPL_Libraria
 */

get_header();
get_template_part( 'template-parts/error/content', 'errorheader' );
?>

        <!-- Start: 404 Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="error-main">
                        <div class="container" style="padding: 80px 0;">
                            <!-- <div class="error-view" style="padding: 20px 0;"> -->
                                <!-- <div class="" style="padding: 20px 0;"> -->
                                  <div class="col-md-5 col-md-offset-1 border-dark new-user">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="error-info bg-light margin-right">
                                                  <h2>OOPS <small>Page Not Found!</small></h2>
                                                  <span>Can't find what you need? Take a moment and do a search below or start from our <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a>.</span>
                                                  <form class="search-404" method="get" action="/" target="_self">
                                                      <input class="input-text" placeholder="Search our site" name="s" type="text" role="search"/>
                                                      <input class="btn btn-primary" type="submit" value="Search" />
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                    <div class="col-md-5  border-dark-left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="error-box bg-dark margin-left text-center">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/customization/404/upset_otter.png" alt="Error Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: 404 Section -->


<?php
get_footer();
