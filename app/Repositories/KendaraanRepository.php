<?php

namespace App\Repositories;

use App\Interfaces\KendaraanRepositoryInterface;
use App\Models\Kendaraan;

class KendaraanRepository implements KendaraanRepositoryInterface 
{
    public function filterKendaraan(array $filter){
        $kendaraan = Kendaraan::query();

        foreach ($filter as $key => $value) {
            $kendaraan->where($key, $value);
        }

        return $kendaraan;
    }

    public function getList(array $filter, int $page, int $perPage)
    {
        $kendaraan = $this->filterKendaraan($filter);
        $count = $kendaraan->count();
        $offset = ($perPage * $page) - $perPage;
        $data = $kendaraan->skip($offset)->take($perPage)->get();

        return [
            'page' => $page,
            'per_page' => $perPage,
            'total_count' => $count,
            'kendaraan' => $data,
        ];
    }

    public function find(string $id) 
    {
        return Kendaraan::find($id);
    }

    public function jumlahStock(array $filter) 
    {
        $kendaraan = $this->filterKendaraan($filter);
        $kendaraanClone = clone $kendaraan;
        $jumlah_motor = $kendaraan->where('jenis', 'motor')->count(); 
        $jumlah_mobil = $kendaraanClone->where('jenis', 'mobil')->count(); 

        return [
            'jumlah_total' => $jumlah_motor + $jumlah_mobil,
            'jumlah_motor' => $jumlah_motor,
            'jumlah_mobil' => $jumlah_mobil,
        ];
    }

    public function create(array $kendaraanDetail) 
    {
        return Kendaraan::Create($kendaraanDetail);
    }

    public function delete(string $id) 
    {
        $kendaraan = Kendaraan::find($id);
        return $kendaraan->delete();
    }
}