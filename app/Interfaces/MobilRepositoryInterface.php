<?php

namespace App\Interfaces;

interface MobilRepositoryInterface 
{
    public function getAll();
    public function create(array $orderDetails);
}