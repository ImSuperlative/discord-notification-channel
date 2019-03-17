<?php

namespace Illuminate\Notifications\Messages;

class DiscordEmbedImage implements DiscordEmbedObject
{
    /**
     * The url field of the image embed field.
     *
     * @var string $url
     */
    protected $url;

    /**
     * The proxy url of the image embed field.
     *
     * @var string $proxy_url
     */
    protected $proxy_url;

    /**
     * The height of the image embed field.
     *
     * @var integer $height
     */
    protected $height;

    /**
     * The width of the image embed field.
     *
     * @var integer $width
     */
    protected $width;

    /**
     * Set the url of the image.
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
     * Set the proxy url of the image.
     *
     * @param  string $proxy_url
     * @return $this
     */
    public function proxyUrl($proxy_url)
    {
        $this->proxy_url = $proxy_url;

        return $this;
    }

    /**
     * Set the height of the image.
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
     * Set the width of the image.
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
     * Get the array representation of the image embed field.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'url'       => $this->url,
            'proxy_url' => $this->proxy_url,
            'height'    => $this->height,
            'width'     => $this->width,
        ];
    }
}
