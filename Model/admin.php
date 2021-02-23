<?php
include_once "includeFiles.php";

class admin extends person
{
    private $allowed;
    public function __construct()
    {
      $this->allowed = array('png', 'jpg','jpeg', 'gif', 'bmp', 'ogg', 'ogv',
                            'avi', 'mov', 'wmv', 'flv', 'mp4', 'm4v', 'mpg');
        include_once "admin_session.php";
        $db = New database();
        $db->updateLastActiveTime($_SESSION['email']);
        $_SESSION['lastTimeStamp'] = date('Y-m-d H:i:s');
    }

    public function publishAPost($content_txt, $media)
    {
        $db = New database();
        $content_txt = trim(preg_replace('~[\r\n]+~', '<br>', $content_txt));
        $postId = $db->publishAPost($content_txt, $_SESSION['email']);
        if($media['name'][0]){
          $notAllowedCount = 0;
          $uploadedFiles = array();
          foreach ($media['tmp_name'] as $key => $value) {
            $fileName = $media['name'][$key];
            $fileTMPName = $media['tmp_name'][$key];
            $fileError = $media['error'][$key];
            $fileType = $media['type'][$key];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            if (in_array($fileActualExt, $this->allowed)) {
              if ($fileError == 0) {
                $fileNewName = uniqid('', true).'.'.$fileActualExt;
                $fileDestination = '../image/'.$fileNewName;
                move_uploaded_file($fileTMPName, $fileDestination);
                array_push($uploadedFiles, $fileNewName);
                $db->uploadMadia($postId, $fileNewName, $fileType);
              }else{
                echo "<script>alert('there was an error uploading the file');</script>";
              }
            }else {
              echo "<script>alert('$fileName is not allowed!');</script>";
              $notAllowedCount++;
            }
          }
          if ($notAllowedCount > 0) {
            $this->deletePost($postId);
          }
        }
        echo "<script>window.location.replace('./');</script>";
        exit;
    }

    public function deletePost($post_id)
    {
        $db = new database();
        $media = $db->getPostMedia($post_id);
        if ($media != -1) {
          foreach ($media as $item) {
            unlink('../image/'.$item['media_path']);
          }
        }
        $db->deletePost($post_id);
        header('Location: ./');
        exit;
    }

    public function updatePost($post_id, $content_txt)
    {
      $postModel = new post();
      $content_txt = trim(preg_replace('~[\r\n]+~', '<br>', $content_txt));
      $postModel->updateContent($post_id, $content_txt);
      header('Location: ./');
      exit;
    }

    public function searchOnMembers($key){
        $db = new database();
        $result;
        if ((strtolower($key) == "paid") || (strtolower($key) == "payed") || (strtolower($key) == "true")) {
          $result = $db->getPayedMember();
        }elseif ((strtolower($key) == "not paid") || (strtolower($key) == "not payed") || (strtolower($key) == "false")) {
          $result = $db->getNotPayedMember();
        }else {
          $result = $db->searchOnMembers($key);
        }
        return $result;
    }

    public function selectMemberPayed($email)
    {
        $db = new database();
        return $db->selectMemberPayed($email);
    }

    public function selectMemberNotPayed($email)
    {
        $db = new database();
        return $db->deletePayed($email);
    }

    public function getMemberData($email)
    {
        $db = new database();
        return $db->getPersonData($email);
    }

    public function getMemberPayHistory($email)
    {
        $db = new database();
        return $db->getPayHistory($email);
    }

    public function updateMemberInfo($oldEmail, $newEmail, $password, $fname, $lastname, $age, $phone, $t_shirt, $oldT_shirt)
    {
        $db = new database();
        return $db->AdminUpdateMemberInfo($oldEmail, $newEmail, $password, $fname, $lastname, $age, $phone, $t_shirt, $oldT_shirt);
    }

    public function addPayingDate($email, $date)
    {
        $db = new database();
        return $db->addPayingDate($email, $date);
    }

    public function deletePayingDate($email, $date)
    {
        $db = new database();
        return $db->deletePayingDate($email, $date);
    }

    public function updatePayingDate($email, $newDate, $oldDate)
    {
        $db = new database();
        return $db->updatePayingDate($email, $newDate, $oldDate);
    }

    public function deleteMember($memberEmail)
    {
        $db = new database();
        return $db->deleteMember($memberEmail);
    }

    private function addMember($email, $password, $fname, $lastName, $age, $phone)
    {
        return;
    }

    private function deleteComment($member, $post_id, $commentTime)
    {
        return;
    }

}
