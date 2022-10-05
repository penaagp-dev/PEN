<?php

namespace App\Repositories;

use App\Interfaces\GaleryRepoInterfaces;
use App\Models\GaleryModel;
use Illuminate\Support\Facades\File;

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
    $db = new GaleryModel();
    try {
      $galery = array(
        'code' => 200,
        'message' => 'get data successfully',
        'data' => $db->whereId($galeryId)->first()
      );
    } catch (\Throwable $th) {
      $galery = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $galery;
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
        $getGalery = $db->whereId($galeryId);
        File::delete(public_path('storage/profile/' . $getGalery->value('path')));
        $galery['data'] = $getGalery->update($newDetail);
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
    $db = new GaleryModel();
    try {
      $getGalery = $db->whereId($galeryId);
      File::delete(public_path('storage/profile/' . $getGalery->value('path')));
      $galery = array(
        'code' => 200,
        'message' => 'delete data successfully',
        'data' => $getGalery->delete()
      );
    } catch (\Throwable $th) {
      $galery = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $galery;
  }
}