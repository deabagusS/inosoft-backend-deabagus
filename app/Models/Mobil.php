<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Mobil extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'mobil';

    protected $fillable = [
        'mesin', 'kapasitas_penumpang', 'tipe', 'kendaraan_id', 'penjualan_id'
    ];
}
