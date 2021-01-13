<?php
/*

 Template Name: New YAVA Design

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

?>

<?php
  $logo = get_field('yava_logo');
  $title = get_field('page_title');
  $appLink = get_field('judge_application_link');
?>

<section class="top-section">

  <div class="header-section">
    <img class="icon-img" style="width:370px" src="<?php echo $logo ?>" alt="">
    <h2 class="title-description"><?php echo $title ?></h2>
    <div class="">
      <a class="btn btn-primary" href="#nominate"><div class="">Nominate an Author for the 2022 Award</div></a>
    </div>
    <a href="#about"><div class="quick-links">About</div></a>
    <?php
      $event_section = [];
      $book_section = [];
      $link_ids = [];
      $faq_section = [];
      $past_winners = [];

        if( have_rows('wavy_sections') ):
          while( have_rows('wavy_sections') ) : the_row();

          $section_name = get_sub_field('section_name');
          array_push($link_ids, $section_name);
          $section_design = get_sub_field('section_design_type');

          if($section_design == "Calendar Repeater"):


            if( have_rows('calendar_row') ) :
              while( have_rows('calendar_row') ): the_row();

                $single_event = new stdClass;

                $single_event->dayName = get_sub_field('name_of_day');
                $single_event->month = get_sub_field('month');
                $single_event->year = get_sub_field('year');
                $single_event->day = get_sub_field('day_of_week');
                $single_event->hour = get_sub_field('beginning_hour');
                $single_event->title = get_sub_field('event_title');
                $single_event->description = get_sub_field('event_description');
                $single_event->link = get_sub_field('event_link');
                $single_event->linkText = get_sub_field('link_text');
                $single_event->sectionId = get_sub_field('section_id');


                array_push($event_section, $single_event);

          ?>
          <?php
            endwhile;
            endif;
          ?>

          <?php
            elseif ($section_design == "Book Repeater") :

              if( have_rows('book_row') ):
                while( have_rows('book_row') ): the_row();

                $single_book = new stdClass;

                $single_book->title = get_sub_field('book_title');
                $single_book->author = get_sub_field('book_author');
                $single_book->image = get_sub_field('book_image');
                $single_book->description = get_sub_field('book_description');
                $single_book->link = get_sub_field('book_link_for_catalog');

                array_push($book_section, $single_book);
          ?>

          <?php
            endwhile;
            endif;
          ?>

          <?php
            elseif ($section_design == "Past Winners Section") :

              if( have_rows('past_winners_row') ):
                while( have_rows('past_winners_row') ): the_row();

                $single_winner = new stdClass;

                $single_winner->title = get_sub_field('book_title');
                $single_winner->year = get_sub_field('winning_year');
                $single_winner->author = get_sub_field('book_author');
                $single_winner->image = get_sub_field('book_image');
                $single_winner->authorImage = get_sub_field('author_image');
                $single_winner->description = get_sub_field('book_description');
                $single_winner->link = get_sub_field('book_link_for_catalog');

                array_push($past_winners, $single_winner);
          ?>

          <?php
            endwhile;
            endif;
          ?>

          <?php

            else:

              if( have_rows('faq_row') ):
                while( have_rows('faq_row') ): the_row();

                $faq_row = new stdClass;

                $faq_row->header = get_sub_field('header');
                $faq_row->subHeader = get_sub_field('sub_header');
                $faq_row->faqArr = [];

                if( have_rows('faq_repeater') ):
                  while( have_rows('faq_repeater') ): the_row();

                    array_push( $faq_row->faqArr, get_sub_field('faq') );

                  endwhile;
                endif;
                ?>
                <?php

                  array_push($faq_section, $faq_row);

                  endwhile;
                endif;
              endif; //outermost conditonal checking for content area type

                 ?>

     <a href="#<?php echo $section_name ?>"><div class="quick-links"><?php echo $section_name ?></div></a>

    <?php
      endwhile;
      endif;
    ?>



  </div>

<div class="overlay"></div>
<svg class="white-svg" width="1702" height="150" viewBox="0 0 1702 150" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M717 26.0001C565.8 131.6 176 133.333 0 121V149.5H1701.5V26.0001C1090 188 868.2 -79.5999 717 26.0001Z" fill="white"/>
</svg>

</section>

<div class="container-fluid bg-dark-slate-gray">


<!-- ================ 1st Section ================== -->
<section class="wavy-header">
    <svg class="svg-top" width="1700" height="255" viewBox="0 0 1700 255" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M624 17.9999C135 -57 333 130 -1 212V255H1703V159C1636.67 106.667 1604.89 92.1185 1520 109C1344 144 1126 223 949 130C807.4 55.5999 688 27.8159 624 17.9999Z" fill="#C4C4C4"/>
  </svg>

<svg class="svg-top svg-middle" width="1699" height="207" viewBox="0 0 1699 207" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M495 101C313 118 264 117.4 0 71V207H1699.5V138.5C1696 132.667 1688.88 89 1646 89C1620 89 1582.09 97.1547 1493 54C1365 -7.99998 1287 31 1183 89C1064.37 155.159 946 -12 880 1.00001C836.578 9.55284 749 63 495 101Z" fill="#C4C4C4"/>
</svg>

</section>

<section class="inner-content bg-midnight-blue" id="about">
  <h1 class="press-header">About</h1>

  <div class="container">

    <div class="row">
      <div class="col-sm-12 col-md-2 col-lg-2">

      </div>
      <div class="col-sm-12 col-lg-8 col-md-8" style="margin-top: 20px;">
        <div class="dot-pattern">

        </div>
        <h1 style="color: #fdbe12; padding-bottom: 10px;">About YAVA</h1>
          <p style="font-size: 18px; color: white; padding-bottom: 20px;"> The Richmond Public Library’s annual YAVA Award highlights excellence in writing for readers at the middle and high school level by Virginia authors.  The YAVA Celebration began in 2013 as “Teen ‘13”. It has grown increasingly over the years to include a year-long award process culminating in the spring with our annual celebration.   Beginning in 2020, the YAVA Award winner will be selected by a panel of teen judges and announced during the annual YAVA Celebration.  This is our Library's biggest teen event,  providing readers an opportunity to interact with local authors, learn about current young adult literature, and engage with others in the community.  We value the entire YAVA Award process as an opportunity for teens to connect, engage, and become inspired. </p>
      </div>
      <div class="col-sm-12 col-md-2 col-lg-2">

      </div>
    </div>

  </div>
</section>

<section class="inner-content bg-midnight-blue" id="nominate">
  <!-- <h1 class="press-header">About</h1> -->
  <div class="container">
    <div class="row block-padding">
      <div class="col-sm-4 col-xs-12 margin-md-bottom">
        <div class="block-section">
          <h1 class="header-gradient-underline">Nominate</h1>
          <p class="color-white">It’s time to nominate your favorite Young Adult Virginia Author for the 2022 YAVA Award!</p>
          <br>
          <h3 class="color-gold">Criteria for consideration</h3>
          <ul>
            <li class="color-white">The author must reside in Virginia</li>
            <li class="color-white">The book must have been released during 2020</li>
            <li class="color-white">The book must have been written for readers in middle or high school</li>
            <li class="color-white">The main characters must be at least 13 years of age</li>
            <li class="color-white">The book may be fiction, nonfiction, poetry or graphic novel</li>
          </ul>
          <br>
          <p>The winning author will be recognized and receive a cash prize at the 2022 YAVA Award Celebration at Richmond Public Library on April 16, 2020.</p>
          <p>The nomination period will run from January 15 - February 15, 2021.</p>
          <!-- <button class="btn btn-primary" type="button" name="button">SP&EC Addresses</button> -->
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">
        <div class="block-section">
          <?php gravity_form( 5, $display_title = true, $display_description = true, $field_values = null, $ajax = true, $tabindex, $echo = true ); ?>
        </div>
      </div>
    </div>
  </div>
<!--
    <div class="row">
      <div class="col-sm-12 col-md-2 col-lg-2">

      </div>
      <div class="col-sm-12 col-lg-8 col-md-8" style="margin-top: 20px;">
        <h1 style="color: #fdbe12; padding-bottom: 10px;">About YAVA</h1>
          <p style="font-size: 18px; color: white; padding-bottom: 20px;"> The Richmond Public Library’s annual YAVA Award highlights excellence in writing for readers at the middle and high school level by Virginia authors.  The YAVA Celebration began in 2013 as “Teen ‘13”. It has grown increasingly over the years to include a year-long award process culminating in the spring with our annual celebration.   Beginning in 2020, the YAVA Award winner will be selected by a panel of teen judges and announced during the annual YAVA Celebration.  This is our Library's biggest teen event,  providing readers an opportunity to interact with local authors, learn about current young adult literature, and engage with others in the community.  We value the entire YAVA Award process as an opportunity for teens to connect, engage, and become inspired. </p>
      </div>
      <div class="col-sm-12 col-md-2 col-lg-2">

      </div>
    </div> -->


</section>



<div class="wavy-footer margin-sm-bottom">
  <svg class="white-svg-back-bottom" width="1702" height="150" viewBox="0 0 1702 150" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M717 26.0001C565.8 131.6 176 133.333 0 121V149.5H1701.5V26.0001C1090 188 868.2 -79.5999 717 26.0001Z" fill="white"/>
  </svg>
  <svg class="svg-bottom-back" width="1699" height="207" viewBox="0 0 1699 207" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M495 101C313 118 264 117.4 0 71V207H1699.5V138.5C1696 160.667 1908.88 89 1646 89C1620 89 1582.09 97.1547 1493 54C1365 -7.99998 1287 31 1183 89C1064.37 155.159 946 -12 880 1.00001C836.578 9.55284 749 63 495 101Z" fill="#C4C4C4"/>
  </svg>
  <svg class="svg-bottom" width="1700" height="255" viewBox="0 0 1700 255" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M624 17.9999C135 -57 333 130 -1 212V255H1703V159C1636.67 106.667 1604.89 92.1185 1520 109C1344 144 1126 223 949 130C807.4 55.5999 688 27.8159 624 17.9999Z" fill="#C4C4C4"/>
</svg>
</div>


<!-- ================ 2nd Section ================== -->
<!-- <section class="wavy-header">
    <svg class="svg-top" width="1700" height="255" viewBox="0 0 1700 255" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M624 17.9999C135 -57 333 130 -1 212V255H1703V159C1636.67 106.667 1604.89 92.1185 1520 109C1344 144 1126 223 949 130C807.4 55.5999 688 27.8159 624 17.9999Z" fill="#C4C4C4"/>
    </svg>
</section> -->

<section class="inner-content bg-dark-slate-gray nominee-book-section margin-huge-bottom" id="<?php echo $link_ids[0] ?>">
  <h1 class="press-header"><?php echo $link_ids[0] ?></h1>
  <div class="container book-container book-container-nominees margin-huge-bottom">
    <?php if(count($book_section) != 0) : ?>
    <?php foreach ($book_section as $book) : ?>

  <div class="box nominations nominee-box"><span class="close-btn">X</span>
    <div class="cover-image" style="background-image: url('<?php echo $book->image ?>');"></div>
    <div class="blur-cover" style="
    width: 100%;
    height: 110%;
    position: absolute;
    backdrop-filter: blur(40px);
    -webkit-backdrop-filter: blur(40px);
    background-color: rgba(1,1,1,0.4);
    transition: all .4s ease;
    opacity: 0;">
    </div>
    <div class="description-container">
      <img class="hidden-img" src="<?php echo $book->image ?>" alt="">
      <div class="content">
        <p class="title" style="padding-top: 15px;"><?php echo $book->title ?></p>
        <div class="author"><?php echo $book->author ?></div>
        <div class="description"><?php echo $book->description ?></div>
        <?php if($book->link != "") : ?>
        <a target="_blank" href="<?php echo $book->link ?>"><button style="margin: 20px 20px 20px 0;" type="button" name="button" class="btn btn-primary">Check It Out</button></a>
      <?php endif; ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php else: ?>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 0 auto; padding: 20px;">
      <h1 style="color: white; margin-bottom: 10px;">Nominated Titles Release</h1>
      <p style="color: white; margin-left: 20px;">Check back at the beginning of National Library Week (April 19 - 25) as we'll be announcing this year's nominated authors and titles.</p>
      <p style="color: white; margin-left: 20px;">Meanwhile, browse our <a href="#Past Winners">previous winners</a> and check out their winning books!</p>
    </div>
    </div>
<?php endif; ?>
  </div>
</section>

<!-- <div class="wavy-footer">
   <svg class="svg-bottom" width="1702" height="149" viewBox="0 0 1702 149" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M984.5 123.5C1135.7 17.9 1525.5 16.1667 1701.5 28.5001V0L0 0V123.5C611.5 -38.5 833.3 229.1 984.5 123.5Z" fill="white"/>
  </svg>
</div> -->

<!-- ================ 3rd Section ================== -->
<section class="wavy-header">
    <svg class="svg-top" width="1700" height="255" viewBox="0 0 1700 255" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M624 17.9999C135 -57 333 130 -1 212V255H1703V159C1636.67 106.667 1604.89 92.1185 1520 109C1344 144 1126 223 949 130C807.4 55.5999 688 27.8159 624 17.9999Z" fill="#C4C4C4"/>
    </svg>
    <!-- <svg class="white-svg" width="1702" height="150" viewBox="0 0 1702 150" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M717 26.0001C565.8 131.6 176 133.333 0 121V149.5H1701.5V26.0001C1090 188 868.2 -79.5999 717 26.0001Z" fill="#C4C4C4"/>
    </svg> -->
    <svg class="svg-top svg-middle" width="1699" height="207" viewBox="0 0 1699 207" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M495 101C313 118 264 117.4 0 71V207H1699.5V138.5C1696 132.667 1688.88 89 1646 89C1620 89 1582.09 97.1547 1493 54C1365 -7.99998 1287 31 1183 89C1064.37 155.159 946 -12 880 1.00001C836.578 9.55284 749 63 495 101Z" fill="white"/>
    </svg>
</section>

<section class="inner-content bg-midnight-blue" id="<?php echo $link_ids[1] ?>">
  <h1 class="press-header"><?php echo $link_ids[1] ?></h1>
  <div class="container para-container">

    <?php
      $count = 1;

      foreach ($event_section as $event_obj) :
    ?>

      <?php if($count % 2 == 1) : ?>
        <?php $count++; ?>
    <div class="row event-row">
      <div class="col-sm-12 col-md-4 col-lg-4" style="margin: 0 auto; padding: 20px;">
        <div class="time-card">
          <div class="day-div">
            <?php echo $event_obj->dayName ?>
          </div>
          <div class="main-div">
            <div class="month-year-div">
              <?php echo $event_obj->month ?>
              <span class="ye-year"><?php echo $event_obj->year ?></span>
            </div>
            <div class="ye-day"><?php echo $event_obj->day ?></div>
            <div class="ye-location"><span class="dashicons dashicons-admin-home" style="font-size: 15px;"></span>Main Library</div>
            <?php if ($event_obj->hour != "") : ?>
            <div class="ye-time"><span class="dashicons dashicons-clock"></span><?php echo $event_obj->hour ?></div>
          <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-8 col-lg-8 text-column">
        <h1 <?php if($event_obj->sectionId != ""): ?> id="<?php echo $event_obj->sectionId ?>" <?php endif; ?> style="color: white;"><?php echo $event_obj->title ?></h1>
        <p style="color: white;"><?php echo $event_obj->description ?> </p>
        <?php if ($event_obj->link != ""): ?>
        <a href="<?php echo $event_obj->link ?>"> <button type="button" name="button" class="btn btn-primary"><?php echo $event_obj->linkText ?></button> </a>
      <?php endif; ?>
      </div>
  </div>


<?php else: ?>
  <?php $count++; ?>
  <div class="row event-row">
      <div class="col-sm-12 col-md-4 col-lg-4 col-lg-push-8" style="margin: 0 auto; padding: 20px;">
        <div class="time-card">
          <div class="day-div">
            <?php echo $event_obj->dayName ?>
          </div>
          <div class="main-div">
            <div class="month-year-div">
              <?php echo $event_obj->month ?>
              <span class="ye-year"><?php echo $event_obj->year ?></span>
            </div>
            <div class="ye-day"><?php echo $event_obj->day ?></div>
            <div class="ye-location"><span class="dashicons dashicons-admin-home" style="font-size: 15px;"></span>Main Library</div>
            <?php if ($event_obj->hour != "") : ?>
            <div class="ye-time"><span class="dashicons dashicons-clock"></span><?php echo $event_obj->hour ?></div>
          <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-8 col-lg-8 col-lg-pull-4 text-column">
        <h1 <?php if($event_obj->sectionId != ""): ?> id="<?php echo $event_obj->sectionId ?>" <?php endif; ?> style="color: white;"><?php echo $event_obj->title ?></h1>
        <p style="color: white;"><?php echo $event_obj->description ?> </p>
        <?php if ($event_obj->link != ""): ?>
        <a href="<?php echo $event_obj->link ?>"><button type="button" name="button" class="btn btn-primary"><?php echo $event_obj->linkText ?></button> </a>
        <?php endif; ?>
      </div>
  </div>

<?php endif; ?>
<?php endforeach; ?>

  </div>

</section>

<div class="wavy-footer margin-sm-bottom">
  <svg class="white-svg-back-bottom" width="1702" height="150" viewBox="0 0 1702 150" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M717 26.0001C565.8 131.6 176 133.333 0 121V149.5H1701.5V26.0001C1090 188 868.2 -79.5999 717 26.0001Z" fill="white"/>
  </svg>
  <svg class="svg-bottom-back" width="1699" height="207" viewBox="0 0 1699 207" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M495 101C313 118 264 117.4 0 71V207H1699.5V138.5C1696 160.667 1908.88 89 1646 89C1620 89 1582.09 97.1547 1493 54C1365 -7.99998 1287 31 1183 89C1064.37 155.159 946 -12 880 1.00001C836.578 9.55284 749 63 495 101Z" fill="#C4C4C4"/>
  </svg>
  <svg class="svg-bottom" width="1700" height="255" viewBox="0 0 1700 255" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M624 17.9999C135 -57 333 130 -1 212V255H1703V159C1636.67 106.667 1604.89 92.1185 1520 109C1344 144 1126 223 949 130C807.4 55.5999 688 27.8159 624 17.9999Z" fill="#C4C4C4"/>
</svg>
</div>

<!-- ================ 4th Section ================== -->
<!-- <section class="wavy-header">
    <svg class="svg-top" width="1700" height="255" viewBox="0 0 1700 255" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M624 17.9999C135 -57 333 130 -1 212V255H1703V159C1636.67 106.667 1604.89 92.1185 1520 109C1344 144 1126 223 949 130C807.4 55.5999 688 27.8159 624 17.9999Z" fill="#C4C4C4"/>
    </svg>
</section> -->

<section class="inner-content winners-book-section bg-dark-slate-gray" id="<?php echo $link_ids[2] ?>">
  <h1 class="press-header"><?php echo $link_ids[2] ?></h1>
  <div class="container book-container book-container-winners">

    <?php foreach ($past_winners as $winner) : ?>

  <div class="box winners winner-box"><span class="close-btn">X</span>

    <div class="cover-image" style="background-image: url('<?php echo $winner->image ?>');"><div class="winner-year"><?php echo $winner->year?></div></div>
    <div class="blur-cover" style="
    width: 100%;
    height: 110%;
    position: absolute;
    backdrop-filter: blur(40px);
    -webkit-backdrop-filter: blur(40px);
    background-color: rgba(1,1,1,0.4);
    transition: all .4s ease;
    opacity: 0;">
    </div>
    <div class="description-container">
      <img class="hidden-img" src="<?php echo $winner->authorImage ?>" alt="">
      <div class="content">
        <p class="title" style="padding-top: 15px;"><?php echo $winner->title ?></p>
        <div class="author"><?php echo $winner->author ?></div>
        <div class="description"><?php echo $winner->description ?></div>
        <?php if($winner->link != "") : ?>
        <a target="_blank" href="<?php echo $winner->link ?>"><button style="margin: 20px 20px 20px 0;" type="button" name="button" class="btn btn-primary">Check It Out</button></a>
      <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  </div>
</section>

<!-- <div class="wavy-footer">
   <svg class="svg-bottom" width="1702" height="149" viewBox="0 0 1702 149" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M984.5 123.5C1135.7 17.9 1525.5 16.1667 1701.5 28.5001V0L0 0V123.5C611.5 -38.5 833.3 229.1 984.5 123.5Z" fill="white"/>
  </svg>
</div> -->

<!-- ================ 5th Section ================== -->

<!-- <section class="wavy-header">
    <svg class="svg-top" width="1700" height="255" viewBox="0 0 1700 255" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M624 17.9999C135 -57 333 130 -1 212V255H1703V159C1636.67 106.667 1604.89 92.1185 1520 109C1344 144 1126 223 949 130C807.4 55.5999 688 27.8159 624 17.9999Z" fill="#C4C4C4"/>
    </svg>
</section>

<section class="inner-content" id="about">
  <h1 class="press-header">About</h1>
  <div class="container">

    <div class="row">
      <div class="col-sm-12 col-md-2 col-lg-2">

      </div>
      <div class="col-sm-12 col-lg-8 col-md-8" style="margin-top: 20px;">
        <h1 style="color: #fdbe12; padding-bottom: 10px;">About YAVA</h1>
          <p style="font-size: 18px; color: white; padding-bottom: 20px;"> The Richmond Public Library’s annual YAVA Award highlights excellence in writing for readers at the middle and high school level by Virginia authors.  The YAVA Celebration began in 2013 as “Teen ‘13”. It has grown increasingly over the years to include a year-long award process culminating in the spring with our annual celebration.   Beginning in 2020, the YAVA Award winner will be selected by a panel of teen judges and announced during the annual YAVA Celebration.  This is our Library's biggest teen event,  providing readers an opportunity to interact with local authors, learn about current young adult literature, and engage with others in the community.  We value the entire YAVA Award process as an opportunity for teens to connect, engage, and become inspired. </p>
      </div>
      <div class="col-sm-12 col-md-2 col-lg-2">

      </div>
    </div>

  </div>
</section>

<div class="wavy-footer">
   <svg class="svg-bottom" width="1702" height="149" viewBox="0 0 1702 149" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M984.5 123.5C1135.7 17.9 1525.5 16.1667 1701.5 28.5001V0L0 0V123.5C611.5 -38.5 833.3 229.1 984.5 123.5Z" fill="white"/>
  </svg>
</div>
</div> -->



<?php get_template_part( 'template-parts/content', 'page' ); ?>



<?php get_footer(); ?>
