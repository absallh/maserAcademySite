<!-- news feed -->
<div class="news_feed">
  <div class="news_feed_title">
    <img src="../image/soccer.svg" alt="user" />
    <div class="news_feed_title_content">
      <p><?php echo $postPublisher; ?></p>
      <span><?php echo date("j-n-Y g:i A", $postTime); ?> <i class="fas fa-globe-americas"></i></span>
    </div>
  </div>
  <div class="news_feed_description">
    <p class="news_feed_subtitle">
      <?php echo $postTxt; ?>
    </p>
    <div class="gallery">
      <?php
      $media = $postModel->getMultimedia($postId);
      foreach ($media as $item) {
        echo "<div class='img-container'>";
        if(strpos($item['media_type'], 'image') !== false){
          $src = $item['media_path'];
          echo "<img src='../image/$src' />";
        }else if(strpos($item['media_type'], 'video') !== false){
          $src = $item['media_path'];
          echo "<video src='../image/$src'></video>";
        }
        echo "</div>";
      }
      ?>
    </div>
  </div>
  <div class="likes_area">
    <div></div>
    <div class="comment_counts">
      <span><?php echo $commentCount; ?> Comments</span>
    </div>
  </div>

  <div class="divider"><hr /></div>
  <div class="likes_buttons">
    <div class="likes_buttons_links">
      <i class="far fa-comment-alt"></i>
      <span>Comment</span>
    </div>
  </div>
</div>
