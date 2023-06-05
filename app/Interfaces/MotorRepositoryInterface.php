<?php

namespace App\Interfaces;

interface MotorRepositoryInterface 
{
    public function getAll();
    public function create(array $orderDetails);
}