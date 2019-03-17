<?php

namespace Illuminate\Notifications\Messages;

class DiscordEmbedAuthor implements DiscordEmbedObject
{
    /**
     * The name field of the author embed field.
     *
     * @var string $name
     */
    protected $name;

    /**
     * The url of the author embed field.
     *
     * @var string $url
     */
    protected $url;

    /**
     * The icon url of the author embed field.
     *
     * @var string $icon_url
     */
    protected $icon_url;

    /**
     * The proxy icon url of the author embed field.
     *
     * @var string $proxy_icon_url
     */
    protected $proxy_icon_url;

    /**
     * Set the name of the author.
     *
     * @param  string $name
     * @return $this
     */
    public function name($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the url of the author.
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
     * Set the icon url of the author.
     *
     * @param  string $icon_url
     * @return $this
     */
    public function iconUrl($icon_url)
    {
        $this->icon_url = $icon_url;

        return $this;
    }

    /**
     * Set the proxy icon url of the author.
     *
     * @param  string $proxy_icon_url
     * @return $this
     */
    public function proxyIconUrl($proxy_icon_url)
    {
        $this->proxy_icon_url = $proxy_icon_url;

        return $this;
    }

    /**
     * Get the array representation of the author embed field.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name'           => $this->name,
            'url'            => $this->url,
            'icon_url'       => $this->icon_url,
            'proxy_icon_url' => $this->proxy_icon_url,
        ];
    }
}
