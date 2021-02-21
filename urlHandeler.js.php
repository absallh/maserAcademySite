<script type="text/javascript">
  <?php
    if ($_SESSION['permission'] == 1) {
    ?>
      function loadAllTrainee() {
        var page_url = window.location.href;
        page_url = page_url.replace(page_url.split("/").pop(), '');
        $.getJSON(page_url+'urlHandler.php', {call_type: 'goToAllTrainee'}, function(data, textStatus, xhr) {
          console.log(data);
          $('main').html(data.data);
          $('main').css("margin-top","11vh");
          $(document).attr("title", data.title);
          $(document).find('meta[name=description]').attr('content', data.description);
          window.scrollTo({top: 0, behavior: 'smooth'});
          $('.search-input').keyup();
        });
        closeHamburger();
      }
      function goToAllTrainee() {
        var page_url = window.location.href;
        page_url = page_url.replace(page_url.split("/").pop(), '');
        loadAllTrainee();
        var pageName = window.location.pathname.split("/").pop();
        if (pageName != 'allTrainee') {
          window.history.pushState("", "", page_url+"allTrainee");
        }
      }
    <?php
    }
   ?>
   function loadEditProfile() {
     var page_url = window.location.href;
     page_url = page_url.replace(page_url.split("/").pop(), '');
     $.getJSON(page_url+'urlHandler.php', {call_type: 'editProfile'}, function(data, textStatus, xhr) {
       console.log(data);
       $('main').html(data.data);
       $('main').css("margin-top","10vh");
       $(document).attr("title", data.title);
       $(document).find('meta[name=description]').attr('content', data.description);
       window.scrollTo({top: 0, behavior: 'smooth'});
       loadEditProfileData();
     });
     closeHamburger();
   }
   function goToEditProfile() {
     var page_url = window.location.href;
     page_url = page_url.replace(page_url.split("/").pop(), '');
     loadEditProfile();
     var pageName = window.location.pathname.split("/").pop();
     if (pageName != 'profile') {
       window.history.pushState("", "", page_url+"profile");
     }

   }
   function loadContactus() {
     var page_url = window.location.href;
     page_url = page_url.replace(page_url.split("/").pop(), '');
     $.getJSON(page_url+'urlHandler.php', {call_type: 'contact'}, function(data, textStatus, xhr) {
       console.log(data);
       $('main').html(data.data);
       $('main').css("margin-top","10vh");
       $(document).attr("title", data.title);
       $(document).find('meta[name=description]').attr('content', data.description);
       window.scrollTo({top: 0, behavior: 'smooth'});
     });
     closeHamburger();
   }
   function goToContactus() {
     var page_url = window.location.href;
     page_url = page_url.replace(page_url.split("/").pop(), '');
     loadContactus();
     var pageName = window.location.pathname.split("/").pop();
     if (pageName != 'contact') {
       window.history.pushState("", "", page_url+"contact");
     }
   }

   window.onpopstate = function () {
     var pageName = window.location.pathname.split("/").pop();

     if (pageName == 'profile') {
       loadEditProfile();
     }
     else if (pageName == 'contact') {
       loadContactus();
     }
     <?php if ($_SESSION['permission'] == 1){?>
       else if (pageName == 'allTrainee') {
          loadAllTrainee();
       }
     <?php } ?>
     else {
       location.reload();
     }
   }
</script>
