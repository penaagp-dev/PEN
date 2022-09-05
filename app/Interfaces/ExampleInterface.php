<?php

namespace App\Interfaces;

interface ExampleInterface {
    public function getAllSample();
    public function getSampleById($sample_id);
    public function createSample(array $newDetail);
    public function updateSample($sample_id, array $newDetail);
    public function deleteSample($sample_id);
}