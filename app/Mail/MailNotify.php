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
    public $att;
    public function __construct($subject, $message,$attachment)
    {
        $this->sub = $subject;
        $this->mes = $message;
        $this->att = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_att=$this->att;
        return $this->from('baogia.anshin@gmail.com', 'Báo giá')
            ->subject('Báo giá Anshin')
            ->with([
                'name' => 'Báo giá',
            ])
            ->attachFromStorage("/exports/" . $e_att->filename.'.xlsx')
            ->markdown('mail.send');
    }
}
