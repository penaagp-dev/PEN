<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanModel extends Model
{
    use HasFactory;
    protected $table = 'jawaban';
    protected $fillable = [
        'id_jenis', 'id_ca', 'jawaban',
        'created_at', 'updated_at'
    ];
}
