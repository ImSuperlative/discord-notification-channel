<?php

namespace Illuminate\Notifications\Messages;

class DiscordEmbedField
{
    /**
     * The title field of the embed field.
     *
     * @var string $title
     */
    protected $title;

    /**
     * The content of the embed field.
     *
     * @var string $content
     */
    protected $content;

    /**
     * Whether the content is inline.
     *
     * @var bool $inline
     */
    protected $inline = true;

    /**
     * Set the title of the field.
     *
     * @param  string $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the content of the field.
     *
     * @param  string $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Indicates that the content should not be displayed side-by-side with other fields.
     *
     * @return $this
     */
    public function long()
    {
        $this->inline = false;

        return $this;
    }

    /**
     * Get the array representation of the embed field.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name'   => $this->title,
            'value'  => $this->content,
            'inline' => $this->inline,
        ];
    }
}
