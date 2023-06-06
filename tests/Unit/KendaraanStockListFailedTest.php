<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class KendaraanStockListFailedTest extends TestCase
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
        
        $response = $this->json('GET', route('kendaraan-stock-list'), [
            'filter' => [
                'tahun_keluaran' => 1
            ]
        ])->assertStatus(400);
    }
}
