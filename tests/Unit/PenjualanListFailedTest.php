<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class PenjualanListFailedTest extends TestCase
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
        
        $this->json('GET', route('penjualan-list'), [
            'filter' => [
                'tahun_keluaran' => 1
            ]
        ])->assertStatus(400);
    }
}
