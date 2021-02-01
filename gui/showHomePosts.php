<div class="fullscreenMode">
  <i class="fas fa-times"></i>
  <img src="" alt="" class="fullscreen-img" id="fullscreenIMG"/>
  <video src="" autoplay controls id="fullscreenVIDEO" class="fullscreen-img" style="display: none;"></video>
</div>

<div class="content">
  <div class="content_center">
      <?php
        $postModel = new post();
        $result = $postModel->showTopPosts();
        if($result == -1){
          echo "No Posts yet!";
        }else {
          foreach ($result as $res) {
            $postId = $res['id'];
            $postPublisher = $res['firstName'].' '. $res['lastName'];
            $postTxt = $res['text_content'];
            $postTime = strtotime($res['publish_time']);
            $commentCount = $postModel->getCommentCount($postId);
            include "../gui/post.php";
          }
        }
       ?>
   </div>
 </div>