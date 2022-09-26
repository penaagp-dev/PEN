<?php

namespace App\Repositories;

use App\Models\GeneralInformationModel;
use App\Interfaces\GeneralInformationRepoInterfaces;

class GeneralInformationRepository implements GeneralInformationRepoInterfaces
{
  public function getAllData()
  {
    $db = new GeneralInformationModel;
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

  public function getDataById($dataId)
  {
    $db = new GeneralInformationModel;
    try {
      $example = array(
        'code' => 200,
        'message' => 'get data successfully',
        'data' => $db->whereId($dataId)->first()
      );
    } catch (\Throwable $th) {
      $example = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $example;
  }

  public function upsertData($dataId, array $newDetail)
  {
    $db = new GeneralInformationModel;
    try {
      $example = array(
        'code' => 200,
        'message' => 'data has successfully proccess'
      );
      if ($dataId) {
        $example['data'] = $db->whereId($dataId)->update($newDetail);
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

  public function deleteData($dataId)
  {
    $db = new GeneralInformationModel;
    try {
      $example = array(
        'code' => 200,
        'message' => 'delete data successfully',
        'data' => $db->whereId($dataId)->delete()
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
