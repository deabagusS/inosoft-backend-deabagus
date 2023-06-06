<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function userExist(string $email) ;
    public function create(array $userDetail) ;
}