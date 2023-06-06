<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Kendaraan;

class PenjualanCreateTest extends TestCase
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
        $this->post(route('penjualan-create'), [
            "kendaraan_id" => Kendaraan::all()->random()->id
        ])->assertStatus(201);
    }
}
