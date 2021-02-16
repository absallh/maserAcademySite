<script src="../gui/navbar.js" charset="utf-8"></script>
<script src="../gui/closeFullScreen.js" charset="utf-8"></script>
<script src="../gui/showPost.js" charset="utf-8"></script>
<script src="../gui/editProfile.js" charset="utf-8"></script>
<?php
include '../urlHandeler.js.php';
if ($_SESSION['permission'] == 1) {
  ?>
  <script src="../gui/AllMember.js" charset="utf-8"></script>
  <script src="../gui/publishPost.js" charset="utf-8"></script>
  <?php
} ?>

    <footer>
      <div class="footer-main-div">
        <div class="footer-social-icons">
          <ul>
            <li class="facebook"><a href="https://www.facebook.com/groups/2833559340002764/"><i class="fab fa-facebook-f"></i></a></li>
            <li class="whatsapp"><a href="#"><i class="fab fa-whatsapp"></i></a></li>
          </ul>
        </div>

        <div class="footer-menu-one">
          <ul>
            <li><a href="./">home</a></li>
            <li id="contactLink"><a onclick="goToContactus();">Contact</a></li>
            <li><a href="../logout.php">logout</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-buttom">
        <p>copy right &copy; 2020 MaserAcademy</p>
      </div>
    </footer>
  </body>
</html>
