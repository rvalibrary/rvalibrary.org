<section id="<?php echo get_field('newsletter_header') ?>" class="newsletter section-padding" <?php if(get_field('background-color')):?> style="background-color:<?php echo get_field('background-color') ?><?php endif; ?>;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="center-content">
                  <?php if(!get_field('newsletter_header')): ?>
                    <h2 class="section-title">Subscribe to our Newsletters</h2>
                  <?php else: ?>
                    <h2 class="section-title"><?php echo get_field('newsletter_header') ?></h2>
                  <?php endif; ?>
                    <!-- <hr class="small center"> -->
                    <?php if(!get_field('intro_paragraph')): ?>
                      <p>Sign up now to stay informed and receive periodic reading selections by email.</p>
                    <?php else: ?>
                      <p class=""><?php echo get_field('intro_paragraph'); ?></p>
                    <?php endif; ?>
                    <?php if(get_field('url')): ?>
                    <a target="_blank" href="<?php echo get_field('url') ?>">
                      <button id="newsletter_subscribe_button" class="btn btn-primary"><?php echo get_field('button_text') ?></button>
                    </a>
                  <?php else: ?>
                    <a target="_blank" href="http://libraryaware.com/2291/Subscribers/Subscribe?optInPageId=a53e7723-3e02-460a-8dbb-d9a1b73d0636">
                      <button id="newsletter_subscribe_button" class="btn btn-primary">Subscribe</button>
                    </a>
                  <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
