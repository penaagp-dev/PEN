<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExampleRequest;
use App\Interfaces\ExampleRepoInterfaces;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ExampleController extends Controller
{
    private ExampleRepoInterfaces $exaRepo;

    public function __construct(ExampleRepoInterfaces $exaRepo)
    {
        $this->exaRepo = $exaRepo;
    }

    public function getAllData(): JsonResponse
    {
        $example = $this->exaRepo->getAllSample();
        return response()->json($example, $example['code']);
    }

    public function getDataById($sampleId): JsonResponse
    {
        $example = $this->exaRepo->getSampleById($sampleId);
        return response()->json($example, $example['code']);
    }

    public function upsertData(ExampleRequest $request)
    {
        $exampleId = $request->id | null;
        $request['updated_at'] = Carbon::now();

        $example = $this->exaRepo->upsertSample($exampleId, $request->all());
        return response()->json($example, $example['code']);
    }

    public function deleteData($sampleId): JsonResponse
    {
        $example = $this->exaRepo->deleteSample($sampleId);
        return response()->json($example, $example['code']);
    }
}
