<?php

namespace Illuminate\Notifications\Channels;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Notifications\Messages\DiscordEmbedObject;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DiscordMessage;
use Illuminate\Notifications\Messages\DiscordEmbed;
use Illuminate\Notifications\Messages\DiscordEmbedField;

class DiscordWebhookChannel
{
    /**
     * The HTTP client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * Create a new Slack channel instance.
     *
     * @param  \GuzzleHttp\Client  $http
     * @return void
     */
    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if (! $url = $notifiable->routeNotificationFor('discord', $notification)) {
            return;
        }

        /** @var \Illuminate\Notifications\Messages\DiscordMessage $message */
        $message = $notification->toDiscord($notifiable);
        if ($message->attachments && !empty($message->attachments)) {
            $payload = $this->buildJsonFilePayload($message);
        } else {
            $payload = $this->buildJsonPayload($message);
        }

        $this->http->post($url, $payload);
    }

    /**
     * Build up a JSON payload for the discord webhook.
     *
     * @param  \Illuminate\Notifications\Messages\DiscordMessage  $message
     * @return array
     */
    protected function buildJsonPayload(DiscordMessage $message)
    {
        $optionalFields = array_filter([
            'username' => data_get($message, 'username'),
            'avatar_url' => data_get($message, 'icon'),
            'tts' => data_get($message, 'tts'),
            'file' => data_get($message, 'file'),
            'payload_json' => data_get($message, 'payload_json'),
        ]);

        return array_merge([
            'json' => array_merge([
                'content' => $message->content,
                'embeds' => $this->embeds($message),
            ], $optionalFields),
        ], $message->http);
    }

    /**
     * Build up a JSON payload for the discord webhook.
     *
     * @param  \Illuminate\Notifications\Messages\DiscordMessage  $message
     * @return array
     */
    protected function buildJsonFilePayload(DiscordMessage $message)
    {
        return [
            'multipart' => array_merge($message->attachments, [
                ['name' => 'payload_json', 'contents' => json_encode($this->buildJsonPayload($message)['json'])]
            ])
        ];
    }

    /**
     * Format the message's embeds.
     *
     * @param  \Illuminate\Notifications\Messages\DiscordMessage  $message
     * @return array
     */
    protected function embeds(DiscordMessage $message)
    {
        return collect($message->embeds)->map(function ($embed) use ($message) {
            foreach ($embed as $key => $value) {
                if ($value instanceof DiscordEmbedObject) {
                    $embed->$key = $value->toArray();
                }
            }

            return array_filter([
                'title' => $embed->title,
                'type' => $embed->type,
                'description' => $embed->description,
                'url' => $embed->url,
                'timestamp' => $embed->timestamp,
                'color' => $embed->color ?: $message->color(),
                'footer' => $embed->footer,
                'image' => $embed->image,
                'thumbnail' => $embed->thumbnail,
                'video' => $embed->video,
                'provider' => $embed->provider,
                'author' => $embed->author,
                'fields' => $this->fields($embed),
            ]);
        })->all();
    }

    /**
     * Format the $embed's fields.
     *
     * @param  \Illuminate\Notifications\Messages\DiscordEmbed  $embed
     * @return array
     */
    protected function fields(DiscordEmbed $embed)
    {
        return collect($embed->fields)->map(function ($value, $key) {
            if ($value instanceof DiscordEmbedField) {
                return $value->toArray();
            }

            return ['name' => $key, 'value' => $value, 'inline' => true];
        })->values()->all();
    }
}
