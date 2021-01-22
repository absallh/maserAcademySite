<?php
include_once "includeFiles.php";

class admin extends person
{

    public function __construct()
    {
        include_once "admin_session.php";
    }

    private function publishAPost($content_txt, $time, $media)
    {
        // TODO implement here
        return;
    }

    private function deletePost($post_id)
    {
        // TODO implement here
        return ;
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
