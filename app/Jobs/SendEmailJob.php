<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable;
    use Dispatchable, SerializesModels;

     protected $email;
     protected $subject;
     protected $body;
    /**
     * Create a new job instance.
     */
    public function __construct($email)
    {
        $this->email=$email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::raw('Hello this is test email', function ($message) {
            $message->to($this->email)
                    ->subject('Test Email');
        });
    }
}
