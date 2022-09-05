<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExampleModel extends Model
{
    use HasFactory;
    protected $table = 'example';
    protected $fillable = [
        'id', 'sample', 'is_text', 'date_sample', 'created_at', 'updated_at'
    ];
}
