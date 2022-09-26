<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralInformationRequest;
use App\Interfaces\GeneralInformationRepoInterfaces;
use Carbon\Carbon;



class GeneralInformationController extends Controller
{
    private GeneralInformationRepoInterfaces $GeneralRepo;

    public function __construct(GeneralInformationRepoInterfaces $GeneralRepo)
    {
        $this->GeneralRepo = $GeneralRepo;
    }

    public function getAllData(): JsonResponse
    {
        $GeneralInformation = $this->GeneralRepo->getAllData();
        return response()->json($GeneralInformation, $GeneralInformation['code']);
    }

    public function getDataById($dataId): JsonResponse
    {
        $GeneralInformation = $this->GeneralRepo->getDataById($dataId);
        return response()->json($GeneralInformation, $GeneralInformation['code']);
    }

    public function upsertData(GeneralInformationRequest $request)
    {
        $dataId = $request->id | null;
        $request['updated_at'] = Carbon::now();

        $GeneralInformation = $this->GeneralRepo->upsertData($dataId, $request->all());
        return response()->json($GeneralInformation, $GeneralInformation['code']);
    }

    public function deleteData($dataId): JsonResponse
    {
        $GeneralInformation = $this->GeneralRepo->deleteData($dataId);
        return response()->json($GeneralInformation, $GeneralInformation['code']);
    }
}
