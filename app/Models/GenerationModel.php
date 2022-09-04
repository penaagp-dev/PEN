<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerationModel extends Model
{
    use HasFactory;
    protected $table = 'generation';
    protected $fillable = [
        'id', 'name', 'years', 'graduated', 'created_at', 'updated_at'
    ];
}
