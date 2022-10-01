<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SocialMediaModel extends Model
{
    use HasFactory;
    protected $table = "social_media";
    protected $fillable =[
        'id','general_id','name','url','description'
    ];


}
