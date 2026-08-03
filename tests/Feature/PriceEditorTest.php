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

        $this->pricesPath = base_path('resources/data/room-prices.json');
    }

    public function test_edit_prices_requires_the_hardcoded_password(): void
    {
        $response = $this->get('/edit-prices');

        $response->assertStatus(200);
        $response->assertSee('Password');
    }

    public function test_edit_prices_updates_the_json_file_when_password_is_correct(): void
    {
        $original = File::get($this->pricesPath);

        try {
            $response = $this->post('/edit-prices', [
                'password' => 'KZ-PRICE-ADMIN-2026!',
                'deluxe_room' => 1500,
                'deluxe_double_room' => 1700,
                'deluxe_suite_jacuzzi' => 2500,
            ]);

            $response->assertRedirect('/');
            $response->assertSessionHas('success');

            $prices = json_decode(File::get($this->pricesPath), true);

            $this->assertSame(1500, $prices['deluxe_room']);
            $this->assertSame(1700, $prices['deluxe_double_room']);
            $this->assertSame(2500, $prices['deluxe_suite_jacuzzi']);
        } finally {
            File::put($this->pricesPath, $original);
        }
    }
}
