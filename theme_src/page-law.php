<?php
/*

 Template Name: Law Library

 */
 $slider_event_args = array(
    "queryStrings" => [
        "cal_id" => ['14747', '7469'],
        "category" => ['38052'],
    ],
);
 set_query_var('slider_args', $slider_event_args);
 set_query_var('use_dropwdown', false);
 set_query_var('get_posts_args', array(
     'numberposts' => 5,
     'category_name' => 'law-library',
     'order' => 'DESC',
     'orderby' => 'date'
   ));

get_header();

get_template_part( 'template-parts/page/content', 'pageheader' );
?>
<?php
get_template_part('template-parts/discovery/content', 'intro_new');
?>
<div class="row top_location_row">
  <div class="col-sm-5 col-xs-12 block_parent_left" style="background-color: #f5f2eb;">
      <div class="block_section block-padding">
        <div class="block_section_child special_block_section">
          <table>
            <tr>
              <td><i class="fas fa-clock"></i></td>
              <td>Monday - Friday<br> 10 - 5</td>
            </tr>
          </table>
          <hr class="medium">
          <table>
            <tr>
              <td><i class="fas fa-phone"></i></td>
              <td>804-646-6500</td>
            </tr>
          </table>
          <hr class="medium">
          <table>
            <tr>
              <td class=""><i class="fas fa-home"></i></td>
              <td class="">101 East Franklin Street Richmond, VA. 23219</td>
            </tr>
          </table>
          <hr class="medium">
          <table>
            <tr>
              <td class=""><i class="fas fa-user-tie"></i></td>
              <td class="">Law Librarian: Meldon Jenkins-Jones</td>
            </tr>
          </table>
          <a href="#gridList"><button class="btn btn-primary" style="margin-top: 20px; width: 100%;">Remote Access</button></a>
        </div>
      </div><!--emphasis_section-->

  </div>
  <div class="col-sm-7 col-xs-12 location_page_image" style="position: relative; background-image: url('https://rvalibrary.org/wp-content/uploads/2019/06/law-library-main2.jpg')">
  </div>
</div><!-- row -->
<?php
get_template_part('template-parts/general/content', 'featured-resource');
get_template_part( 'template-parts/general/content', 'button-list' );
get_template_part('template-parts/discovery/content', 'page_repeater');
get_template_part( 'template-parts/general/content', 'list-full-width' );
get_template_part('template-parts/general/content', 'landing-slider');
?>
<div class="container-fluid blog-widget-container" id="blog" style="background-color: #014865; padding-top: 50px;">
  <div class="container">
    <h2 class="color-white" style="text-align: left">Law Library Blog</h2>
    <hr class="thick margin-sm-bottom">
  </div>
  <?php get_template_part('template-parts/homepage/content', 'new_blog_widget'); ?>
  <div class="container-fluid full-padding" style="background-color: #014865;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="center-content">
          <a href="https://rvalibrary.org/shelf-respect/category/law-library">
            <button id="newsletter_subscribe_button" type="button" name="button">More from the Law Library</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">

</div>



<?php get_footer(); ?>
