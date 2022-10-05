<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\CARepoInterfaces;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CalonAnggotaController extends Controller
{
    private CARepoInterfaces $caRepo;
    public function __construct(CARepoInterfaces $caRepo)
    {
        $this->caRepo = $caRepo;
    }

    public function getAllData(): JsonResponse
    {
        $CA = $this->caRepo->getAllCa();
        return response()->json($CA, $CA['code']);
    }
}
