<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class PenjualanJumlahTest extends TestCase
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
        $this->get(route('penjualan-jumlah'))->assertStatus(200);
    }
}
