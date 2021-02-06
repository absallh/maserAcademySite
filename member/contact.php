<?php
include_once "../Model/member.php";
include "../gui/navbar.php";
$model = new member();
?>
<main>
  <?php
  include "../gui/contact.html";

  //Include required PHPMailer files
  require '../phpMailer/PHPMailer.php';
  require '../phpMailer/SMTP.php';
  require '../phpMailer/Exception.php';
  //Define name spaces
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  if (isset($_GET['message'])){
    //Create instance of PHPMailer
    $mail = new PHPMailer();
    //Set mailer to use smtp
    $mail->isSMTP();
    //Define smtp host
    $mail->Host = "smtp.gmail.com";
    //Enable smtp authentication
    $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
    $mail->SMTPSecure = "tls";
    //Port to connect smtp
    $mail->Port = "587";
    //Set gmail username
    $mail->Username = constant("GMAILUSERNAME");
    //Set gmail password
    $mail->Password = constant("GMAILPASS");
    //Email subject
    $mail->Subject = $_SESSION['firstName'].' '.$_SESSION['lastName']." try to contact you";
    //Set sender email
    $mail->setFrom($_SESSION['email'], $_SESSION['firstName'].' '.$_SESSION['lastName']);
    //Enable HTML
    $mail->isHTML(true);
    //Email body
    $mail->Body = $_GET['message'];
    //Add recipient
    $mail->addAddress(constant("GMAILUSERNAME"));
    //set replay to
    $mail->ClearReplyTos();
    $mail->addReplyTo($_SESSION['email'], $_SESSION['firstName'].' '.$_SESSION['lastName']);
    //Finally send email
    if ($mail->send()){
      echo "<script>thank_to_the_user();</script>";
    }else{
      echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
    }
    //Closing smtp connection
    $mail->smtpClose();
  }
  ?>
</main>
<?php
require "../gui/profile.js.php";
include "../gui/footer.html";
?>
