<?php
/*

Template Name: Voter Suppression

 */

 get_header();
 get_template_part( 'template-parts/page/content', 'pageheader' );
 get_template_part('template-parts/general/content', 'intro-header-bg');
 ?>
   <div class="container-fluid" style="padding: 95px 0px; background-color: #034765;">
     <div class="row flex-center">
       <div class="col-xs-12 col-md-10 border-dark new-user">
         <div class="margin-right">
           <div class="container" id="slidr-div" style="height: 700px; max-width: 950px; padding: 0px; display: block">
             <div style="visibility: hidden" class="container slidr-tile" data-slidr="one">
               <div class="slidr-content">
                 <h2>Tools of Suppression</h2>
                 <h3 style="color: #fdbe14">Vot.er Sup.pres.sion</h3>
                 <span class="slidr-text"><em>-noun</em></span>
                 <span class="slidr-text">A political ploy to prevent certain demographic groups from registering to vote or getting to the polls.</span>
               </div>
             </div>
               <div style="visibility: hidden;" class="container slidr-tile" data-slidr="two">
               <div class="slidr-content">
                 <h2>Carter Glass</h2>
                 <img style="max-width: 200px; margin-bottom: 15px;" src="https://rvalibrary.org/wp-content/uploads/2020/10/Young_Carter_Glass.jpg" alt="">
                 <span class="slidr-text">When Carter Glass was asked by a local reporter, would the removal of Black voters from the rolls be "done by fraud and discrimination".</span>
                 <span class="slidr-text">“Will it not be done by fraud and discrimination?”</span>
                 <span class="slidr-text">“By fraud, no. By discrimination, yes” Glass retorted. “Discrimination! Why, that is precisely
       what we propose – to discriminate to the very extremity permissible under the Federal
       Constitution with a view to the elimination of every negro voter who can be gotten rid of
       legally.”</span>
               </div>
             </div>
           <div style="visibility: hidden;" class="container slidr-tile" data-slidr="three">
           <div class="slidr-content">
             <h2>1890 Mississippi Plan</h2>
             <div class="video-wrapper-container">
               <div class="video-wrapper">
                 <iframe width="560" height="315" src="https://www.youtube.com/embed/1QZMwA1B0gY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               </div>
             </div>
           </div>
         </div>
         <div style="visibility: hidden;" class="container slidr-tile" data-slidr="four">
         <div class="slidr-content">
           <h2>The Poll Tax</h2>
           <?php echo get_field('quiz_polltax'); ?>
         </div>
       </div>
       <div style="visibility: hidden;" class="container slidr-tile" data-slidr="five">
       <div class="slidr-content">
         <h2>The Poll Tax</h2>
         <div class="video-wrapper-container">
           <div class="video-wrapper">
             <iframe width="560" height="315" src="https://www.youtube.com/embed/68iTiUlFIqg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           </div>
         </div>
       </div>
     </div>
     <div style="visibility: hidden;" class="container slidr-tile" data-slidr="six">
     <div class="slidr-content">
       <h2>The Jellybean Test</h2>
       <?php echo get_field('quiz_jellybean'); ?>
     </div>
   </div>
   <div style="visibility: hidden;" class="container slidr-tile" data-slidr="seven">
     <div class="slidr-content">
       <h2>Always Wrong</h2>
       <div class="video-wrapper-container">
         <div class="video-wrapper">
           <iframe width="560" height="315" src="https://www.youtube.com/embed/jGvNolV6_dY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
       </div>
     </div>
   </div>
   <div style="visibility: hidden;" class="container slidr-tile" data-slidr="eight">
   <div class="slidr-content">
     <h2>The Literacy Test</h2>
     <?php echo get_field('quiz_literacytest'); ?>
   </div>
   </div>
   <div style="visibility: hidden;" class="container slidr-tile" data-slidr="nine">
     <div class="slidr-content">
       <h2>The Literacy Test</h2>
       <div class="video-wrapper-container">
         <div class="video-wrapper">
           <iframe width="560" height="315" src="https://www.youtube.com/embed/vuBcU6HdpJE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
       </div>
     </div>
   </div>
   <div style="visibility: hidden;" class="container slidr-tile" data-slidr="ten">
   <div class="slidr-content">
     <h2>Voting Qualifications</h2>
     <?php echo get_field('quiz_qualifications'); ?>
   </div>
   </div>
   <div style="visibility: hidden;" class="container slidr-tile" data-slidr="eleven">
     <div class="slidr-content">
       <h2>Voting Qualifications</h2>
       <div class="video-wrapper-container">
         <div class="video-wrapper">
           <iframe width="560" height="315" src="https://www.youtube.com/embed/zAnuMv_Iioo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
       </div>
     </div>
   </div>
   <div style="visibility: hidden;" class="container slidr-tile" data-slidr="twelve">
     <div class="slidr-content">
       <h2>Modern Suppression Tactics</h2>
       <div class="video-wrapper-container">
         <div class="video-wrapper">
           <iframe width="560" height="315" src="https://www.youtube.com/embed/yqn0kcZX4cE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
       </div>
     </div>
   </div>
           </div>
         </div>
       </div>
     </div>
     <?php get_template_part('template-parts/content', 'related-links'); ?>
   </div>



<?php get_footer(); ?>
