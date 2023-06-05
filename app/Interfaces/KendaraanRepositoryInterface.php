<?php

namespace App\Interfaces;

interface KendaraanRepositoryInterface 
{
    public function getAll();
    public function create(array $orderDetails);
}