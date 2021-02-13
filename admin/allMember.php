<?php
  //start the session
  include_once "../Model/admin.php";
  $model = new admin();
  include "../gui/navbar.php";
?>
<main>
  <div class="searchContainer">
    <div class="search-box">
      <input type="text" name="search" placeholder="Search" class="search-input">
      <div class="search-btn">
        <i class="fas fa-search" aria-hidden="true"></i>
      </div>
    </div>
  </div>

  <div class="allMemberContainer">
    <?php $model->showAllMember(); ?>
  </div>

</main>
<script src="../gui/AllMember.js" charset="utf-8"></script>
<?php
  include "../gui/footer.html";
?>
