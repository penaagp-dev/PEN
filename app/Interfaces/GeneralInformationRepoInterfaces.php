<?php

namespace App\Interfaces;

interface GeneralInformationRepoInterfaces
{
  public function getAllData();
  // public function getDataById($dataId);
  public function upsertData($dataId, array $newDetail);
}
