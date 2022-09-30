<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\GaleryRepoInterfaces;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    private GaleryRepoInterfaces $galeryRepo;
    public function __construct(GaleryRepoInterfaces $galeryRepo)
    {
        $this->galeryRepo = $galeryRepo;
    }

    public function getAllData(): JsonResponse
    {
        $galery = $this->galeryRepo->getAllGalery();
        return response()->json($galery, $galery['code']);
    }

    public function upsertData(Request $request): JsonResponse
    {
        $fileName = $request->file('path');
        return response()->json($fileName->getClientOriginalName());
    }
}
