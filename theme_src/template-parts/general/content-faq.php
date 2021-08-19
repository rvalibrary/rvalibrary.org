<?php
$section_toggle = get_field('section');



$list_of_questions =   [];
$intial_question   =   get_field('initial_question');
$columns           =   ['first_column','second_column','third_column'];
$i = 0;
for ($col = 0; $col < count($columns); $col++){
  if( have_rows($columns[$col]) ){
    while ( have_rows($columns[$col]) ){
      the_row();
      $list_of_questions[$i] = ['link_text'=>get_sub_field('link_text'),'slug'=>get_sub_field('slug'),'answer_title'=>get_sub_field('answer_title'),'answer'=>get_sub_field('answer')];
      $i++;
    }//while
  }//if
}//for

?>

<?php if($section_toggle):?>

<div class="container">
  <div class="row">
    <div class="col-md-9 " style="padding-top: 35px;">
      <span class="how_do_i"><?php echo $intial_question;?></span>
      <?php if(get_field('initial_paragraph')): ?>
        <p style="font-size: 14px;"><?php echo get_field('initial_paragraph'); ?></p>
      <?php endif; ?>
      <div class="faq-list-container" style="padding-bottom: 50px;">
        <div class="row">
          <div class="col-xl-12 col-md-4 faq-list">
            <?php if( have_rows('first_column') ):
                while ( have_rows('first_column') ) : the_row();?>
                  <a class="scrolling_link" href="#<?php the_sub_field('slug');?>"><div class="faq-item"><?php the_sub_field('link_text');?></div></a>
              <?php endwhile;
              endif;?>
          </div>
          <div class="col-xl-12 col-md-4 faq-list">
            <?php if( have_rows('second_column') ):
                while ( have_rows('second_column') ) : the_row();?>
                  <a class="scrolling_link" href="#<?php the_sub_field('slug');?>"><div class="faq-item"><?php the_sub_field('link_text');?></div></a>
              <?php endwhile;
              endif;?>
          </div>
          <div class="col-xl-12 col-md-4 faq-list">
            <?php if( have_rows('third_column') ):
                while ( have_rows('third_column') ) : the_row();?>
                  <a class="scrolling_link" href="#<?php the_sub_field('slug');?>"><div class="faq-item"><?php the_sub_field('link_text');?></div></a>
              <?php endwhile;
              endif;?>
          </div>
        </div><!--row-->
      </div><!--faq-list-container-->



      <section id="faqAnswers" class="faq-answers">

        <?php for ($faqCount = 0; $faqCount < count($list_of_questions); $faqCount++):?>
          <div class="faq-answer <?php echo ($faqCount % 2 == 0 ? 'faq-even':'faq-odd');?>" id="<?php echo $list_of_questions[$faqCount]['slug']?>" style="padding-left: 30px; padding-right: 30px;">
              <h3 style="margin-bottom: 10px;"><?php echo $list_of_questions[$faqCount]['answer_title']?></h3>
              <?php echo $list_of_questions[$faqCount]['answer']?>
          </div>

        <?php endfor;?>
      </section><!--faq-answers-->


    </div><!--col-md-9-->

    <div class="col-sm-3 ">
      <aside class="rpl_sidebar section-sidebar-container">
        <?php get_template_part( 'template-parts/section/content', 'section');?>
        <?php get_sidebar('section');   ?>
      </aside>
    </div><!--col-sm-3 sidebar-->
  </div><!--row-->

</div>


<?php else:?>
    <div class="container">
      <article class="faq-top margin-huge-top margin-big-bottom">
        <section id="faqGrid" class="faq-grid">
          <span class="how_do_i"><?php echo $intial_question;?></span>
          <?php if(get_field('initial_paragraph')): ?>
            <p style="font-size: 14px;"><?php echo get_field('initial_paragraph'); ?></p>
          <?php endif; ?>
          <div class="faq-list-container">
            <div class="row">
              <div class="col-xl-12 col-md-4 faq-list">
                <?php if( have_rows('first_column') ):
                    while ( have_rows('first_column') ) : the_row();?>
                      <a class="scrolling_link" href="#<?php the_sub_field('slug');?>"><div class="faq-item"><?php the_sub_field('link_text');?></div></a>
                  <?php endwhile;
                  endif;?>
              </div>
              <div class="col-xl-12 col-md-4 faq-list">
                <?php if( have_rows('second_column') ):
                    while ( have_rows('second_column') ) : the_row();?>
                      <a class="scrolling_link" href="#<?php the_sub_field('slug');?>"><div class="faq-item"><?php the_sub_field('link_text');?></div></a>
                  <?php endwhile;
                  endif;?>
              </div>
              <div class="col-xl-12 col-md-4 faq-list">
                <?php if( have_rows('third_column') ):
                    while ( have_rows('third_column') ) : the_row();?>
                      <a class="scrolling_link" href="#<?php the_sub_field('slug');?>"><div class="faq-item"><?php the_sub_field('link_text');?></div></a>
                  <?php endwhile;
                  endif;?>
              </div>
            </div><!--row-->
          </div>
        </section>

      </article><!--entry-content-->
    </div><!--container-->

    <section id="faqAnswers" class="faq-answers">

      <?php for ($faqCount = 0; $faqCount < count($list_of_questions); $faqCount++):?>
        <div class="faq-answer <?php echo ($faqCount % 2 == 0 ? 'faq-even':'faq-odd');?>" id="<?php echo $list_of_questions[$faqCount]['slug']?>">
          <div class="container">
            <h3 style="margin-bottom: 10px;"><?php echo $list_of_questions[$faqCount]['answer_title']?></h3>
            <?php echo $list_of_questions[$faqCount]['answer']?>
          </div>
        </div>

      <?php endfor;?>
    </section><!--faq-answers-->
<?php endif;?>
