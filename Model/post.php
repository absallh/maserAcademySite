<?php
class post
{

    public function __construct()
    {

    }

    public function showTopPosts(){
      $db = new database();
      return $db->showTopPosts();
    }

    public function getCommentCount($postID)
    {
      $db = new database();
      return $db->getCommentCount($postID);
    }

    public function getMultimedia($postID){
      $db = new database();
      return $db->getPostMedia($postID);
    }

    private function setContent($content)
    {

    }

}
