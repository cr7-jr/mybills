<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class sendEmailPaySuccess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public function __construct($email)
    {
        $this->email=$email;
    }
    public function handle()
    {
        $details = [
            'body' => "تم دفع الفاتورة بنجاح ",
        ];
         Mail::to($this->email)->send(new \App\Mail\send_msg_pay_successfully($details));
    }
}
