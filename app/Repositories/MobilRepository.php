<?php

namespace App\Repositories;

use App\Interfaces\MobilRepositoryInterface;
use App\Models\Mobil;

class MobilRepository implements MobilRepositoryInterface 
{
    public function getAll() 
    {
        return Mobil::all();
    }

    public function create(array $mobilDetail) 
    {
        return Mobil::create($mobilDetail);
    }
}