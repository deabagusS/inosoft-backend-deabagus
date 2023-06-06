<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class PenjualanCreateFailedRandomIdTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $response = $this->json('POST', route('penjualan-create'), [
            'kendaraan_id' => 'unknownid'.rand(1000,9999)
        ])->assertStatus(400);
    }
}
