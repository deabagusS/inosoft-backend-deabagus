<?php

namespace App\Repositories;

use App\Interfaces\KendaraanRepositoryInterface;
use App\Models\Kendaraan;

class KendaraanRepository implements KendaraanRepositoryInterface 
{
    public function getAll() 
    {
        return Kendaraan::all();
    }

    public function create(array $kendaraanDetail) 
    {
        return Kendaraan::create($kendaraanDetail);
    }
}