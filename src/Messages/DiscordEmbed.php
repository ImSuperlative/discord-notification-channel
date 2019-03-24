<?php

namespace Illuminate\Notifications\Messages;

use DateTimeInterface;

class DiscordEmbed
{

    /**
     * The embed's title.
     *
     * @var string $title
     */
    public $title;

    /**
     * The embed's type.
     *
     * @var string $type
     */
    public $type;

    /**
     * The embed's description.
     *
     * @var string $description
     */
    public $description;

    /**
     * The embed's url.
     *
     * @var string $url
     */
    public $url;

    /**
     * The embed's ISO8601 timestamp.
     *
     * @var string $timestamp
     */
    public $timestamp;

    /**
     * The embed's color.
     *
     * @var integer $color
     */
    public $color;

    /**
     * The embed's footer.
     *
     * @var \Illuminate\Notifications\Messages\DiscordEmbedFooter $footer
     */
    public $footer;

    /**
     * The embed's image.
     *
     * @var \Illuminate\Notifications\Messages\DiscordEmbedImage $image
     */
    public $image;

    /**
     * The embed's thumbnail.
     *
     * @var \Illuminate\Notifications\Messages\DiscordEmbedImage $thumbnail
     */
    public $thumbnail;

    /**
     * The embed's video.
     *
     * @var \Illuminate\Notifications\Messages\DiscordEmbedVideo $video
     */
    public $video;

    /**
     * The embed's provider.
     *
     * @var \Illuminate\Notifications\Messages\DiscordEmbedProvider $provider
     */
    public $provider;

    /**
     * The embed's author.
     *
     * @var \Illuminate\Notifications\Messages\DiscordEmbedAuthor $author
     */
    public $author;

    /**
     * The embed's fields.
     *
     * @var array $fields
     */
    public $fields;

    /**
     * Set the title of the embed.
     *
     * @param  string  $title
     * @param  string|null  $url
     * @return $this
     */
    public function title($title, $url = null)
    {
        $this->title = $title;
        $this->url = $url;

        return $this;
    }

    /**
     * Set the type of the embed.
     *
     * @param  string  $type
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the description of the embed.
     *
     * @param  string  $description
     * @return $this
     */
    public function description($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the timestamp.
     *
     * @param \DateTimeInterface|\DateInterval $timestamp
     * @return $this
     */
    public function timestamp($timestamp)
    {
        $this->timestamp = $timestamp->format(DateTimeInterface::ISO8601);

        return $this;
    }

    /**
     * Set the color of the embed. Valid value <= 16777215
     *
     * @param  integer  $color
     * @return $this
     */
    public function color($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Set the footer content.
     *
     * @param  \Closure|string  $text
     * @param  string  $icon_url
     * @return $this
     */
    public function footer($text, $icon_url = '')
    {
        if (is_callable($text)) {
            $callback = $text;

            $callback($embedFooter = new DiscordEmbedFooter);

            $this->footer = $embedFooter;

            return $this;
        }

        $this->footer = new DiscordEmbedFooter;
        $this->footer
            ->text($text)
            ->iconUrl($icon_url);

        return $this;
    }

    /**
     * Set the image URL.
     *
     * @param  \Closure|string  $url
     * @return $this
     */
    public function image($url)
    {
        if (is_callable($url)) {
            $callback = $url;

            $callback($embedImage = new DiscordEmbedImage);

            $this->image = $embedImage;

            return $this;
        }

        $this->image = new DiscordEmbedImage;
        $this->image->url($url);

        return $this;
    }

    /**
     * Set the embed thumbnail.
     *
     * @param  \Closure|string  $url
     * @return $this
     */
    public function thumb($url)
    {
        if (is_callable($url)) {
            $callback = $url;

            $callback($embedThumb = new DiscordEmbedImage);

            $this->thumbnail = $embedThumb;

            return $this;
        }

        $this->thumbnail = new DiscordEmbedImage;
        $this->thumbnail->url($url);

        return $this;
    }

    /**
     * Set the embed video.
     *
     * @param  \Closure|string  $url
     * @return $this
     */
    public function video($url)
    {
        if (is_callable($url)) {
            $callback = $url;

            $callback($embedVideo = new DiscordEmbedVideo);

            $this->video = $embedVideo;

            return $this;
        }

        $this->video = new DiscordEmbedVideo;
        $this->video->url($url);

        return $this;
    }

    /**
     * Set the embed provider.
     *
     * @param  \Closure|string  $name
     * @param  string  $url
     * @return $this
     */
    public function provider($name, $url = '')
    {
        if (is_callable($name)) {
            $callback = $name;

            $callback($embedProvider = new DiscordEmbedProvider);

            $this->provider = $embedProvider;

            return $this;
        }

        $this->provider = new DiscordEmbedProvider;
        $this->provider
            ->name($name)
            ->url($url);

        return $this;
    }

    /**
     * Set the embed author.
     *
     * @param  \Closure|string  $name
     * @param  string  $url
     * @param  string  $icon_url
     * @return $this
     */
    public function author($name, $url = '', $icon_url = '')
    {
        if (is_callable($name)) {
            $callback = $name;

            $callback($embedAuthor = new DiscordEmbedAuthor);

            $this->author = $embedAuthor;

            return $this;
        }

        $this->author = new DiscordEmbedAuthor;
        $this->author
            ->name($name)
            ->url($url)
            ->iconUrl($icon_url);

        return $this;
    }

    /**
     * Add a field to the embed.
     *
     * @param  \Closure|string  $title
     * @param  string  $content
     * @return $this
     */
    public function field($title, $content = '')
    {
        if (is_callable($title)) {
            $callback = $title;

            $callback($embedField = new DiscordEmbedField);

            $this->fields[] = $embedField;

            return $this;
        }

        $this->fields[$title] = $content;

        return $this;
    }

    /**
     * Set the fields of the embed.
     *
     * @param  array  $fields
     * @return $this
     */
    public function fields(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }
}
