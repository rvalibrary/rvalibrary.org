<?php
  $quote_array = [];
  $quote_loop = new WP_Query( array('post_type' => 'quote'));
  $i = 0;
  while( $quote_loop ->have_posts()) : $quote_loop->the_post();
    $quote_sub = [get_field('quote'), get_field('author')];
    $quote_array[$i] = $quote_sub;
    $i++;
  endwhile;
  wp_reset_postdata();
  $randomQuoteIndex = rand(0,count($quote_array)-1);
 ?>


<div class="container search-float">
  <i class="fa fa-quote-left" id="header_quote_left"></i>
  <span style="color: white; z-index: 99; position: relative;" id="header_quote">
    <?php
      $default_quote = 'The only thing that you absolutely have to know, is the location of the library.';
      echo (count($quote_array) == 0 ? $default_quote : $quote_array[$randomQuoteIndex][0]);
    ?>
  </span>
  <i class="fa fa-quote-right" id="header_quote_right"></i>
  <hr style="position: relative; border-top: 2px solid white; margin: 10px 0; background-color: transparent;">
  <span style="color: white; z-index: 99; position: relative;" id="header_quote_author">
    <?php
      $default_author = 'Albert Einstein, Physicist';
      echo (count($quote_array) == 0 ? $default_author : ($quote_array[$randomQuoteIndex][1] == '' ? 'Unknown' : $quote_array[$randomQuoteIndex][1])    );
    ?>
  </span>

  <form style="display:flex; " class="searchbar_form" role = "search" id="searchform" action="http://ibistro.ci.richmond.va.us/uhtbin/cgisirsi/x/0/0/123?" method="get"
                 onsubmit="_gaq.push(['_trackEvent','Catalog','Search',this.href]);">
    <div class="form-group searchbar-wrapper" style="display: flex; flex-grow: 1;">
      <div class="search_choice_overlay"><div class=""><span>Search the <span class="catalog_selection_click">Catalog</span> or <span class="site_selection_click">Site</span></span></div></div>
      <input class="" id="searchbar" placeholder="Search the Catalog" id="keywords" name="searchdata1" type="text">
      <button id="searchbutton" disabled type="submit" style="display:flex; justify-content: center;"><i style="align-self: center;" class="fa fa-search"></i></button>
    </div>
  </form>
</div>
