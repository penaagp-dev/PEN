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
        $fileUpload = $request->file('path');
        $fileName = $request->name . '.' . $fileUpload->getClientOriginalExtension();
        $filePath = public_path('storage\\profile\\');
        $galeryId = $request->id | null;
        $newDetail = array(
            'name' => $request->name, 
            'path' => $fileName, 
            'description' => $request->description,
        );

        $data = $this->galeryRepo->upsertGalery($galeryId, $newDetail);
        if ($data['code'] == 200) {
            $fileUpload->move($filePath, $fileName);
        }
        return response()->json($data, $data['code']);
    }

    public function getDataById($id): JsonResponse
    {
        $galery = $this->galeryRepo->getGaleryById($id);
        return response()->json($galery, $galery['code']);
    }

    public function deleteData($galeryId): JsonResponse
    {
        $example = $this->galeryRepo->deleteGalery($galeryId);
        return response()->json($example, $example['code']);
    }
}
