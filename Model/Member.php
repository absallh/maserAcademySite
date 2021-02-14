<?php
include_once "includeFiles.php";

class Member extends person
{
    private $payed;
    private $player_number;

    public function __construct()
    {
        include_once "member_session.php";
        $db = New database();
        $db->updateLastActiveTime($_SESSION['email']);
        $_SESSION['lastTimeStamp'] = date('Y-m-d H:i:s');
    }
    private function isPayed(string $member)
    {
        return;
    }

    private function deleteHisComment(string $member, int $post_id, time $time)
    {
        return;
    }

    private function seeAPost(int $post_id, string $member)
    {
        return;
    }

    public function getTshirtNumber(){
      $db = New database();
      return $db->getTshirtNumber($_SESSION['email']);
    }

    public function signup ($email, $firstName, $lastName, $password, $birthday, $phone){
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $firstName = filter_var($firstName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $firstName = ucwords($firstName);
        $lastName = filter_var($lastName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $lastName = ucwords($lastName);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $phone = filter_var($phone, FILTER_SANITIZE_STRING);
        $birthday = date("Y-m-d", strtotime($birthday));

        $db = New database();
        if($db->signup($email, $firstName, $lastName, $password, $birthday, $phone)){
          $_SESSION['email'] = $email;
          $_SESSION['permission'] = 2;
          $_SESSION['firstName'] = $firstName;
          $_SESSION['lastName'] = $lastName;
          $_SESSION['lastTimeStamp'] = date("Y-m-d h:i:sa");
          echo '<script>location.reload();</script>';//reload the page
          exit;
        }else {
          echo '<script>alert("you entered data that already exist at another acount");</script>';
        }
    }
}
