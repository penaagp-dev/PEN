<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $fillable = [
        'id', 'user_id', 'regist_number', 'name', 'sex', 'start_study',
        'study', 'generation_id', 'status', 'phone', 'email', 'img', 'address', 'created_at', 'updated_at'
    ];
}
