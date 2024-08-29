<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $contact_data;

    public function __construct($contact_data)
    {
        $this->contact_data = $contact_data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'JKPL Quotation Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.form',
            with: [
                'contact_data' => $this->contact_data,
            ],
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        if (isset($this->contact_data['file_path'])) {
            $attachments[] = Attachment::fromPath(storage_path('app/public/' . $this->contact_data['file_path']));
        }

        return $attachments;
    }
}