<?php

namespace App\Interfaces;

interface GenerationRepoInterfaces
{
  public function getAllGeneration();
  public function getGenerationById($generationId);
  public function upsertGeneration($generationId, array $newDetail);
  public function deleteGeneration($generationId);
}
