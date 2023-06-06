<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\UserRepositoryInterface;

class UserSeeder extends Seeder
{
    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userDetail = [
            'email' => 'dea',
            'email' => 'dea@gmail.com',
            'password' => Hash::make('Password123'),
        ];

        $userExist = $this->userRepository->userExist($userDetail['email']);
            
        if (!$userExist)
            $this->userRepository->create($userDetail);
    }
}
