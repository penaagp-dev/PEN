<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaRequest;
use App\Interfaces\SocialMediaRepoInterfaces;
use App\Models\GeneralInformationModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class SocialMediaController extends Controller
{
    //
        private SocialMediaRepoInterfaces $socialRepo;

    public function __construct(SocialMediaRepoInterfaces $socialRepo)
    {
        $this->socialRepo = $socialRepo;
    }

    public function getAllData(): JsonResponse
    {
        $social = $this->socialRepo->getAllData();
        return response()->json($social, $social['code']);
    }

    public function getDataById($socialId): JsonResponse
    {
        $social = $this->socialRepo->getDataById($socialId);
        return response()->json($social, $social['code']);
    }

    public function upsertData(SocialMediaRequest $request)
    {
        $socialId = $request->id | null;
        $request['updated_at'] = Carbon::now();

        $social = $this->socialRepo->upsertData($socialId, $request->all());
        return response()->json($social, $social['code']);
    }

    public function deleteData($socialId): JsonResponse
    {
        $generation = $this->socialRepo->deleteData($socialId);
        return response()->json($generation, $generation['code']);
    }
}
