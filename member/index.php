<?php
include_once "../Model/member.php";
include "../gui/navbar.html";
$model = new member();
?>
<main>
  <div class="content">
    <div class="content_center">
        <?php
        include "../gui/post.php";
        include "../gui/post.php";
         ?>
     </div>
   </div>
</main>
<?php
require "../gui/profile.js.php";
include "../gui/footer.html";
?>
