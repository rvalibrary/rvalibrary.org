<div class="about-author">


      <img src="<?php echo get_avatar_url(get_the_author_meta('ID'), array('size' => '150'));?>" alt="">

    <?php //echo get_avatar(get_the_author_meta('ID'), '150px');?>
    <div class="author-content">
        <div class="author-head">
            <a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>"><h3>About <?php echo get_the_author(); ?> </h3></a>
            <span class="underline left"></span>
        </div>
        <div class="post-social-share">
            <ul>
                <?php if(get_the_author_meta('facebook')):?><li><a href="<?php echo get_the_author_meta('facebook');?>"><i class="fa fa-facebook"></i> <span>/ Facebook</span></a></li><?php endif;?>
                <?php if(get_the_author_meta('twitter')):?><li><a target="_blank" href="https://twitter.com/<?php echo get_the_author_meta('twitter');?>"><i class="fa fa-twitter"></i> <span>/ Twitter</span></a></li><?php endif;?>
                <?php if(get_the_author_meta('googleplus')):?><li><a href="<?php echo get_the_author_meta('googleplus');?>"><i class="fa fa-google-plus"></i> <span>/ Google+</span></a></li><?php endif;?>
                <li><a href="mailto:<?php echo get_the_author_meta('email');?>"><i class="fa fa-envelope" aria-hidden="true"></i> <span>/ Email</span></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <p><?php echo get_the_author_meta('description');?></p>
    </div>
    <div class="clearfix"></div>
</div>
