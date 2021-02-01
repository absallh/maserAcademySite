<?php
include_once "includeFiles.php";

class admin extends person
{
    private $allowed;
    public function __construct()
    {
      $this->allowed = array('psb', 'bmp', 'rle', 'dib', 'dcm', 'dc3', 'dic', 'eps', 'psd',
          'pdd', 'psdt', 'gif', 'iff', 'tdi', 'jpg', 'jpeg', 'jpe', 'jpf', 'jpx', 'jp2',
          'j2c', 'j2k', 'jpc', 'jps', 'mpo', 'pcx', 'raw', 'pxr', 'png', 'pbm', 'pgm',
          'ppm', 'pnm', 'pfm', 'pam', 'sct', 'tga', 'vda', 'icb', 'vst', 'tif', 'tiff',
          'svg', 'webm', 'mkv', 'flv', 'vob', 'ogv', 'ogg', 'drc', 'gifv', 'mng', 'avi',
          'mts', 'm2ts', 'ts', 'mov', 'qt', 'wmv', 'yuv', 'rm', 'rmvb', 'viv', 'asf',
          'amv', 'mp4', 'm4p', 'mpg', 'mp2', 'mpeg', 'mpe', 'mpv', 'm2v', 'm4v', 'svi',
          '3gp', '3g2', 'mxf', 'roq', 'nsv', 'f4v', 'f4p', 'f4a', 'f4b');
        include_once "admin_session.php";
        $db = New database();
        $db->updateLastActiveTime($_SESSION['email']);
        $_SESSION['lastTimeStamp'] = date('Y-m-d H:i:s');
    }

    public function publishAPost($content_txt, $media)
    {
        $db = New database();
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
    }

    private function updateMemberInfo($email, $password, $fname, $lastname, $age, $phone)
    {
        return ;
    }

    private function deleteMember($memberEmail)
    {
        return;
    }

    private function addMember($email, $password, $fname, $lastName, $age, $phone)
    {
        return;
    }

    private function deleteComment($member, $post_id, $commentTime)
    {
        return;
    }

    private function setPlayerNumber($player, $number)
    {
        return;
    }

}
