<?php


class Fancam
{
    private $videoId;
    private $videoTitle;

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param mixed $id
     */
    public function setVideoId($id)
    {
        $this->videoId = $id;
    }

    /**
     * @return mixed
     */
    public function getVideoTitle()
    {
        return $this->videoTitle;
    }

    /**
     * @param mixed $videoTitle
     */
    public function setVideoTitle($videoTitle)
    {
        $this->videoTitle = $videoTitle;
    }
}
