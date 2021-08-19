<?php
/*

 Template Name: Pay Fines

 */
get_header();
get_template_part( 'template-parts/page/content', 'pageheader' );

?>

<?php get_template_part('template-parts/general/content', 'banner-notification'); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 40px;">
    <h1>Library Refund Policy</h1>
    The Library will, under certain conditions, issue a refund if the item is returned within 90 days of the receipt date. For example, library materials lost, paid for, and then found can be returned and a refund may be issued under the following condition:
    <ul>
     	<li>Item/material is in satisfactory condition,</li>
     	<li>Refunds will exclude the Library's $5.00 processing fee, Unique Management's $10.00 referral fee,
    and the overdue amount for each item returned. Materials paid through the State Set-Off Debt Program are non-refundable,</li>
     	<li>Refunds for payments made by a credit/debit card will be issued onto the card that was used to make the payment</li>
     	<li>Item/material paid for by check requires a 30-day waiting period from the date of the transaction before a refund is issued. Refer refund request to Administrative Office with supporting documentation.</li>
    </ul>
    <p>Richmond Public Library is located in Richmond Virginia, U.S.A.</p>
    </div>
  </div>
</div>


<!-- <iframe allow="payment" src="https://librarypayments.richmondgov.com/eCommerceWebModule/Home" width="100%" height="600px" title="Envisionware Payment Widget"> -->
    <!-- <embed src="https://librarypayments.richmondgov.com/eCommerceWebModule/Home" width="100%" height="600px" type="text/html" title="Envisionware Payment Widget"/>
      <div class="container">
        <p style=""> Error: Embedded data could not be displayed - please visit our official <a href="https://librarypayments.richmondgov.com/eCommerceWebModule/Home">Payment Location</a> at Envisionware to complete your fine payment.</p>
      </div> -->
<!-- </iframe> -->

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12" style="margin: 0 auto; text-align: center;">
      <p style="margin-bottom: 30px; font-size: 13px;">Fines are resolved automatically after making payment using this system.</p>
      <a target="_blank" href="https://librarypayments.richmondgov.com/eCommerceWebModule/Home">
        <button id="newsletter_subscribe_button" class="btn btn-primary">Pay Fines</button>
      </a>
      <h4 style="margin-top: 30px;">Privacy Statement</h4>
      <p>The Richmond Public Library does not collect or store your credit card information.</p>
    </div>
  </div>
</div>


<?php get_template_part( 'template-parts/content', 'page' ); ?>



<?php get_footer(); ?>
