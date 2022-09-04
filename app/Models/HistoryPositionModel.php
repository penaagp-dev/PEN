<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPositionModel extends Model
{
    use HasFactory;
    protected $table = 'history_position';
    protected $fillable= [
        'id', 'member_id', 'position', 'description', 'start_end', 'created_at', 'updated_at'
    ];
}
