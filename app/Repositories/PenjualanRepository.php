<?php

namespace App\Repositories;

use App\Interfaces\PenjualanRepositoryInterface;
use App\Models\Penjualan;
use Carbon\Carbon;

class PenjualanRepository implements PenjualanRepositoryInterface 
{
    public function filterPenjualan(array $filter){
        $penjualan = Penjualan::query();

        foreach ($filter as $key => $value) {
            switch ($key) {
                case "start_date":
                    $penjualan->where('created_at', '>=', Carbon::parse($value));
                  break;
                case "end_date":
                    $penjualan->where('created_at', '<=', Carbon::parse(date('d-m-Y', strtotime($value. ' + 1 days'))));
                  break;
                default:
                    $penjualan->where($key, $value);
            }
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
        $jumlah_motor = $penjualan->whereNotNull('tipe_suspensi')->orWhereNotNull('tipe_transmisi')->count(); 
        $jumlah_mobil = $penjualanClone->whereNotNull('kapasitas_penumpang')->orWhereNotNull('tipe')->count(); 

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