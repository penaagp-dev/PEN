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
        $getGalery = $db->whereId($caId);
        File::delete(public_path('storage/recrutment/' . $getGalery->value('foto')));
        $CA['data'] = $getGalery->update($newDetail);
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