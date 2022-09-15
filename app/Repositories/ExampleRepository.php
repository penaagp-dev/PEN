<?php

namespace App\Repositories;

use App\Interfaces\ExampleRepoInterfaces;
use App\Models\ExampleModel;

class ExampleRepository implements ExampleRepoInterfaces
{
  public function getAllSample()
  {
    $db = new ExampleModel;
    try {
      $example = array(
        'code' => 200,
        'count' => $db->count(),
        'message' => 'get data successfully',
        'data' => $db->all()
      );
    } catch (\Throwable $th) {
      $example = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $example;
  }

  public function getSampleById($sampleId)
  {
    $db = new ExampleModel;
    try {
      $example = array(
        'code' => 200,
        'message' => 'get data successfully',
        'data' => $db->whereId($sampleId)->first()
      );
    } catch (\Throwable $th) {
      $example = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $example;
  }

  public function upsertSample($sampleId, array $newDetail)
  {
    $db = new ExampleModel;
    try {
      $example = array(
        'code' => 200,
        'message' => 'data has successfully proccess'
      );
      if ($sampleId) {
        $example['data'] = $db->whereId($sampleId)->update($newDetail);
      } else {
        $example['data'] = $db->create($newDetail);
      }
    } catch (\Throwable $th) {
      $example = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $example;
  }

  public function deleteSample($sampleId)
  {
    $db = new ExampleModel;
    try {
      $example = array(
        'code' => 200,
        'message' => 'delete data successfully',
        'data' => $db->whereId($sampleId)->delete()
      );
    } catch (\Throwable $th) {
      $example = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $example;
  }
}
