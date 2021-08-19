<?php
/*

 Template Name: Unanswered Questions

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

?>

  <!-- ########## COLLAPSIBLE FAQ SECTION ########## -->
  <div class="faq-answer faq-even" >
    <div class="container">
      <h1 style="margin-bottom: 10px; color: #022437;">Newest Questions</h1>
      <h3>Browse questions and select one or many to answer!</h3>
      <p>Questions are loaded newest to oldest. Click a question title to read more and open the answer page.</p>
      <p>Expand for Question</p>

      <div class="collapsible-container">

        <?php
        $search_criteria['field_filters'][] = array( 'key' => '8', 'value' => 'false');
        $formEntries = GFAPI::get_entries(13, $search_criteria);

        if(count($formEntries) == 0):
        ?>

        <p style="color: #cf343f;">No new entries! Check back later!</p>


        <?php
      else:
        $counter = 1;
        foreach($formEntries as $entry):
         ?>

      <div class="faq-header-container">
        <h2 class="faq-header"><span class="dashicons dashicons-plus" style="float: left; cursor: pointer; color: #3e3e3e;"></span>
          <span class="dashicons dashicons-minus" style="float: left;cursor: pointer; color: #3e3e3e;"></span>Question <?php echo $counter ?></h2>
          <?php $counter++; ?>
      </div> <!-- faq-header-container -->

      <div class="text-container">
        <ul class="faq-description">
          <?php
            $date_posted = new DateTime($entry[date_created]);
           ?>
          <span><strong>Date Posted:</strong> <?php echo $date_posted->format("D, M d") ?></span>
          <h3 style="margin: 10px;">Question</h3>
        <li><?php echo $entry[6] ?></li>

      </ul><!-- faq-description -->
      <a style="margin: 10px;" href="https://rvalibrary.org/master-gardener/private-add?id=<?php echo $entry[id] ?>"><button class="btn btn-primary" type="button" name="button">Answer This Question</button></a>

    </div><!-- text-container -->

<?php endforeach; ?>
<?php endif; ?>

     </div><!-- collapsible-container -->
   </div> <!--container-->
  </div> <!-- faq-answer -->










<?php get_template_part( 'template-parts/content', 'page' ); ?>


<?php get_footer(); ?>
