<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuestReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservationData;

    public function __construct($reservationData)
    {
        $this->reservationData = $reservationData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: [new Address($this->reservationData['email'], $this->reservationData['first_name'] . ' ' . $this->reservationData['last_name'])],
            subject: 'Solicitud recibida - Hotel Kaa Zihil',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.guest-reservation-confirmation',
            with: [
                'reservation' => $this->reservationData,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
