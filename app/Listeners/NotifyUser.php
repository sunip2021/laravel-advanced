<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;
class NotifyUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        $users=User::get();
        foreach($users as $user) {
            Mail::to($user->email)->send(new UserMail($event->post));
        }
    }
}
