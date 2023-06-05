<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Motor extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'motor';

    protected $fillable = [
        'mesin', 'tipe_suspensi', 'tipe_transmisi', 'kendaraan_id', 'penjualan_id'
    ];
}
