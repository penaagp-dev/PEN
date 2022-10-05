<?php

namespace App\Repositories;

use App\Interfaces\CARepoInterfaces;
use App\Models\CalonAnggotaModel;

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
    
  }

  public function deleteCa($caId)
  {
    
  }
}