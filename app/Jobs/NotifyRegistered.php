<?php

namespace App\Jobs;

use App\Mail\RegisteredUserEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyRegistered implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public User $user;


    public function __construct(User $user)
    {
        $this->$user = $user;
    }   

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to("percobaancoding483@gmail.com")->send( new RegisteredUserEmail($this->user));
    }
}
