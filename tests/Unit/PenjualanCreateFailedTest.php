<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class PenjualanCreateFailedTest extends TestCase
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
        $this->post(route('penjualan-create'))->assertStatus(400);
    }
}
