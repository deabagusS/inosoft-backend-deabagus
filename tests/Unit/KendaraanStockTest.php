<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class KendaraanStockTest extends TestCase
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
        $this->get(route('kendaraan-stock'))->assertStatus(200);
    }
}
