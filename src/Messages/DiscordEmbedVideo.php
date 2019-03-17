<?php

namespace Illuminate\Notifications\Messages;

class DiscordEmbedVideo implements DiscordEmbedObject
{
    /**
     * The url field of the video embed field.
     *
     * @var string $url
     */
    protected $url;

    /**
     * The height of the video embed field.
     *
     * @var integer $height
     */
    protected $height;

    /**
     * The width of the video embed field.
     *
     * @var integer $width
     */
    protected $width;

    /**
     * Set the url of the video.
     *
     * @param  string $url
     * @return $this
     */
    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the height of the video.
     *
     * @param  integer $height
     * @return $this
     */
    public function height($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Set the width of the video.
     *
     * @param  integer $width
     * @return $this
     */
    public function width($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the array representation of the video embed field.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'url'    => $this->url,
            'height' => $this->height,
            'width'  => $this->width,
        ];
    }
}
