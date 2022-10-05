<?php

namespace App\Interfaces;

interface CARepoInterfaces 
{
  public function getAllCa();
  public function getCaById($caId);
  public function upsertCa($caId, array $newDetail);
  public function deleteCa($caId);
}