<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Penjualan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'penjualan';

    protected $fillable = [
        'tahun_keluaran', 
        'warna', 
        'harga', 
        'mesin', 
        'kapasitas_penumpang', 
        'tipe', 
        'tipe_suspensi', 
        'tipe_transmisi'
    ];

    protected $casts = [
        'created_at' => 'date:d/m/Y H:i:s',
        'updated_at' => 'date:d/m/Y H:i:s',
    ];
}
