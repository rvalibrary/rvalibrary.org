<?php
/*

 Template Name: Marketing Submissions View

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

?>

        <?php
        $offset = $_GET['offset'] || 0;
        $page_size = 10;
        if($offset == 0){
          $offset = 0;
          $current_page = 1;
        } elseif($offset > 0) {
          $offset = $_GET['offset'];
          // echo $offset;
          $current_page = ($offset / $page_size) + 1;
        } else {

        }
        $search_criteria['field_filters'][] = array();
        $paging = array('offset' => $offset, 'page_size' => $page_size);
        $total_count;
        $formEntries = GFAPI::get_entries(6, $search_criteria = null, $sorting = null, $paging, $total_count);
        // $formEntries = GFAPI::get_entries(14, $search_criteria = null, null, $paging);
        if(count($formEntries) == 0):
        ?>

        <p style="color: #cf343f;">No entries! Check back later.</p>


        <?php
      else: ?>
      <div class="faq-answer faq-even" >
        <div class="container">
          <h1 style="margin-bottom: 10px; color: #022437;">Marketing Submissions - Page <?php echo $current_page; ?></h1>
          <h3>Click titles to expand details</h3>
          <p>Submissions are loaded newest to oldest. Click to expand details</p>
          <?php if($offset != 0): ?>
          <a class="btn btn-primary" href="https://rvalibrary.org/marketing-submission-view/?offset=<?php echo $offset - $page_size; ?>">Previous</a>
          <?php endif; ?>
          <?php if($offset + $page_size < $total_count): ?>
          <a class="btn btn-primary" href="https://rvalibrary.org/marketing-submission-view/?offset=<?php echo $offset + $page_size ?>">Next</a>
          <?php endif; ?>
          <div class="collapsible-container">
        <?php $counter = 1;
        foreach($formEntries as $entry):
         ?>

      <div class="faq-header-container">
        <h2 class="faq-header"><span class="dashicons dashicons-plus" style="float: left; cursor: pointer; color: #3e3e3e;"></span>
          <span class="dashicons dashicons-minus" style="float: left;cursor: pointer; color: #3e3e3e;"></span><?php echo $entry[1] ?></h2>
          <?php $counter++; ?>
      </div> <!-- faq-header-container -->

      <div class="text-container">
        <ul style="list-style:none; padding: 15px !important" class="faq-description">
          <?php
            $date_posted = new DateTime($entry[date_created]);
           ?>
          <span><strong>Date Posted:</strong> <?php echo $date_posted->format("D, M d") ?></span>
          <h3 style="margin-top: 10px;">Submitted by:</h3>
          <span><?php echo $entry[13] ?></span>
          <h3 style="margin-top: 10px;">Contact:</h4>
          <span><a href="mailto:<?php echo $entry[14] ?>"><?php echo $entry[14] ?></a></span>
        <h3 style="margin-top: 10px;">Program Name:</h3>
        <span><?php echo $entry[1] ?></span>
        <h3 style="margin-top: 10px;">Mode of Attendance:</h3><span><?php echo $entry[17] ?></span>
        <h3 style="margin-top: 10px;">Locations:</h3><?php
          foreach($entry as $key=>$value){ ?>
            <div class="">
              <?php if(strpos($key, '30') !== false && $value): ?>
                <?php echo $value; ?>
              <?php endif; ?>
            </div>
          <?php } ?>

        <?php if(unserialize($entry[16])): ?>
          <div class="">
          <h3 style="margin-top: 10px;">Dates:</h3>
          <?php foreach(unserialize($entry[16]) as $date): ?>
            <span style="margin: 5px; color: #cf343f; font-weight: 600;"><?php echo $date; ?></span>
          <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <h3 style="margin-top: 10px;">Registration Required?:</h3><span><?php echo $entry[31] ?></span>
        <?php if($entry[19] === 'Yes'): ?>
          <?php echo $entry[20]; ?>
        <?php endif; ?>

        <h3 style="margin-top: 10px;">Audience:</h3><?php
          foreach($entry as $key=>$value){ ?>
            <div class="">
              <?php if(strpos($key, '26') !== false && $value): ?>
                <?php echo $value; ?>
              <?php endif; ?>
            </div>
          <?php } ?>

          <h3 style="margin-top: 10px;">Libcal Link:</h3>
          <span>
            <a href="<?php echo $entry[19]; ?>">
              <?php echo $entry[19] ?>
            </a>
          </span>

          <h3 style="margin-top: 10px;">Blurb:</h3>
          <span><?php echo $entry[8] ?></span>

          <h3 style="margin-top: 10px;">Presenter(s)/Partners:</h3>
          <span><?php echo $entry[24] ?></span>

          <?php if(unserialize($entry[22])): ?>
            <div class="">
            <h3 style="margin-top: 10px;">Hashtags for Social Media:</h3>
            <?php foreach(unserialize($entry[22]) as $hashtag): ?>
              <span style="margin: 5px; color: #cf343f; font-weight: 600;"><?php echo $hashtag; ?></span>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <h3 style="margin-top: 10px;">Additional Information:</h3>
          <span><?php echo $entry[25] ?></span>

      </ul><!-- faq-description -->

    </div><!-- text-container -->

<?php endforeach; ?>
<?php endif; ?>

     </div><!-- collapsible-container -->
   </div> <!--container-->
  </div> <!-- faq-answer -->










<?php get_template_part( 'template-parts/content', 'page' ); ?>


<?php get_footer(); ?>
