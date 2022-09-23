<?php

namespace App\Repositories;

use App\Models\ExampleModel;
use App\Models\GenerationModel;
use App\Interfaces\ExampleRepoInterfaces;
use App\Interfaces\GenerationRepoInterfaces;

class GenerationRepository implements GenerationRepoInterfaces
{
  public function getAllGeneration()
  {
    $db = new GenerationModel();
    try {
      $generation = array(
        'code' => 200,
        'count' => $db->count(),
        'message' => 'get data successfully',
        'data' => $db->all()
      );
    } catch (\Throwable $th) {
      $generation = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $generation;
  }

  public function getGenerationById($generationId)
  {
    $db = new GenerationModel;
    try {
      $generation = array(
        'code' => 200,
        'message' => 'get data successfully',
        'data' => $db->whereId($generationId)->first()
      );
    } catch (\Throwable $th) {
      $generation = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $generation;
  }

  public function upsertGeneration($generationId, array $newDetail)
  {
    $db = new GenerationModel;
    try {
      $generation = array(
        'code' => 200,
        'message' => 'data has successfully proccess'
      );
      if ($generationId) {
        $generation['data'] = $db->whereId($generationId)->update($newDetail);
      } else {
        $generation['data'] = $db->create($newDetail);
      }
    } catch (\Throwable $th) {
      $generation = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $generation;
  }

  public function deleteGeneration($generationId)
  {
    $db = new GenerationModel;
    try {
      $generation = array(
        'code' => 200,
        'message' => 'delete data successfully',
        'data' => $db->whereId($generationId)->delete()
      );
    } catch (\Throwable $th) {
      $generation = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $generation;
  }
}
