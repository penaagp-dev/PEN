<?php

namespace App\Repositories;

use App\Interfaces\SocialMediaRepoInterfaces;
use App\Models\ExampleModel;
use App\Models\SocialMediaModel;

class SocialMediaRepository implements SocialMediaRepoInterfaces
{
  public function getAllData()
  {
    $db = new SocialMediaModel();
    try {
      $social = array(
        'code' => 200,
        'count' => $db->count(),
        'message' => 'get data successfully',
        'data' => $db->all()
      );
    } catch (\Throwable $th) {
      $social = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $social;
  }

  public function getDataById($dataId)
  {
    $db = new SocialMediaModel;
    try {
      $social = array(
        'code' => 200,
        'message' => 'get data successfully',
        'data' => $db->whereId($dataId)->first()
      );
    } catch (\Throwable $th) {
      $social = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $social;
  }

  public function upsertData($dataId, array $newDetail)
  {
    $db = new SocialMediaModel;
    try {
      $social = array(
        'code' => 200,
        'message' => 'data has successfully proccess'
      );
      if ($dataId) {
        $social['data'] = $db->whereId($dataId)->update($newDetail);
      } else {
        $social['data'] = $db->create($newDetail);
      }
    } catch (\Throwable $th) {
      $social = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $social;
  }

  public function deleteData($dataId)
  {
    $db = new SocialMediaModel;
    try {
      $social = array(
        'code' => 200,
        'message' => 'delete data successfully',
        'data' => $db->whereId($dataId)->delete()
      );
    } catch (\Throwable $th) {
      $social = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $social;
  }
}
