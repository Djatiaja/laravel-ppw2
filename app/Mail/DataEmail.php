<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DataEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $body;

    public function __construct(string $name, string $email, string $subject, string $body)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pemberitahuan (karena tidak ada tempe)',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.datamail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
