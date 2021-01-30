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

    private function createNewID()
    {

    }

    private function setContent($content)
    {

    }

    private function uploadMedia($media)
    {

    }

}
