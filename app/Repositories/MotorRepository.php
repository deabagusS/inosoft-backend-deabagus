<?php

namespace App\Repositories;

use App\Interfaces\MotorRepositoryInterface;
use App\Models\Motor;

class MotorRepository implements MotorRepositoryInterface 
{
    public function getAll() 
    {
        return Motor::all();
    }

    public function create(array $motorDetail) 
    {
        return Motor::create($motorDetail);
    }
}