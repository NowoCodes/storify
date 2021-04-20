<?php

namespace App\Providers;

use App\Events\StoryCreated;
use App\Listeners\SendNotification;
use App\Listeners\StoryEventSubscriber;
use App\Listeners\WriteLog;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // Add event & listener files
        StoryCreated::class => [
            // WriteLog::class,
            SendNotification::class,
        ],
    ];

    protected $subscribe = [
        StoryEventSubscriber::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
