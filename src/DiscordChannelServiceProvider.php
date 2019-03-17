<?php

namespace Illuminate\Notifications;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;

class DiscordChannelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Notification::extend('discord', function ($app) {
            return new Channels\DiscordWebhookChannel(new HttpClient);
        });
    }
}
