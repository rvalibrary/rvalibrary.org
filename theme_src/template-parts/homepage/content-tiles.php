<?php
$tile1   =    get_field('tile1');
$tile2   =    get_field('tile2');
$tile3   =    get_field('tile3');
$tile4   =    get_field('tile4');
$tile5   =    get_field('tile5');
$tile6   =    get_field('tile6');
?>




<section class="features">
    <div class="tiles_home">
        <ul>
          <a href="<?php echo $tile1['link_url']; ?>">
            <li style="background-image: url('<?php echo $tile1['image']; ?>'); background-size: cover; background-repeat: no-repeat;">
                <div class="feature-box" style="background-color: <?php echo $tile1['background_color']; ?>;">
                  <div class="feature-box-darkness" style="border-radius: 10px; padding: 15px; height: inherit; width: inherit;">
                    <i class="tile_icon <?php echo $tile1['icon']; ?>"></i>
                    <h3><?php echo $tile1['title']; ?></h3>
                    <p><?php echo $tile1['description']; ?></p>
                  </div>
                </div>
            </li>
          </a>
          <a href="<?php echo $tile2['link_url']; ?>">
            <li style="background-image: url('<?php echo $tile2['image']; ?>'); background-size: cover; background-repeat: no-repeat;">
                <div class="feature-box" style="background-color: <?php echo $tile2['background_color']; ?>;">
                  <div class="feature-box-darkness" style="border-radius: 10px; padding: 15px;">
                    <i class="tile_icon <?php echo $tile2['icon']; ?>"></i>
                    <h3><?php echo $tile2['title']; ?></h3>
                    <p><?php echo $tile2['description']; ?></p>
                  </div>
                </div>
            </li>
          </a>

          <a href="<?php echo $tile3['link_url']; ?>">
            <li style="background-image: url('<?php echo $tile3['image']; ?>'); background-size: cover; background-repeat: no-repeat;">
                <div class="feature-box" style="background-color: <?php echo $tile3['background_color']; ?>;">
                  <div class="feature-box-darkness" style="border-radius: 10px; padding: 15px;">
                    <i class="tile_icon <?php echo $tile3['icon']; ?>"></i>
                    <h3><?php echo $tile3['title']; ?></h3>
                    <p><?php echo $tile3['description']; ?></p>
                  </div>
                </div>
            </li>
          </a>
          <a href="<?php echo $tile4['link_url']; ?>">
            <li style="background-image: url('<?php echo $tile4['image']; ?>'); background-size: cover; background-repeat: no-repeat;">
                <div class="feature-box" style="background-color: <?php echo $tile4['background_color']; ?>;">
                  <div class="feature-box-darkness" style="border-radius: 10px; padding: 15px;">
                    <i class="tile_icon <?php echo $tile4['icon']; ?>"></i>
                    <h3><?php echo $tile4['title']; ?></h3>
                    <p><?php echo $tile4['description']; ?></p>
                  </div>
                </div>
            </li>
          </a>
          <a href="<?php echo $tile5['link_url']; ?>">
            <li style="background-image: url('<?php echo $tile5['image']; ?>'); background-size: cover; background-repeat: no-repeat;">
                <div class="feature-box" style="background-color: <?php echo $tile5['background_color']; ?>;">
                  <div class="feature-box-darkness" style="border-radius: 10px; padding: 15px;">
                    <i class="tile_icon <?php echo $tile5['icon']; ?>"></i>
                    <h3><?php echo $tile5['title']; ?></h3>
                    <p><?php echo $tile5['description']; ?></p>
                  </div>
                </div>
            </li>
          </a>
          <a href="<?php echo $tile6['link_url']; ?>">
            <li style="background-image: url('<?php echo $tile6['image']; ?>'); background-size: cover; background-repeat: no-repeat;">
                <div class="feature-box" style="background-color: <?php echo $tile6['background_color']; ?>;">
                  <div class="feature-box-darkness" style="border-radius: 10px; padding: 15px;">
                    <i class="tile_icon <?php echo $tile6['icon']; ?>"></i>
                    <h3><?php echo $tile6['title']; ?></h3>
                    <p><?php echo $tile6['description']; ?></p>
                  </div>
                </div>
            </li>
          </a>
        </ul>
    </div>
</section>
