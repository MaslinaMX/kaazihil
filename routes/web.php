<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

// Ruta de Inicio
Route::get('/', [RoomController::class, 'home'])->name('home');

// Rutas de Habitaciones
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

// Rutas de Reservaciones
Route::get('/booking', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/booking', [ReservationController::class, 'store'])->name('reservations.store');

// Rutas adicionales del template
Route::get('/about', function() { return view('about'); })->name('about');
Route::get('/contact', function() { return view('contact'); })->name('contact');
Route::get('/blog', function() { return view('blog'); })->name('blog');

// Ruta para cambiar idioma
Route::get('/locale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
})->where('locale', 'es|en')->name('locale.switch');

// Ruta de debugging para verificar el modo mantenimiento
Route::get('/debug-maintenance', function() {
    return [
        'SITE_MAINTENANCE_MODE env' => env('SITE_MAINTENANCE_MODE'),
        'is true' => env('SITE_MAINTENANCE_MODE') === 'true',
        'middleware registered' => true,
    ];
});

