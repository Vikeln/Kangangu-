<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contact extends Mailable
{
    use Queueable, SerializesModels;

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
//       $this->validate($request, [
//           'email'=>'required|email'
//       ]);
//
// $address = 'example@kangangu.com'; //GEN FROM FORM
//
//       $name = '';     //GEN FROM FORM;
//
//
//       $subject = 'Kangangu Enquiries';
//
//       return $this->view('emails.mailme')
//
//                   ->from($address, $name)
//                   ->subject($subject);
    }
}
