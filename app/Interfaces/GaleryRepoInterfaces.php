<?php

namespace App\Interfaces;

interface GaleryRepoInterfaces {
  public function getAllGalery();
  public function getGaleryById($galeryId);
  public function upsertGalery($galeryId, array $newDetail);
  public function deleteGalery($galeryId);
}