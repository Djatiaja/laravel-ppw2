<?php

namespace App\Jobs;

use App\Mail\DataEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;


    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle(): void
    {
        Mail::to("percobaancoding483@gmail.com")->send(new DataEmail(
            $this->data["name"],
            "percobaancoding483@gmail.com",
            $this->data["subject"],
            $this->data["body"]
        ));
        
    }
}
