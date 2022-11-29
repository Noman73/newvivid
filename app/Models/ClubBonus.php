<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubBonus extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(Fuser::class,'user_id','id');
    }
}
