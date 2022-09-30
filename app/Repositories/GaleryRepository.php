<?php

namespace App\Repositories;

use App\Interfaces\GaleryRepoInterfaces;
use App\Models\GaleryModel;

class GaleryRepository implements GaleryRepoInterfaces {

  public function getAllGalery()
  {
    $db = new GaleryModel;
    try {
      $galery = array(
        'code' => 200,
        'count' => $db->count(),
        'message' => 'get data successfully',
        'data' => $db->all()
      );
    } catch (\Throwable $th) {
      $galery = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $galery;
  }

  public function getGaleryById($galeryId)
  {
    
  }

  public function upsertGalery($galeryId, array $newDetail)
  {
    $db = new GaleryModel();
    try {
      $galery = array(
        'code' => 200,
        'message' => 'data has successfully proccess'
      );
      if ($galeryId) {
        $galery['data'] = $db->whereId($galeryId)->update($newDetail);
      } else {
        $galery['data'] = $db->create($newDetail);
      }
    } catch (\Throwable $th) {
      $galery = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $galery;
  }

  public function deleteGalery($galeryId)
  {
    
  }
}