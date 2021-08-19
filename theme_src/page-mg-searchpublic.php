<?php
/*

 Template Name: MG Public Search Page

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

if($_GET['query']){
  $searchVar = htmlspecialchars($_GET['query']);
  $search_criteria = array(
    'status' => 'active',
    'field_filters' => array(
      'mode' => 'any',
      array(
        'key' => '3',
        'operator' => 'contains',
        'value' => $searchVar
      ),
      array(
        'key' => '4',
        'operator' => 'contains',
        'value' => $searchVar
      ),
      array(
        'key' => '5',
        'operator' => 'contains',
        'value' => $searchVar
      ),
      array(
        'key' => '6',
        'operator' => 'contains',
        'value' => $searchVar
      ),
    )
  );
} else {
  $searchVar = htmlspecialchars($_GET['tag']);
  $searchVarQutoes = '"' . $searchVar . '"';
  $search_criteria = array(
    'status' => 'active',
    'field_filters' => array(
      'mode' => 'any',
      array(
        'key' => '6',
        'operator' => 'contains',
        'value' => $searchVar
      ),
    )
  );
}
$page_size = 10;
$offset = $_GET['offset'];
$page_size = 10;
if($offset == 0){
  $current_page = 1;
  $current_page_fixed = $current_page;
} else {
  $current_page = ($offset / $page_size) + 1;
  $current_page_fixed = $current_page;
}
$paging = array('offset' => $offset, 'page_size' => $page_size);
$total_count;
$formEntries = GFAPI::get_entries(14, $search_criteria, $sorting = null, $paging, $total_count);

$categoryArray = array();
foreach ($formEntries as $entry):
  foreach (unserialize($entry[6]) as $category):
    $category = strtolower($category);
    if(!$categoryArray[$category]):
      $categoryArray[$category] = 1;
    else:
      $newVal = $categoryArray[$category] + 1;
      $categoryArray[$category] = $newVal;
    endif;
  endforeach;
endforeach;
?>

<div class="container-fluid header angled-header">
  <div class="layer"></div>
  <div class="row content-layer">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 left-sect">
      <img class="mg-logo" src="https://rvalibrary.org/wp-content/uploads/2020/05/VCE-Master-Gardeners-logo-transparent-2.png" alt="">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 right-sect">
      <h1>Master Gardener</h1>
      <h3>Virtual Help Desk</h3>
      <p>Get help straight from two Master Gardeners</p>
      <div class="">
        <a class="btn btn-primary" href="https://rvalibrary.org/master-gardener/#submit">Submit a Question</a>
      </div>
    </div>
  </div>
</div>


<!-- ########## COLLAPSIBLE FAQ SECTION ########## -->
<div class="faq-answer faq-even" id="faqSection" >
  <div class="container">
    <div class="mg-form-container">
      <form method="get" action="https://rvalibrary.org/master-gardener/search#faqSection">
         <input placeholder="Search something" type="text" value="" name="query">
        <button class="mg-search" type="submit"> <i class="mg-search-icon fa fa-search"></i></button>
      </form>
    </div>

    <?php if( strlen($searchVar) === 0): ?>
    <h1 style="margin-bottom: 10px; color: #022437;">Search Something</h1>
    <p style="padding-bottom: 20px;">Don't see what you're looking for? Search our database, <a href="https://rvalibrary.org/master-gardener/view/">see all questions</a> or submit your own question.</p>
    <?php else: ?>
    <h1 style="margin-bottom: 10px; color: #022437;">Searching: <?php echo $searchVar ?></h1>
    <p style="padding-bottom: 20px;">If you don't see the answer you're looking for, try submitting your question.</p>

    <div style="text-align: center; margin-bottom: 10px;" class="container-fluid">

      <?php $pages = ceil($total_count / $page_size);
      ?>

      <a href="https://rvalibrary.org/master-gardener/search/?query=<?php echo $searchVar?>&offset=0#faqSection">First</a> |

      <!-- if current page is 1 -->
      <?php if($current_page_fixed == 1): ?>

        <?php while($current_page <= $pages && $current_page != 5): ?>
         <?php if($current_page_fixed != $current_page): ?>
          <a href="https://rvalibrary.org/master-gardener/search/?query=<?php echo $searchVar  ?>&offset=<?php echo ($current_page * $page_size) - $page_size ?>#faqSection"><?php echo $current_page ?></a>
          <?php $current_page++ ?>
          <?php else: ?>
          <?php echo $current_page ?>
          <?php $current_page++ ?>
         <?php endif;
         ?>
        <?php endwhile; ?>
        <?php if($current_page < $pages){
          echo '...';
        } ?>

        <!-- if current page is greater than 1 -->
      <?php elseif($current_page_fixed != 1):
        if($current_page - 4 < 1){
          $current_page = 1;
        } else {
          $current_page = $current_page - 3;
          echo '...';
        }
        ?>

        <?php while($current_page < $current_page_fixed + 4 && $current_page <= $pages): ?>
          <?php if($current_page_fixed != $current_page): ?>
           <a href="https://rvalibrary.org/master-gardener/search/?query=<?php echo $searchVar  ?>&offset=<?php echo ($current_page * $page_size) - $page_size ?>#faqSection"><?php echo $current_page ?></a>
           <?php if($current_page == $current_page_fixed + 3 && $current_page != $pages-1){
             echo '...';
           } ?>
           <?php $current_page++ ?>
           <?php else: ?>
           <?php echo $current_page ?>
           <?php if($current_page == $current_page_fixed + 3 && $current_page != $pages-1){
             echo '...';
           } ?>
           <?php $current_page++ ?>
          <?php endif; ?>
        <?php endwhile; ?>

      <?php endif; ?>
      | <a href="https://rvalibrary.org/master-gardener/search/?query=<?php echo $searchVar ?>&offset=<?php echo (floor($total_count / $page_size) * $page_size) ?>#faqSection">Last</a>
      <div style="width: 100%; margin-top: 10px;">
        <?php if($offset != 0): ?>
        <a class="btn btn-primary" href="https://rvalibrary.org/master-gardener/search/?query=<?php echo $searchVar ?>&offset=<?php echo ($offset - $page_size) ?>#faqSection">Previous</a>
        <?php endif; ?>
        <?php if(($offset + $page_size) < $total_count): ?>
        <a class="btn btn-primary" href="https://rvalibrary.org/master-gardener/search/?query=<?php echo $searchVar  ?>&offset=<?php echo ($offset + $page_size) ?>#faqSection">Next</a>
        <?php endif; ?>
      </div>

    </div>

    <div class="col-sm-2">
      <!-- <h3>Related</h3> -->
      <?php foreach ($categoryArray as $category => $value): ?>
        <div class="category-container-side" style="margin: 7px 0px; display: flex;">
          <?php if($category !== $searchVar):?>
          <a class="btn-primary btn-primary-rounded-sm" style="position: relative;" target="blank" href="https://rvalibrary.org/master-gardener/search/?tag=<?php echo $category; ?>"><?php echo strtolower($category); ?>
          <?php endif; ?>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="col-sm-10">


    <div class="collapsible-container">

      <?php
      if(count($formEntries) == 0 || $formEntries[0][status] == 'trash'):
      ?>

      <h2 style="text-align: center; padding-bottom: 10px; color: #ff7236">No submitted questions answered just yet! Check back later.</h2>
      <img style="margin: 0 auto" src="https://rvalibrary.org/wp-content/uploads/2019/10/floating_otter.png" class="img-responsive otter-img"></br>


      <?php
      else:
      $counter = 1;
      foreach($formEntries as $entry):
       ?>

       <?php if($entry[5] != "" && $entry[status] == 'active'): ?>
    <div class="faq-header-container">
      <h2 class="faq-header"><span class="dashicons dashicons-plus" style="float: left; cursor: pointer; color: #3e3e3e;"></span>
        <span class="dashicons dashicons-minus" style="float: left;cursor: pointer; color: #3e3e3e;"></span><?php echo stripslashes( $entry[4] ); ?></h2>
    </div> <!-- faq-header-container -->

    <div class="text-container">
      <ul style="list-style:none; padding: 15px !important" class="faq-description">
        <?php
          $date_posted = new DateTime($entry[date_created]);
         ?>
        <span><strong>Date Posted:</strong> <?php echo $date_posted->format("D, M d - g:i a") ?></span>
        <?php if(unserialize($entry[6]) >= 1): ?>
        <div style="margin: 10px 0px;">
          <?php foreach (unserialize($entry[6]) as $category): ?>
            <a class="btn-primary btn-primary-rounded-sm" href="https://rvalibrary.org/master-gardener/search/?tag=<?php echo $category ?>#faqSection"><?php echo strtolower($category) ?></a>
          <?php endforeach; ?>
       </div>
      <?php endif; ?>
        <h3 style="margin-top: 10px;">Question</h3>
      <li style="font-size: 11px; font-style: italic; padding-left: 10px; margin: 0 0 20px 10px"><?php echo stripslashes( $entry[3] ); ?></li>
      <h3 style="margin-top: 10px;">Answer</h3>
    <li style="border-left: 2px solid #ff7236; padding-left: 10px; margin-left: 10px;"><?php echo stripslashes( $entry[5] ); ?></li>

    </ul><!-- faq-description -->

  </div><!-- text-container -->
<?php endif; ?>

<?php endforeach; ?>
<?php endif; ?>
</div><!-- collapsible-container -->
   </div>
    <?php endif; ?>

 </div> <!--container-->
</div> <!-- faq-answer -->




<?php get_footer(); ?>
