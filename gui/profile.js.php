<?php
if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
  isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $ssl = 'https';
  }
  else {
    $ssl = 'http';
  }

  $app_url = ($ssl  )
            . "://".$_SERVER['HTTP_HOST']
            . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
            . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
 ?>

<script type="text/javascript">
$(document).ready(function($){
  $('#NavprofileSpan').html('<?php echo $_SESSION['firstName'];?>');
  var page_url = '<?php echo $app_url?>/';

  window.onpopstate = function(){
    var pageName = window.location.pathname.split("/").pop();
    if (pageName == '') {
      location.reload();
    } else if (pageName == 'profile') {
      var call_type = "profile";
      $.getJSON(page_url+'urlHandler.php', {call_type: call_type}, function(data, textStatus, xhr)
  			{
  				console.log(data);
  				$(document).attr("title", data.title);
  				$(document).find('meta[name=description]').attr('content', data.description);
          $('main').html(data.data);
          $('main').css("margin-top","0");
          $('#editProfileForm').attr('action', page_url+data.url);
          $('#fname').val('<?php echo $_SESSION['firstName']; ?>');
          $('#lname').val('<?php echo $_SESSION['lastName']; ?>');
          $('#phone').val('<?php echo $_SESSION['phone']; ?>');
          $('#birthday').val('<?php echo $_SESSION['birthday']; ?>');
          $('#email').html('<?php echo $_SESSION['email']; ?>');
          <?php
          if ($_SESSION['permission'] == 1) {
            echo "$('#shirtH3').html('Hi Coach')";
          }else {
            $tShirtNumber = $model->getTshirtNumber();
            if($tShirtNumber == -1){
              echo "$('#shirtH3').html('you have not a t-shirt number, please contact with your trainer')";
            }else {
              echo "$(#tnumber).html('$tShirtNumber');";
            }
          }
           ?>
  			});
    }else if (pageName == 'contact') {
      var call_type = "contact";
      $.getJSON(page_url+'urlHandler.php', {call_type: call_type}, function(data, textStatus, xhr){
        console.log(data);
        $(document).attr("title", data.title);
        $(document).find('meta[name=description]').attr('content', data.description);
        $('main').html(data.data);
        $('main').css("margin-top","0");
      });
    }
  };
  $("#profileLink").click(function(event){
    event.preventDefault();
    var pageName = window.location.pathname.split("/").pop();
    var call_type = "profile";
    if (pageName != call_type) {
      $.getJSON(page_url+'urlHandler.php', {call_type: call_type}, function(data, textStatus, xhr)
  			{
  				console.log(data);
  				$(document).attr("title", data.title);
  				$(document).find('meta[name=description]').attr('content', data.description);
          $('main').html(data.data);
          $('main').css("margin-top","0");
  				window.history.pushState("", "", page_url+data.url);
          $('#editProfileForm').attr('action', page_url+data.url);
          $('#fname').val('<?php echo $_SESSION['firstName']; ?>');
          $('#lname').val('<?php echo $_SESSION['lastName']; ?>');
          $('#phone').val('<?php echo $_SESSION['phone']; ?>');
          $('#birthday').val('<?php echo $_SESSION['birthday']; ?>');
          $('#email').html('<?php echo $_SESSION['email']; ?>');
          <?php
          if ($_SESSION['permission'] == 1) {
            echo "$('#shirtH3').html('Hi Coach')";
          }else {
            $tShirtNumber = $model->getTshirtNumber();
            if($tShirtNumber == -1){
              echo "$('#shirtH3').html('you not have a t-shirt number, please contact with your trainer')";
            }else {
              echo "$(#tnumber).html('$tShirtNumber');";
            }
          }
           ?>
  			});
    }
    if (window.innerWidth < 768){
      hamburger.click();
    }
  });
  $('#contactLink').click(function(event){
    event.preventDefault();
    var call_type = "contact";
    var pageName = window.location.pathname.split("/").pop();
    if (pageName != call_type) {
      $.getJSON(page_url+'urlHandler.php', {call_type: call_type}, function(data, textStatus, xhr){
        console.log(data);
        $(document).attr("title", data.title);
        $(document).find('meta[name=description]').attr('content', data.description);
        $('main').html(data.data);
        $('main').css("margin-top","0");
        window.history.pushState("", "", page_url+data.url);
      });
    }
  });
});
</script>
