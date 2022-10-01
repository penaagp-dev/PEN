<?php

namespace App\Interfaces;

interface SocialMediaRepoInterfaces
{
  public function getAllData();
  public function getDataById($dataId);
  public function upsertData($dataId, array $newDetail);
  public function deleteData($dataId);
}
