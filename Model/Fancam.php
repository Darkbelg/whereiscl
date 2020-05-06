<?php


class Fancam
{
    private $videoId;
    private $videoTitle;
    private $thumbnail;

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

    /**
     * Get the value of thumbnail
     */ 
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set the value of thumbnail
     *
     * @return  self
     */ 
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
