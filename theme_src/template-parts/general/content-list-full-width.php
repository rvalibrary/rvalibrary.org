<style media="screen">

  div#gridChart:after {
    position: absolute;
    bottom: -80px;
    left: 0;
    width: 100%;
    z-index: 1;
    content: '';
    border-style: solid;
    border-width: 0px 50vw 100px;
    border-color: transparent #f5f2eb white #f5f2eb;
  }

  main:before{
    content: '';
    position: absolute;
    top: -25px;
    left: -50px;
    width: 70%;
    height: 10%;
    background: linear-gradient(90deg, #f5f2eb 8px, rgba(0, 0, 0, 0) 1%) 95px 100px, linear-gradient(#f5f2eb 8px, rgba(0, 0, 0, 0) 1%), rgba(1,1,1,0.2);
    background-size: 10px 10px;
    z-index: -1;
  }

  main {
    min-width: 300px;
    max-width: 500px;
    margin: auto;
    position: relative;
    z-index: 1;
  }

  main > p {
    font-size: 0.9em;
    line-height: 1.75em;
    border-top: 3px solid;
    border-image: linear-gradient(to right, #003862 0%, #349ed4 100%);
    border-image-slice: 1;
    border-width: 3px;
    margin: 0;
    padding: 40px;
    counter-increment: section;
    position: relative;
    color: #34435E;
  }

  main > p:before{
    content: counter(section);
    position: absolute;
    border-radius: 50%;
    padding: 6px;
    height: 2.0em;
    width: 2.0em;
    background-color: #34435E;
    text-align: center;
    line-height: 1.25em;
    color: white;
    font-size: 1em;
  }
  main > p:nth-child(odd) {
    border-right: 3px solid;
    padding-left: 0;
    border-left: 0px solid transparent;
    border-bottom: 0px solid transparent;
  }

  main > p:nth-child(odd):before{
    left: 100%;
    margin-left: -15px;
  }

  main > p:nth-child(even) {
    border-left: 3px solid;
    padding-right: 0;
    border-right: 0px solid transparent;
    border-bottom: 0px solid transparent;
  }

  main > p:nth-child(even){
    border-left: 3px solid;
    padding-right: 0;
  }

  main > p:nth-child(even):before{
    right: 100%;
    margin-right: -15px;
  }

  main > p:first-child {
    border-top: 0;
    border-top-right-radius:0;
    border-top-left-radius:0;
  }

  main > p:last-child {
    border-bottom-right-radius:0;
    border-bottom-left-radius:0;
  }

  main > p > span{
    font-weight: 600;
    font-size: 16px;
    display: block;
  }

  .meta-list{
    font-size: 13px;
    font-weight: 300;
    padding: 5px 0px;
  }

</style>

<div class="container-fluid" id="gridList" style="background-color: #f5f2eb; padding: 1.75rem; position: relative; margin-bottom: 100px;">
  <div class="container-fluid" style="padding: 3em 1em;">
    <div class="container">
      <h1 style="color: black;"><?php echo get_field('header_title'); ?></h1>
      <p><?php echo get_field('header_description'); ?></p>
    </div>
  </div>
  <div class="container-fluid" id="gridChart">
    <main>
      <h1 style="color: black;"><?php echo get_field('inner_list_header') ?></h1>
      <?php
      if(have_rows('list_repeater')):
        while(have_rows('list_repeater')): the_row();
      ?>
        <p>
          <span><?php echo get_sub_field('entry_header'); ?></span>
          <?php echo get_sub_field('entry_description'); ?>
          <?php
          if(have_rows('meta_list')):
              while(have_rows('meta_list')): the_row();
          ?>
            <span class="meta-list"><i class="fas fa-chevron-right"></i><?php echo get_sub_field('meta_list_description'); ?></span>
        <?php endwhile; endif; ?>
        </p>
      <?php
    endwhile;
  endif;
     ?>
    </main>
  </div>
</div>
