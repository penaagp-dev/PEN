<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInformationModel extends Model
{
    use HasFactory;
    protected $table = 'general_information';
    protected $fillable = [
        'id', 'name', 'since', 'parent', 'phone', 'email', 'address', 'created_at', 'updated_at'
    ];
}
