<?php

namespace App\Mail;

use App\Models\BBMSCompany;
use App\Models\Bloodcampaign;
use App\Models\BloodRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BloodRequestWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public BloodRequest $bloodRequest,
        public ?Bloodcampaign $campaign = null,
        public ?BBMSCompany $BBMScompanies = null,
        public ?string $customHeading = null,
        public ?string $customMessage = null,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Blood Request Update - Blood Bank Management System',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.blood-request-welcome',
            with: [
                'bloodRequest' => $this->bloodRequest,
                'campaign' => $this->campaign,
                'BBMScompanies' => $this->BBMScompanies,
                'customHeading' => $this->customHeading,
                'customMessage' => $this->customMessage,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
