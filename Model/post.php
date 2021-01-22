<?php
class post
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $content;

    /** @var [object Object] */
    private media $media;




    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @return int
     */
    private function createNewID(): int
    {
        // TODO implement here
        return 0;
    }

    /**
     * @param string $content
     * @return void
     */
    private function setContent(string $content): void
    {
        // TODO implement here
        return null;
    }

    /**
     * @param  $media
     * @return void
     */
    private function uploadMedia( $media): void
    {
        // TODO implement here
        return null;
    }

}
