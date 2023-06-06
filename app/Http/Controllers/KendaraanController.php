<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Interfaces\KendaraanRepositoryInterface;

class KendaraanController extends Controller
{    
    private KendaraanRepositoryInterface $kendaraanRepository;

    public function __construct(KendaraanRepositoryInterface $kendaraanRepository) 
    {
        $this->kendaraanRepository = $kendaraanRepository;
        $this->filter = [
            'tahun_keluaran', 
            'warna', 
            'harga', 
            'mesin', 
            'kapasitas_penumpang', 
            'tipe', 
            'tipe_suspensi', 
            'tipe_transmisi'
        ];
    }

    public function list(): JsonResponse 
    {
        $inputFilter = request()->post('filter') ?? [];
        $page = request()->post('page') ?? 1;
        $perPage = request()->post('perPage') ?? 10;
        $data = $this->kendaraanRepository->getList(setFilterInput($this->filter, $inputFilter), $page, $perPage);

        return response()->json(setResponseDataList($data, 'kendaraan'));
    }

    public function jumlahStock(): JsonResponse 
    {
        $inputFilter = request()->post('filter') ?? [];
        $data = $this->kendaraanRepository->jumlahStock(setFilterInput($this->filter, $inputFilter));

        return response()->json(setResponse(true, '', $data));
    }
}
