<div class="showPostContainer">
  <div class="topPost">
    <div class="rightTopPost">
      <img src="../image/soccer.svg">
      <div class="postMatadata">
        <h4><?php echo $postPublisher; ?></h4>
        <span><?php echo date("j-M-Y g:i A", $postTime); ?> <i class="fas fa-globe-africa"></i></span>
      </div>
    </div>
    <div class="leftTopPost">
    <?php
      if ($_SESSION['permission'] == 1) {
    ?>
        <div class="threeDots" onclick="openPostMenu('<?php echo $post_id; ?>')">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div>
    <div class="postMenu" style="display: none;" id="<?php echo $post_id.'M'; ?>">
      <div class="postMenuContent">
        <a href="#" class="postMenuItem">
          <i class="far fa-edit"></i>
          <div class="postMenuText">
            <h3>Edit</h3>
            <small>edit post text and video content.</small>
          </div>
        </a>
      </div>
      <div class="postMenuContent">
        <a href="#" class="postMenuItem">
          <i class="fas fa-trash"></i>
          <div class="postMenuText">
            <h3>Delete</h3>
            <small>delete the post from all news feeds.</small>
          </div>
        </a>
      <?php
      }
     ?>
   </div>
  </div>
  <div class="midelPost">
    <p class="PostText"><?php echo  $postTxt;?></p>
    <div class="gallery">
      <div class="img-container">
        <img src="../image/undraw_data_trends_b0wg.svg" alt="">
      </div>
      <div class="img-container">
        <img src="../image/undraw_data_trends_b0wg.svg" alt="">
      </div>
      <div class="img-container">
        <img src="../image/soccer.svg" alt="">
      </div>
      <div class="img-container">
        <video src="../image/GBWA-20190127130429.mp4"></video>
        <i class="fas fa-play"></i>
      </div>
    </div>
  </div>
</div>
