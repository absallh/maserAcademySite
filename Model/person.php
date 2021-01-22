<?php
include_once "includeFiles.php";

class person
{
    protected $email;
    protected $password;
    protected $firstName;
    protected $lastName;
    protected $age;
    protected $phone;
    protected $permission;


    /**
     * Default constructor
     */
    public function __construct()
    {
    }

    public function login($email, $password)
    {
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $cookie_name = 'loginTimes';
        if(isset($_COOKIE[$cookie_name])){
          setcookie($cookie_name, $_COOKIE[$cookie_name]+1, time() + (86400), "/");
          if ($_COOKIE[$cookie_name] > 5){
            echo '<script>alert("you can not try to log in again for the day");</script>';
            exit;
          }
        }else {
            setcookie($cookie_name, 1, time() + (86400), "/");//86400 = 1day
        }
        $db = New database();
        $permission = $db->login($email, $password);
        if ($permission == -1){
          session_unset();
          session_destroy();
          echo '<script>alert("wrong user name or password");</script>';
        }else {
          setcookie($cookie_name, 0, time() - (86400), "/");//delete the cookie
          $personData = $db->getPersonData($email);
          $db->updateLastActiveTime($email);
          $_SESSION["email"] = $personData['mail'];
          $_SESSION['permission'] = $personData['permission'];
          $_SESSION['firstName'] = $personData['firstName'];
          $_SESSION['lastName'] = $personData['lastName'];
          $_SESSION['lastTimeStamp'] = date('Y-m-d H:i:s');
          echo '<script>location.reload();</script>';//reload the page
          exit();
        }
    }

    public function enterTheSystem($permission)
    {
      if ($permission == 1){
          header("Location: admin/");
          exit();
      }elseif ($permission == 2) {
          header("Location: member/");
          exit();
      }else {
        echo '<script>alert("there is some error in your account
            please tell your admin that the system can not define permission to you");</script>';
      }
    }

    private function comment(int $post_id, string $comment_txt, time $time, string $publisher): void
    {
        return;
    }

    private function updateComment(int $post_id, string $comment_txt, time $time, string $publisher): void
    {
        return;
    }

    protected function updateInfo(string $password, string $firstName, string $lastName, int $age, string $phone): void
    {
        return;
    }

}
