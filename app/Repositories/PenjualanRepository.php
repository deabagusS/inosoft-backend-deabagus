<?php

namespace App\Repositories;

use App\Interfaces\PenjualanRepositoryInterface;
use App\Models\Penjualan;

class PenjualanRepository implements PenjualanRepositoryInterface 
{
    public function filterPenjualan(array $filter){
        $penjualan = Penjualan::query();

        foreach ($filter as $key => $value) {
            $penjualan->where($key, $value);
        }

        return $penjualan;
    }

    public function getList(array $filter, int $page, int $perPage)
    {
        $penjualan = $this->filterPenjualan($filter);
        $count = $penjualan->count();
        $offset = ($perPage * $page) - $perPage;
        $data = $penjualan->skip($offset)->take($perPage)->get();

        return [
            'page' => $page,
            'per_page' => $perPage,
            'total_count' => $count,
            'penjualan' => $data,
        ];
    }

    public function jumlahTerjual(array $filter) 
    {
        $penjualan = $this->filterPenjualan($filter);
        $penjualanClone = clone $penjualan;
        $jumlah_motor = $penjualan->where('jenis', 'motor')->count(); 
        $jumlah_mobil = $penjualanClone->where('jenis', 'mobil')->count(); 

        return [
            'jumlah_total' => $jumlah_motor + $jumlah_mobil,
            'jumlah_motor' => $jumlah_motor,
            'jumlah_mobil' => $jumlah_mobil,
        ];
    }

    public function create(array $penjualanDetail) 
    {
        return Penjualan::create($penjualanDetail);
    }
}