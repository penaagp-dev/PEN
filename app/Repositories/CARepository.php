<?php

namespace App\Repositories;

use App\Interfaces\CARepoInterfaces;
use App\Models\CalonAnggotaModel;
use Illuminate\Support\Facades\File;

class CARepository implements CARepoInterfaces
{
  public function getAllCa()
  {
    $db = new CalonAnggotaModel();
    try {
      $CA = array(
        'code' => 200,
        'count' => $db->count(),
        'message' => 'get data successfully',
        'data' => $db->all()
      );
    } catch (\Throwable $th) {
      $CA = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $CA;
  }

  public function getCaById($caId)
  {
    $db = new CalonAnggotaModel();
    try {
      $CA = array(
        'code' => 200,
        'message' => 'get data successfully',
        'data' => $db->whereId($caId)->first()
      );
    } catch (\Throwable $th) {
      $CA = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $CA;
  }

  public function upsertCa($caId, array $newDetail)
  {
    $db = new CalonAnggotaModel();
    try {
      $CA = array(
        'code' => 200,
        'message' => 'data has successfully proccess'
      );
      if ($caId) {
        $getCa = $db->whereId($caId);
        File::delete(public_path('storage/recrutment/' . $getCa->value('foto')));
        $CA['data'] = $getCa->update($newDetail);
      } else {
        $CA['data'] = $db->create($newDetail);
      }
    } catch (\Throwable $th) {
      $CA = array(
        'code' => 500,
        'message' => $th->getMessage(),
      );
    }

    return $CA;
  }

  public function deleteCa($caId)
  {
    
  }
}