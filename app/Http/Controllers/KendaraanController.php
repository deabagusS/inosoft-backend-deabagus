<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Interfaces\KendaraanRepositoryInterface;

class KendaraanController extends Controller
{    
    private KendaraanRepositoryInterface $kendaraanRepository;

    public function __construct(KendaraanRepositoryInterface $kendaraanRepository) 
    {
        $this->kendaraanRepository = $kendaraanRepository;
        $this->filter = ['tahun_keluaran', 'warna', 'harga', 'mesin', 'kapasitas_penumpang', 'tipe', 'tipe_suspensi', 'tipe_transmisi'];
    }

    public function index(Request $request): JsonResponse 
    {
        $filter = $request->only($this->filter);
        $page = $request->post('page') ?? 1;
        $perPage = $request->post('perPage') ?? 10;
        $data = $this->kendaraanRepository->getList($filter, $page, $perPage);

        return response()->json(setResponseDataList($data, 'kendaraan'));
    }

    public function jumlahStock(Request $request): JsonResponse 
    {
        $filter = $request->only($this->filter);
        $data = $this->kendaraanRepository->jumlahStock($filter);

        return response()->json(setResponse(true, '', $data));
    }
}
