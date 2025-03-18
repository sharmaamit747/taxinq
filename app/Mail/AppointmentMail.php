<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppointmentMail extends Mailable {

    use Queueable,
        SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $demo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo) {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
	$demo = $this->demo;
        $email = $this->demo['email'];
        $uname = $this->demo['uname'];
        $cre = $this->demo['cre'];
        $time = date("Y-m-d h:i:sa");
        return $this->from('info@taxinq.com')
                        ->subject($this->demo['subject'])
                        ->view('mails.appointmentMail', compact('email', 'cre', 'uname','time'));
    }

}


