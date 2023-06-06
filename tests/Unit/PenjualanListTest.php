<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class PenjualanListTest extends TestCase
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
        $this->get(route('penjualan-list'))->assertStatus(200);
    }
}
