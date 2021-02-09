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
          $_SESSION['birthday'] = $personData['age'];
          $_SESSION['phone'] = $personData['phone'];
          $_SESSION['lastTimeStamp'] = date('Y-m-d H:i:s');
          echo '<script>location.reload();</script>';//reload the page
          exit();
        }
    }

    public function validatePassword($email, $password)
    {
      $password = filter_var($password, FILTER_SANITIZE_STRING);
      $db = New database();
      $permission = $db->login($email, $password);
      if ($permission == -1){
        return 'worng password';
      }else{
        return '';
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

    public function updateInfo($password, $firstName, $lastName, $age, $phone)
    {
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
        $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
        $phone = filter_var($phone, FILTER_SANITIZE_STRING);

        $db = New database();
        if($db->updateInfo($_SESSION['email'], $password, $firstName, $lastName, $age, $phone)){
          $_SESSION['firstName'] = $firstName;
          $_SESSION['lastName'] = $lastName;
          $_SESSION['birthday'] = $age;
          $_SESSION['phone'] = $phone;
          return true;
        }else {
          return false;
        }
    }
    public function showTopPosts()
    {
      $postModel = new post();
      $result = $postModel->showTopPosts();
      if($result == -1){
        echo "<center>No Posts yet!</center>";
      }else {
        foreach ($result as $res) {
          $post_id = $res['id'];
          $postPublisher = $res['firstName'].' '. $res['lastName'];
          $postTxt = $res['text_content'];
          $postTime = strtotime($res['publish_time']);
          $commentCount = $postModel->getCommentCount($post_id);
          include "../gui/showPost.php";
        }
      }
    }
}
