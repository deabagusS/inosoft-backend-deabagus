<?php

namespace Tests\Unit;

use Tests\TestCase;

class RegisterFailedTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->json('POST', route('auth-register'))->assertStatus(400);
    }
}
