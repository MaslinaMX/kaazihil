<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PriceEditorController extends Controller
{
    private const PASSWORD = 'KZ-PRICE-ADMIN-2026!';

    public function index()
    {
        return view('admin.edit-prices', [
            'prices' => $this->readPrices(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'string'],
            'deluxe_room' => ['required', 'integer', 'min:0'],
            'deluxe_double_room' => ['required', 'integer', 'min:0'],
            'deluxe_suite_jacuzzi' => ['required', 'integer', 'min:0'],
        ]);

        if ($validated['password'] !== self::PASSWORD) {
            return back()
                ->withErrors([
                    'password' => 'La contraseña no es correcta.',
                ])
                ->withInput();
        }

        $prices = $this->readPrices();
        $prices['deluxe_room'] = (int) $validated['deluxe_room'];
        $prices['deluxe_double_room'] = (int) $validated['deluxe_double_room'];
        $prices['deluxe_suite_jacuzzi'] = (int) $validated['deluxe_suite_jacuzzi'];

        File::put(
            resource_path('data/room-prices.json'),
            json_encode($prices, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . PHP_EOL
        );

        return redirect()->route('edit-prices.index')->with('success', 'Precios actualizados correctamente.');
    }

    private function readPrices(): array
    {
        $defaults = [
            'deluxe_room' => 1000,
            'deluxe_double_room' => 1200,
            'deluxe_suite_jacuzzi' => 2200,
        ];

        $path = resource_path('data/room-prices.json');

        if (! File::exists($path)) {
            return $defaults;
        }

        $contents = json_decode(File::get($path), true);

        if (! is_array($contents)) {
            return $defaults;
        }

        return [
            'deluxe_room' => (int) ($contents['deluxe_room'] ?? $defaults['deluxe_room']),
            'deluxe_double_room' => (int) ($contents['deluxe_double_room'] ?? $defaults['deluxe_double_room']),
            'deluxe_suite_jacuzzi' => (int) ($contents['deluxe_suite_jacuzzi'] ?? $defaults['deluxe_suite_jacuzzi']),
        ];
    }
}
