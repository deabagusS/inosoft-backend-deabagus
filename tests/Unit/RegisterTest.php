<?php

namespace Tests\Unit;

use Tests\TestCase;
use Faker\Factory as Faker;

class RegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $faker = Faker::create();
        $this->json('POST', route('auth-register'), [
            'nama' => 'Test '.$faker->name,
            'email' => 'test.'.$faker->unique->safeEmail,
            'password' => 'password'
        ])->assertStatus(201);
    }
}
