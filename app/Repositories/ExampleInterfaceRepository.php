<?php

namespace App\Repositories;

use App\Interfaces\ExampleInterface;
use App\Models\ExampleModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ExampleInterfaceRepository implements ExampleInterface
{
    public function getAllSample()
    {
        $db = new ExampleModel;
        $data = $db->select(['id', 'sample', 'is_text', 'date_sample', 'created_at', 'updated_at'])->get();

        return $data;
    }

    public function createSample(array $newDetail)
    {
        $date = Carbon::now();
        $db = DB::table('example');
        
        $newDetail['created_at'] = $date;
        $newDetail['updated_at'] = $date;

        $data = $db->insert($newDetail);

        return $data;
    }

    public function getSampleById($sample_id)
    {
        $db = DB::table('example');

        return $db->whereId($sample_id)->first();
    }

    public function updateSample($sample_id, array $newDetail)
    {
        $date = Carbon::now();
        $db = DB::table('example');
    
        $newDetail['updated_at'] = $date;

        $data = $db->whereId($sample_id)->update($newDetail);
        return $data;
    }

    public function deleteSample($sample_id)
    {
        $db = DB::table('example');

        return $db->whereId($sample_id)->delete();
    }
}