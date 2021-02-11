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

    public function updateContent($post_id, $content)
    {
      $db = new database();
      return $db->updatePostContent($post_id, $content);
    }

    public function getTopComments($post_id)
    {
      $db = new database();
      return $db->getTopPostComments($post_id);
    }

}
