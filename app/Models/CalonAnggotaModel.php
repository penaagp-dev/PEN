<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonAnggotaModel extends Model
{
    use HasFactory;
    protected $table = 'calon_anggota';
    protected $fillable = [
        'id', 'nama', 'panggilan', 'umur', 'alamat',
        'no_telepon', 'agama', 'email', 'sex', 'foto', 'semester',
        'prodi', 'created_at', 'updated_at'
    ];
}
