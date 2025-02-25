<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $message;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    // Build the email
    public function build()
    {
        return $this->subject('Support Request')
            ->from($this->email, $this->name)  // Removed $message here
            ->to('kern@brown-brown.nl')  // Support email
            ->view('emails.support-email-temp')  // View for the email body
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'user_message' => $this->message,  // Pass the message directly
            ]);
    }
}
