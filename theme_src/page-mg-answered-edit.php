<?php
/*

 Template Name: Master Gardener - Private View Answered

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

?>

  <!-- ########## COLLAPSIBLE FAQ SECTION ########## -->
  <!-- <div class="faq-answer faq-even" >
    <div class="container">
      <h1 style="margin-bottom: 10px; color: #022437;">Newest Questions</h1>
      <h3>Browse questions and select one or many to answer!</h3>
      <p>Questions are loaded newest to oldest. Click a question title to read more and open the answer page.</p>
      <p>Expand for Question</p>

      <div class="collapsible-container"> -->

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
        $formEntries = GFAPI::get_entries(14, $search_criteria = null, $sorting = null, $paging, $total_count);
        // $formEntries = GFAPI::get_entries(14, $search_criteria = null, null, $paging);
        if(count($formEntries) == 0):
        ?>

        <p style="color: #cf343f;">No entries! Something went wrong.</p>


        <?php
      else: ?>
      <div class="faq-answer faq-even" >
        <div class="container">
          <h1 style="margin-bottom: 10px; color: #022437;">Answered Questions - Page <?php echo $current_page; ?></h1>
          <h3>Browse answered questions to edit.</h3>
          <p>Questions are loaded newest to oldest. Click a question title to read more and open the edit page.</p>
          <?php if($offset != 0): ?>
          <a class="btn btn-primary" href="https://rvalibrary.org/master-gardener/private-view-answered/?offset=<?php echo $offset - $page_size; ?>">Previous</a>
          <?php endif; ?>
          <?php if($offset + $page_size < $total_count): ?>
          <a class="btn btn-primary" href="https://rvalibrary.org/master-gardener/private-view-answered/?offset=<?php echo $offset + $page_size ?>">Next</a>
          <?php endif; ?>
          <div class="collapsible-container">
        <?php $counter = 1;
        foreach($formEntries as $entry):
         ?>

      <div class="faq-header-container">
        <h2 class="faq-header"><span class="dashicons dashicons-plus" style="float: left; cursor: pointer; color: #3e3e3e;"></span>
          <span class="dashicons dashicons-minus" style="float: left;cursor: pointer; color: #3e3e3e;"></span><?php echo $entry[4] ?></h2>
          <?php $counter++; ?>
      </div> <!-- faq-header-container -->

      <div class="text-container">
        <ul style="list-style:none; padding: 15px !important" class="faq-description">
          <?php
            $date_posted = new DateTime($entry[date_created]);
           ?>
           <?php if(unserialize($entry[6])): ?>
             <div class="">
             <?php foreach(unserialize($entry[6]) as $category): ?>
               <span style="margin: 5px; color: #cf343f; font-weight: 600;"><?php echo $category; ?></span>
             <?php endforeach; ?>
             </div>
           <?php endif; ?>
          <span><strong>Date Posted:</strong> <?php echo $date_posted->format("D, M d - g:i a") ?></span>
          <h3 style="margin-top: 10px;">Question</h3>
        <li style="font-size: 11px; font-style: italic; padding-left: 10px; margin: 0 0 20px 10px"><?php echo stripslashes( $entry[3] ); ?></li>
        <h3 style="margin-top: 10px;">Answer</h3>
      <li style="border-left: 2px solid #ff7236; padding-left: 10px; margin-left: 10px;"><?php echo stripslashes( $entry[5] ); ?></li>
      <a style="margin: 10px;" href="https://rvalibrary.org/master-gardener/private-edit-answer?id=<?php echo $entry[id] ?>"><button class="btn btn-primary" type="button" name="button">Edit This Question</button></a>

      </ul><!-- faq-description -->

    </div><!-- text-container -->

<?php endforeach; ?>
<?php endif; ?>

     </div><!-- collapsible-container -->
   </div> <!--container-->
  </div> <!-- faq-answer -->










<?php get_template_part( 'template-parts/content', 'page' ); ?>


<?php get_footer(); ?>
