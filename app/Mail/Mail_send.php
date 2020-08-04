<?php

namespace App\Mail;

use App\Utility\Utility;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mail_send extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $tries = 3;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('no_replay@gmail.com')->
        view('frontend.mails.index');




//        $url = Utility::URL.Utility::tokengenerator();
//        return $this->from('no_replay@gmail.com')
//            ->view('frontend.mails.index',['url' => $url]);
    }
}
