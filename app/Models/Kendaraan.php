<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kendaraan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'kendaraan';

    protected $fillable = [
        'tahun_keluaran', 'warna', 'harga'
    ];
}
