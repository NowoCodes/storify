<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class StoryEventSubscriber {

    public function handleStoryCreated($event) {
        Log::info("Inside Subscriber. A story with title " . $event->title . " was added");
    }

    public function handleStoryEdited($event) {
        Log::info("Inside Subscriber. A story with title " . $event->title . " was edited");
    }

    public function subscribe($events) {
        $events->listen(
            'App\Events\StoryCreated',
            [StoryEventSubscriber::class, 'handleStoryCreated']
        );

        $events->listen(
            'App\Events\StoryEdited',
            [StoryEventSubscriber::class, 'handleStoryEdited']
        );
    }
}