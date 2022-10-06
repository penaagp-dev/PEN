<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalonAnggotaRequest;
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

    public function upsertData(CalonAnggotaRequest $request)
    {
        $fileUpload = $request->file('foto');
        $fileName = str_replace(' ', '_', $request->nama) . '.' . $fileUpload->getClientOriginalExtension();
        $filePath = public_path('storage/recrutment/');
        $caId = $request->id | null;
        $newDetail = array(
            'nama' => $request->nama, 
            'panggilan' => $request->panggilan, 
            'umur' => $request->umur, 
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon, 
            'agama' => $request->agama, 
            'email' => $request->email, 
            'sex' => $request->sex, 
            'foto' => $fileName, 
            'semester' => $request->semester,
            'prodi' => $request->prodi
        );

        $data = $this->caRepo->upsertCa($caId, $newDetail);
        if ($data['code'] == 200) {
            $fileUpload->move($filePath, $fileName);
        }
        return response()->json($data, $data['code']);
    }

    public function getDataById($caId)
    {
        $CA = $this->caRepo->getCaById($caId);
        return response()->json($CA, $CA['code']);
    }

    public function deleteData($caId): JsonResponse
    {
        $CA = $this->caRepo->deleteCa($caId);
        return response()->json($CA, $CA['code']);
    }
}
