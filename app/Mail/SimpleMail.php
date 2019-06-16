<?php

namespace App\Mail;

use App\Enums\QueueNamesEnum;
use App\Letter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class RecoveryEmail
 * @package App\Mail
 */
class SimpleMail extends Mailable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Letter model
     * @var Letter
     */
    protected $letter;

    /**
     * SimpleMail constructor
     * @param Letter $letter
     */
    public function __construct(Letter $letter)
    {
        $this->letter = $letter;
    }

    /**
     * Build the message.
     *
     * @return $this
     * @throws
     */
    public function build()
    {
        $config = config('mail');
        $to = [];
        foreach ($this->letter->recipients as $recipient) {
            $to[] = $recipient->email;
        }

        return $this->from($config['from']['address'])
            ->subject($this->letter->subject)
            ->html($this->letter->content)
            ->onQueue(QueueNamesEnum::EMAIL)
            ->to($to);
    }

}
