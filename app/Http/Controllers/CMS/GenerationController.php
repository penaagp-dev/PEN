<?php

namespace App\Http\Controllers\CMS;



use App\Http\Controllers\Controller;
use App\Http\Requests\GenerationRequest;
use App\Interfaces\GenerationRepoInterfaces;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class GenerationController extends Controller
{
    private GenerationRepoInterfaces $generationRepo;

    public function __construct(GenerationRepoInterfaces $generationRepo)
    {
        $this->generationRepo = $generationRepo;
    }

    public function getAllData(): JsonResponse
    {
        $generation = $this->generationRepo->getAllGeneration();
        return response()->json($generation, $generation['code']);
    }

    public function getDataById($generationId): JsonResponse
    {
        $generation = $this->generationRepo->getGenerationById($generationId);
        return response()->json($generation, $generation['code']);
    }

    public function upsertData(GenerationRequest $request)
    {
        $generationId = $request->id | null;
        $request['updated_at'] = Carbon::now();

        $generation = $this->generationRepo->upsertGeneration($generationId, $request->all());
        return response()->json($generation, $generation['code']);
    }

    public function deleteData($generationId): JsonResponse
    {
        $generation = $this->generationRepo->deleteGeneration($generationId);
        return response()->json($generation, $generation['code']);
    }
}
