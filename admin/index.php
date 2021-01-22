<?php
  include_once "../Model/admin.php";
  include "../gui/navbar.html";
  $model = new admin();
?>
<main>
  <div class="share_continar">
    <div class="share">
      <div class="share_upSide">
        <img src="../image/soccer.svg" alt="profile" />
        <div class="input-field">
          <i class="fas fa-align-left"></i>
          <input type="text" placeholder="What's on your mind, coach?" />
        </div>
      </div>
    </div>
  </div>
  <form method="post">
    <div class="makePostContainer">
      <i class="fas fa-times"></i>
      <div class="makePost">
        <h4>create post</h4>
        <div class="divider"><hr /></div>
        <div class="makePostinput">
          <i class="fas fa-quote-left"></i>
          <textarea name="postTXT" placeholder="what is in your mind?"></textarea>
        </div>
        <div class="divider"><hr /></div>
        <div class="likes_buttons">
          <div class="uploadImg">
            <i class="fas fa-photo-video photo-video-icon"></i>&nbsp;
            <span>Photo/Video</span>
          </div>
        </div>
        <div class="share_continar">
          <button type="submit" name="submit" disabled>
            <span>post</span>
          </button>
        </div>
      </div>
    </div>
  </form>
  <div class="content">
    <div class="content_center">
        <?php
          include "../gui/post.php";
          include "../gui/post.php";
         ?>
     </div>
   </div>
</main>
<script src="../gui/admin.js"></script>
<?php
  include "../gui/footer.html";
?>
