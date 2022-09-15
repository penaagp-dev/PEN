<?php

namespace App\Interfaces;

interface ExampleRepoInterfaces
{
  public function getAllSample();
  public function getSampleById($sampleId);
  public function upsertSample($sampleId, array $newDetail);
  public function deleteSample($sampleId);
}
