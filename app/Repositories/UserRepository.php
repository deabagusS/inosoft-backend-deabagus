<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface 
{
    public function userExist(string $email) 
    {
        $userExist = User::where('email', $email)->first();

        if ($userExist) {
            return true;
        } else {
            return false;
        }
    }

    public function create(array $userDetail) 
    {
        return User::Create($userDetail);
    }    
}