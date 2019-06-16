<?php

namespace App\Jobs\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class SendEmail
 * @package App\Jobs\Mail
 */
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Mail instance
     * @var \Illuminate\Contracts\Mail\Mailable
     */
    public $mail;

    /**
     * SendEmail constructor.
     *
     * @param \Illuminate\Contracts\Mail\Mailable $mail
     */
    public function __construct(Mailable $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Handle job
     *
     * @return void
     */
    public function handle() : void
    {
        Mail::send($this->mail->build());
    }
}
