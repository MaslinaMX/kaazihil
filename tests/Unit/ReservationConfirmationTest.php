<?php

namespace Tests\Unit;

use App\Mail\ReservationConfirmation;
use Tests\TestCase;

class ReservationConfirmationTest extends TestCase
{
    public function test_reservation_confirmation_sends_to_hotel_email(): void
    {
        $mail = new ReservationConfirmation([
            'first_name' => 'Juan',
            'last_name' => 'Pérez',
            'email' => 'cliente@example.com',
            'phone' => '999999999',
            'check_in' => '2026-08-10',
            'check_out' => '2026-08-12',
            'guests' => 2,
            'country' => 'México',
            'special_requests' => 'Habitación tranquila',
        ]);

        $envelope = $mail->envelope();

        $this->assertSame('hotelkaazihil2026@gmail.com', $envelope->to[0]->address);
        $this->assertSame('Hotel Kaa Zihil', $envelope->to[0]->name);
    }

    public function test_guest_confirmation_is_sent_to_requester_email(): void
    {
        $mail = new \App\Mail\GuestReservationConfirmation([
            'first_name' => 'Juan',
            'last_name' => 'Pérez',
            'email' => 'cliente@example.com',
            'phone' => '999999999',
            'check_in' => '2026-08-10',
            'check_out' => '2026-08-12',
            'guests' => 2,
            'country' => 'México',
            'special_requests' => 'Habitación tranquila',
        ]);

        $envelope = $mail->envelope();

        $this->assertSame('cliente@example.com', $envelope->to[0]->address);
        $this->assertSame('Juan Pérez', $envelope->to[0]->name);
    }
}
