<?php

namespace App\Mail;

use App\Models\Bloodcampaign;
use App\Models\Donor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DonorWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Donor $donor,
        public Bloodcampaign $campaign
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to the Blood Transfusion Center.',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.donor-welcome',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}


