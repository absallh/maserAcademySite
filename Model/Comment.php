<?php

class Comment
{

    /** @var string */
    private string $content;

    /** @var int */
    private int $post_id;

    /** @var time */
    private time $time;



    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param string $publisher
     * @param int $post
     * @param string $content
     * @param time $time
     * @return void
     */
    private function uploadComment(string $publisher, int $post, string $content, time $time): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param string $publisher
     * @param int $post
     * @param time $time
     * @return void
     */
    private function deleteComment(string $publisher, int $post, time $time): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param string $publisher
     * @param int $post
     * @param string $content
     * @param time $time
     * @return void
     */
    private function updateComment(string $publisher, int $post, string $content, time $time): void
    {
        // TODO implement here
        return null;
    }

}
