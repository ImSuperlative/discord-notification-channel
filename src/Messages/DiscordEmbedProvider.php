<?php

namespace Illuminate\Notifications\Messages;

class DiscordEmbedProvider implements DiscordEmbedObject
{
    /**
     * The name field of the provider embed field.
     *
     * @var string $name
     */
    protected $name;

    /**
     * The url of the provider embed field.
     *
     * @var string $url
     */
    protected $url;

    /**
     * Set the name of the provider.
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
     * Set the url of the provider.
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
     * Get the array representation of the provider embed field.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->name,
            'url'  => $this->url,
        ];
    }
}
