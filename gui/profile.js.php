
<script type="text/javascript">
function setEditFormValues(){
  $('main').css("margin-top","0");
  window.scrollTo({top: 0, behavior: 'smooth'});
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
      echo "$('#shirtH3').html('Hi Coach')";
    }else {
      echo "$(#tnumber).html('$tShirtNumber');";
    }
  }
   ?>
}
$(document).ready(function($){
  var pageName = window.location.pathname.split("/").pop();
  if (pageName == "profile") {
    setEditFormValues();
  }
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
          window.scrollTo({top: 0, behavior: 'smooth'});
          $('#editProfileForm').attr('action', page_url+data.url);
          setEditFormValues();
  			});
    }else if (pageName == 'contact') {
      var call_type = "contact";
      $.getJSON(page_url+'urlHandler.php', {call_type: call_type}, function(data, textStatus, xhr){
        console.log(data);
        $(document).attr("title", data.title);
        $(document).find('meta[name=description]').attr('content', data.description);
        $('main').html(data.data);
        $('main').css("margin-top","10vh");
        window.scrollTo({top: 0, behavior: 'smooth'});
      });
    }
    window.scrollTo({top: 0, behavior: 'smooth'});
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
  				window.history.pushState("", "", page_url+data.url);
          window.scrollTo({top: 0, behavior: 'smooth'});
          $('#editProfileForm').attr('action', page_url+data.url);
          setEditFormValues();
  			});
    }
    if (window.innerWidth < 768){
      hamburger.click();
    }
  });
  $('#contactLink').click(function(event){
    event.preventDefault();
    var call_type = "contact";
    pageName = window.location.pathname.split("/").pop();//get the current page name
    if (pageName != call_type) {
      $.getJSON(page_url+'urlHandler.php', {call_type: call_type}, function(data, textStatus, xhr){
        console.log(data);
        $(document).attr("title", data.title);
        $(document).find('meta[name=description]').attr('content', data.description);
        $('main').html(data.data);
        $('main').css("margin-top","10vh");
        window.history.pushState("", "", page_url+data.url);
        window.scrollTo({top: 0, behavior: 'smooth'});
      });
    }
  });
});
</script>
