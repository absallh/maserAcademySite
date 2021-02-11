<div class="showPostContainer">
  <div id="<?php echo $post_id;?>Post">
    <div class="topPost">
      <div class="rightTopPost">
        <img src="../image/soccer.svg">
        <div class="postMatadata">
          <h4><?php echo $postPublisher; ?></h4>
          <span>&nbsp;&nbsp;<?php echo date("j-M-Y g:i A", $postTime); ?> <i class="fas fa-globe-africa"></i></span>
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
        <div class="postMenuContent" onclick="openEditPost(<?php echo $post_id; ?>)">
          <div class="postMenuItem">
            <i class="far fa-edit"></i>
            <div class="postMenuText">
              <h3>Edit</h3>
              <small>edit post text only(you can't edit media).</small>
            </div>
          </div>
        </div>
        <div class="postMenuContent" onclick="window.location.href = './?DeletePost=<?php echo $post_id; ?>';">
          <div class="postMenuItem">
            <i class="fas fa-trash"></i>
            <div class="postMenuText">
              <h3>Delete</h3>
              <small>delete the post from all news feeds.</small>
            </div>
          </div>
        <?php
        }
       ?>
     </div>
    </div>
    <div class="midelPost">
      <p class="PostText" id="<?php echo $post_id.'TXT';?>"><?php echo  $postTxt;?></p>
        <?php
        if ($multimedia != -1) {
          ?>
          <div class="gallery">
          <?php
          foreach ($multimedia as $media) {
            ?>
            <div class="img-container">
            <?php
            if (strpos($media['media_type'], 'image') !== false) {

              echo "<img src='../image/" . $media['media_path'] . "'>";
            }else {
              echo "<video src='../image/" . $media['media_path'] ."'></video>
                    <i class='fas fa-play'></i>";
            }
            ?>
            </div>
            <?php
          }
          ?>
          </div>
          <?php
        }
        ?>
    </div>
    <div class="bottomPost">
      <div class="upperBottomPost" >
        <p class="commentCount" onclick="openComments(<?php echo $post_id;?>);"><?php echo $commentCount; ?> comments</p>
      </div>
      <div class="bottomBottomPost">
        <div class="commentsBTN" onclick="openComments(<?php echo $post_id;?>);">
          <i class="far fa-comment"></i>&nbsp;
          <span>Comments</span>
        </div>
      </div>
    </div>
  </div>
  <div class="comments" id="<?php echo $post_id;?>C">
    <div class="topCommentsDIV">
      <p class="commentCount"><?php echo $commentCount; ?> comments</p>
      <div class="closeBtn" style="display: block;" onclick="closeComments(<?php echo $post_id;?>);">
        <i class="fas fa-times"></i>
      </div>
    </div>
    <div class="midelCommentsDIV">
      <?php
      if ($comments != -1) {
        foreach ($comments as $oneComment) {
          ?>
          <div class="oneComment">
            <div class="commentContainer">
              <div class="topComment">
                <div class="commentMatadata">
                  <h4><?php echo $oneComment['firstName'].' '.$oneComment['lastName']; ?></h4>
                  <span>&nbsp;&nbsp;<?php echo date("j-M-Y g:i A", strtotime($oneComment['commentTime'])); ?></span>
                  <div class="commentTXT">
                    <p><?php echo $oneComment['content']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          if (($_SESSION['permission'] == 1) || ($oneComment['mail'] == $_SESSION['email'])) {
          ?>
          <div class="commentOption">
            <span>Edit</span>&nbsp; - &nbsp;<span>Delete</span>
          </div>
          <?php
          }
        }
      }
       ?>
    </div>
    <div class="bottomCommentsDIV">
      <form method="get">
        <div class="writeCommentInput">
          <i class="far fa-comment-dots"></i>
          <input type="text" name="commentTXT" placeholder="Write a Comment">
        </div>
        <button class="writeCommentBTN" type="submit" name="comment" value="<?php echo $post_id;?>">
          <i class="fas fa-share"></i>
        </button>
      </form>
    </div>
  </div>
</div>
