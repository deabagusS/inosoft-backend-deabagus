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
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->kendaraanRepository->getAll()
        ]);
    }
}
