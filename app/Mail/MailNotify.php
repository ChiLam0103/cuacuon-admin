<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sub;
    public $mes;
    public function __construct($subject, $message)
    {
        $this->sub = $subject;
        $this->mes = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('baogia.anshin@gmail.com', 'Báo giá')
            ->subject('Báo giá Anshin')
            ->with([
                'name' => 'Báo giá',
            ])
            ->markdown('mail.send');
    }
}
