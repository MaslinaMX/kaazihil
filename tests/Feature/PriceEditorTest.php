<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class PriceEditorTest extends TestCase
{
    protected string $pricesPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pricesPath = storage_path('app/room-prices.json');
    }

    public function test_edit_prices_requires_the_hardcoded_password(): void
    {
        $response = $this->get('/edit-prices');

        $response->assertStatus(200);
        $response->assertSee('Password');
    }

    public function test_edit_prices_updates_the_json_file_when_password_is_correct(): void
    {
        $original = File::exists($this->pricesPath) ? File::get($this->pricesPath) : null;

        try {
            $response = $this->post('/edit-prices', [
                'password' => 'KZ-PRICE-ADMIN-2026!',
                'deluxe_room' => 1500,
                'deluxe_double_room' => 1700,
                'deluxe_suite_jacuzzi' => 2500,
            ]);

            $response->assertRedirect('/edit-prices');
            $response->assertSessionHas('success');

            $this->assertFileExists($this->pricesPath);

            $prices = json_decode(File::get($this->pricesPath), true);

            $this->assertSame(1500, $prices['deluxe_room']);
            $this->assertSame(1700, $prices['deluxe_double_room']);
            $this->assertSame(2500, $prices['deluxe_suite_jacuzzi']);
        } finally {
            if ($original !== null) {
                File::put($this->pricesPath, $original);
            } else {
                File::delete($this->pricesPath);
            }
        }
    }
}
