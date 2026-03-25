<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ReservationConfirmation;

class ReservationController extends Controller
{
public function create(Request $request)
{
    $checkIn  = $request->query('check_in') 
        ? \Carbon\Carbon::parse($request->query('check_in'))->format('Y-m-d') 
        : null;

    $checkOut = $request->query('check_out') 
        ? \Carbon\Carbon::parse($request->query('check_out'))->format('Y-m-d') 
        : null;

    return view('reservations.create', [
        'check_in'  => $checkIn,
        'check_out' => $checkOut,
        'guests'    => $request->query('guests'),
    ]);
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'            => 'required|email',
            'phone'            => 'required|string|max:20',
            'check_in'         => 'required|date|after_or_equal:today',
            'check_out'        => 'required|date|after:check_in',
            'guests'           => 'required|integer|min:1|max:6',
            'country'          => 'required|string|max:255',
            'special_requests' => 'nullable|string',
            'terms'            => 'required|accepted',
        ], [
            'check_in.after_or_equal' => 'La fecha de entrada debe ser hoy o posterior.',
            'check_out.after'         => 'La fecha de salida debe ser después de la fecha de entrada.',
            'terms.accepted'          => 'Debes aceptar los términos y condiciones.',
        ]);

        // Calcular noches para informar al hotel
        $nights = (new \DateTime($validated['check_out']))
            ->diff(new \DateTime($validated['check_in']))
            ->days;

        $reservationData = array_merge($validated, [
            'nights'         => $nights,
            'request_id'     => 'SOL-' . time(),
        ]);

        try {
            Mail::send(new ReservationConfirmation($reservationData));
        } catch (\Exception $e) {
            Log::error('Error al enviar solicitud de disponibilidad: ' . $e->getMessage());
            return redirect()
                ->route('reservations.create')
                ->with('error', 'Ocurrió un error al enviar tu solicitud. Por favor, inténtalo de nuevo.');
        }

        return redirect()
            ->route('reservations.create')
            ->with('success', '¡Solicitud enviada! Nos pondremos en contacto contigo para confirmar la disponibilidad.');
    }
}