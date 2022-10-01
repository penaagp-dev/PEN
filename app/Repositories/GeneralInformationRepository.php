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
      $general = array(
        'code' => 200,
        'count' => $db->count(),
        'message' => 'get data successfully',
        'data' => $db->first()
      );
    } catch (\Throwable $th) {
      $general = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $general;
  }

  public function upsertData($dataId, array $newDetail)
  {
    $db = new GeneralInformationModel;
    try {
      $general = array(
        'code' => 200,
        'message' => 'data has successfully proccess'
      );
      if ($dataId) {
        $general['data'] = $db->whereId($dataId)->update($newDetail);
      } else {
        $general['data'] = $db->create($newDetail);
      }
    } catch (\Throwable $th) {
      $general = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $general;
  }

}
