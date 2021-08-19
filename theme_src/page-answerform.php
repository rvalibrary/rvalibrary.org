<?php
/*

 Template Name: Answer Form

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

?>


<?php
$id = $_GET['id'];
$search_criteria['field_filters'][] = array( 'key' => 'id', 'value' => $id );

  $formEntries = GFAPI::get_entries(13, $search_criteria);
  $foundForm = $formEntries[0];

  if($foundForm[8] != "true"):
?>

<?php


 ?>

 <div id="imgModal" class="modal">
   <span class="close">&times;</span>
   <div class="modal-content">
     <button class="submitAnswer2" type="button">Update Answer</button>
     <button style="margin: 0 10px;" class="close2" type="button">Edit</button>
   </div>
 </div>

 <div class="intro_div_holder_shadow" style="background-color: #022437;">
   <div class="container">
       <div class="row">
         <div class="col-xs-12 block_colored tiles_left_text">
           <div class="discovery_intro_container">
             <div class="discovery_browse">
                 <h3 class="h3_hard_coded_heading" style="color: #fdbe12;">Adding Answer to Question...</h3>
                 <!-- <span class="underline left"></span> -->
             </div>
           </div><!-- block_section-->
         </div>
       </div><!--row-->
   </div><!--container-fluid-->
 </div>

<div class="container-fluid" style="text-align: center; margin-bottom: 50px;">
  <h1>Question: </h1>
  <h3>ID: <span class="int"><?php echo $id ?></span></h3>
  <textarea class="text-input" disabled name="name"><?php echo $foundForm[6] ?></textarea>

  <h3>Your Title Here <span style="font-size: 11px; color: #ff7236;" class="saved-state"></span></h3>
  <p style="font-size: 12px;">Please add a fitting title to the question - this will help with users accessing the the Answers Page, making navigation among the questions much easier.</p>
  <input type="text" class="newTitle" name="" value="">

  <h3>Your Answer Here <span style="font-size: 11px; color: #ff7236;" class="saved-state"></span></h3>
  <textarea class="text-input answer" name="name" class="answerArea"></textarea>
  <div class="tag-input-container">
    <div class="headline">Add Categories</div>
    <div class="sub-headline">press enter to add category</div>
    <span style="font-size: 11px; color: #ff7236;" class="saved-state"></span>
    <div id="spanContainer"></div>
    <input class="tag-input-component" type="text">
  </div>
  <div class="button_area">
    <button class="submitAnswer" type="button">Update Answer</button>
  </div>
  <h3 class="saved-notification"></h3>
</div>

<?php else: ?>

  <div class="container-fluid" style="text-align: center; margin-bottom: 50px;">
    <p>Question already has an answer. If you're experiencing trouble, please contact Jonah Butler the site administrator.</p>
    <p>Otherwise, you can go back to the unanswered question list or visit the public answer page below.</p>
  </div>

<?php endif; ?>

<div class="container-fluid" style="text-align: center; background-color: #022437; padding: 30px 15px;">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="row">
        <div class="nav-areas col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <h3 style="color: white;">Answer Another Question</h3>
          <a href="https://rvalibrary.org/master-gardener/private-view/">
            <button class="btn btn-primary" type="button" name="button">Unanswered Questions</button>
          </a>
        </div>
        <div class="nav-areas col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <h3 style="color: white;">Public Answer Page </h3>
          <a href="https://rvalibrary.org/master-gardener/view"
            <button class="btn btn-primary" type="button" name="button">Answer Page</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>




<?php get_template_part( 'template-parts/content', 'page' ); ?>


<?php get_footer(); ?>
