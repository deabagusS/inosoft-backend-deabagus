<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Interfaces\PenjualanRepositoryInterface;
use App\Interfaces\KendaraanRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{    
    private PenjualanRepositoryInterface $penjualanRepository;
    private KendaraanRepositoryInterface $kendaraanRepository;

    public function __construct(
        PenjualanRepositoryInterface $penjualanRepository,
        KendaraanRepositoryInterface $kendaraanRepository
    ) {
        $this->penjualanRepository = $penjualanRepository;
        $this->kendaraanRepository = $kendaraanRepository;
        $this->filter = [
            'tahun_keluaran', 
            'warna', 
            'harga', 
            'mesin', 
            'kapasitas_penumpang', 
            'tipe', 
            'tipe_suspensi', 
            'tipe_transmisi',
            'start_date',
            'end_date'
        ];
    }

    public function index(): JsonResponse 
    {
        $inputFilter = request()->post('filter') ?? [];
        $page = request()->post('page') ?? 1;
        $perPage = request()->post('perPage') ?? 10;
        $data = $this->penjualanRepository->getList(setFilterInput($this->filter, $inputFilter), $page, $perPage);

        return response()->json(setResponseDataList($data, 'penjualan'));
    }

    public function jumlahTerjual(): JsonResponse 
    {
        $inputFilter = request()->post('filter') ?? [];
        $data = $this->penjualanRepository->jumlahTerjual(setFilterInput($this->filter, $inputFilter));

        return response()->json(setResponse(true, '', $data));
    }

    public function create(): JsonResponse 
    {
        $rules = [
            'kendaraan_id' => 'required',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return response()->json(setResponse(false, 'Parameter yang diinput belum sesuai', $validator->messages()->toArray()));
        } else {
            $kendaraanId = request()->post('kendaraan_id');
            $kendaraan = $this->kendaraanRepository->find($kendaraanId);

            if ($kendaraan) {
                $pelangganDetail = request()->only(array_keys($rules));
                foreach ($pelangganDetail as $key => $value) {
                    $kendaraan->$key = $value;
                }
                
                $data = $this->penjualanRepository->create($kendaraan->toArray());

                if ($data) {
                    $this->kendaraanRepository->delete($kendaraanId);

                    return response()->json(setResponse(true, 'Simpan data penjualan berhasil'));
                } else {
                    return response()->json(setResponse(false, 'App Server Error'));
                }
            } else {
                return response()->json(setResponse(false, 'Data kendaraan tidak ditemukan'));
            }
        }
    }
}
