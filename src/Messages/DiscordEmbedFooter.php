<?php

namespace Illuminate\Notifications\Messages;

class DiscordEmbedFooter implements DiscordEmbedObject
{
    /**
     * The text field of the footer embed field.
     *
     * @var string $text
     */
    protected $text;

    /**
     * The icon url of the footer embed field.
     *
     * @var string $icon_url
     */
    protected $icon_url;

    /**
     * The proxy icon url of the footer embed field.
     *
     * @var string $proxy_icon_url
     */
    protected $proxy_icon_url;

    /**
     * Set the text of the footer.
     *
     * @param  string $text
     * @return $this
     */
    public function text($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Set the icon url of the footer.
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
     * Set the proxy icon url of the footer.
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
     * Get the array representation of the footer embed field.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'text'           => $this->text,
            'icon_url'       => $this->icon_url,
            'proxy_icon_url' => $this->proxy_icon_url,
        ];
    }
}
