<?php
  //start the session
  include_once "../Model/admin.php";
  $model = new admin();
  if (isset($_POST['makePost'])) {
    $model->publishAPost($_POST['postTXT'], $_FILES['file']);
  }elseif (isset($_GET['DeletePost'])) {
    $model->deletePost($_GET['DeletePost']);
  }elseif (isset($_GET['EditPost'])) {
    $model->updatePost($_GET['EditPost'], $_GET['postTXT']);
  }
  include "../gui/navbar.php";
?>
<main>
  <form action='./' method="get">
    <div class="editPostContainer">
      <div class="publishPostTop">
        <span><i class="far fa-edit"></i> Edit Post</span>
        <div class="closeBtn" style="display: block;" onclick="closeEditPost();">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="editPostMiddel">
        <textarea name="postTXT" placeholder="What's in your mind, Coach?"></textarea>
      </div>
      <div class="publishPostBottom" style="border: none;">
        <button type="submit" name="EditPost"><i class="fas fa-file-upload"></i> submit</button>
      </div>
    </div>
  </form>
  <div class="centerDiv">
    <?php
      include "../gui/publishPost.html";
     ?>
  </div>
  <?php
    $model->showTopPosts();
   ?>
   <script src="../gui/closeFullScreen.js" charset="utf-8"></script>
   <script src="../gui/showPost.js" charset="utf-8"></script>
</main>
<?php
  include "../gui/footer.html";
?>
