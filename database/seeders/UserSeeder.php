<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = 'dea@gmai.com';
        $user = User::firstOrNew(['email' => $email]);

        $user->nama = 'dea';
        $user->email = $email;
        $user->password = Hash::make('Password123');
        
        $user->save();
    }
}
