<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPertanyaanModel extends Model
{
    use HasFactory;
    protected $table = 'jenis_pertanyaan';
    protected $fillable = [
       'jenis', 'created_at', 'updated_at'
    ];
}
