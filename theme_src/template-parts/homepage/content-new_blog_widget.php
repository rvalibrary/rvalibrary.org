<?php
  global $post;

  $args = get_query_var('get_posts_args');
  $postsArr = get_posts( $args );

?>

<style media="screen">
.outer-container{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-direction: row;
          flex-direction: row;
  width: 95%;
  margin: 0 auto;
  border-radius: 5px;
  -webkit-box-shadow: 0 3.2px 2.2px rgba(0, 0, 0, 0.02),
              0 7px 5.4px rgba(0, 0, 0, 0.028),
              0 12.1px 10.1px rgba(0, 0, 0, 0.035),
              0 19.8px 18.1px rgba(0, 0, 0, 0.042),
              0 34.7px 33.8px rgba(0, 0, 0, 0.05),
              0 81px 81px rgba(0, 0, 0, 0.07);
          box-shadow: 0 3.2px 2.2px rgba(0, 0, 0, 0.02),
              0 7px 5.4px rgba(0, 0, 0, 0.028),
              0 12.1px 10.1px rgba(0, 0, 0, 0.035),
              0 19.8px 18.1px rgba(0, 0, 0, 0.042),
              0 34.7px 33.8px rgba(0, 0, 0, 0.05),
              0 81px 81px rgba(0, 0, 0, 0.07);
  margin-bottom: 20px;
  margin-top: 20px;
  background-color: #003652;
}

.top{
  height: 450px;
  width: 100%;
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-direction: row;
          flex-direction: row;
  overflow: hidden;
}

.blog-content-container{
  width: 100%;
}

.top > .bg{
  background-size: cover;
  background-position: center;
  width: 100%;
  height: 100%;
  position: relative;
  background-repeat: no-repeat;
}

.top > .bg:after{
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1%, rgba(0,71,101, 0)), to(#003652));
  background-image: -o-linear-gradient(top, rgba(0,71,101, 0) 1%, #003652 100%);
  background-image: linear-gradient(to bottom, rgba(0,71,101, 0) 1%, #003652 100%);
  width: 100%;
  height: 400px;
  content: '';
  position: absolute;
  bottom: 0;
}

.img-container-blog{
  width: 100%;
  height: 100%;
  z-index: 1;
}

.img-container-blog:after{
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(1%, rgba(0,71,101, 0)), to(#003652));
  background-image: -o-linear-gradient(top, rgba(0,71,101, 0) 1%, #003652 100%);
  background-image: linear-gradient(to bottom, rgba(0,71,101, 0) 1%, #003652 100%);
  width: 100%;
  height: 400px;
  content: '';
  position: absolute;
  bottom: 0;
}

.img-container-blog > img{
  margin: 0 auto;
  height: inherit;
  margin-top: 5px;
  border-radius: 5px;
}

@media(max-width: 850px) and (min-width: 650px){
  .top{
    height: 250px !important;
  }
}

@media(min-width: 300px) and (max-width: 659px){
  .top{
    height: 225px !important;
  }
}

@media(max-width: 850px){
  .outer-container{
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
  }
  .post-dates{
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: row !important;
            flex-direction: row !important;
    width: 100% !important;
  }
  .post-date{
    margin-bottom: 0 !important;
  }
  .post-date{
    margin-right: 2px;
  }
  .post-date:last-child{
    margin-right: 0px;
    border-radius: 0 5px 0 0 !important;
  }
  .title-container{
    top: 0px !important;
  }
  .bottom{
    height: -webkit-fit-content !important;
    height: -moz-fit-content !important;
    height: fit-content !important;
    margin-top: -80px !important;
  }
}

.bottom{
  position: relative;
  z-index: 2;
  margin-top: -180px;
}

.title-container{
  position: relative;
  height: -webkit-fit-content;
  height: -moz-fit-content;
  height: fit-content;
  padding: 20px;
}

.title{
  color: white;
  text-shadow: 1px 1px 1px rgba(0,0,0,0.6);
  width: 100%;
}

/* @media(max-width: 970px){
  .title > h1{
    font-size: 30px !important;
  }
} */

.title > h1{
  font-size: 30px;
}

.details-container{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}

.bw-top{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  max-width: 380px;
}

.details{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-direction: row;
          flex-direction: row;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.avatar > a > img{
  height: 70px;
  width: 70px;
  border-radius: 50%;
  -webkit-box-shadow: 1px 1px 12px 1px rgba(0,0,0,0.5);
          box-shadow: 1px 1px 12px 1px rgba(0,0,0,0.5);
}

.post-details{
  padding-left: 5px;
  color: white;
}

.post-details > a > .name{
  font-size: 22px;
  color: white !important;
}

.post-details > .date{
  font-size: 14px;
  font-weight: 200;
  color: #ff7236;
}

.tags{
overflow: visible;
margin-top: 10px;
}

.tag{
  display: inline-block;
  background-color: #f5f2eb;
  border-radius: 15px;
  padding: 5px;
  margin-bottom: 5px;
  font-size: 12px;
  color: #4b3742;
  -webkit-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}

.tag:hover{
  background-color: #ff7236;
  color: white;
  cursor: pointer;
}

.bw-bottom{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 3;
      -ms-flex: 3;
          flex: 3;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  margin-top: 10px;
  max-width: 1000px;
}

.post-location > a >.location{
  font-size: 13px;
  display: inline-block;
  font-weight: 600;
  text-decoration: underline;
  margin-bottom: 10px;
}

.text-container{
  color: white;
  font-size: 16px;
  font-weight: 200;
}

.text-container > p{
  line-height: 25px;
}

.footer{
  position: absolute;
  bottom: 0;
  width: 100%;
  max-height: 120px;
}

.post-dates{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  z-index: 1;
  width: 45px;
}

 .post-date{
  background-color: rgba(255,114,54,0.9);
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  text-align: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  color: white;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  padding: 5px;
  font-size: 14px;
  font-weight: 200;
  margin-bottom: 2px;
  -webkit-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}

.post-date:hover{
  background-color: #ce1d1f;
  cursor: pointer;
}

.post-date:nth-child(1){
  border-radius: 5px 0 0 0;
}

.post-date:last-child{
  border-radius: 0 0 0 5px;
}
</style>

<div class="container-fluid bg-dark-slate-gray">
<div class="outer-container">
  <div class="post-dates">
    <?php
      $counter = 1;
      $dateArr = [];

      foreach ($postsArr as $post):
        setup_postdata( $post );
        $date = new DateTime($post->post_date);
        $dateObj = new stdClass();
        $formattedDateDay = $date->format('d');
        $dateObj->day = $formattedDateDay;
        $formattedDateMonth = substr($date->format('F'), 0, 3);
        $dateObj->month = $formattedDateMonth;
        $fullyFormattedDate = $formattedDateDay . ' ' . $formattedDateMonth;
        $dateObj->fullDate = $fullyFormattedDate;
        array_push($dateArr, $dateObj);
    ?>
    <?php if($counter === 1): ?>
    <div style="flex: 10; font-size: 19px;" data-id="<?php echo $counter ?>" class="post-date">
      <?php echo $dateArr[count($dateArr) - 1]->fullDate ?>
    </div>
  <?php else: ?>
    <div style="flex: 1;" data-id="<?php echo $counter ?>" class="post-date">
      <?php echo $dateArr[count($dateArr) - 1]->fullDate ?>
    </div>
  <?php endif; ?>
    <?php
      $counter++;
      endforeach;
    ?>
  </div>
  <?php
    $counter = 1;
    foreach( $postsArr as $post ):
  ?>
  <?php if($counter === 1): ?>
  <div data-id="<?php echo $counter ?>" class="blog-content-container show">
  <?php else: ?>
  <div data-id="<?php echo $counter ?>" class="blog-content-container hide">
  <?php endif; ?>
    <div class="top">
      <?php if( get_the_post_thumbnail() ): ?>
        <div class="img-container-blog">
          <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url(); ?>">
        </div>
      <div style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center; -webkit-filter: blur(10px); top: 0; left: 0; position: absolute; height: 100%; width: 100%;" ></div>
    <?php else: ?>
      <div style="background-image: url('https://rvalibrary.org/wp-content/uploads/2020/04/library-shelf.jpeg')" class="bg"></div>
    <?php endif; ?>
    </div>
    <div class="bottom">
      <div class="title-container">
        <div class="title">
          <h1><?php echo $post->post_title; ?></h1>
        </div>
        <div class="details-container">
        <div class="bw-top">
        <div class="details">
          <div class="avatar">
            <a target="_blank" href="https://rvalibrary.org/shelf-respect/author/<?php echo get_the_author_meta('user_login', $post->post_author) ?>/">
              <img src="<?php echo get_avatar_url( $post->post_author ); ?>">
            </a>
          </div>
          <div class="post-details">
            <a target="_blank" href="https://rvalibrary.org/shelf-respect/author/<?php echo get_the_author_meta('user_login', $post->post_author) ?>/">
              <div class="name"><?php echo get_the_author_meta('display_name', $post->post_author); ?></div>
            </a>
            <?php $date = new DateTime($post->post_date); ?>
            <div class="date"><?php echo $date->format('F j, Y'); ?></div>
          </div>
        </div>
           <div class="tags">
             <?php
            $tagArr = wp_get_post_tags($post->ID);
           if($tagArr):
             foreach ($tagArr as $tag):
               ?>
            <a target="_blank" href="https://rvalibrary.org/shelf-respect/tag/<?php echo sanitize_title_with_dashes($tag->name) ?>/">
              <div class="tag"><?php echo $tag->name; ?></div>
            </a>
          <?php endforeach; endif; ?>
          </div>
          </div>
        <div class="bw-bottom">
          <div class="post-location">
            <?php $categoryArr = get_the_category();
                if($categoryArr):
                  foreach($categoryArr as $category):
            ?>
            <a target="_blank" href="https://rvalibrary.org/shelf-respect/category/<?php echo sanitize_title_with_dashes($category->cat_name) ?>/">
              <div class="location"><?php echo sanitize_title_with_dashes($category->cat_name); ?></div>
            </a>
          <?php endforeach; endif; ?>
          </div>
          <div class="text-container">
            <?php $excerpt = substr(wp_strip_all_tags($post->post_content), 0, 550); ?>
            <p><?php echo substr($excerpt, 0, strrpos($excerpt, ' ') ) . '...' ?></p>
          </div>
          <div class="">
            <a style="width: fit-content;" class="btn btn-primary" target="_blank" href="<?php echo $post->guid ?>">Read More</a>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
    <?php $counter++; endforeach; wp_reset_postdata();?>
</div>
</div>
