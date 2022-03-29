<?php

namespace App\Listeners;

use App\Events\AddedNews;
use App\Follower;
use App\Notifications\AwareFollowers;
use Illuminate\Support\Facades\Notification;

class NotifyAllFollowers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddedNews  $event
     * @return void
     */
    public function handle(AddedNews $event)
    {
        $followers = Follower::all();

        $article = [
            'title' => $event->title,
            'url' => 'mehnatuz.loc/'.toAscii($event->title)
        ];

        Notification::send($followers, new AwareFollowers($article));
    }
}
