<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExampleRequest;
use App\Interfaces\ExampleInterface;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    private ExampleInterface $exampleRepo;

    public function __construct(ExampleInterface $exampleRepo)
    {
        $this->exampleRepo = $exampleRepo;
    }

    public function getAllData()
    {
        try {
            $sample = $this->exampleRepo->getAllSample();
            $response = array(
                "count" => count($sample),
                "code" => 200,
                "data" => $sample,
                "sweet_alert" => array(
                    'icon' => 'success',
                    'title' => 'God Job',
                    'message' => 'Success Getting Data'
                ),
            );
        } catch (\Throwable $th) {
            $response = array(
                "code" => 500,
                "data" => null,
                "sweet_alert" => array(
                    'icon' => 'warning',
                    'title' => 'Error',
                    'message' => $th->getMessage()
                ),
            );
        }

        return response()->json($response, $response['code']);
    }

    public function createData(ExampleRequest $request)
    {
        $newDetail = $request->only([
           'sample', 'is_text', 'date_sample'
        ]);
        try {
            $this->exampleRepo->createSample($newDetail);
            $response = array(
                "code" => 200,
                "sweet_alert" => array(
                    'icon' => 'success',
                    'title' => 'God Job',
                    'message' => 'Success Create Data'
                ),
            );
        } catch (\Throwable $th) {
            $response = array(
                "code" => 500,
                "sweet_alert" => array(
                    'icon' => 'warning',
                    'title' => 'Error',
                    'message' => $th->getMessage()
                ),
            );
        }

        return response()->json($response, $response['code']);
    }

    public function getDataById($id)
    {
        try {
            $sample = $this->exampleRepo->getSampleById($id);
            if ($sample) {
                $response = array(
                    "code" => 200,
                    "data" => $sample,
                    "sweet_alert" => array(
                        'icon' => 'success',
                        'title' => 'God Job',
                        'message' => 'Success Getting Data'
                    ),
                );
            } else {
                $response = array(
                    "code" => 404,
                    "data" => null,
                    "sweet_alert" => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data not found'
                    ),
                );
            }
        } catch (\Throwable $th) {
            $response = array(
                "code" => 500,
                "data" => null,
                "sweet_alert" => array(
                    'icon' => 'warning',
                    'title' => 'Error',
                    'message' => $th->getMessage()
                ),
            );
        }

        return response()->json($response, $response['code']);
    }

    public function updateData(ExampleRequest $request, $id)
    {
        $newDetail = $request->only([
            'sample', 'is_text', 'date_sample'
        ]);
        try {
            $find = $this->exampleRepo->getSampleById($id);
            if ($find) {
                $this->exampleRepo->updateSample($id, $newDetail);
                $response = array(
                    "code" => 200,
                    "sweet_alert" => array(
                        'icon' => 'success',
                        'title' => 'God Job',
                        'message' => 'Success Updating Data'
                    ),
                );
            } else {
                $response = array(
                    "code" => 404,
                    "sweet_alert" => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data not found'
                    ),
                );
            }
        } catch (\Throwable $th) {
            $response = array(
                "code" => 500,
                "sweet_alert" => array(
                    'icon' => 'warning',
                    'title' => 'Error',
                    'message' => $th->getMessage()
                ),
            );
        }

        return response()->json($response, $response['code']);
    }

    public function deleteData($id)
    {
        try {
            $find = $this->exampleRepo->getSampleById($id);
            if ($find) {
                $this->exampleRepo->deleteSample($id);
                $response = array(
                    "code" => 200,
                    "sweet_alert" => array(
                        'icon' => 'success',
                        'title' => 'God Job',
                        'message' => 'Success Deleting Data'
                    ),
                );
            } else {
                $response = array(
                    "code" => 404,
                    "sweet_alert" => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data not found'
                    ),
                );
            }
        } catch (\Throwable $th) {
            $response = array(
                "code" => 500,
                "sweet_alert" => array(
                    'icon' => 'warning',
                    'title' => 'Error',
                    'message' => $th->getMessage()
                ),
            );
        }

        return response()->json($response, $response['code']);
    }
}
