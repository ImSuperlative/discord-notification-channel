<?php

namespace Illuminate\Notifications\Messages;

use Closure;

class DiscordMessage
{
    /**
     * The "level" of the notification (info, success, warning, error).
     *
     * @var string $level
     */
    public $level = 'info';

    /**
     * The text content of the message.
     *
     * @var string $content
     */
    public $content;

    /**
     * The username to send the message from.
     *
     * @var string|null $username
     */
    public $username;

    /**
     * The user icon for the message.
     *
     * @var string|null $image
     */
    public $icon;

    /**
     * Indicates if message should be text-to-speech.
     *
     * @var bool $tts
     */
    public $tts;

    /**
     * The contents of the file being sent.
     *
     * @var string|null $file
     */
    public $file;

    /**
     * The message's embeds.
     *
     * @var array $embeds
     */
    public $embeds = [];

    /**
     * multipart/form-data only
     *
     * @var string|null $payload_json
     */
    public $payload_json;

    /**
     * Additional request options for the Guzzle HTTP client.
     *
     * @var array $http
     */
    public $http = [];

    /**
     * Indicate that the notification gives information about an operation.
     *
     * @return $this
     */
    public function info()
    {
        $this->level = 'info';

        return $this;
    }

    /**
     * Indicate that the notification gives information about a successful operation.
     *
     * @return $this
     */
    public function success()
    {
        $this->level = 'success';

        return $this;
    }

    /**
     * Indicate that the notification gives information about a warning.
     *
     * @return $this
     */
    public function warning()
    {
        $this->level = 'warning';

        return $this;
    }

    /**
     * Indicate that the notification gives information about an error.
     *
     * @return $this
     */
    public function error()
    {
        $this->level = 'error';

        return $this;
    }

    /**
     * Set the content of the Discord message.
     *
     * @param  string  $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set a custom username and optional icon for the Discord message.
     *
     * @param  string  $username
     * @param  string|null  $icon
     * @return $this
     */
    public function from($username, $icon = null)
    {
        $this->username = $username;

        if (! is_null($icon)) {
            $this->icon = $icon;
        }

        return $this;
    }

    /**
     * Indicates if message should be text-to-speech.
     *
     * @return $this
     */
    public function tts()
    {
        $this->tts = true;

        return $this;
    }

    /**
     * Set the file of the Discord message.
     *
     * @param  string  $file
     * @return $this
     */
    public function file($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Define an embed for the message.
     *
     * @param  \Closure  $callback
     * @return $this
     */
    public function embed(Closure $callback)
    {
        $this->embeds[] = $embed = new DiscordEmbed;

        $callback($embed);

        return $this;
    }

    /**
     * Set the json payload of the Discord message.
     *
     * @param  string  $json
     * @return $this
     */
    public function payload($json)
    {
        $this->payload_json = $json;

        return $this;
    }

    /**
     * Get the color for the message.
     *
     * @return integer|null
     */
    public function color()
    {
        switch ($this->level) {
            case 'info':
                return 7506394;
            case 'success':
                return 3381504;
            case 'error':
                return 13382400;
            case 'warning':
                return 16763904;
        }
    }

    /**
     * Set additional request options for the Guzzle HTTP client.
     *
     * @param  array  $options
     * @return $this
     */
    public function http(array $options)
    {
        $this->http = $options;

        return $this;
    }
}
